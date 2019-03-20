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
 <div class="container">
<?php echo form_open('pizza/edit_products');?>
<?php echo form_hidden('kodeP',$pizza['kodeP']);?>
	<table class="bordered table">
	<tr>
		<th>Field</th><th>input</th>
	</tr>
	<tr><td>Kode Product</td><td><?php echo $pizza['kodeP'];?></td></tr>
	<tr><td>Nama Product</td><td><?php echo form_input('namaP',$pizza['namaP']);?></td></tr>
	<tr><td>Image Product</td><td><?php echo form_input('image',$pizza['image']);?></td></tr>
	<tr><td>harga Product</td><td><?php echo form_input('harga',$pizza['harga']);?></td></tr>
	<tr><td>Stock Product</td><td><?php echo form_input('stock',$pizza['stock']);?></td></tr>
	<tr><td>Product Description</td><td><?php echo form_input('description',$pizza['description']);?></td></tr>
	</table>
	<span class="col-sm-5"></span><?php echo form_submit('SUBMIT','EDIT','class="btn btn-primary"');?>
	<?php echo form_close();?>
</div>	
<br>