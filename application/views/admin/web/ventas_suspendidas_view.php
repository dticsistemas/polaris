
<div class="container">
<?php 
      $attributtes=' id="ventas_formvc" ';
      echo form_open('ventas/ventas_suspendidas',$attributtes);       
?> 


<input type="hidden" name="id_cliente" id="id_cliente" value=""/>
<input type="hidden" name="array_id_productos" id="array_id_productos" />
<input type="hidden" name="array_precio_productos" id="array_precio_productos" />
<input type="hidden" name="array_cantidad_productos" id="array_cantidad_productos" />
<input type="hidden" name="butt_vc_procesar"  value="procesar" id="butt_vc_procesar" />
<div class="panel panel-primary">
<div class="panel-heading">
    <h2 class="panel-title text-center">Venta Suspendida de Productos</h2>
</div>
<div class="panel-body">
<div>
    <p>Introduzca los datos </p>
</div> 
<div class="row">
    <div class="col-sm-3">  
        <div class="form-group">
            <label for="username">Nombre cliente:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </div>                                      
              <input class="form-control" id="clientename" type="text" placeholder="Nombre de Usuario" name="clientename" value="<?php echo set_value('clientename'); ?>">                                      
            </div>
        </div>
    </div>
    <div class='col-sm-2'>
            <div class="form-group">
               <label for="password">Procedencia</label>  
               <div class='input-group date' >
                  <?php
                  $combox_procedencia=array('bolivia'=>'Boliviano',
                                            'interior'=>'Boliviano interior',
                                            'brasil'=>'Brasileño',
                                            'usa'=>'estados unidos',
                                            'colombia'=>'colombiano',
                                            'mexico'=>'mexicano');
                    echo form_dropdown('select_procedencia', $combox_procedencia,'boliviano','class="form-control"' );
                  // print_r($combox_vendedores);
                   ?>
                </div>
            </div>
        </div>
    <div class="col-sm-3">
        <div class="form-group">
             <label for="password">Sexo:</label>
             <div class="input-group radio-inline">
<label class="radio-inline"><input type="radio" value="H" name="optsexocliente">Hombre</label>
<label class="radio-inline"><input type="radio" checked  value="M" name="optsexocliente">Mujer</label>
             </div>
        </div>  
    </div>
    <div class="col-sm-2">
        <div class="form-group">
             <label for="password">Ci o Nit:</label>
             <div class="input-group">
               <div class="input-group-addon">
                  <span class="glyphicon glyphicon-credit-card"></span>
               </div>          
               <input class="form-control" id="cionit" placeholder="Password" name="cionit" type="text" value="">
             </div>
        </div>  
    </div>  
    
    <div class="col-sm-2">
        <div class="form-group">
             <label for="password">Mas Datos</label>                       
             <button data-toggle="modal" data-target="#myModal" class="btn btn-primary" type="button" id="butt_datos_cliente" >
                 <span class="glyphicon glyphicon-edit"> Cliente
             </button>
        </div>  
    </div>                                                                           
</div> <!---End row-->
 <div class="row">
        <div class='col-sm-5'>
            <div class="form-group">
               <label for="password">Fecha Venta</label>  
                <div class='input-group date' >
                    <input type='text' class="form-control" name='fecha' id='fecha' readonly/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class='col-sm-3'>
            <div class="form-group">
               <label for="password">Vendedor</label>  
               <div class='input-group date' >
                  <?php
                  //$combox_vendedores=array('0'=>'juan perez perez','1'=>'klon admin');
                    echo form_dropdown('select_vendedor', $combox_vendedores,'0','class="form-control"' );
                  // print_r($combox_vendedores);
                   ?>
                </div>
            </div>
        </div>
        <div class='col-sm-4'>
            <div class="form-group">
               <label for="password">Sucursal</label>  
               <div class='input-group date' >
                  <?php
                 // $combox_sucursales=array('0'=>'juan perez perez','1'=>'klon admin');
                    echo form_dropdown('select_sucursal', $combox_sucursales,'0','class="form-control" id="select_sucursal"  onchange="cargar_productos()" ' );
                   ?>
                </div>
            </div>
        </div>
