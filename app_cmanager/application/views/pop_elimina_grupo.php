        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <center><h3 id="subtitulo" class="box-title">Está seguro de eliminar el grupo?</h3></center>
            </div>
            <div class="box-body">     
            <center><h4><?php echo $grupo;?></h4></center>    
            <br/>                       
    
              <div class="modal-footer">
                <button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal" >Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="eliminar_grupo_bd('<?php echo $id_grupo; ?>');" >
                Eliminar Grupo</button>
              </div>

          </div>          
         </div>         
         <br/>
        </div>