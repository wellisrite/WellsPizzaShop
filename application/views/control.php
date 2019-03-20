            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard 
                        </h1>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Most Recent 20 Transactions</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive text-center">
                                    <table class="table-bordered" width="100%;"> 
                                        <thead>
                                            <tr>
                                            	<th>No</th>
                                                <th>Order id</th>
                                                <th>Order Date</th>
                                                <th>Order Address</th>
                                                <th>Ordered Product</th>
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
                                        $a=0;
                                        	foreach($orders as $i){
                                                if($a==20){
                                                    break;
                                                }
                                        		$users=$this->users_model->get_user($i->id)->row_array();
                                                $product=$this->pizza_model->getPizza($i->kodeP)->row_array();
                                         ?>
                                         	<tr>
                                            <td><?php echo $i->idT; ?></td>
                                            <td><?php echo $i->kodeT?></td>
                                            <td><?php echo $i->tanggalT ?></td>
                                            <td><?php echo $users['alamat'];?></td>
                                            <td><?php echo $product['namaP'];?></td>
                                            <td><?php echo $i->quantity ?></td>
                                            <td><?php echo $users['nama'] ?></td>
                                            <td><?php echo $i->kodeP; ?></td>
                                            <td>$<?php echo $i->quantity*$product['harga'];?></td>
                                            <td><?php echo $i->status ?>
                                            </td>
                                            <td><?php if($i->status=="checkout") 
                                            {?><a href="<?php echo site_url('admin/send_order/').$i->idT; ?>">Send</a> |
                                            <a href="<?php echo site_url('admin/cancel_order/').$i->idT; ?>">Cancel Order</a><?php }
                                            else if($i->status=="Delivered and confirmed by User"||$i->status=="Canceled")
                                                {?><a href="<?php echo site_url('admin/delete_order/').$i->idT; ?>">Remove</a>
                                            <?php } 
                                            else if($i->status=="Sending"){?><a href="<?php echo site_url('admin/confirm_delivery/').$i->idT; ?>">Confirm delivery</a> | <a href="<?php echo site_url('admin/cancel_order/').$i->idT; ?>">Cancel Order</a>
                                            <?php } ?></td></tr>
                                         	<?php $a++; } ?>
                                        </tbody></table>
                                <div class="text-right">
                                <script type="text/javascript">
                                </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            <div class="container">
             <form method="post" action="<?php echo site_url('admin/showTdate');?>">
                <h2>Get All Transactions by Date</h2> 
                <table>
                <tr><td><label>Start Date:</label><input type="date" name="sDate" required=""></td></tr>
                <tr><td><label>End Date :</label><input type="date" name="eDate" required=""></td></tr>
                <tr><td><span class="col-sm-4"></span><input class="btn btn-primary" type="submit" name="submit" value="Get"></td></tr>
                </table>
             </form>
             </div>
             <hr>
             <div class="container">
             <form method="post" action="<?php echo site_url('admin/showUserT');?>">
                <h2>Get All Transactions by User</h2> 
                <table>
                <tr><td><label>User ID:</label><input type="text" name="id" required=""></td></tr>
                <tr><td><span class="col-sm-4"></span><input class="btn btn-primary" type="submit" name="submit" value="Get"></td></tr>
                </table>
             </form>
             </div>
            </div>
            <!-- /.container-fluid -->
            </div>
    </div>
    <span class="col-sm-5"></span><button class="btn btn-primary" onclick="redirect()">Reset Table Orders</button>
    <hr>
    <h1>Shop utilities</h1>
    <hr>
    <h1><small>Shop Status : <?php echo $status; ?></small></h1>
    <div class="container">
     <li><button class="btn btn-primary" onclick="force_open()">Force open</button></li>
     <li><button class="btn btn-primary" onclick="force_close()">Force close</button></li>
     <li><button class="btn btn-primary" onclick="default_shop()">Default shop status</button></li>
     </div>
     <hr>
    <style>
    	.navbar{
    		margin-bottom: 0;
    	}
    </style>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand">Control</div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('pizza/input');?>">Input products</a></li>
        <li><a href="<?php echo site_url('admin/replenish');?>">Replenish products</a></li>
        <li><a href="<?php echo site_url('admin/edit_product');?>">Edit products</a></li>
      </ul>
    </div>
  </div>
</nav>
<script>
	function redirect(){
		window.location="<?php echo site_url('admin/reset_ai');?>";
	}
    function force_open(){
        window.location="<?php echo site_url('admin/force_open');?>";
    }
    function force_close(){
        window.location="<?php echo site_url('admin/force_close');?>";   
    }
    function default_shop(){
        window.location="<?php echo site_url('admin/default_status');?>";
    }
</script>