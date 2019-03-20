<style>
#notice{
  color:red;
}
.img-responsive{
  margin:0 auto;
}
</style>
<?php 
if($status=="forced open"){ ?>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Best selling!</div>
        <div class="panel-body"><img src="<?php echo base_url('bootstrap/pizza/').$best[0]->image; ?>" class="img-responsive" style="width:100%;height:250px;" alt="Image"></div>
        <div class="panel-body text-primary" style="font-size:20px;"><?php echo $best[0]->description."<br>"."Number bought:".$best[0]->nbought; ?></div>
        <div class="panel-footer"><?php if(isset($_SESSION{'id'})){?><a href="<?php echo site_url('cart/special_input/').$best[0]->kodeP ?>"><button type="button" class="btn btn-primary">Buy</button></a><?php }else{?>
          <p id="notice">Login to buy</p>
          <?php } ?></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">Runner up!</div>
        <div class="panel-body"><img src="<?php echo base_url('bootstrap/pizza/').$best[1]->image;?>" class="img-responsive" style="width:100%;height:250px" alt="Image"></div>
        <div class="panel-body text-success" style="font-size:20px;"><?php echo $best[1]->description."<br>"."Number bought:".$best[1]->nbought;  ?></div>
        <div class="panel-footer"><?php if(isset($_SESSION{'id'})){?><a href="<?php echo site_url('cart/special_input/').$best[1]->kodeP ?>"><button type="button" class="btn btn-success">Buy</button></a><?php }else{?>
          <p id="notice">Login to buy</p>
          <?php } ?></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">High Quality Product</div>
        <div class="panel-body"><img src="<?php echo base_url('bootstrap/pizza/').$best[2]->image; ?>" class="img-responsive" style="width:100%;height:250px" alt="Image"></div>
        <div class="panel-body text-success" style="font-size:20px;"><?php echo $best[2]->description."<br>"."Number bought:".$best[2]->nbought; ?></div>
        <div class="panel-footer"><?php if(isset($_SESSION{'id'})){?><a href="<?php echo site_url('cart/special_input/').$best[2]->kodeP ?>"><button type="button" class="btn btn-success">Buy</button></a><?php }else{?>
          <p id="notice">Login to buy</p>
          <?php } ?></div>
      </div>
    </div>
  </div>
</div><br>
<?php }
else{
$open=strtotime("07:00:00");
$close=strtotime("18:00:00");
$time=strtotime(date('H:i:s'),now());
$leftime=$open-$time;
if(date('l')=='Saturday' || date('l')=='Sunday')
{
  echo "<div class=\"container text-center\"><h1>Sorry we're closed for today</h1><img class=\"img-responsive\" align=\"center\" src=\"".base_url('bootstrap/image/shop.jpg')."\"></img></div><hr>";
}
else if($time<$open){
 echo "<div class=\"container text-center\"><h1>Sorry we're not open yet </h1><img class=\"img-responsive\" src=\"".base_url('bootstrap/image/shop.jpg')."\"></img></div><hr>"; 
}
else if($time>$close){
 echo "<div class=\"container text-center\"><h1>Sorry the shop is already closed</h1><img class=\"img-responsive\" src=\"".base_url('bootstrap/image/shop.jpg')."\"></img></div><hr>";  
}
else{
 ?>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Best selling!</div>
        <div class="panel-body"><img src="<?php echo base_url('bootstrap/pizza/').$best[0]->image; ?>" class="img-responsive" style="width:100%;height:250px;" alt="Image"></div>
        <div class="panel-body text-primary" style="font-size:20px;"><?php echo $best[0]->description."<br>"."Number bought:".$best[0]->nbought; ?></div>
        <div class="panel-footer"><?php if(isset($_SESSION{'id'})){?><a href="<?php echo site_url('cart/special_input/').$best[0]->kodeP ?>"><button type="button" class="btn btn-primary">Buy</button></a><?php }else{?>
          <p id="notice">Login to buy</p>
          <?php } ?></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">Runner up!</div>
        <div class="panel-body"><img src="<?php echo base_url('bootstrap/pizza/').$best[1]->image;?>" class="img-responsive" style="width:100%;height:250px" alt="Image"></div>
        <div class="panel-body text-success" style="font-size:20px;"><?php echo $best[1]->description."<br>"."Number bought:".$best[1]->nbought;  ?></div>
        <div class="panel-footer"><?php if(isset($_SESSION{'id'})){?><a href="<?php echo site_url('cart/special_input/').$best[1]->kodeP ?>"><button type="button" class="btn btn-success">Buy</button></a><?php }else{?>
          <p id="notice">Login to buy</p>
          <?php } ?></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">High Quality Product</div>
        <div class="panel-body"><img src="<?php echo base_url('bootstrap/pizza/').$best[2]->image; ?>" class="img-responsive" style="width:100%;height:250px" alt="Image"></div>
        <div class="panel-body text-success" style="font-size:20px;"><?php echo $best[2]->description."<br>"."Number bought:".$best[2]->nbought; ?></div>
        <div class="panel-footer"><?php if(isset($_SESSION{'id'})){?><a href="<?php echo site_url('cart/special_input/').$best[2]->kodeP ?>"><button type="button" class="btn btn-success">Buy</button></a><?php }else{?>
          <p id="notice">Login to buy</p>
          <?php } ?></div>
      </div>
    </div>
  </div>
</div><br>
<?php }} ?>