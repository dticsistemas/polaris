<div class="container starter-container">
		<div class="contacto-izq">
			<h2>Formulario de contacto</h2>
			<!--<h1>Contáctenos</h1>-->
			<p>Para comunicarse con nosotros solo complete el siguiente formulario con sus datos
			personales y nuestros ejecutivos se contactarán con usted a la brevedad.</p>
 			<?php 
 			     echo validation_errors();
 			     echo $resultado;

 			?>
            <?php
                $atributos = array('class' => 'form-contacto', 'id' => 'formulario_contacto');				
                echo form_open('contacto',$atributos);
            ?>			
				<label><span style="color:#FF0000;">(*)</span> Nombre y Apellido:</label>
				<input name="nombre" id="nombre" type="text"><br>
				
				<label>Empresa:</label>
				<input name="empresa" id="empresa" type="text"><br>

				<label><span style="color:#FF0000;">(*)</span> Email:</label>
				<input name="email" id="email" type="text"><br>

				<label><span style="color:#FF0000;">(*)</span> Teléfono fijo o celular:</label>
				<input name="telefono" id="telefono" type="text">  <br>                              
				
				<label><span style="color:#FF0000;">(*)</span> Motivo:</label>
				<select name="motivo" id="motivo">
                  <option selected="selected" value="Consulta o Sugerencia">Consulta o Sugerencia</option>
                  <option value="Estado del pedido">Estado del pedido</option>
				  <option value="Presupuesto">Presupuesto</option>
					
				</select><br>
				
				<label><span style="color:#FF0000;">(*)</span> Mensaje:</label>
				<textarea name="mensaje" id="nomensajembre"></textarea><br>										
				
				<label><span style="color:#FF0000;">(*)</span> Ingrese el Codigo de verificacion: </label>
                <?php echo $captcha['image']; 
                 // echo "<p> ".$captcha['word']."</p>";
                ?>

                <input type="text" name="captcha" value="" /><br>
                <input name="button2" id="button2" class="btn" value="Enviar Consulta" type="submit">
				
			</form>

		</div><!-- Fin contacto-izq -->

		<div class="contacto-der">
			<!--<h2>Contacto directo</h2>-->
			<h2>Contacto directo</h2>
			
			
				<span>Teléfono: +591 (3) 3903196</span>
				
				<img style="margin-top:10px;" 
				src="<?php echo base_url();?>assets/img/contactenos.jpg" height="auto" width="100%">
			
		</div><!-- Fin contacto-der -->

	</div><!-- Fin box -->

	