<?php 
	if(isset($_SESSION['id'])){
		if($_SESSION['id']=="admin"){
		}
		else{
			redirect('pizza');
		}
	}
	else{
		redirect('pizza');
	}
 ?>
<div class="container" align="center">
<h2>Replenish</h2>
<?php echo form_open('Admin/replenish_save') ;?>
<table class="table-bordered text-center">
<?php echo form_hidden('length',count($pizza)); 
	$a=0;?>
	<thead>
		<tr>
			<th>ID Products</th>
			<th>Nama Products</th>
			<th>Stock</th>
			<th>Isi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($pizza as $i) {?>
		<tr>
			<td><?php echo $i->kodeP;echo form_hidden('kodeP'.$a,$i->kodeP);?></td>
			<td><?php echo $i->namaP ?></td>
			<td><?php echo $i->stock ?></td>
			<td><?php echo form_input('stock'.$a,$i->stock) ?></td>
		</tr>
		<?php $a++;} ?>
	</tbody>
</table>
	<?php echo form_submit('submit','Replenish','class=\'btn btn-info\''); ?>
</div>