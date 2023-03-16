<?php
class Inventarios_model extends CI_Model {
 
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
  
    public function get_cantidad_productos($id_sucursal,$id_producto)
    {
        $cantidad = 0;
        $this->db->select('*');
        $this->db->from('inventarios');
        $this->db->where('id_sucursal',$id_sucursal);
        $this->db->where('id_producto',$id_producto);
        $query = $this->db->get();
        $data = $query->result_array();    
        if(count($data)>0){
            $aux = $data[0];
            $cantidad=$aux['cantidad'];
        }
        return $cantidad;
    }  
    public function actualizar_cantidad_productos($id_sucursal,$id_producto,$cantidad)
    {
         $this->db->set('cantidad' , 'cantidad +('.$cantidad.')', FALSE);
         $this->db->where('id_sucursal',$id_sucursal);
         $this->db->where('id_producto',$id_producto);
         $this->db->update( 'inventarios' ); 
    } 
    public function habilitarProductoInventario($id_producto,$id_sucursal){

       
        $this->db->select('*');
        $this->db->from('inventarios');
        $this->db->where('id_sucursal',$id_sucursal);
        $this->db->where('id_producto',$id_producto);
        $query = $this->db->get();
        $data = $query->result_array();
        if(count($data)==0){//----si no existe
             $data = array(
             'id_producto' => $id_producto ,
             'id_sucursal' => $id_sucursal ,
             'cantidad' => '0'
             );
             $this->db->insert('inventarios',$data);
        }

    }
     public function habilitarProductosInventarioAllSucursales(){
       
        $this->db->select('*');
        $this->db->from('sucursales');
        $this->db->order_by('tipo',"asc");       
        $query = $this->db->get();
        $sucursales=$query->result_array(); 
        foreach ($sucursales as $value) {
            $id_sucursal=$value['id'];
            $arr_productos=$this->get_productos_faltantes_sucursal($id_sucursal);
            foreach ($arr_productos as $producto) {
                //----habilitando los productos en la sucursal
                $data = array(
                 'id_producto' => $producto['id'],
                 'id_sucursal' => $id_sucursal ,
                 'cantidad' => '0',
                 'estado'=>'Habilitado'
                 );
                 $this->db->insert('inventarios',$data);
            }
        }

    }
    public function get_productos_faltantes_sucursal($id_sucursal){

        $this->db->select('id,nombre');
        $this->db->from('productos');        
        $this->db->where('`id` not in', '(select `id_producto` from `inventarios` where `id_sucursal` = '.$id_sucursal.')', false);        
        $query = $this->db->get();
        $data = $query->result_array();            
        return $data;

    }
 
}
?>