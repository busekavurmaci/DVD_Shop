<html>
    <head>
        <script>
// Card Type ------------------------------------------------------------
function CardTypeOK() {  
            if(document.getElementById('CreditCartType1').checked) { 
                return true;
            }
            if(document.getElementById('CreditCartType2').checked) { 
                return true;
            }
            else { 
                alert("Please select the credit card type."); 
                return false;
            } 
        } 
// Name on Card ------------------------------------------------------------
function NameOnCardOK(){
    var NameOnCard = document.getElementById('NameOnCard');
    if (NameOnCard.value.length == 0)
        {
        alert("Enter the name on card, please");
        return false;
        }
}
// Card Security Code ------------------------------------------------------------
function CardSecurityCodeOK(){
var CardSecurityCode = document.getElementById('CardSecurityCode');
if(CardSecurityCode.value.length != 3){
    alert("Please enter the 3 digit Card Security Code");
    return false;
}
if (isAllDigits(CardSecurityCode.value) == false)
        {
        alert("Invalid character in Card Security Code. Please re-enter.");
        return false;
        }
        return true;
}
// Credit Card Number ------------------------------------------------------------
function validateCreditCardNumber(){
var CreditCardNumber1 = document.getElementById('CreditCardNumber1');
var CreditCardNumber2 = document.getElementById('CreditCardNumber2');
var CreditCardNumber3 = document.getElementById('CreditCardNumber3');
var CreditCardNumber4 = document.getElementById('CreditCardNumber4');
    
    if (CreditCardNumber1.value.length != 4)
        {
        alert("The credit card number is not completely filled out");
        return false;
        }
    if (CreditCardNumber2.value.length != 4)
        {
        alert("The credit card number is not completely filled out");
        return false;
        }
    if (CreditCardNumber3.value.length != 4)
        {
        alert("The credit card number is not completely filled out");
        return false;
        }
    if (CreditCardNumber4.value.length != 4)
        {
        alert("The credit card number is not completely filled out");
        return false;
        }
    if (isAllDigits(CreditCardNumber1.value) == false)
        {
        alert("The credit card number contains invalid characters");
        return false;
        }
    if (isAllDigits(CreditCardNumber2.value) == false)
        {
        alert("The credit card number contains invalid characters");
        return false;
        }
    if (isAllDigits(CreditCardNumber3.value) == false)
        {
        alert("The credit card number contains invalid characters");
        return false;
        }
    if (isAllDigits(CreditCardNumber4.value) == false)
        {
        alert("The credit card number contains invalid characters");
        return false;
        }
    return true;
    }
    // EXPIRATION DATE ------------------------------------------------------------
function dateOK(){
        var ExpirationMonth = document.getElementById('ExpirationMonth');
        var ExpirationYear = document.getElementById('ExpirationYear');
        
    if (ExpirationMonth.value.length == 0)
        {
        alert("You must fill in the expiration date");
        return false;
        }
    if (isDigit(ExpirationMonth.value.substring(0,1)) == false)
        {
        alert("Expiration date should be numeric");
        return false;
        }
    var eMonth = parseInt(ExpirationMonth.value, 10);
    if (eMonth < 1 || 12 < eMonth)
        {
        alert("Expiration date is out of range");
        }
    if (ExpirationYear.value.length == 0)
        {
        alert("You must fill in the expiration date");
        return false;
        }
    if (isDigit(ExpirationYear.value.substring(0,1)) == false)
        {
        alert("Expiration date should be numeric");
        return false;
        }
    var eYear = parseInt(ExpirationYear.value, 10);
    if (eYear < 50)
        {
        eYear += 2000;
        }
    else
        {
        eYear += 1900;
        }
    var today = new Date(); // get today's date
    var thisYear = 1900 + today.getYear();
    var thisMonth = 1 + today.getMonth();
    if (eYear < thisYear)
        {
        alert("Your credit card seems to have expired");
        return false;
        }
    if (thisYear < eYear)
        {
        return true;
        }
    if (eMonth < thisMonth)
        {
        alert("Your credit card seems to have expired");
        return false;
        }
    if (thisMonth < eMonth)
        {
        return true;
        }
    alert("Your credit card has expired or is about to expire");
    return false;
    }