</div><!---End row-->
<div class="row">
      <div class="col-sm-9">
           <div class="row">
           <div class="col-sm-4 form-group">
              <label for="password">Filtrar pos categorias:</label>
                   <?php 
              $combox_categorias['0']='Todos';          
              foreach ($categorias_productos as $fila) {           
                $combox_categorias[$fila['id']]=$fila['nombre'];
              }
             // print_r($combox_categorias);
              echo form_dropdown('select_categoria', $combox_categorias,'0','class="form-control" onchange="cargar_productos() " id="select_categoria"' );
                   ?>
            </div>
            <div class="col-sm-8 form-group">
              <label for="password">Producto:</label>
                   <?php          
              echo form_dropdown('select_producto', $combox_productos,'0','class="form-control" id="select_producto" onchange="obtenerInfoProducto(this.value)" ');
                   ?>
            </div>
            
          </div> <!--End subrow-->        
          <div class="row">       
            <div class="col-sm-2  form-group">
                
                  <label >Precio(Unidad)<label>
                   <label id="precio">0</label>
                 
            </div>
            <div class="col-sm-2 text-right">
              <label >Cantidad:</label>
             </div>
            <div class="col-sm-2">
             <input class="form-control" type="number" id="cantidad" name="cantidad" value="1" min="1" max="99" required="required" maxlength="5" onchange="calculo_monto(this.value)" >                                                 
            </div> 
            <div class="col-sm-1">
              <label >=</label>
             </div>   
             <div class="col-sm-2">
             <input class="form-control"  id="precio_convenido" name="precio_convenido" required="required" maxlength="15">                                                 
            </div>         
            <div class="col-sm-3">
              <button class="btn btn-default" type="button" id="butt_agregar" onclick="agregarproducto()">Agregar Producto</button>                                                                      
           
            </div>
          </div><!--End subrow--> 
      </div>
      <div class="col-sm-3 form-group">          
          <img name="img-prod-thumb" id="img-prod-thumb" class="img-responsive thumbnail" src="<?php echo base_url();?>/assets/img/catalogo/thumbs/no_image.png"/>                   
      </div>
</div> <!--End row-->


    <!-----------Tabla de Productos---------------------->

    
          <div class="box">
          <div class="box-header">
              <h3 class="box-title">Productos a llevar</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
          <div class="row table-responsive">                      
          <table id="tabla" class="table table-hover">
          <thead>
            <tr>
              <th><span class="glyphicon glyphicon-th-list"></span></th>                
              <th>Cantidad</th>
              <th>Producto</th>        
              <th>Precio</th>                         
              <th>Precio Convenido</th>
              <th>Accion</th>    
            </tr>
          </thead>
          <tbody>               
          </tbody> 
          </table>                                                  
          </div>  

                 
                 <div class="form-group row">
                      <label for="monto_ventas" class="col-sm-8 control-label text-right">Total de Ventas</label>
                      <div class="col-sm-4">
                            <input type="text" class="form-control" readonly="" id="monto_ventas" name="monto_ventas" value="0"/>
                      </div>
                  </div>  
                  
                    <!-- /.montos globales de la venta-->
            </div><!-- /.box-body -->
            </div><!-- /.box -->
<!-----------------End Tabla Productos--------------------> 
<div class="row">
  <div class="col-sm-2">
   <label for="password">Descripcion:</label>

  </div>
  <div class="col-sm-8">
                    
     <input class="form-control" id="descripcion" placeholder="descripcion" name="descripcion" type="text">

   </div>
 
</div><!--End row-->

</div> <!--End panel body--> 

    <div class="panel-footer text-center">
        <button class="btn btn-default" type="button" onclick="validacion_formvc()" >Guardar Venta de productos</button>                                                         
        <a href="<?php echo base_url()."admin/ventas_contado";?>" class="btn btn-default" role="button">Cancelar</a>
    </div> 


