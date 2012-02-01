<?php 
ob_start();
 // Connects to your Database 

 include ("config.php");
$host = $dbhost;
$db = $dbname;
$dbuser1 = $dbuser;
$password = $dbpasswd;


mysql_connect($host, $dbuser1, $password) 
or die(mysql_error()); 
mysql_select_db($db) 
or die(mysql_error());

 
 //checks cookies to make sure they are logged in 

 if(isset($_COOKIE['ID_my_site'])) 

 { 

 	$username = $_COOKIE['ID_my_site']; 

 	$pass = $_COOKIE['Key_my_site']; 

 	 	$check = mysql_query("SELECT * FROM users12 WHERE username = '$username'")or die(mysql_error()); 

 	while($info = mysql_fetch_array( $check )) 	 

 		{ 

 

 //if the cookie has the wrong password, they are taken to the login page 

 		if ($pass != $info['password']) 

 			{ 			header("Location: login.php"); 

 			} 

 

 //otherwise they are shown the admin area	 

 	else 

 			{ 

 			 echo "yes";
  $table    = "courseslist";
  echo $_POST['sel_file'];
  $fileName = $_POST['sel_file'];
  $tmpName = $_FILES['sel_file']['tmp_name'];
  //upload directory  
    //$upload_dir = "csv_dir/";  
  
    //create file name  
    $file_path = $upload_dir . $_FILES['sel_file']['name'];  
  
    //move uploaded file to upload dir  
    //if (!move_uploaded_file($_FILES['sel_file']['tmp_name'], $file_path)) {  
  
        //error moving upload file  
      //  echo "Error moving file upload";  
  
   // }  
  
  
  echo $fileName;
  echo $file_path;
$ignoreFirstRow = 1;
if (($handle = fopen($tmpName, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        //if($ignoreFirstRow != 10)
        //{
            $sql = "insert into ".$table."(slot,course,seats) values(";
            $sql .= '"'.implode('","',$data).'"';
            echo "".$sql.');';
            $sql.=');';
            echo "no";
            mysql_query($sql) or die(mysql_error());
            //$sql = "";
    // }
        //$ignoreFirstRow++;
    }
    fclose($handle);
  header("Location: login.php");
}
 			 echo "Admin Area<p>";
 			 echo $username; 

 echo "Your Content<p>"; 

 echo "<a href=logout.php>Logout</a>"; 

 			} 

 		} 

 		} 

 else 

 

 //if the cookie does not exist, they are taken to the login screen 

 {			 

 header("Location: login.php"); 

 } 

ob_end_flush();
?> 