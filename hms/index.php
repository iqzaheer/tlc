<?php
require_once("config.php");
        //print_r($_POST);
        if(isset($_POST['email']) && $_POST['password']){

       //  $email=$_post['emailvrify']
            
            echo "assadsad";
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if(!$con){
            die(" connection failed");
  
        }

        	$email = $_POST['email'];
           $password = $_POST['password'];
        
      

        $sql ="select * from admin where email='$email' and password = '$password'";

       // echo $sql;

        $rs = mysqli_query($con, $sql);

        //echo "asdasdasdasd";
         $count = mysqli_num_rows($rs);

         echo "Count---".$count;
        // $row = mysqli_fetch_array($rs);

        if($count == 1)
        {
            header('Location: dashboard.php');
        }
        else
        {
            echo "INvalid Credentials";
        }
           


        mysqli_query($con , $sql);


      // header('Location: index.php');


    }

?>



  <!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body style="background-color:lightgreen">
	<form method='post' action='index.php' style="text-align:center; margin:auto; margin-top:150px;border:1px solid ;width: 350px">
	
	
<div>
	<div colspan="2"><img src="img/logo.jpg"></div>
</div>
<div >
	<h1 >HOSPITAL MANAGEMENT SYSTEM</h1>
		<h1 style="background-color: green">USER LOGIN</h1>
</div>
	<!-- <div> -->
		<!-- <div><input type="button" name="sighn up" value="sighn up"></div> -->
	<!-- </div>  -->
<div>
	

</div>
<div>
	<div>  email <input type="text" id="email" name="email" placeholder="email type here"></br></br></div>

</div>

<div>
	<div>
password <input type="password" name="password" placeholder="password type here"></br></br>
	</div>
</div>
<div>
	<div><input type="submit" id="Log in" value="Log in">     
   <!-- <input type="button" name="exit" value="exit"></br></br></div> -->
</div>

</form>

  </body>
  </html>