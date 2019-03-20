      <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>Transactions from 
                                <?php if(isset($sDate)){?>
                                <?php echo $sDate;?> to <?php echo $eDate;?></h3>
                                <?php }else{  echo $id."</h3>";}?>
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
                                        		$users=$this->users_model->get_user($i->id)->row_array();
                                                $product=$this->pizza_model->getPizza($i->kodeP)->row_array();
                                         ?>
                                         	<tr>
                                            <td><?php echo $i->idT; ?></td>
                                            <td><?php echo $i->kodeT?></td>
                                            <td><?php echo $i->tanggalT ?></td>
                                            <td><?php echo $users['alamat'];?></td>
                                            <td><?php echo $product['namaP'];?></td>
                                            <td><?php echo $i->quantity ?>
                                                <input type="hidden" name="qua<?php echo $a;?>" value="<?php echo $i->quantity ?>">
                                            </td>
                                            <td><?php echo $users['nama'] ?></td>
                                            <td><?php echo $i->kodeP; ?></td>
                                            <td>$<?php echo $i->quantity*$product['harga'];?>
                                            <input type="hidden" name="sub<?php echo $a;?>" value="<?php echo $i->quantity*$product['harga'];?>" ></td>
                                            <td><?php echo $i->status ?>
                                            </td>
                                            <td><?php if($i->status=="checkout") 
                                            {?><a href="<?php echo site_url('admin/send_order/').$i->idT; ?>">Send</a><?php }
                                            else if($i->status=="Delivered and confirmed by User"||$i->status=="Canceled")
                                                {?><a href="<?php echo site_url('admin/delete_order/').$i->idT; ?>">Remove</a>
                                            <?php } 
                                            else if($i->status=="Sending"){?><a href="<?php echo site_url('admin/confirm_delivery/').$i->idT; ?>">Confirm delivery</a> | <a href="<?php echo site_url('admin/cancel_order/').$i->idT; ?>">Cancel Order</a>
                                            <?php } ?></td></tr>
                                         	<?php $a++; } ?>
                                            <tr>
                                                <td><h3>Total</h3></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><p id="qua"></p></td>
                                                <td></td>
                                                <td></td>
                                                <td><p id="total"></p></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody></table>
                                        <?php $o=0; ?>
                                <div class="text-right">
                                <script type="text/javascript">
                                    length=<?php echo count($orders);?>;
                                    total=0;
                                    quantity=0;
                                    total=total+<?php  foreach($orders as $i){ ?>parseInt($("input[name='sub<?php echo $o?>']").val())<?php if($o!=count($orders)-1) { echo "+";}?><?php $o++;}
                                        ?>;
                                        <?php $o=0; ?>
                                    quantity=quantity+<?php foreach($orders as $i){?>parseInt($("input[name='qua<?php echo $o?>']").val())<?php if($o!=count($orders)-1) { echo "+";}?><?php $o++;}
                                        ?>;    
                                    console.log(total);
                                    $("#total").html("$"+total);
                                    $('#qua').html(quantity+" products");
                                </script>
                                </div>
                            </div>
                        </div>
                    </div>