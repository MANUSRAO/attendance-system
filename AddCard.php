<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add a new User</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    setInterval(function(){
      $.ajax({
        url: "add-users.php"
        }).done(function(data) {
        $('#User').html(data);
      });
    },3000);
  });
</script>
<style type="text/css">
body {}
header{
  display:flex;
  flex-direction:row;
  justify-content:space-evenly;
  align-items:center;
}
header .head h1 {
  font-family:sans-serif;text-align:center;color:#000000; 

  }
header .head img {
  
  }
header a {
  text-decoration: none;font-size:25px;color:black; 
  }
a:hover {opacity: 0.8;cursor: pointer;}
.bod {background-color:#ddd; opacity: 1;width:100%;height:270px;padding-bottom:20px;line-height:1rem}
.opt {float: left;margin: 20px 80px 0px 20px;}
.opt input {padding:4px 0px 2px 6px;margin:4px;border-radius:0px;background-color:#ddd; color: black;font-size:16px;border-color: black}
.opt p {text-align: left;font-size:19px;color:#f2f2f2;}
.opt label {color:black;font-size:23px}
.opt label:hover {color:red;opacity: 0.8;cursor: pointer;}
.opt table tr td {font-size:19px;color:black;}
.opt #lo {padding:4px 8px;margin-left:28px;background-color:#338BCB;border-radius:7px;font-size:15px}
.opt #up {padding:4px 8px;margin-left:28px;background-color:#338BCB;border-radius:7px;font-size:15px}
#lo:hover{opacity: 0.8;cursor: pointer;background-color:red}
#up:hover{opacity: 0.8;cursor: pointer;background-color:green}

.car {font-family:cursive;font-size:19px;padding-top: 45px;margin: 10px}

.op input {background-color:#ddd; color: black;font-size:16px;padding-left:5px;margin:18px 0px 0px 10px;border-color:black}
.op button {margin:7px 0px 5px 82px}
.op button:hover {cursor: pointer;}

#table {font-family:sans-serif;border-collapse: collapse;width:100%;}
#table td, #table th {border: 1px solid #ddd;padding: 8px;opacity: 0.6;}
#table tr:nth-child(even){background-color:#338BCB;}
#table tr:nth-child(odd){background-color: #338BCB;opacity: 0.9;}
#table tr:hover {background-color: #ddd; opacity: 0.8;}
#table th {opacity: 0.9;padding-top: 12px;padding-bottom: 12px;text-align: left;background-color:#338BCB;color: white;}
   
</style>
<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>
  <header>
  
     
     <a href="http://localhost/loginsystem/#"><img src="image/logo_0.png" width="80" height="80"></a> 
      <h1>RV College Attendance System</h1>
      
    <a href="view.php">Attendance Log</a>
  
    
  </header>
<div class="bod">

    <div class="opt">
        <form action="user_insert.php" method="POST" >
        	<table>
        		<tr>
        			<td>Name :</td>
        			<td><input type="text" placeholder="User Name" name="Uname" required></td>
        		</tr>
        		<tr>
        			<td>Number :</td>
        			<td><input type="text" placeholder="Serial Number" name="Number"></td>
        		</tr>
        		<tr>
        			<td style="cursor:pointer;">Gender :</td>
        		    <td><input type="radio" name="gender" value="Female" required /><label >Female</label >
              <input type="radio" name="gender" value="Male" required /><label>Male</label ></td>
        		</tr>
        		<tr>
            	    <td><input type="submit" value="Add" name="login" id="lo"></td>
                  <td><input type="submit" value="Update" name="update" id="up"></td>
           		 </tr>
        	</table>
        </form>

      <div class="op">
        <form method="POST" action="user_insert.php">
          <label style="font-size:19px;">Options:</label>
            <input type="text" name="CardID" placeholder="Card ID"><br>
            <button type="submit" name="del" style="border:none;background: none;" title="Remove"><img src="image/del.png" width="25" ></button>
            <button type="submit" name="set" style="border:none;background: none;" title="Select"><img src="image/set.png" width="30" ></button>
        </form>  
      </div>

    </div>

    <div class="car">
      <?php 
        if (isset($_GET['error'])) {
          if ($_GET['error'] == "SQL_Error") {
             echo '<label style="color:red">SQL Error!</label>'; 
          }
          else if ($_GET['error'] == "Nu_Exist") {
             echo '<label style="color:red">The Number is already taken!</label>'; 
          }
          else if ($_GET['error'] == "No_SelID") {
             echo '<label style="color:red">There is no selecting card!</label>'; 
          }
          else if ($_GET['error'] == "No_ExID") {
             echo '<label style="color:red">This card does not exist!</label>'; 
          }
        }
        else if (isset($_GET['success'])) {
          if ($_GET['success'] == "registerd") {
            echo '<label style="color:green;">The Card has been added</label>';
          }
          else if ($_GET['success'] == "Updated") {
            echo '<label style="color:green;">The Card has been Updated</label>';
          }
          else if ($_GET['success'] == "deleted") {
            echo '<label style="color:green;">The Card has been Deleted</label>';
          }
          else if ($_GET['success'] == "Selected") {
            echo '<label style="color:green;">The Card has been selected</label>';
          }
        }
      ?> 
    </div>

</div>


<div id="User"></div>

</body>
</html>
