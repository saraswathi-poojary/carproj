
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="adminchoice1.css" rel="stylesheet"  ></link>
</head>
<body>
<div class="nav">
        <button ><a href="logout.php">Logout</a></button>

</div>
<script>
    </script>

<div class="outer">
<div class="sidediv">

   <button id="firstbtn" >Booking management</button> 
   <button id="vehicle">Vehicle management</button> 
   <button id="payment">payment details</button> 
    <button>Reset credentials</button>
    
    

</div>
<div class="maindiv" id="maindiv">

</div>

<div class="book" id="book1" style="display: none;" >
    <p>Hello</p>
    <a href="aunapproved.php">View unapproved booking </a>

</div>
<div class="book" id="book2" style="display: none;" >
    <p>Hello</p>
    <a href="approved.php">View approved vehicles</a>


</div>

<div class="book" id="book3" style="display: none;" >
    <p>Hello</p>
    <a href="adcancel.php">View canceled vehicles</a>


</div>


<div class="book" id="vehicleman" style="display: none;" >
    <p>Hello</p>
    <a href="adminview.php">View vehicles </a>

</div>
<div class="book" id="pay" style="display: none;" >
    <p>Hello</p>
    <a href="#">View payment</a>


</div>






</div>



<script>
    var firstbtn=document.getElementById("firstbtn");
var book1=document.getElementById("book1");
var book2=document.getElementById("book2");
var book3=document.getElementById("book3");
firstbtn.addEventListener("click",function(){
    vehicleman.style.display="none";
    pay.style.display="none";
    book1.style.display="block";
    book2.style.display="block";
    book3.style.display="block";
    document.getElementById("maindiv").appendChild(book1);
    document.getElementById("maindiv").appendChild(book2);
    document.getElementById("maindiv").appendChild(book3);

});

var vehicle=document.getElementById("vehicle");
var vehicleman=document.getElementById("vehicleman");
vehicle.addEventListener("click",function(){
    book1.style.display="none";
    book2.style.display="none";
    pay.style.display="none";
    vehicleman.style.display="block";
    document.getElementById("maindiv").appendChild(vehicleman);
    
});

var payment=document.getElementById("payment");
var pay=document.getElementById("pay");
payment.addEventListener("click",function(){
    book1.style.display="none";
    book2.style.display="none";
    vehicleman.style.display="none";
    pay.style.display="block";
    document.getElementById("maindiv").appendChild(pay);
    
});





</script>
<style>
.book{
    width:250px;height:150px;
    border:1px solid black;display: none;
    background-color: red;
    

}

.maindiv{
    z-index: 2;
    height: 90vh;
    width: 72%;
    border: 1px solid red;
    background-color: aqua;
    gap:20px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}

</style>
</body>
</html>