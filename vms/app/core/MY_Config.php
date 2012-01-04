<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Config extends CI_Config {
        
        public function database()
        {
                if (function_exists('get_instance'))
                {
                        $CI =& get_instance();
                        $query = $CI->db->get('config');
                        
                        foreach ($query->result() as $item)
                        {
                                $this->set_item($item->name, $item->value);
                        }
                }
        }
}

/* End of file MY_Config.php */
/* Location: ./application/core/MY_Config.php */
