<?php
class Acciones_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
    }

    /**
    * Get productos en oferta by his is
    * @param int $product_id 
    * @return array
    */

    public function get_acciones()
    {
        $this->db->select('*');
        $this->db->from('acciones');
        $query = $this->db->get();
        $data = $query->result_array();         
        return $data;
    }   
    public function get_acciones_modulo($modulo)
    {
        $this->db->select('*');
        $this->db->from('acciones');
        $this->db->where('modulo',$modulo);
        $query = $this->db->get();
        $data = $query->result_array();         
        return $data;
    }   
 
}
?>