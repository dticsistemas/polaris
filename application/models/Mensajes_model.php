<?php
class Mensajes_model extends CI_Model {
 
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

    public function get_mensajes()
    {
        $this->db->select('*');
        $this->db->from('mensajes');
        $query = $this->db->get();
        $data = $query->result_array();         
        return $data;
    } 
    public function get_mensajes_mixed()
    {
        $this->db->select('*');
        $this->db->from('mensajes');
        $query = $this->db->get();
        $data = $query->result_array();   
        shuffle($data);      
        return $data;
    }
    
 
}
?>