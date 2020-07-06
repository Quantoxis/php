<!doctype html>
<html>
<head>
<title>FeedBack Form With Email Functionality</title>
<link href="elements.css" rel="stylesheet">
</head>
<!-- Body Starts Here -->
<body>
<div class="container">
<!-- Feedback Form Starts Here -->
<div id="feedback">
<!-- Heading Of The Form -->
<div class="head">
<h3>Nomineringsblanket</h3>
<p>Udfyld denne blanket med din nominering</p>
</div>
<!-- Feedback Form -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form" method="post" name="form">
<input class="col-25 input-res" name="vname" placeholder="Dit navn" type="text" value="">
<input name="klub" placeholder="Din klub" type="text" value="">
<input name="number" placeholder="Dit telefonnummer" type="text" value="">
<input name="vmail" placeholder="Din email" type="email" value="">
<input name="subject" placeholder="Navn på den nominerede" type="text" value="">
	
<label>Your Suggestion/Feedback</label>
<textarea name="msg" placeholder="Type your text here..."></textarea>
<input id="send" name="submit" type="submit" value="Send Feedback">
</form>
<h3><?php include "secure_email_code.php"?></h3>
</div>
<!-- Feedback Form Ends Here -->
</div>
</body>
<!-- Body Ends Here -->
</html>
