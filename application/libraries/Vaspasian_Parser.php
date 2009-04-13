<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Vaspasian_Parser Class
 *
 * Extending the template parser from CodeIgniter.
 *
 * @license 	MIT Licence
 * @category	Libraries
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		11 Apr 2009
 */
class Vaspasian_Parser extends CI_Parser {

    public function Vaspasian_Parser() {}
    
    public function _parse_single($key, $val, $string) {
        $newval = $val;
        $find = "/".$this->l_delim."".$key.".*".$this->r_delim."/U";
        
        preg_match($find, $string, $matches);
        if(!empty($matches))
        {
            $temp = trim($matches[0], "{}");
            $res = explode(":", $temp);
            // var_dump($res);
            if(count($res) > 1)
            {
                switch($res[1])
                {
                    case "allcaps" :
                        $newval = strtoupper($val); 
                    break;
                    case "money" : 
                        $newval = number_format((int)$val, 2, ".", ","); 
                    break;
                    case "caps" : 
                        $newval = ucwords(strtolower($val)); 
                    break;
                    case "nocaps" : 
                        $newval = strtolower($val); 
                    break;
                    case "ucfirst" :
                        $newval = ucfirst($val);
                    break;
                    case "bool1" : 
                        $newval = ($val==1) ? "True" : "False"; 
                    break;
                    case "bool2" : 
                        $newval = ($val==1) ? "Yes" : "No"; 
                    break;
                    case "bool3" : 
                        $newval = ($val==1) ? "Active" : "Inactive"; 
                    break;
                    case "climit" : 
                        $int = (count($res)<3) ? 128 : $res[2]; 
                        $newval = character_limiter($val, $int); 
                    break;
                    case "htmlchars" : 
                        $newval = quotes_to_entities($val); 
                    break;
                    case "wlimit" : 
                        $int = (count($res)<3) ? 25 : $res[2]; 
                        $newval = word_limiter($val, $int); 
                    break;
                    case "wrap" :
                        $int = (count($res)<3) ? 76 : $res[2]; 
                        $newval = word_wrap($val, $int);
                    break;
                    case "hilite" :
                        $str = (count($res)<3) ? "" : $res[2];
                        $color =  (count($res)<4) ? "#990000" : $res[3];
                        $newval = highlight_phrase($val, $str, "<span style=\"color:{$color}\">", "</span>");
                    break;
                    case "safe_mailto" :
                        $alt_text = (count($res)<3) ? "" : $res[2];
                        $newval = safe_mailto($val, $alt_text);
                    break;
                    case "url_title" :
                        $sep = (count($res)<3) ? "dash" : $res[2];
                        $newval = url_title($val, $sep);
                    break;
                    case "remove_img" :
                        $newval = strip_image_tags($val);
                    break;
                    case "hash" :
                        $hash = (count($res)<3) ? "md5" : $res[2];
                        $newval = dohash($val, $hash);
                    break;
                    case "stripslashes" :
                        $newval = stripslashes($val);
                    break;
                    case "strip_tags" :
                        $allowed = (count($res)<3) ? "" : $res[2];
                        $newval = strip_tags($val, $allowed);
                    break;
                    /** other output string format options here **/
                }
                return str_replace($matches[0], $newval, $string);
            }
        }
        return parent::_parse_single($key, $val, $string);
    }
}
/* End of file Vaspasian_Parser.php */
/* Location: ./application/libraries/Vaspasian_Parser.php */