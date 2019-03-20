 <body>
      <style>
  p{
    color:red;
  }
  .header{
    background-color:rgb(77, 85, 195);
    color:white;
    margin-bottom: 50px;
    padding:20px 0;
  }
  .container{
    margin-bottom: 50px;
    padding-left: 0;
    padding-right: 0;
  }
  #account{
    margin-bottom: 50px;
  }
  </style>
    <div class="container" width="100%">
    <div class="header" align="center">
    <h2>Create your Account!</h2>
    </div>
    <div class="container" style="width:40%">
    <form id="account" name="account" method="post" action="<?php echo site_url('register/process') ?>"  onsubmit="return validation()">
      <div class="form-group">
        <label for="ID">ID:</label>
        <input type="text" name="id" class="form-control" id="id" placeholder="your ID here" autofocus>
        <p><?php if(isset($noticer)){
            echo $noticer;
          } ?></p>
        <p id="uname"></p>
      </div>
        <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" class="form-control" id="pwd" placeholder="your password here">
          <p id="pwdnote"></p>
      </div>
        <div class="form-group">
        <label for="pwd">Confirm password:</label>
        <input type="password" name="cfpwd" class="form-control" id="cfpwd" placeholder="confirm your password here">
          <p id="cfpwdnote"></p>
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="fname" class="form-control" id="fname" placeholder="your name here">
        <p id="fnamenote"></p>
      </div>
      <label for="gender">Gender:</label>
      <div class="form-group" align="center">
        <label class="checkbox-inline">Male<input type="radio" name="gender" class="form-control" id="gender" value="M" checked></label>
        <label class="checkbox-inline">Female<input type="radio" name="gender" class="form-control" id="gender" value="F"></label>
      </div>
       <div class="form-group">
        <label for="textarea">Address:</label>
        <input type="textarea" name="address" class="form-control" id="address" placeholder="your address here">
          <p id="addressnote"></p>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="your email here">
          <p id="emailnote"></p>
      </div>
      <br>
      <div class="form-group">
        <input type="submit" class="form-control btn-primary">
      </div>
    </div>
    </form>
         <script>
      txt=""
      function validation(){
      id=document.forms["account"]["id"].value;
      fname=document.forms["account"]["fname"].value;
      email=document.forms["account"]["email"].value;
      pwd=document.forms["account"]["password"].value;
      cfpwd=document.forms["account"]["cfpwd"].value;
      gender=document.forms["account"]["gender"].checked;
      address=document.forms["account"]["address"].value;
      if(id==""){
        txt="Nothing inputted here! please insert your username!";
        document.getElementById("uname").innerHTML=txt;
        return false;
      }
      else if(id.length<4){
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
        document.getElementById("pwdnote").innerHTML=txt;
        return false;
      }
       else if(pwd.length<4){
        txt="Your password is too short!,your password must be at least 4 words!";
        document.getElementById("pwdnote").innerHTML=txt;
        return false;
      }
      document.getElementById('pwdnote').innerHTML="";
      if(cfpwd==""){
        txt="Nothing inputted here! please insert your password!";
        document.getElementById("cfpwdnote").innerHTML=txt;
        return false;
      }
      else if(pwd!=cfpwd){
        txt="The confirmed password is not as same as the password that inputted above,please insert the same password!";
        document.getElementById("cfpwdnote").innerHTML=txt;
        return false;
      }
      document.getElementById('cfpwdnote').innerHTML="";
      if(fname==""){
        txt="Nothing inputted here! please insert your first name!";
        document.getElementById("fnamenote").innerHTML=txt;
        return false;
      }
      else if(fname.length<4){
        txt="Your first name is too short!,your first name must be at least 4 words!";
        document.getElementById("fnamenote").innerHTML=txt;
        return false;
      }
        document.getElementById('fnamenote').innerHTML="";
      if(address==""){
        txt="Nothing inputted here! please insert your address!";
        document.getElementById("addressnote").innerHTML=txt;
        return false;
      }
      else if(address.length<4){
        txt="Your address is too short!,your address must be at least 4 words!"
        document.getElementById("addressnote").innerHTML=txt;
        return false;
      }
      document.getElementById('addressnote').innerHTML="";
      if(email==""){
        txt="Nothing inputted here! please input your email!";
        document.getElementById("emailnote").innerHTML=txt;
        return false;
      }
      document.getElementbyId('emailnote').innerHTML="";
      return true;
    }
    </script>
