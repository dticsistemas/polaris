<?php
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';


class Data extends REST_Controller
{
 
  function actualizar_get()
  {
     $this->load->model('data_model');
     $id_dispositivo=$this->get('id');

     if($id_dispositivo==null){
        $res['returned'] = 'Acceso No Autorizado';
        $this->response($res);
     }   
     else {  
     //----Si ha enviado el id del dispositivo
     $dispositivo=$this->data_model->get_dispositivo($id_dispositivo);
     //$res['res']=$dispositivo;

     if($dispositivo!=null){ /// si esta registrado el dispositivo
     if($dispositivo['estado']=='Habilitado'){ /// si esta habilitado el dispositivo  
      $res['returned'] = 'true';
       // Display all categorias
    // $this->db->select('id,nombre,descripcion,tipo,id_categoria');
     $this->db->from('categorias');                        
     $query = $this->db->get();      
     $res['categorias']= $query->result_array();
    
      // Display all categoriasproductos
     //$this->db->select('id_producto,id_categoria');
     $this->db->from('categoria_productos');                        
     $query = $this->db->get();      
     $res['categoria_productos']= $query->result_array();
    
     // Display all productos
     //$this->db->select('id,codigo,nombre,titulo,subtitulo,especificaciones,descripcion,servicios,activo');
     $this->db->from('productos');       
     //$this->db->where('activo','Habilitado')
     $this->db->order_by('id', 'Asc');               
     $query = $this->db->get();           
     $res['productos']= $query->result_array();
    
    // Display all sucursales
     //$this->db->select('id,nombre,direccion,telefono,tipo,location');
     $this->db->from('sucursales');       
     $this->db->order_by('tipo', 'Asc');               
     $query = $this->db->get();      
     $res['sucursales']= $query->result_array();
     // Display all imagenes
    // $this->db->select('id,imagen,id_producto,orden');
     $this->db->from('imagenes');                      
     $query = $this->db->get();      
     $res['imagenes']= $query->result_array();
     
     //---registrando la lectura
      $logs_update = array(
      "id_usuario" => $dispositivo['id_usuario'],
      "accion" => 'actualizar APKPolaris: '.$dispositivo['id_dispositivo']
      );                             
    $this->db->insert('bitacora',$logs_update);      

     //----enviando la respuesta      
     $this->response($res);
    }//si no esta registrado
    else{
        $res['returned'] = 'Acceso No Autorizado, No habilitado';
        $this->response($res);
    }
    }else{
        $res['returned'] = 'Acceso No Autorizado, No registrado';
        $this->response($res);
    }
    }
  }

     //crear una nueva venta realizada por el usuario APK
    //dvuelve el id de la venta_transferida
    public function insertar_post()
    {
     $this->load->model('data_model');   
     $id_dispositivo=$this->post("id_dispositivo");         
     
     $dispositivo=$this->data_model->get_dispositivo($id_dispositivo);
     if($dispositivo!=null){ /// si esta registrado el dispositivo


     if($dispositivo['estado']=='Habilitado'){ /// si esta habilitado el dispositivo        

        $id_venta_apk=$this->post("id");
        $id_dispositivo=$dispositivo['id'];        
        $id_usuario=$dispositivo['id_usuario'];//se asum que es el dueño del dispositivo
        $fecha=$this->post("fecha");
        $hora=$this->post("hora");
        //$id_cliente=$this->post("id_cliente");//se tomara por el otro lado
        $nota=$this->post("nota");
        $total=$this->post("total");
        $estado=$this->post("estado");
        $estado=$this->post("transferida");        
        $id_sucursal=1000;// valido para sucursal movil $this->post("id_sucursal");
        $tipo=$this->post("tipo");
       // $id_vendedor=$this->post("id_vendedor"); 
       //---antes se debe registrar al cliente caso de ser nuevo
       //---por defecto no verificara excepto el vacio      
        $cliente = $this->post("cliente");
        $id_cliente=$cliente['id'];                
        if($id_cliente!="0"){
            $data_cliente = array(
                //'id'=>$cliente['id'], es autoincrement
                'nombres'=>$cliente['nombres'],
                'sexo'=>$cliente['sexo'],
                'ci'=>$cliente['ci'],
                'nit'=>$cliente['nit'],
                'procedencia'=>$cliente['procedencia'],
                'direccion'=>$cliente['direccion'],
                'telefono'=>$cliente['telefono'],
                'fecha_nacimiento'=>$cliente['fecha_nacimiento']
                );
        //---se debe actualizar el id en la BD central respectiva
        $id_cliente=$this->data_model->insertar_cliente($data_cliente);           
        }        
        //---ahora si registrando la venta   con el cliente ya ingresado si era difrente de NN id=0      
        $data_ventas = array(
               'id_usuario' => $id_usuario,
               'fecha' =>      $fecha,
               'id_cliente' => $id_cliente,
               'nota' =>       $nota,
               'total' =>      $total,
               'estado' => 'A',
               'transferida' =>$id_venta_apk,
               'id_vendedor'=>$id_usuario,//se asume que es el mismo
               'id_sucursal'=>$id_sucursal,
               'tipo'=>$tipo //por el momento solo sera al contado
            );
       
        $id_venta = $this->data_model->insertar_venta($data_ventas);
        ////////////////////////////////////////////////////      
         $venta_productos=$this->post("venta_productos");          
        foreach ($venta_productos as $fila ) {
            //--muy bueno eso de enviar arrays
            
            $id_producto = $fila['id_producto'];
            $cantidad= $fila['cantidad'];
            $precio= $fila['precio'];
            $orden=$fila['orden'];
            $dataventa_producto = array(
                'id_venta' => $id_venta, 
                'id_producto' => $id_producto, 
                'orden' =>$orden,
                'cantidad' => $cantidad, 
                'precio' => $precio 
            );
             $this->data_model->insertar_ventaproductos($dataventa_producto);
             //  $logs_update = array("id_usuario" =>0,"accion" => 'venta-producto registrada' );$this->db->insert('bitacora',$logs_update);
        

        }        
        //---si todo esta bien----
        //registro transferenia para debugear mejor
        $this->data_model->insertar_transferencia_apk($id_venta,$id_dispositivo,$id_venta_apk);
        //---registrando la bitacora
        $logs_update = array(
          "id_usuario" => $dispositivo['id_usuario'],
          "accion" => 'transfiriendo ventas'.$id_dispositivo
        );                             
        $this->db->insert('bitacora',$logs_update); 
        //-------------------
         $res['returned']='true';
         $res['id_venta']=$id_venta;
        $this->response($res);                   
     }else{
        $res['returned'] = 'Acceso No Autorizado, No habilitado';
        $this->response($res);
    }
    }else{
        $res['returned'] = 'Acceso No Autorizado, No registrado';
        $this->response($res);

     }    

    }
    
}