<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * DrF Reverse Routing
 *
 * @author	    AJ Heller <aj@drfloob.com>
 * @link		http://drfloob.com/
 */

// ------------------------------------------------------------------------
/**
 * (Reverse) Site_URL
 *
 * Returns a custom routed URL if one exists.  Returns a normal site_url otherwise.
 * It works by translating the passed-in URI into a custom route URI, if possible.
 * This function does not handle ANY regex used without capture-groups and back-references.
 * Visit http://drfloob.com/codeIgniter/reverse_redirect to learn why
 *
 * @access	public
 * @param	$uri	The standard CI URL, e.g. controller/function/param1
 * @param	$method
 * @param	$http_response_code
 */
	function site_url($uri = '')
	{
		$Router =& load_class('Router');
		
		// $uri is expected to be a string, in the form of controller/function/param1
		// trim leading and trailing slashes, just in case
		$uri = trim($uri,'/');
		
		$routes = $Router->routes;
		$reverseRoutes = array_flip( $routes );
		
		unset( $routes['default_controller'], $routes['scaffolding_trigger'] );
		
		// Loop through all routes to check for back-references, then see if the user-supplied URI matches one 
		foreach ($routes as $key => $val)
		{
			// bailing if route contains ungrouped regex, otherwise this fails badly
			if( preg_match( '/[^\(][.+?{\:]/', $key ) )
				continue;
				
			// Do we have a back-reference?
			if (strpos($val, '$') !== FALSE AND strpos($key, '(') !== FALSE)
			{
				// Find all back-references in custom route and CI route 
				preg_match_all( '/\(.+?\)/', $key, $keyRefs );
				preg_match_all( '/\$.+?/', $val, $valRefs );
                
                $keyRefs = $keyRefs[0];
                
				// Create URI Regex, to test passed-in uri against a custom route's CI ( standard ) route
				$uriRegex = $val;
                
                // Extract positional parameters (backreferences), and order them such that
                // the keys of $goodValRefs dirrectly mirror the correct value in $keyRefs
                $goodValRefs = array();
                foreach ($valRefs[0] as $ref) {
                    $tempKey = substr($ref, 1);
                    if (is_numeric($tempKey)) {
                        --$tempKey;
                        $goodValRefs[$tempKey] = $ref;
                    }
                }
                
				// Replaces back-references in CI route with custom route's regex [ $1 replaced with (:num), for example ]
                foreach ($goodValRefs as $tempKey => $ref) {
                    if (isset($keyRefs[$tempKey])) {
                        $uriRegex = str_replace($ref, $keyRefs[$tempKey], $uriRegex);
                    }
                }
                
				// replace :any and :num with .+ and [0-9]+, respectively
				$uriRegex = str_replace(':any', '.+', str_replace(':num', '[0-9]+', $uriRegex));
                
				// regex creation is finished.  Test it against uri
				if (preg_match('#^'.$uriRegex.'$#', $uri)){
					// A match was found.  We can now build the custom URI
					
					// We need to create a custom route back-referenced regex, to plug user's uri params into the new routed uri.
					// First, find all custom route strings between capture groups
					$key = str_replace(':any', '.+', str_replace(':num', '[0-9]+', $key));

					$routeString = preg_split( '/\(.+?\)/', $key );
					
					// build regex using original CI route's back-references
					$replacement = '';
					$rsEnd = count( $routeString ) - 1;
					
					// merge route strings with original back-references, 1-for-1, like a zipper
					for( $i = 0; $i < $rsEnd; $i++ ){
						$replacement .= $routeString[$i] . $valRefs[0][$i];
					}
					$replacement .= $routeString[$rsEnd];
					
					/*
						 	At this point,our variables are defined as:
								$uriRegex:		regex to match against user-supplied URI
								$replacement:	custom route regex, replacing capture-groups with back-references
								
							All that's left to do is create the custom URI, and return the site_url
					*/
					$customURI = preg_replace( '#^'.$uriRegex.'$#', $replacement, $uri );
					
					return normal_site_url( $customURI );
				}
			}
			// If there is a literal match AND no back-references are setup, and we are done
			else if($val == $uri)
				return normal_site_url( $key );
		}
		
		return normal_site_url( $uri );
		
	}


	function normal_site_url($uri = '')
	{
		$CI =& get_instance();
		return $CI->config->site_url($uri);
	}
