

<DOCTYPE html>
<html lang="en">
<head>
<title>Hello</title>
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script>
  document.cookie.indexOf('cookie_name=');

$(document).ready(function(){
    let x = getCookie('name');
    let person ="";
    if(x == ""){
           person = prompt("Please enter your name:", "John Doe");
          setCookie("name",person,'1'); //(key,value,expiry in days)

    }else{
        $("#names").text(x);
        console.log("execute");
        alert("I am "+$("#names").html());
    }
 });
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
  function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
$(document).ready(function(){
 
  let x = getCookie('name');
    $("#send").click(function(){
   
    jQuery.ajax({
    type:"POST",
    url: "add.php",
    data:{ name: $("#names").html(), message: $("input[name='message']").val()},
    complete: function() {
    }, error: function(xhr, status, error) {
 console.error(xhr);
},
    success: function(data) {
alert("sucess");
    }
    });
    });
  /*$("#send").click(function(){
    jQuery.ajax({
    type:"POST",
    url: "add.php",
    data:formData,
     beforeSend: function() {

    },
    complete: function() {
    },
    success: function(data) {
    //alert (data);
     $("#loader").text("");
    $("div").html(data);

   });

});*/
});

$(document).ready(function() {
$("#loader").text("Please wait");
setInterval(function(){get_data()},5000);

function get_data()
{
jQuery.ajax({
type:"GET",
url: "get-data.php",
data:"",
 beforeSend: function() {

},
complete: function() {
},
success: function(data) {
//alert (data);
 $("#loader").text("");
$("div").html(data);
}
});
}
});
</script>
</head>
<body>
   
<div>
<a id="loader"></a>
</div>

<input name="message" type ="text">
<a id="send" href="#">SEND</a><br>
<p>LOGIN AS</p><p id="names"></p>
</body>
</html>
