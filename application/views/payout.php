<div class="container">
<?php
  if(!isset($_SESSION['id'])){
    redirect('login');
  }
 ?>
<div class="container">
    <strong><?php echo "Kode Transaksi: ".$transactions[0]->kodeT;?></strong><br>
    <strong><?php echo "Nama Pembeli: ".$transactions[0]->id;?></strong><br>
    <strong><?php echo "Tanggal Transaksi: ".$transactions[0]->tanggalT;?></strong>
</div>
<hr>
<div class="container" align="center">
    <?php 
        $this->load->model('Pizza_model');
    ?>
    <table>
        <tr><th>Field</th><th>Data</th></tr>
        <?php
            echo "<tr><td>Products</td><td>";
            foreach($transactions as $i){
                $products=$this->db->get_where('tblProducts',array('kodeP'=> $i->kodeP))->row_array();
                echo $products['kodeP']." ";
            }
            echo "</td></tr>";
            echo "<tr><td>Quantity Total</td><td>".$qtotal."</td></tr>";
            echo "<tr><td>Price Total</td><td>$".$ptotal."</td></tr>";
        ?>
    </table>
</div>
<hr>
<div class="container text-center">
<strong>Thank you for purchasing our products</strong>
</div>
<br>
</div>

