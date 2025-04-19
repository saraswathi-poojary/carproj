

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin view</title>
    <link href="userview1.css" type="text/css" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=menu" />
</head>
<body>

    <div class="nav">
        <!-- <a href="vehicle1.php">HOME</a> -->
        <a href="MyBook.php">MyBook</a>
        <a href="logout.php">Logout</a>
        <a href="userview.php">My Payment</a>
        <form action="" method="post"> from date  <input type="date" name="from_d" > &nbsp;
         <input type="date" name="to_d" > &nbsp; <input type="submit" value="search" name="search">
         &nbsp; &nbsp;  
        </form>
     
      

&nbsp;  
    </div>
   
    <div class="vehiclecard">
    
    <?php
    session_start();
    $useremail=$_SESSION["email"];
    
   
    $conn=mysqli_connect("localhost","root","","rental_system");
    if(!$conn){
        die("not connected");
    }
    
    if(isset($_POST['search'])){
       
        
        if(!empty($_POST['from_d'])and (!empty($_POST['to_d']))){
             
        $curent=new DateTime();
        $cur_date=$curent->format('y-m-d');
        $from_d=date('y-m-d',strtotime($_POST['from_d']));
        $to_d=date('y-m-d',strtotime($_POST['to_d']));
       
        if(($cur_date>$from_d)||($cur_date>$to_d)||($from_d>$to_d)){
            // echo "invalid";
            //$msg="from date and current date should be greter than  or euqals to current date  "."<br>"."to date should be greater that or equals to from date" ;

            $msg="from date and To date should be greter than  or euqals to current date "."\\n"."To date should be greater that or equals to from date";
            echo "<script>alert('$msg'); window.location.href='userview.php';</script>";


           
        }
        else{

        
        $qry="select cd.* from cardetails cd where cd.carid not in( select b.carid from book b where b_status='procesing' and
        ((from_d<='$from_d' and to_d>='$to_d') or (from_d<='$from_d' and to_d>='$to_d') or (from_d>='$from_d' and to_d<='$to_d')  ) )";
    
        $result=mysqli_query($conn,$qry);
    
      

    
    while($row =$result->fetch_assoc()){
    
    ?>

    <!-- <div class="card"> -->
       <form action="bookcar.php" method="POST" class="card">
        <div class="innercard1">
            <img src="uploadimages/<?php echo $row['carimg']  ?>" alt="">
        </div>
           
        <div class="innercard2">
            <p class="carname"><span class="start"><?php echo $row['carmodel'] ?></span><span class="end">$<?php echo $row['price']?>/day</span></p>
            <p class="carname">Year : <?php echo $row['myear']?> </p>
            <p class="carname">Fuel type : <?php echo $row['fueltype']?> </p>
            <p class="carname">Location : <?php echo $row['location1']?>
            <input type="text" value="<?php echo $from_d?>" name="fromval" style="display:none;" >
            <input type="text" value="<?php echo $to_d?>" name="toval" style="display:none;">
            <input type="text" value="<?php echo $row['carid']?>" name="caridval" style="display:none;">
            <button name="btn"  id="<?php echo $row['carid']?>"  >View</button></p>
        </div>
        
       
        </form>
   
    <?php
    }
      }
    }
    else{
        echo "<script>alert('Choose From date and To date');</script>";
        echo "<script>window.location.href='userview.php'</script>";
    }
}

    ?>


    </div>

   
    

    
    


   
</body>
</html>