<!--Mostrando Modal Clientes-->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Datos del Cliente</h4>
      </div>
      <div class="modal-body">
        <p>Ingrese los datos del cliente</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="llenarDatosCliente">Guardar</button>      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<?php echo form_close(); ?>
</div>  

<!--Mostrando Modal Productos Edit-->
<!-- Modal -->
<div id="myModalEdit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modificar Precio Convenido</h4>
      </div>
      <input type="hidden" id="edit_fila" value="0"/>
      <div class="modal-body">
        <p>Establecer precio para <label id="edit_cantidad"></label> producto:</p><label id="edit_producto"></label>
        <div>
              <input type="text" class="form-control" id="edit_precio_convenido" value="0"/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cambiarDatosTabla()">Guardar</button>      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<script type="text/javascript">
function llenarDatosCliente(){
  alert('guardar datos');
  $('#myModal').close();

}
function editarProducto (fila) {
  tabla = document.getElementById('tabla');
  precio_convenido  =tabla.rows[fila].cells[4].innerHTML; 
  cantidad          =tabla.rows[fila].cells[1].innerHTML; 
  producto          =tabla.rows[fila].cells[2].innerHTML;  
  document.getElementById('edit_precio_convenido').value=precio_convenido;
  document.getElementById('edit_fila').value=fila;
  document.getElementById('edit_producto').innerHTML=producto;
  document.getElementById('edit_cantidad').innerHTML=cantidad;

}
function cambiarDatosTabla(){
  tabla = document.getElementById('tabla');
  precio_convenido  = document.getElementById('edit_precio_convenido').value;
  tabla.rows[document.getElementById('edit_fila').value].cells[4].innerHTML=precio_convenido; 
  
}
function cargar_productos() {
 
  var id_sucursal=document.getElementById("select_sucursal").value;   
  var id_categoria=document.getElementById("select_categoria").value;  
  //select_producto.attr("value")="1";  
  $.post( "<?php echo base_url('productos/llenar_productos_by_categorias_sucursal');?>", 
    {id_categoria:id_categoria , id_sucursal:id_sucursal},
    function( data ) {
      //---respuesta
    $("#select_producto").html(data); 
    obtenerInfoProducto(document.getElementById("select_producto").value);   
  });
}

function obtenerInfoProducto(valor){ 

    if(valor!=''){
    $.get( "<?php echo base_url('productos/obtener_info_producto');?>", 
      {id_producto:valor},
      function( data ) {       
       //---respuesta              
        var res=JSON.parse(data);       
        var precio=res['precio'];
        var path_image="<?php echo base_url()?>assets/img/catalogo/thumbs/"+res['imagen'];        
        document.getElementById('img-prod-thumb').src=path_image; 
        document.getElementById('precio').innerHTML=precio; 
        document.getElementById('precio_convenido').value=precio; 
        
    });
    }else{
      //alert('Es vacio');
       document.getElementById('img-prod-thumb').src="<?php echo base_url()?>assets/img/catalogo/thumbs/8c327-no-disponible.png"; 
        document.getElementById('precio').innerHTML="0"; 
        document.getElementById('precio_convenido').value="0"; 
    }

};  

function calculo_monto(cantidad){
  var precio=document.getElementById('precio').innerHTML; 
  precio=precio*cantidad;
  document.getElementById('precio_convenido').value=precio; 
}
obtenerInfoProducto(document.getElementById("select_producto").value);

function agregarproducto(){
    var options=document.getElementById('select_producto').length; 
   // alert(options);         
    if(options>0){      
      agregar();
      //--calculamos el valor final---
      calcularTotal();

    }else{
        document.getElementById('select_categoria').focus();
        alert('Seleccione una categoria con productos');
    }

}


