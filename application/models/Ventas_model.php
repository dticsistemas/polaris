<?php
class Ventas_model extends CI_Model {
 
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

    public function insertar_ventas($data)
    {                         
        $this->db->insert('ventas', $data);
        return $this->db->insert_id();
    } 
    public function insert_ventas_productos($data)
    {         
        
        $this->db->insert('venta_productos', $data);
        //------descontar del inventario-------
        //-----si es asi se debera tener en cuenta 
        //------la bandera de configuracion de inventario stock=true

    } 
    public function obtener_venta($id_venta)
    {
        $query = $this->db->get_where('ventas', array('id' => $id_venta));
        $aux = $query->result_array(); 
        if(count($aux)>0){
        $res = $aux[0];
        return $res;
        }else{ 
            return $aux; 
        }


    }
    public function obtener_detalle_venta($id_venta)
    {
        
        $this->db->select('*');
        $this->db->from('venta_productos');
        $this->db->join('productos', 'productos.id = ventaproductos.id_producto');
        $this->db->where('id_venta',$id_venta);
        $query = $this->db->get();         
        return $query->result_array();  
    }
}    
?>