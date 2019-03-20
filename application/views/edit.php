<style type="text/css">
	#notice{
		color:red;
	}
</style>
<div class="container-fluid text-center">
	<h2>Edit Product</h2>
	<label>Kode Product:</label><input type="text" name="kode">
	<button class="btn btn-info" onclick="return redirect()">Edit</button>
	<p id="notice"></p>
</div>
<script type="text/javascript">
	function redirect(){
		var kode=$('input[name=kode]').val();
		if(kode==""){
			$('#notice').html('Please insert the code of the product');
			return false;
		}
		window.location='<?php echo base_url('pizza/edit/') ?>'+kode;
	}
</script>