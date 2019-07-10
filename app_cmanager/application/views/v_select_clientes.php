<option>-- Seleccione Cliente --</option> 
    <?php foreach ($select_clientes as $item):?>
<option value="<?php echo $item['id_clientes'];?>"><?php echo $item['nombre'];?></option>
    <?php endforeach; ?>    