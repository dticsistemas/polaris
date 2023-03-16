<?php
class Settings_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_settings()
    {
        
        
		$this->db->select('*');
		$this->db->from('settings');
		$query = $this->db->get();
		return $query->result_array(); 
    }
    public function get_setting()
    {
        
        
        $this->db->select('*');
        $this->db->from('settings');
        $query = $this->db->get();
        $aux= $query->result_array(); 
        if(count($aux)>0)
        return $aux[0];
        else
            return array();

    }
    public function insertar($data){
        $this->db->update('settings', $data); 
    }    
 
}
?>