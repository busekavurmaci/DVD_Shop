<html>
<head>
    <!-- JAVASCRIPT PART  -->
    <script>
        // NAME AND SURNAME VALIDATION ------------------------------------------------------------
function dvdOK(){
    var name = document.getElementById('name');
    if (name.value.length == 0)
        {
        alert("Select a DVD, please");
        return false;
        }
return true;
    }
// LAST CHECK FUNCTION ------------------------------------------------------------
function checkForm(){
    if (dvdOK() == false)
        {
        return;
        }
        document.getElementById("dvdForm").submit();
    }
    </script>
</head>

<body style="background-color: aliceblue; font-family: sans-serif;">
    <div id="ReturnFirst">
        <img style="margin: 20px; float: left; width: 10%;" src="http://www.pngmart.com/files/5/Movie-PNG-Transparent-Image.png" alt="DVD Shop">
        <p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; margin: 25px; padding: 5px; font-size: 35px;"><b>DVD STORE</b></p>
        <p style="font-family: cursive;">The Only Site Where You Can Find DVDs Of All The Greatest Movies</p>
    </div>
    <br><hr><br><br><br><br><br>

<!-- DVD LIST  -->
<div style="border-style: solid; border-width:thin; width: 25%; height: auto; padding-left: 20px; margin-left: 15px; ">
    <h4>DVD LIST</h4>
    <ol>
        <li>The Lord of the Rings</li>
        <li>Titanic</li>
        <li>Blade Runner</li>
        <li>Superman</li>
        <li>Inception</li>
        <li>Avatar</li>
        <li>The Lion King</li>
        <li>Amelie</li>
        <li>The Matrix</li>
        <li>Forrest Gump</li>
        <li>The Shawshank Redemption</li>
        <li>The Godfather</li>
    </ol>
</div>
<br>
<h3>&emsp;&emsp;&emsp;SELECT DVD</h3>
<!-- -------------- PHP PART ---------------------- -->
<?php
try
{
/*** connect to SQLite database ***/
$db = new PDO('sqlite:hw5_dvdShop.db');

$userName = $_POST['userName']; 
$userSurname = $_POST['userSurname']; 
$email = $_POST['email']; 

//Insert record  
$db->exec("INSERT INTO USERS (userName,userSurname, email) VALUES ('$userName', '$userSurname', '$email');");

//now output the data to a simple html table
print "<table border=1>";
// Print only the last person's information 
$result = $db->query('SELECT * FROM USERS ORDER BY ROWID DESC LIMIT 1');
foreach($result as $row)
{
print "<tr>";
print "<td>".$row['userName']."</td>";

print "<td>".$row['userSurname']."</td>";
print "<td>".$row['email']."</td>";
print "<tr>";
}

// ----------------------------

/*** close the database connection ***/
$db = NULL;
}
catch(PDOException $e)
{
print 'Exception : ' .$e->getMessage();
}

?>
<!-- -------------- END OF THE PHP PART ---------------------- -->

<!-- --------------------------------------------------------------- -->
<!-- Taking a DVD from Database  -->
<div>
<form action="http://127.0.0.1/Buse_HW5/buyDVD.php" method="get" name="dvdForm" id="dvdForm">
    <br>
 <p>Please input DVD name: <input type="text" name="name" id="name"/></p>

 <p><input style="background-color:  rgb(154, 182, 207); border-radius: 15px; width: 170px; height: 40px;" type="button" value="ADD DVD TO CART" onclick="checkForm()" /></p>
</form>
</div>
<br>
<h3>&emsp;&emsp;&emsp;CUSTOMER INFORMATION</h3>
<br>
<!-- --------------------------------------- -->

</body>
</html>