// LAST CHECK FUNCTION ------------------------------------------------------------
function checkForm(){
    if (CardTypeOK() == false)
        {
        return;
        }
    if (NameOnCardOK() == false)
        {
        return;
        }
    if (CardSecurityCodeOK() == false)
        {
        return;
        }
    if (validateCreditCardNumber() == false)
        {
        return;
        }
    if (dateOK() == false)
        {
        return;
        }
        document.getElementById("salesForm").submit();
    }
        </script>
    </head>
    <!-- --------------------------------------------------------------- -->
    <body style="background-color: aliceblue; font-family: sans-serif;">
<br><br>
<h3>&emsp; &emsp;&emsp;SELECTED DVD</h3>
<br>
&emsp; &emsp;
<?php
try {
    /*** connect to SQLite database ***/
    $dbh = new PDO("sqlite:hw5_dvdShop.db");
//echo("ok");
if(isset($_GET['name'])){
$name=$_GET['name'];
$sql = "SELECT * FROM DVD where name='".$name."'";
}
else $sql = "SELECT * FROM DVD";
    foreach ($dbh->query($sql) as $row)
        {
        print 'DVD '.$row['id'] ." = ".$row['name']." | Director= ".$row['director']." | Genre= ".$row['genre']. " | Price= ". $row['price'].'";<br>';
		}

    /*** close the database connection ***/
    $dbh = null;
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
<!-- --------------------------------------------------------------------- -->
<!-- SALES FORM  -->
<br><br><br>
<div style="margin: auto; width: 90%;">
        <form action="arabul.al.com" method="GET" name="salesForm" id = "salesForm">
        <table border="1" style="text-align:center; border-collapse: collapse; border-style: solid; border: black ; padding: 10px; ">
        <tr style="background-color: #bbdefb;">
                <td rowspan="2" style="padding: 10px;"><b>BUY NOW!</b></td>
                   <td style="padding: 10px;">Credit Card: 
                   <input type="radio" name="CreditCartType" id="CreditCartType1" value="VISA">VISA
                   <input type="radio" name="CreditCartType" id="CreditCartType2" value="MasterCard">MasterCard</td> 
                   <td style="padding: 10px;">Name on Card: <input type="text" name="NameOnCard" id="NameOnCard"></td>
                   <td style="padding: 10px;">Card Security Code: 
                    <input type="text" name="CardSecurityCode" id="CardSecurityCode" size="3" placeholder="_ _ _" style="text-align: center;">
                </td>
            </tr>
            <tr style="background-color:#bbdefb;">
                <td colspan="2" style="padding: 10px;">Card number:
                    <input type="text" name="CreditCardNumber1" id="CreditCardNumber1" size="4">
                    <input type="text" name="CreditCardNumber2" id="CreditCardNumber2" size="4">
                    <input type="text" name="CreditCardNumber3" id="CreditCardNumber3" size="4">
                    <input type="text" name="CreditCardNumber4" id="CreditCardNumber4" size="4"></td>
                <td style="padding: 10px;">Expiration Date: 
                    <input style="text-align: center;" type="text" name="ExpirationMonth" id="ExpirationMonth" size="2" placeholder="_ _"> /
                    <input style="text-align: center;" type="text" name="ExpirationYear" id="ExpirationYear" size="2" placeholder="_ _"></td>
            </tr>
            <tr>
                <td colspan="4" style="background-color: #c0c9e8; padding: 10px;"><b>Your order will be sent to your address as soon as possible. Thank you for ordering.</b></td>
            </tr>
        </table>
        <br><br>
    
        <div style="margin: auto; width:50%; height: auto; ">
        <input style="background-color:  rgb(154, 182, 207); border-radius: 15px; width: 80px; height: 30px;" type="button" value="BUY IT" onclick="checkForm()"> &emsp13;&emsp13;&emsp13;
        <input style="background-color:  rgb(154, 182, 207); border-radius: 15px; width: 80px; height: 30px;" type="reset" name="reset" value="CLEAR">
    </div>
    </form>
        <br><br>
<!-- --------------------------------------------------------------------- -->
    </body>
</html>