//---------------------------------------------------------
//---------------------------------------------------
var nro_productos=0; 
var id_elementos=0;
function agregar() {

  
   nro_productos++; 
   id_elementos++; 
   var select_productos=document.getElementById('select_producto');
   var tr, td, tabla; 
   var fecha_entrega = '';//document.getElementById('fecha_entrega').value; 
   var entregado     = '';//document.getElementById('entregado').value;   
   var posicion = 0;//obtenerPosicionProducto(valor_id);
   var precio=document.getElementById('precio').innerHTML;
   var precio_convenido=document.getElementById('precio_convenido').value;
   var cantidad=document.getElementById('cantidad').value;
   var id_producto=select_producto.value;

   tabla = document.getElementById('tabla');
   tr = tabla.insertRow(tabla.rows.length);
   tr.setAttribute("class", "info");
   td = tr.insertCell(tr.cells.length);
   td.innerHTML = '<input type="hidden" value="'+id_producto.toString()+'"/><input type="hidden" value="'+id_elementos.toString()+'"/>';//nro_productos.toString(); //---columna 1  
   td = tr.insertCell(tr.cells.length);
   td.innerHTML = cantidad; //---columna 2
   td = tr.insertCell(tr.cells.length);
   td.innerHTML = "(ID="+id_producto+") "+select_productos[select_producto.selectedIndex].text;  //---columna 3
   td = tr.insertCell(tr.cells.length);
   td.innerHTML = ""+precio.toString();  //---columna 4
   td = tr.insertCell(tr.cells.length);
   td.innerHTML = precio_convenido.toString();  //---columna 5
   td = tr.insertCell(tr.cells.length);                                    

   td.innerHTML = '<button type="button" data-toggle="modal" onclick="editarProducto('+id_elementos+')" data-target="#myModalEdit" class="btn btn-primary btn-xs"> <span class="glyphicon glyphicon-edit"></span></button>'+
   ' <button type="button" class="btn btn-danger btn-xs" onclick="borrar('+id_elementos+')"> <span class="glyphicon glyphicon-remove"></span></button>';
  // contLin++;


}

/*
function agregarProducto(){
    /*
    var posicion=document.getElementById('producto_id').options.selectedIndex; //posicion
    
    if(posicion>0){
      var valor_id=document.getElementById('producto_id').options[posicion].value; //valor
      var valor=document.getElementById('producto_id').options[posicion].text;  //valor texto
       if (document.getElementById('productos_hidden').value!=''){
          //---le copncateno ",""
          document.getElementById('productos_hidden').value=document.getElementById('productos_hidden').value+',';

       }
      document.getElementById('productos_hidden').value=document.getElementById('productos_hidden').value+valor_id.toString();

      agregar(valor,valor_id);
      //--calculamos el valor final---
      calcularTotal();

    }else{
        document.getElementById('producto_id').focus();
        alert('Seleccione un Producto');
    }


alert('alguien llama');

}*/
function borrar(fila) {
  
   nro_productos--; 
 

   /*
   var id_productos=document.getElementById('productos_hidden').value=document.getElementById('productos_hidden').value;
   var array_productos=id_productos.split(',');
   */
   tabla = document.getElementById('tabla');
   //ultima = document.all.tabla.rows.length - 1;
   //id_productos='';
   posicion=0;


   alert('se borrar la fila numero = '+fila);
   //var nuevo_id_fila=0;
   for(var q=0;q<tabla.rows.length;++q)
   {
    
    if(q>0){
       //nuevo_id_fila++; 
     
       // var id_dila=parseInt(tabla.rows[q].cells[0].innerHTML);
       var aux=tabla.rows[q].cells[0].childNodes[1].value;
       if(aux==fila){
        posicion=q;
        break;
       }
       /*
       var id_fila=parseInt(aux);
       //alert(id_fila);

        if(fila==id_fila){
           // alert(id_fila);
            nuevo_id_fila--;

        }else{
          //-----lo concateno normal
            //-----eliminado id-rpoductos del campo
            //alert(array_productos[q-contLin]);
           if (id_productos!='')
              id_productos=id_productos+',';
           id_productos=id_productos+array_productos[q-contLin];

        }
        //---le pongo un valor a la fila 
        tabla.rows[q].cells[0].innerHTML=''+nuevo_id_fila.toString();  
        tabla.rows[q].cells[7].innerHTML= "<input class='btn btn-danger' name='button'  type=button onclick='borrarUltima("+nuevo_id_fila.toString()+")' value='Quitar' >";
        tabla.rows[q].cells[4].childNodes[0].name='monto_'+nuevo_id_fila.toString(); 
        tabla.rows[q].cells[5].childNodes[0].name='fecha_'+nuevo_id_fila.toString(); 
        tabla.rows[q].cells[6].childNodes[0].name='entrega_'+nuevo_id_fila.toString(); 
        */


    }
        
   } 
   
  //---ahora eliminamos la fila de la tabla--
  alert(posicion);
  tabla.deleteRow(posicion);
 // document.getElementById('productos_hidden').value=  id_productos;
 
  //---claculamos el nuevo monto---
  calcularTotal();

}

