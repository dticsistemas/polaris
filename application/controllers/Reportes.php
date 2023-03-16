<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends CI_Controller {

	
    function __construct()
    {
        parent::__construct();   
        $this->load->library('grocery_CRUD');
        $this->load->model('acciones_model');
    }
    public function _example_output($output = null,$enlace = null)
    {
          if(!($this->session->has_userdata('logged_in'))){
            redirect('login');
          }else{
            $output['usuario'] = $this->session->userdata();        
            $this->load->view('admin/web/header_view.php',$output);             
            if($enlace==null)
                $this->load->view('admin/admin_view.php',$output);
            else
                $this->load->view($enlace,$output);
          }
    }
    public function index()
    {
        $output='';
        $js_files=array();
        $css_files=array();
        $data['output']=$output;
        $data['js_files']=$js_files;
        $data['css_files']=$css_files;
        $data['nav']='inicio';
        $this->_example_output($data);
    }
    public function ventas(){
        $crud = new grocery_CRUD();     
        $crud->set_table('ventas');
        $crud->set_relation('id_vendedor','personas','{nombre} {apellidos}');
        $crud->set_relation('id_sucursal','sucursales','nombre');
        $crud->set_relation('id_cliente','clientes','nombres');
        $crud->set_relation('id_usuario','usuarios','username');

        $crud->display_as('id_vendedor','Vendedor');
        $crud->display_as('id_sucursal','Sucursal');
        $crud->display_as('id_cliente','Cliente');
        $crud->display_as('id_usuario','Usuario');

        $output = $crud->render(); 
        $output = json_decode(json_encode($output), True);        
        $output['nav']='report';
         if(!($this->session->has_userdata('logged_in'))){
            redirect('login');
          }else{
            $output['usuario'] = $this->session->userdata();        
            $this->load->view('admin/web/header_view.php',$output);                        
            $this->load->view('admin/reportes.php',$output);

          }

    }     


}
