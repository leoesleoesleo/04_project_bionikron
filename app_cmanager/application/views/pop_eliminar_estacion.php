        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <center><h3 id="subtitulo" class="box-title">Está seguro de eliminar la estación?</h3></center>
            </div>
            <div class="box-body">     
            <center><h4><?php echo $nombre;?></h4></center>    
            <br/>                       
    
              <div class="modal-footer">
                <button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal" >Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="eliminar_estacion_bd('<?php echo $id; ?>');" >
                Eliminar Estación</button>
              </div>

          </div>          
         </div>         
         <br/>
        </div>