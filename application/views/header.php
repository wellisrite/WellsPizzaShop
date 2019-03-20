<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('bootstrap');?>/css/bootstrap.min.css" >
  <link rel="stylesheet"  href="<?php echo base_url('bootstrap');?>/css/well.css">
  <script src="<?php echo base_url('bootstrap');?>/js/jquery-3.2.0.min.js"></script>
  <script src="<?php echo base_url('bootstrap');?>/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      margin-bottom: 20px;
      border-radius: 0;
    }

    /* Remove the jumbotron's default bottom margin */
     .jumbotron {
      margin-bottom: 0;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #000000;
      padding: 25px;
    }
    #desc{
      color:#777777;
    }
  </style>
</head>
<body>
<div class="jumbotron" style="background-color:black;">
  <div class="container text-center">
    <h1 id="well">Well's Pizza Store</h1>
    <p id="desc">Simple, Fast, and High Quality</p>
    <p id="desc">Open from Monday to Friday at 07:00 AM to 06:00 PM</p>
    </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('pizza');?>">Home</a></li>
        <li><a href="<?php echo site_url('products'); ?>">Products</a></li>
        <li><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
      </ul>
      <style type="text/css">
        #countorda{
          color:red;
        }
      </style>
      <?php 
        $this->db->select('status');
        $this->db->where('status','checkout');
        $orda=$this->db->get('tblTransactions')->result();
        $countorda=count($orda);
      ?>
      <ul class="nav navbar-nav navbar-right">
        <?php 
        if(isset($_SESSION['id'])){
        if($countorda!=0 && $_SESSION['id']=='admin'){?>
        <li><a href="<?php echo site_url('admin') ?>" id="countorda"><span class="glyphicon glyphicon-list-alt"></span> <?php echo $countorda." New Orders";?></a></li>
        <?php }}?>
        <li><a href="<?php 
        if(isset($_SESSION['id'])){
          echo site_url('login/user_info');
        }
        else{
        echo site_url('login');
        } ?>"><span class="glyphicon glyphicon-user"></span><?php
            if(isset($_SESSION['nama'])){
                echo $_SESSION['nama'];
            }
            else{
                echo "Log In";
            }
        ?></a></li>
        <?php
        if(isset($_SESSION['id'])){
            echo "<li><a href=".site_url('logout').">Log out</a></li>";
            if($_SESSION['id']=="admin"){
              echo "<li><a href=".site_url('admin').">Control Panel</a></li>";
            }
        }
        ?>
        <li><a href="<?php echo site_url('cart')?>"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
