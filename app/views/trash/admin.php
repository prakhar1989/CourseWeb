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

 			{if($info['admin']==1)
			{
			
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel | Course Registration</title>
    <br>
    <a href="logout.php">Logout</a>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le styles -->
    <link rel="stylesheet" href="assets/css/custom.css" type="text/css" media="screen" charset="utf-8"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/img/favicon.png">
  </head>
  <body>
    <div class="header">
      <div class="container">
        <h1>COURSE REGISTRATION PORTAL</h1>
        <div class="iimc">
          <h2>IIM Calcutta</h2>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="page-header">
          <h3>Admin Area</h3>
        </div>

<?php
/*
print("<TABLE>");
print("<TR>");
print("<TD>"); 
echo "<select name=round>";
echo "<option size =30 selected>None</option>";
echo "<option selected>round1</option>"; 
echo "<option>round2</option>"; 
echo "<option>round3</option>"; 
echo "<option>special</option>"; 
//echo "<option>$course5</option>";
print("</TD>\n");
print("</TR>");
print("</TABLE>");
echo "<input type='submit' name='submit' value='submit'>";
echo "</form>";
print("</HTML>");
*/
 /*
echo "Please Select the course to get the students list";
print("<HTML>");
echo "<form action='stdreport.php' method='post'>";

print("<TABLE>");
print("<TR>");
print("<TD>"); 
echo "<select name=coursename>";
echo "<option size =30 selected>None</option>";
$query_string="select course from courseslist";
$result_id1 = mysql_query($query_string)
	or die("display_db_query:" . mysql_error());
while($row = mysql_fetch_row($result_id1)) 
{
echo "<option>".$row[0]."</option>"; 
	
}
print("</TD>\n");
print("</TR>");
print("</TABLE>");
echo "<input type='submit' name='submit5' value='GetStudents'>";
echo "</form>";
print("</HTML>");
 
*/ 
 
/*if(isset($_POST['SUBMIT1']))
{
     $fname = $_FILES['sel_file']['name'];
     
     $chk_ext = explode(".",$fname);
     
     if(strtolower($chk_ext[1]) == "csv")
     {
     
         $filename = $_FILES['sel_file']['tmp_name'];
         $handle = fopen($filename, "r");
    
         while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
         {
            $sql = "INSERT into courseslist(slot,course,seats) values('$data[0]','$data[1]','$data[2]')";
            mysql_query($sql) or die(mysql_error());
         }
    
         fclose($handle);
         echo "<HTML>";
         echo "Successfully Imported";
     echo "</HTML>";
     }
     else
     {
     	echo "<HTML>";
         echo "Invalid File";
     echo "</HTML>";
     }    
}*/
?>


  <!--  <form action='import.php' method='post'>

Import File : <input type='text' name='sel_file' size='20'>
    <input type='submit' name='submit1' value='submit1'>

</form>




<form action='download_test.php' method='post'>

<h1>Get Round Results</h1>
    <input type='submit' name='submit2' value='get'>

</form>

<form action='unlockall.php' method='post'>

<h1> Unlock All </h1>
    <input type='submit' name='submit4' value='unlock'>
</form>

<form action='opentobidding.php' method='post'>

<h1> Open Bid </h1>
    <input type='submit' name='submit4' value='OpenBid'>
</form>

 <form action='FailedBid.php' method='post'>
Course Name XY-123 : <input type='text' name='akj' size='20'>
List of Failed Bidders: <input type='text' name='sel_file' size='20'>
    <input type='submit' name='submit6' value='Import'>

</form>

<form action='createbackupcourseslist.php' method='post'>
<h1> Create CourseLists Backup </h1>
    <input type='submit' name='submit8' value='Backup Courseslist'>
</form>
</form>
<form action='createbackupusercourse.php' method='post'>
<h1> Create user_course Backup </h1>
    <input type='submit' name='submit9' value='Backup Bids'>
</form>
</form>
<form action='createbackupusers.php' method='post'>
<h1> Create users Backup </h1>
    <input type='submit' name='submit10' value='Backup Users'>
</form>
</form>
<form action='createbackupstatus.php' method='post'>
<h1> Backup Round Status </h1>
    <input type='submit' name='submit11' value='Backup Status'>
</form>
</form>
-->

		<div class="tiles span5">
          <form action="trial.php" method="post" accept-charset="utf-8" class="form-stacked">
            <fieldset>
              <div class="clearfix">
                <label for="roundSelect">Please Enter the Round</label>
                <div class="input">

        <!-- Form 1 -->
        
                  <select name="round">
                    <option>None</option>
                    <option selected>round1</option>
                    <option>round2</option>
                    <option>round3</option>
                    <option>special</option>
                  </select>
                </div>
              </div><!--clearfix-->
              <div class="actions">
                <input type="submit" name= "submit" class="btn" value="Submit"/>
              </div>
              </fieldset>
            </form>
          </div> 
          <!-- Form 1 -->
          
          <!-- Form 2 -->
          <div class="tiles span6">
            <form class="form-stacked" action="stdreport.php" method="post" accept-charset="utf-8">
              <fieldset>
              <div class="clearfix">
                <label for="roundSelect">Select course to get the list</label>
                <div class="input">
                  <select name="coursename">
                    <?php
					
					$query_string="select course from courseslist";
$result_id1 = mysql_query($query_string)
or die("display_db_query:" . mysql_error());
while($row = mysql_fetch_row($result_id1)) 
{
echo "<option>".$row[0]."</option>"; 
	
}
?>
                  </select>
                </div>
              </div><!--clearfix-->
                <div class="actions">
                  <input type="submit" name="submit5" class="btn" value="Get Students"/>
                </div>
              </fieldset>
            </form>
          </div> <!-- Form 2 -->

          <!--Import Form -->
          <div class="tiles span5">
            <form class="form-stacked" action="import.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
              <fieldset>
              <div class="clearfix">
                <label for="fileInput">Import File</label>
                <div class="input">
                

                  <input type="file" class="input-file" id="file" name="sel_file"  />
                </div>
              </div><!-- /clearfix -->
           <div class="actions">
                  <input type="Submit" name="submit1" class="btn" value="Import"/>
              </div>
            </fieldset>
            </form><!-- Import fIle form -->  
            
           <!-- <form action="import.php" method="post" enctype="multipart/form-data">
            <label for="file">Filename:</label>
            <input type="file" name="sel_file" id="file" /> 
             <br />
             <input type="submit" name="submit1" value="Import" />
                </form>-->
          </div> <!-- Form -->
        
        <!-- The Rest of the buttons -->
          <div class="tiles span5">
            <form class="form-stacked" action="download_test.php" method="post" accept-charset="utf-8">
              <fieldset>
              <div class="clearfix">
                <label for="fileInput">Round Results</label>
                <div class="input">
                

                  </div>
              </div><!-- /clearfix -->
              <div class="actions">
            <input type="submit" name="submit2" class="btn primary" value="Get Round Results"/>&nbsp;
              </div>
            </fieldset>
            </form><!-- Import fIle form -->
          </div> <!-- Form -->

          <div class="tiles span5">
            <form class="form-stacked" action="unlockall.php" method="post" accept-charset="utf-8">
              <fieldset>
              <div class="clearfix">
                <label for="fileInput">Student Lock</label>
                <div class="input">
                

                  </div>
              </div><!-- /clearfix -->
              <div class="actions">
            <input type="submit" name="submit4" class="btn primary" value="Unlock Students"/>&nbsp;
              </div>
            </fieldset>
            </form><!-- Import fIle form -->
          </div> <!-- Form -->
        
          <div class="tiles span5">
            <form class="form-stacked" action="OpentoBid.php" method="post" accept-charset="utf-8">
              <fieldset>
              <div class="clearfix">
                <label for="fileInput">Open Course for Bidding</label>
                <div class="input">
                

                  </div>
              </div><!-- /clearfix -->
              <div class="actions">
            <input type="submit" name="submit4" class="btn primary" value="Open Bidding"/>&nbsp;
              </div>
            </fieldset>
            </form><!-- Import fIle form -->
          </div> <!-- Form -->
        
          <div class="tiles span5">
            <form class="form-stacked" action="failedbid.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
              <fieldset>
              <div class="clearfix">
                <label for="fileInput">Failed Bidding</label>
                <div class="input">
                Course Name XY-123 : <input type='text' name='akj' size='20'>
                <br>
                <br>
<!--List of Failed Bidders: <input type='text' name='sel_file' size='20'>-->


            
                  <input type="file" class="input-file" id="file" name="sel_file"  />
          <!--      </div>
              </div><!-- /clearfix -->
          <!-- <div class="actions">
                  <input type="Submit" name="submit4" class="btn" value="Import"/>
              </div>
            </fieldset>-->






                  </div>
              </div><!-- /clearfix -->
              <div class="actions">
            <input type="submit" name="submit4" class="btn primary" value="Import"/>&nbsp;
              </div>
            </fieldset>
            </form><!-- Import fIle form -->
          </div> <!-- Form -->
        
        
 
          <div class="tiles span5">
            <form class="form-stacked" action="createbackupcourseslist.php" method="post" accept-charset="utf-8">
              <fieldset>
              <div class="clearfix">
                <label for="fileInput">Backup for Course Table</label>
                <div class="input">
                

                  </div>
              </div><!-- /clearfix -->
              <div class="actions">
            <input type="submit" name="submit4" class="btn primary" value="Backup Courses list"/>&nbsp;
              </div>
            </fieldset>
            </form><!-- Import fIle form -->
          </div> <!-- Form -->
          
          
          <div class="tiles span5">
            <form class="form-stacked" action="createbackupusercourse.php" method="post" accept-charset="utf-8">
              <fieldset>
              <div class="clearfix">
                <label for="fileInput">Users Bid Table Backup</label>
                <div class="input">
                

                  </div>
              </div><!-- /clearfix -->
              <div class="actions">
            <input type="submit" name="submit4" class="btn primary" value="Backup"/>&nbsp;
              </div>
            </fieldset>
            </form><!-- Import fIle form -->
          </div> <!-- Form -->
          
          
          <div class="tiles span5">
            <form class="form-stacked" action="createbackupusers.php" method="post" accept-charset="utf-8">
              <fieldset>
              <div class="clearfix">
                <label for="fileInput">Users Table Backup</label>
                <div class="input">
                

                  </div>
              </div><!-- /clearfix -->
              <div class="actions">
            <input type="submit" name="submit4" class="btn primary" value="Backup"/>&nbsp;
              </div>
            </fieldset>
            </form><!-- Import fIle form -->
          </div> <!-- Form -->
          
          
          <div class="tiles span5">
            <form class="form-stacked" action="createbackupstatus.php" method="post" accept-charset="utf-8">
              <fieldset>
              <div class="clearfix">
                <label for="fileInput">Backup Status</label>
                <div class="input">
                

                  </div>
              </div><!-- /clearfix -->
              <div class="actions">
            <input type="submit" name="submit4" class="btn primary" value="Backup"/>&nbsp;
              </div>
            </fieldset>
            </form><!-- Import fIle form -->
          </div> <!-- Form -->
 
 
 
 
 
        <form class = "form-stacked" action="unlockall.php" method="post">
            <fieldset>
           </fieldset>
 
		</form>
          </div>
            
          </div>
        </div>
          <!-- The Rest of the buttons -->
      <footer>
        <p>Internet Solutions Group &#9679; IIM Calcutta</p>
      </footer>
    </div> <!-- /container -->
  </body>

</html>
<?php


 
 echo "<a href=logout.php>Logout</a>";
 echo "<br>"; 

 			} 
else { 			
								
								{
									header("Location: login.php");
								}
 			 
 		}
		
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
