<div class="container" align="center">
		<h2>User's Information</h2><hr>
		<strong>Name : <?php echo $account['nama'] ?></strong><br>
		<strong>Gender : <?php if($account['gender']=="M"){
			echo "Male";}else {echo "Female";} ?></strong><br>
		<strong>Address : <?php echo $account['alamat'] ?></strong><br>	
		<strong>Email : <?php echo $account['email'] ?></strong><br>	
</div>
<div class="container">
	   <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive text-center">
                                    <table class="table-bordered" width="100%;"> 
                                        <thead>
                                            <tr>
                                            	<th>No</th>
                                                <th>Order id</th>
                                                <th>Order Date</th>
                                                <th>Ordered Products</th>
                                                <th>Quantity</th>
                                                <th>Buyer</th>
                                                <th>Product id</th>
                                                <th>SubTotal(USD)</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        	foreach($orders as $i){
                                        		$users=$this->users_model->get_user($i->id)->row_array();
                                                $product=$this->pizza_model->getPizza($i->kodeP)->row_array();
                                         ?>
                                         	<tr>
                                            <td><?php echo $i->idT; ?></td>
                                            <td><?php echo $i->kodeT?></td>
                                            <td><?php echo $i->tanggalT ?></td>
                                            <td><?php echo $product['namaP'];?></td>
                                            <td><?php echo $i->quantity ?></td>
                                            <td><?php echo $users['nama'] ?></td>
                                            <td><?php echo $i->kodeP; ?></td>
                                            <td>$<?php echo $product['harga']*$i->quantity; ?>
                                                <input type="hidden" name="sub[]" value="<?php echo $product['harga']*$i->quantity; ?>">
                                            </td>
                                            <td><?php echo $i->status ?></td>
                                            <?php if($i->status=="checkout") {?>
                                            <td><a href="<?php echo site_url('admin/cancel_order/').$i->idT; ?>">Cancel Order</a><?php }
                                            else if($i->status=="Delivered"||$i->status=="Canceled")
                                                {?>
                                            <td><a href="<?php echo site_url('login/confirmedbyUser/').$i->idT; ?>">Confirm delivery</a><?php }?></td>
                                            </tr>
                                         	<?php } ?>
                                        </tbody></table>
                                <div class="text-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
</div>