function calcularTotal(){
  

   var total_ventas = 0;
  // var total_anterior = parseFloat(document.getElementById('monto_anterior').value); 
   tabla = document.getElementById('tabla');
   
  

   for(var q=0;q<tabla.rows.length;++q)
   {   
      if(q>0){            
         //alert(tabla.rows[q].cells[4].innerHTML);        
         var aux=tabla.rows[q].cells[4].innerHTML;
         //var id_fila=parseInt(aux);
         total_ventas = total_ventas+parseFloat(aux);               
      }
        
   } 
  //---mostrando los nuevo valores---

  //document.getElementById('monto_ventas').value = total_ventas.toString();
  //monto_total=total_ventas;//+total_anterior;
 
  document.getElementById('monto_ventas').value = total_ventas.toString();
}

function obtenerPosicionProducto(id){
  var posicion = 0;
  for (var i = 0; i <  array_productos_codigo.length; i++) {
    var valor = array_productos_codigo [i];
    if (valor==id){
      posicion = i;
      break;
    }       
  }   
 return posicion;
}

//--------------------------------------------------------
//--------------FORM-----------------
function validacion_formvc(){
  
  
  //alert(nro_productos);  
   var concat='';

   tabla = document.getElementById('tabla');   
   for(var q=0;q<tabla.rows.length;++q)
   {    

      if(q>0){  
       // alert(document.getElementById('array_cantidad_productos').value);
      //  alert(document.getElementById('array_cantidad_productos'));
     // document.getElementById('cantidad_productos').value=nro_productos.toString(); 
      //document.getElementById('id_cliente').value="prueba";         
      id_producto       =tabla.rows[q].cells[0].childNodes[0].value;        
      precio_convenido  =tabla.rows[q].cells[4].innerHTML; 
      cont_productos=tabla.rows[q].cells[1].innerHTML; 
     // alert(precio_convenido);
      document.getElementById('array_id_productos').value=
      document.getElementById('array_id_productos').value+concat+id_producto;       
      document.getElementById('array_precio_productos').value=
      document.getElementById('array_precio_productos').value+concat+precio_convenido;
      document.getElementById('array_cantidad_productos').value=
      document.getElementById('array_cantidad_productos').value+concat+cont_productos;

      concat=',';

  
      }
    
     //alert('alert');
     //document.getElementById('ventas_formvc').submit();
   }
   //alert(document.getElementById('ventas_formvc'));

  // document.getElementById('ventas_formvc').submit();
 // alert(document.getElementById('array_cantidad_productos').value)
  if(nro_productos>0){
  $('#ventas_formvc').submit();
  }else{ 
    alert("Ingrese algun producto");
  }
}

</script>



<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
      <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
 
<script>
        $( document ).ready(function() {            
            $('#fecha').datetimepicker({
                defaultDate: "<?php echo(strftime( "%Y/%m/%d %H:%M", time() ));?>",
                format:"YYYY-MM-DD h:mm",
                sideBySide:true,
                ignoreReadonly:true,
                showTodayButton:true,
                locale: 'es'
            });

        });
    </script>

 