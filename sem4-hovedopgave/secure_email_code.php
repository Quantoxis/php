<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["vname"]==""||$_POST["vmail"]==""||$_POST["subject"]==""||$_POST["message"]==""||$_POST["klub"]==""||$_POST["number"]==""){
echo "Udfyld venligst alle felter...";
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['vmail'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Ugyldig email!";
}
else{
$klub = $_POST['klub']; // denne linje sender navn på den angivne klub
$number = $_POST['number']; // denne linje sender telefon nummeret på afsender
$subject = $_POST['subject']; // denne linje sender navn på den nominerede som "emne" i modtagers mail
$message = $_POST['message']; // denne linje sender tekst besked i modtagers mail
$vmail = $_POST['vmail']; // denne linje sender afsenders email 
$vname = $_POST['vname']; // denne linje sender afsenders navn 
$headers = 'Afsenders navn: '. $vname . " - Afsenders email: " . $vmail . " - Afsenders klub: " . $klub . " - Afsenders tlf. " . $number; // sender alle disse parametrer til modtagers mail i emnefelt
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
mail("mchoffn@hotmail.com", $headers, $message, $subject);
	
	
	
$svar = "Tak vi har modtaget dit svar!";
	
echo "$svar";
}
}
}
?>