<option>-- Seleccione Rol --</option> 
    <?php foreach ($select_roles as $item):?>
<option value="<?php echo $item['id_rol'];?>"><?php echo $item['rol'];?></option>
    <?php endforeach; ?>    