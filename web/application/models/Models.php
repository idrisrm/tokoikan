<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Models extends CI_Model 
{
    public function update($data = array(), $column, $tb, $id)
    {
        $this->load->database();
        $this->db->where($column, $id);
        return $this->db->update($tb, $data);
    }          
    
    // public function get($tb, $id)
    // {
    //     $this->load->database();
    //     $this->db->where($id);
    //     return $this->db->get($tb);
    // }   
                        
}


/* End of file Models_model.php and path /application/models/Models_model.php */

