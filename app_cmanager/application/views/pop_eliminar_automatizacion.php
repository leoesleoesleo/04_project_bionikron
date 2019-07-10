        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <center><h3 id="subtitulo" class="box-title">Está seguro de eliminar automatización?</h3></center>
            </div>
            <div class="box-body">     
            <center><h4>Automatización: <?php echo $nombre;?></h4></center>  
            <br/>  
            <p><strong>Nota:</strong>Ten en cuenta que para eliminar esta automatización no debe estar ligada a ninguna estación.</p> 
              <div class="modal-footer">
                <button type="button" class="mb-1 mt-1 mr-1 btn btn-default" data-dismiss="modal" >Close</button>
                <button id="button" href="#" class="btn btn-danger btn-ok" data-dismiss="modal" onclick="eliminar_automatizacion_bd('<?php echo $id;?>');" >
                Eliminar Automatización</button>

              </div>

          </div>          
         </div>         
         <br/>
        </div>



        