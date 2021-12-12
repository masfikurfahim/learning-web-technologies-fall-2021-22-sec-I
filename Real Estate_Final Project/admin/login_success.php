               <?php session_start(); 
				ob_start();
				$host="localhost";         
				$username="root";        
				$password="";             
				$db_name="property";      
				$tbl_name="admin";    
				
				
				$mysqli = new mysqli("$host", "$username", "$password")or die("cannot connect");
				$mysqli->select_db("$db_name")or die("cannot select DB");
				
				
				$myusername=$_POST['myusername'];
				$mypassword=$_POST['mypassword'];
				
				
				
				$myusername  =  stripslashes($myusername);
				$mypassword  =  stripslashes($mypassword);
				$myusername  =  $mysqli->real_escape_string($myusername);
				$mypassword  =  $mysqli->real_escape_string($mypassword);
				
				$sql="SELECT * FROM admin WHERE myusername= '$myusername'  and  mypassword= '$mypassword'";
				
				$result=$mysqli->query($sql);
				
				
				$count=$result->num_rows;
				
				
				if($count==1){
				
$_SESSION['myusername']=$myusername;
$_SESSION['mypassword']=$mypassword;
session_start();
header("location:admin_home.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>