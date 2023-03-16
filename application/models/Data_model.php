<?php
class Data_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
    }
       
    public function get_dispositivo($id_dispositivo)
    {
        $this->db->select('*');
        $this->db->from('dispositivos');
        $this->db->where('id_dispositivo',$id_dispositivo);
        $query = $this->db->get();
        $data = $query->result_array(); 
        if(count($data)>0)        
            return $data[0];
        else
            return null;
    }
    public function insertar_venta($data){
       $this->db->insert('ventas', $data); 
       return $this->db->insert_id();       
    }
    public function insertar_transferencia_apk($id_venta,$id_dispositivo,$id_venta_apk){
       $data=array(
        'id_venta'=>$id_venta,
        'id_dispositivo'=>$id_dispositivo,
        'id_venta_apk'=>$id_venta_apk
        );
       $this->db->insert('transferencias_apk', $data); 
    }
    public function insertar_ventaproductos($dataventaproducto){
        $this->db->insert('venta_productos', $dataventaproducto); 
    }
    public function insertar_cliente($data){
        $this->db->insert('clientes', $data); 
        return $this->db->insert_id();
    }
 
}
?>