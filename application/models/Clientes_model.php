<?php
class Clientes_model extends CI_Model {
 
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
    /*
    public function get_settings()
    {
        
        
		$this->db->select('*');
		$this->db->from('settings');
		$query = $this->db->get();
		return $query->result_array(); 
    }*/
    public function get_cliente($id_cliente)
    {
        
        
        $this->db->select('*');
        $this->db->from('clientes');
        $this->db->where('id',$id_cliente);
        $query = $this->db->get();
        $aux= $query->result_array();         
        if(count($aux)>0)            
        return $aux[0];
        else
            return array();

    }
    public function insertar($data){
        $this->db->insert('clientes', $data); 
        return $this->db->insert_id();
    }    
 
}
?>