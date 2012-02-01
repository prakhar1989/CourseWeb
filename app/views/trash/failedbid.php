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


 $table    = "courseslist";
 echo $_POST['sel_file']['name'];
 $fileName = $_POST['sel_file']['name'];
  //$fileName=str_replace("\\\\","\\",$fileName);
  //echo $fileName;
  $tmpName = $_FILES['sel_file']['tmp_name'];
  echo $tmpName;
$ignoreFirstRow = 1;
if (($handle = fopen($tmpName, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        //if($ignoreFirstRow != 10)
        //{
        $student_name=$data[0];
        echo $_POST['akj'];
       
        $course_name=$_POST['akj'];
        
        echo $student_name;
		echo $_POST['akj'];
        
            $sql="Select `".$course_name."` from user_course where user_name=\"".$student_name."\"";
                       
            $result_id1=mysql_query($sql) or die(mysql_error());
            $data=mysql_fetch_row($result_id1);
            $sql="Update users12 SET TotalBidSpent=TotalBidSpent-$data[0] where username=\"".$student_name."\"";
            mysql_query($sql) or die(mysql_error());
            $sql="Update users12 SET `lock`=0 where username=\"".$student_name."\"";
            mysql_query($sql) or die(mysql_error());
            
            $sql="Update user_course SET `".$course_name."`=0 where user_name=\"".$student_name."\"";
            mysql_query($sql) or die(mysql_error());
            
            
            $sql="Select credit from courseslist where course=\"".$course_name."\"";
            $result_id1=mysql_query($sql) or die(mysql_error());
            $data=mysql_fetch_row($result_id1);
            
            
            $sql="Update users12 SET term4=term4-$data[0] where username=\"".$student_name."\"";
            mysql_query($sql) or die(mysql_error());
            
            
            
            
            //$sql = "";
    // }
        //$ignoreFirstRow++;
    }
    fclose($handle);
  header("Location: login.php");
}

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
