<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Alias Class
 *
 * Description of class
 *
 * @category	Libraries
 * @author  	Collin Williams
 */
class Alias {
    
    var $aliases = array();
    var $table = 'alias';
    var $ci;
    
    public function __construct($params = array())
    {
        $this->ci =& get_instance();
        $this->set_aliases();
    }
    
    public function set_aliases()
    {
        $this->ci->load->database();
        $query = $this->ci->db->get($this->table);
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $alias)
            {
                $this->aliases[$alias->alias] = $alias->path;
            }
        }
    }
    
    public function build_routes()
    {
        $file_contents = '';
        if (count($this->aliases))
        {
            foreach($this->aliases as $route => $dest)
            {
                // Escape double quotes that aren't yet escaped
                // addcslashes might actually work here too... not sure
                $route = preg_replace('/(?<!\\\)\"/', '\"', $route);
                $dest = preg_replace('/(?<!\\\)\"/', '\"', $dest);
                $file_contents .= '$route["'. $route .'"] = "'. $dest .'";'."\n";
            }
        }
        $dbr = fopen(APPPATH .'config/db_routes'. EXT, 'w');
        fwrite($dbr, '<?php  if (!defined("BASEPATH")) exit("No direct script access allowed");');
        fwrite($dbr, "\n\n");
        fwrite($dbr, $file_contents);
        fclose($dbr);
    }
    
    public function create($alias, $path, $if_exists = 'UPDATE')
    {
        if (is_array($alias))
        {
            foreach ($alias as $a => $p)
            {
                if (is_string($a) and is_string($p))
                {
                    $this->create($a, $p);
                }
            }
        }
        else if (is_string($alias) and is_string($path))
        {
            $new = array(
                'alias' => $this->_clean_alias($alias),
                'path' => $this->_clean_path($path),
            );
            if (isset($this->aliases[$new['alias']]) && $if_exists != 'UPDATE')
            {
                return FALSE;
            }
            else if (isset($this->aliases[$new['alias']]))
            {
                $this->ci->db->where('alias', $new['alias']);
                if ($this->ci->db->update($this->table, $new))
                {
                    $this->aliases[$new['alias']] = $new['path'];
                    return TRUE;
                }
            }
            else {
                if ($this->ci->db->insert($this->table, $new))
                {
                    $this->aliases[$new['alias']] = $new['path'];
                    return TRUE;
                }
            }
        }
    }
    
    private function _clean_alias($alias)
    {
        return $this->ci->input->xss_clean($alias);
    }
    
    private function _clean_path($path)
    {
        return $this->ci->input->xss_clean($path);
    }
    
}
/* End of file Alias.php */
/* Location: ./application/libraries/Alias.php */