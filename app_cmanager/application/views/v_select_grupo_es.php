<option>-- Seleccione Grupo --</option> 
    <?php foreach ($select_grupo_e as $item):?>
<option value="<?php echo $item['id_grupo'];?>"><?php echo $item['nombre'];?></option>
    <?php endforeach; ?>    