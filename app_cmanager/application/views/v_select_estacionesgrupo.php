<option>-- Seleccione Estación --</option> 
<?php foreach ($select_estaciones as $item):?>
<option value="<?php echo $item['id'];?>"><?php echo $item['estacion'];?></option>
<?php endforeach; ?>  