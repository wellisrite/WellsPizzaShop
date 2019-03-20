<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_SESSION['id'])){
  redirect("Pizza");
}
?>
<style>
    #uname{
        color:red;
    }
    #fnamenote{
        color:red;
    }
    #error{
        color:red;
    }
</style>
<body>
    <div class="container" align='center'>
    <h2>Login</h2>
    </div>
    <div class="container" style="width:40%">
    <form id="account" name="account" method="post" action="<?php echo site_url('login/process');?>"  onsubmit="return validation()">
      <div class="form-group">
        <label for="name">ID:</label>
        <input type="text" name="id" class="form-control" id="id" placeholder="your id here" autofocus>
        <p id="uname"></p>
      </div>
      <div class="form-group">
        <label for="name">Password:</label>
        <input type="password" name="password" class="form-control" id="pwd" placeholder="your password here">
        <p id="fnamenote"></p>
         <div class="form-group">
        <input type="submit" class="form-control btn-primary">
      </div>
      </div>
    </form>
    </div>
    <div class="container" align="center">
        <?php
        if(isset($notice)){
            echo "<p id=\"error\">".$notice."</p>";
        }
        ?>
        <p>Have no account? get one <a href="register">here</a></p>
    </div>
     <script>
      txt=""
      function validation(){
      name=document.forms["account"]["id"].value;
      pwd=document.forms["account"]["password"].value;
      if(name==""){
        txt="Nothing inputted here! please insert your username!";
        document.getElementById("uname").innerHTML=txt;
        return false;
      }
      else if(name.length<4){
        txt="Your user name is too short!,your username must be at least 4 words!"
        document.getElementById("uname").innerHTML=txt;
        return false;
      }
      else{
        txt="";
        document.getElementById("uname").innerHTML=txt;
      }
      if(pwd==""){
        txt="Nothing inputted here! please insert your password!";
        document.getElementById("fnamenote").innerHTML=txt;
        return false;
      }
      if(pwd.length<4){
        txt="Your password is too short!,your password must be at least 4 words!"
        document.getElementById("fnamenote").innerHTML=txt;
        return false;
      }
      return true;
    }
    </script>
