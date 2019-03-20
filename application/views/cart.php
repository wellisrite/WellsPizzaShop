<?php
  if(!isset($_SESSION['id'])){
    redirect('login');
  }
  if(count($transactions)==0){
    redirect ('products');
  }
 ?>
<div class="container">
    <strong><?php echo "Kode Transaksi: ".$transactions[0]->kodeT;?></strong><br>
    <strong><?php echo "Nama Pembeli: ".$transactions[0]->id;?></strong><br>
    <strong><?php echo "Tanggal Transaksi: ".$transactions[0]->tanggalT;?></strong>
</div>
<hr>
 <div class="container center">
 <div class="row">
       <div class="col-sm-1 text-center" style="background-color:black;color:white;border-right:1px white solid;">No</div>
       <div class="col-sm-3 text-center" style="background-color:black;color:white;border-right:1px white solid;">Name</div>
       <div class="col-sm-2 text-center" style="background-color:black;color:white;border-right:1px white solid;">Quantity</div>
       <div class="col-sm-1 text-center" style="background-color:black;color:white;border-right:1px white solid;">Price</div>
        <div class="col-sm-1 text-center" style="background-color:black;color:white;border-right:1px white solid;">Stock</div>
       <div class="col-sm-2 text-center" style="background-color:black;color:white;border-right:1px white solid;">Sub-Price</div>
       <div class="col-sm-2 text-center" style="background-color:black;color:white;border-right:1px white solid;">Option</div>
 </div>
 <form id="former" action="<?php echo site_url('cart/checkout');?>" method="post" onsubmit="return check()">
 <?php
 $a=0;
 $stocks=array();
 $this->load->model('Pizza_model');
 echo form_hidden('length',count($transactions));
 echo form_hidden('kodeT',$transactions[0]->kodeT);
    foreach($transactions as $i){
      $product=$this->Pizza_model->getPizza($i->kodeP)->row_array();
      $stocks[$a]=$product['stock'];
      echo form_hidden('kodeP'.$a,$product['kodeP']);
      echo "<div class=\"row\">";
      echo "<div class=\"col-sm-1 text-center\"><p>".($a+1)."</p></div>";
      echo "<div class=\"col-sm-3 text-center\"><p>".$product['namaP']."</p></div>";
      echo "<div class=\"col-sm-2 text-center\"><input name=\"quantity$a\" type=\"number\" id=\"quantity$a\" value=\"0\" min=\"0\"></div>";      
      echo "<div class=\"col-sm-1 text-center\"><p>$".$product['harga']."</p></div>"; 
      echo "<div class=\"col-sm-1 text-center\"><p>".$product['stock']."</p></div>";
      echo "<div class=\"col-sm-2 text-center\"><input type=\"hidden\" value=\"0\" id=\"subv$a\"><p id=\"sub$a\"></p></div>";
      echo "<div class=\"col-sm-2 text-center\"><a href=\"".site_url('cart/delete/').$i->kodeP."\">Remove</a></div>";
      echo "</div>";
      $a++;
    }
  ?>
     <hr>   
    <div class="row">
       <div class="col-sm-3 text-center" style="background-color:black;color:white;border-right:1px white solid;">Total</div>
       <div class="col-sm-1 text-center" style="background-color:black;color:white;border-right:1px white solid;"></div>
       <div class="col-sm-2 text-center" style="background-color:black;color:white;border-right:1px white solid;"><input name="qtotal" type="hidden" id="qtotalv" value="0"><p id="qtotal">0 Products</p></div>
       <div class="col-sm-2 text-center" style="background-color:black;color:white;border-right:1px white solid;"></div>
       <div class="col-sm-2 text-center" style="background-color:black;color:white;border-right:1px white solid;"><input name="ptotal" type="hidden" id="ptotalv" value="0"><p id="ptotal">$ 0</p></div>
 </div>     
 <hr>
<div class="container text-right" style="width:90%"><?php echo form_submit('SUBMIT','To Checkout') ?><p id="notice"></p></div>
<?php echo form_close();?>
<br>    
</div>
<script>
    var transaksi=<?php echo count($transactions); ?>;
    $(document).ready(function (){
<?php
$a=0;$le= count($transactions);
    foreach($transactions as $i){
        $product=$this->Pizza_model->getPizza($i->kodeP)->row_array();
        $b=0;
        ?>
            $('#quantity<?php echo $a?>').on('change',function(){
                //console.log(parseInt($("#quantity0").val()));
                //console.log(parseInt($("#quantity1").val()));
                var qtotal=0;
                var ptotal=0;
                var price=<?php echo $product['harga'] ?>;
                var quantity=$('#quantity<?php echo $a?>').val();
                var sub=price*quantity;
                $('#sub<?php echo $a;?>').html("$"+sub);
                $('#subv<?php echo $a;?>').val(sub);
                    qtotal=qtotal+<?php foreach($transactions as $z){?>parseInt($("#quantity<?php echo $b;?>").val())<?php if($b<$le-1){echo "+";} $b++; }?>;
                    ptotal=ptotal+<?php $b=0; foreach($transactions as $z){?>parseInt($("#subv<?php echo $b;?>").val())<?php if($b<$le-1){echo "+";} $b++; }?>;
                    console.log(qtotal);   
                $('#qtotal').html(qtotal+" products");
                $('#qtotalv').val(qtotal);
                $('#ptotal').html("$"+ptotal);
                $('#ptotalv').val(ptotal);
            });
   <?php
   $a++;
   }
?>
        });
  </script>
  <script>
    var length=<?php echo count($transactions);?>;
    function check(){
      <?php $d=0; foreach($transactions as $i){?>
      a<?php echo $d?>=parseInt($('#quantity<?php echo $d;?>').val());
      b<?php echo $d?>=<?php echo $stocks[$d];?>;
      if(a<?php echo $d;?>==0){
        $('#notice').css('color','red').html('Quantity of items <?php echo $d+1; ?> musn\'t be 0');
        return false;
      }
      if(a<?php echo $d;?>>b<?php echo $d; ?>){
        $('#notice').css('color','red').html('Stock of item <?php echo $d+1; ?> is not enough,please buy with less quantity');
        return false;
      }
      <?php $d++;} ?>
      console.log(a0);
      return true;
    }
  </script>