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
<div align="center">
<?php echo form_open('pizza/save_pizza');?>
<table class="bordered table">
    <thead>
    <th>Field</th>
    <th>Input</th>
    </thead>
    <tbody>
    <tr><td>Kode Product</td><td><?php echo form_input('kodeP');?></td></tr>
    <tr><td>Nama Product</td><td><?php echo form_input('namaP');?></td></tr>
    <tr><td>Product image</td><td><?php echo form_input('image');?></td></tr>
    <tr><td>Harga Product</td><td><?php echo form_input('harga');?></td></tr>
    <tr><td>Stock</td><td><?php echo form_input('stock');?></td></tr>
    <tr><td>Description</td><td><?php echo form_input('description');?></td></tr>
    </tbody>
</table>
<?php echo form_submit('SUBMIT','Input','class="btn btn-info"');?>
</div>
<?php  echo form_close();?>