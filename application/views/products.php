<style>
#notice{
  color:red;
}
.img-responsive{
  margin:0 auto;
}
</style>
<?php 
if($status=="forced open"){?>
<div class="container" align="center">
<?php
if(isset($_SESSION['id']))
{
  if($_SESSION['id']=='admin')
  {
    ?>
      <a href="<?php echo site_url('pizza/input'); ?>" class="btn btn-info">Input Products</a>
    <?php
  }
}
?>
</div>
<div class="container text-left">
<h1>How to buy</h1>
<strong>check the box of the product that you want to buy then click Buy button</strong>
</div>
<hr>
<div class="container">
<form id="form" action="<?php echo site_url('cart/input');?>" method="post" onsubmit="return check()">
<div class="container text-center">
  <input type="submit" class="button btn-primary" value="Buy" style="width:50%;">
  <p id="notice"></p>
  <hr>
  </div>
<?php
  $a=0;
  $length=count($products);
foreach($products as $i){
    ?>
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading text-center"><?php echo $i->kodeP."|".$i->namaP; ?></div>
        <div class="panel-body"><img src="<?php if($i->stock > 0){echo base_url('bootstrap/pizza/').$i->image;}else{echo base_url('bootstrap/pizza/')."sold-out.png";}?>" class="img-responsive" style="width:100%;height:250px;" alt="Image"></div>
        <div class="panel-body" style="font-size:20px;"><?php echo $i->description."<br>"."Price: $".$i->harga?></div>
        <div class="panel-footer">
        <?php
         if(isset($_SESSION['id'])&&$i->stock > 0){
           echo "<input name=\"products[]\" id=\"product".$a."\" type=\"checkbox\" class=\"btn btn-default\" value=\"$i->kodeP\"> Check here to select this product</input>";
             if($_SESSION['id']=='admin'){
            echo "<br><a href=\"".site_url('pizza/edit')."/$i->kodeP\"><button type=\"button\" class=\"btn btn-default\">Edit</button></a>";

            echo "<a href=\"".site_url('pizza/delete')."/$i->kodeP\"><button type=\"button\" class=\"btn btn-default\">Delete</button></a>";
          }
        }
        else if($i->stock <= 0){
          echo "Can't buy this product,out of stock";   
           if($_SESSION['id']=='admin'){
            echo "<br><a href=\"".site_url('pizza/edit')."/$i->kodeP\"><button type=\"button\" class=\"btn btn-default\">Edit</button></a>";
            echo "<a href=\"".site_url('piza/delete')."/$i->kodeP\"><button type=\"button\" class=\"btn btn-default\">Delete</button></a>";
          } 
              }
        else{
          echo "<div align=\"center\"><p style=\"color:#aa2a2a;\">You must log in to buy products</p></div>";
          }
        ?>
        </div>  
      </div>
    </div>
<?php $a++; }?>
</form>
</div>
<script>
    var length=<?php echo $length ?>;
    function check(){
      if (!$("#form input:checkbox:checked").length)
          {
              $('#notice').css('color','red').html('Please select a product!');
              return false;
          }
      return true  ;
    }
</script>
<?php }
else{
$open=strtotime("07:00:00");
$close=strtotime("18:00:00");
$time=strtotime(date('H:i:s'),now());
$leftime=$open-$time;
 ?>
<div class="container" align="center">
<?php
if(isset($_SESSION['id']))
{
  if($_SESSION['id']=='admin')
  {
    ?>
      <a href="<?php echo site_url('pizza/input'); ?>" class="btn btn-info">Input Products</a>
    <?php
  }
}
?>
</div>
<div class="container text-left">
<h1>How to buy</h1>
<strong>check the box of the product that you want to buy then click Buy button</strong>
</div>
<hr>
<div class="container">
<form id="form" action="<?php echo site_url('cart/input');?>" method="post" onsubmit="return check()">
<div class="container text-center">
<?php if(date('l')=='Saturday' || date('l')=='Sunday')
{
  echo "<div class=\"container text-center\"><h1>Sorry we're closed for today</h1><img class=\"img-responsive\" src=\"".base_url('bootstrap/image/shop.jpg')."\"></img></div><hr>";
}
else if($time<$open){
 echo "<div class=\"container text-center\"><h1>Sorry we're not open yet </h1><img class=\"img-responsive\" src=\"".base_url('bootstrap/image/shop.jpg')."\"></img></div><hr>"; 
}
else if($time>$close){
 echo "<div class=\"container text-center\"><h1>Sorry the shop is already closed</h1><img class=\"img-responsive\" src=\"".base_url('bootstrap/image/shop.jpg')."\"></img></div><hr>";  
}
else{ ?>
  <input type="submit" class="button btn-primary" value="Buy" style="width:50%;">
  <p id="notice"></p>
  <hr>
  </div>
<?php }
  $a=0;
  $length=count($products);
foreach($products as $i){
    ?>
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading text-center"><?php echo $i->kodeP."|".$i->namaP; ?></div>
        <div class="panel-body"><img src="<?php if($i->stock > 0){echo base_url('bootstrap/pizza/').$i->image;}else{echo base_url('bootstrap/pizza/')."sold-out.png";}?>" class="img-responsive" style="width:100%;height:250px;" alt="Image"></div>
        <div class="panel-body" style="font-size:20px;"><?php echo $i->description."<br>"."Price: $".$i->harga?></div>
        <div class="panel-footer">
        <?php
         if(isset($_SESSION['id'])&&$i->stock > 0){
					 echo "<input name=\"products[]\" id=\"product".$a."\" type=\"checkbox\" class=\"btn btn-default\" value=\"$i->kodeP\"> Check here to select this product</input>";
             if($_SESSION['id']=='admin'){
        		echo "<br><a href=\"".site_url('pizza/edit')."/$i->kodeP\"><button type=\"button\" class=\"btn btn-default\">Edit</button></a>";
						echo "<a href=\"".site_url('piza/delete')."/$i->kodeP\"><button type=\"button\" class=\"btn btn-default\">Delete</button></a>";
        	}
				}
        else if($i->stock <= 0){
          echo "Can't buy this product,out of stock";        }
				else{
					echo "<div align=\"center\"><p style=\"color:#aa2a2a;\">You must log in to buy products</p></div>";
					}
        ?>
        </div>  
      </div>
    </div>
<?php $a++; }?>
</form>
</div>
<script>
    var length=<?php echo $length ?>;
    function check(){
      if (!$("#form input:checkbox:checked").length)
          {
              $('#notice').css('color','red').html('Please select a product!');
              return false;
          }
      return true  ;
    }
</script>
<?php }?>