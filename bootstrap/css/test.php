<div id="wow"></div>
<script>
var mycartss=new Array();
var text="";
for(i=0;i<10;i++){
mycartss[i]=i+1;
}
localStorage["mycarts"]=JSON.stringify(mycartss);
var carts= JSON.parse(localStorage["mycarts"]);
for(i=0;i<carts.length;i++){
  text += carts[i] + "<br>";
}
document.getElementById("wow").innerHTML=text;
</script>
