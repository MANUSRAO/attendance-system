<?php
session_start();
    //Connect to database
    require'connectDB.php';
//**********************************************************************************************
    
    //Get current date and time
    date_default_timezone_set('Asia/Damascus');
    $d = date("Y-m-d");

    $Tarrive = mktime(01,15,00);
    $TimeArrive = date("H:i:sa", $Tarrive);
//**********************************************************************************************   
    $Tleft = mktime(02,30,00);
    $Timeleft = date("H:i:sa", $Tleft);

    if (!empty($_POST['seldate'])) {
        $seldate = $_POST['date'];
    }
    else{
        $seldate = $d;
      }

    $_SESSION["exportdata"] = $seldate;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users Logs</title>
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    setInterval(function(){
      $.ajax({
        url: "load-users.php"
        }).done(function(data) {
        $('#cards').html(data);
      });
    },3000);
  });
</script>
<style>
body {background-image:;background-repeat:no-repeat;background-attachment:fixed;
	  background-position: top right;
	  background-size: cover;}
.head{
  display:flex;
  flex-direction:row;
  justify-content:space-around;
}
.head a{
  text-decoration:none;
  font-size:1.5rem;
}
.head a:hover{
opacity: 0.8;
}
.body1{
  display:flex;
  flex-direction:row;
  justify-content:space-around;
}
.body1  #inp{padding:3px;margin:0px 0px 0px 33px;background-color:#338BCB;font-size:16px;color:white;border-color:white;}
header .opt input {padding-left:5px;margin:2px 0px 3px 20px;border-radius:7px;border-color: #A40D0F ;background-color:#338BCB; color: white;}
.export {margin: 0px 0px 10px 20px; background-color:#338BCB ;border-radius: 7px;width: 145px;height: 28px;color: #FFFFFF; border-color: #581845;font-size:17px}
.export:hover {cursor: pointer;background-color:#338BCB} 
#table {
    font-family:sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#table td, #table th {
    border: 1px solid #000000;
    padding: 8px;
     opacity:1;
}

#table tr:nth-child(even){background-color: #f2f2f2;}
#table tr:nth-child(odd){background-color: #f2f2f2;opacity: 0.9;}

#table tr:hover {background-color: #ddd; opacity: 0.8;}

#table th {
	 opacity: 0.9;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4897D0;
    color: white;
}
</style>
<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>
<header >

	<div class="head">
  <a href="http://localhost/loginsystem/#"><img src="image/logo_0.png" width="80" height="80"></a> 
		<h1 style="font-family:sans-serif">RV College Attendance System</h1>
    <a href="AddCard.php">Add a new User
                      <img src="image/add.png" style="margin:10px 20px -5px 10px" width="30" title="Add"></a>
                     
                      
	</div>	        

	<div class="opt">
		<table border="0">
			<tr>
				<td></td>
				<td>
				</p></td>
			</tr>
		</table>
	</div>
</header>
<div class="body1">
<h2 style="margin-left: 15px;">
  Time to arrive :<?php echo $TimeArrive?><br>
  Time to leave :<?php echo $Timeleft?>
</h2>
<div class="head1" style="text-align:left;">
<p style="font-size:20px;">Select the date log:
				<form method="POST" action="">
					<input type="date" name="date"><br>
					<input type="submit" name="seldate" value="Select Date" id="inp">
				</form>    
                     </div>


</div>

<form method="post" action="export.php">
  <input type="submit" name="export" class="export" value="Export to Excel" />
</form>
<div id="cards" class="cards">
</div>
</body>
</html>
