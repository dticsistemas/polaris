<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        //$this->load->model('mensajes_model');
        //$this->load->driver('session');
    }
    function validate($username, $password)
    {
        $this->db->where('username', $username);
      //  $this->db->where('password', $password);        
        $this->db->from('usuarios');        
        $query = $this->db->get();       
        
        if($query->num_rows() > 0)
        {
            $array = $query->result_array(); 
            $res = $array[0]; 
           // $this->session->sess_destroy();
           // $this->session->sess_create();
            $usuario = array(
                'id_usuario' => $res['id'],
                'username' => $res['username'],
                'estado' => $res['estado'],
                'logged_in' => true,
                'id_grupo' => $res['id_grupo'],
                'id_persona' => $res['id_persona'],
                //'token_transaccion' => 1,                
                'id_sucursal' => $res['id_sucursal']
            );
            $this->session->set_userdata($usuario);             
            return $usuario;       
        }         
        return null;     
    }
    public function obtener_personal_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('personals');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $res = $query->result_array(); 
        if(count($res)>0)
        return $res[0];
        else
            return null;
    } 
    public function get_token_transaccion(){

        $token_transaccion = $this->session->userdata('token_transaccion'); 
        $token_transaccion++; 
        $this->session->set_userdata('token_transaccion',$token_transaccion);             
        return $token_transaccion;           
    }
    public function validarSession()
    {
        $data = array(); 
        if($this->session->userdata('logged_in'))
        {  
            $res = $this->obtener_personal_by_id($this->session->userdata('id_persona')); 
           
            $data['username']   = $this->session->userdata('username');
            $data['id_persona'] = $this->session->userdata('id_persona');                       
            $data['id_usuario'] = $this->session->userdata('id_usuario'); 
            $data['id_grupo'] = $this->session->userdata('id_grupo');
            $data['token_transaccion'] = $this->session->userdata('token_transaccion');             
            $data['nombre']     = $res['nombre'];
            $data['apellido']   = $res['apellido'];  
            $data['path']   = 'welcome';  
            $data['ruta']   = 'welcome'; 
            $data['count_mensajes']   = $this->mensajes_model->count_mensajes($data['id_grupo']);  
            return $data;
  
        }else{
            redirect('login');             
        } 

        return null;

    }
    public function obtenerMenuPrivilegios($id_grupo)
    {                       
            //------verificando los privilegio del usuario-------            
            $res = $this->obtenerPrivilegios($id_grupo);
            
            $menu = array();            
            if(count($res)>0){
                $c=0;
                foreach ($res as $fila) {

                    $id = $fila['id_grupo'];
                    $nombre = $fila['nombre'];
                    $accion = $fila['accion'];
                    $enlace = $fila['enlace'];
                    $modulo = $fila['modulo'];
                    $active = $fila['active'];

                    $menu[$modulo]['menu'] = $modulo;
                    $menu[$modulo]['submenu'][] = array($accion,$enlace,$active);
                    
                }
                
            }
            
            return $menu;
    }

    function obtenerPrivilegios($id_grupo)
    {
        $this->db->select('grupos.id_grupo as id_grupo');
        $this->db->select('grupos.nombre as nombre');
        $this->db->select('acciones.nombre as accion');
        $this->db->select('acciones.modulo as modulo');
        $this->db->select('acciones.active as active');
        $this->db->select('enlace');
        $this->db->from('grupos');      
        $this->db->join('privilegios', 'grupos.id_grupo = privilegios.id_grupo');
        $this->db->join('acciones', 'privilegios.id_accion = acciones.id_accion');
        $this->db->where('grupos.id_grupo', $id_grupo);        
        $query = $this->db->get();
        return $query->result_array();     
    }
    /* Metodo para desloguear al usuario cuando cierra sesion y la destruye */

    public function logout() {       
         $this->session->unset_userdata('logged_in');
         $this->session->sess_destroy();
    }

}
?>
