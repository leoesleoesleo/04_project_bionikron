        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <center><h3 id="subtitulo" class="box-title">ESTÁ SEGURO DE ELIMINAR EL USUARIO?</h3></center>
            </div>
            <div class="box-body">     
            <center><h4>Usuario: <?php echo $usuario;?></h4></center>  
            <center><h4>Rol: <?php echo $rol;?></h4></center>   
            <br/>                       
    
              <div class="modal-footer">
                <button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal" >Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" class="btn btn-primary btn-ok" onclick="eliminar_usuarios_bd('<?php echo $id_usuario; ?>','<?php echo $usuario; ?>');" >Eliminar Usuario</button> 

              </div>

          </div>          
         </div>         
         <br/>
        </div>