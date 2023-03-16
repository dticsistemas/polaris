<?php
class Usuarios_model extends CI_Model {
 
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
     
    public function listVendedores()
    {         
        
        $this->db->select('*');
        $this->db->from('personas');    
        $this->db->where('tipo','VENDEDOR');
        $query = $this->db->get();
        $query =$query->result_array(); 
        $result = array();
        foreach ($query as $usuario) {
            $result[trim($usuario['id'])]=$usuario['nombre'] .' '.$usuario['apellidos'] ;
        }
        return $result;
    }     
    
 
}
?>