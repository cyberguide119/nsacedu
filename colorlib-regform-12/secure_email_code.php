<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["name"]==""||$_POST["email"]==""||$_POST["phone_number"]==""||$_POST["gre_score"]==""||$_POST["toefl_score"]==""||$_POST["eng_marks"]==""||$_POST["department"]==""||$_POST["course_type"]){
echo "Fill All Fields..";
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['email'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Invalid Sender's Email";
}
else{
$subject = 'Registration Form';
$headers = 'From: '. $email . "rn"; // Sender's Email
$headers .= 'Cc:'. $email . "rn"; // Carbon copy to Sender
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = '<html><body>';
			$message .= '<img src="http://css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Website Change Request" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
			$message .= "<tr><td><strong>Phone Number:</strong> </td><td>" . strip_tags($_POST['phone_number']) . "</td></tr>";
			$message .= "<tr><td><strong>GRE Score:</strong> </td><td>" . strip_tags($_POST['gre_score']) . "</td></tr>";
			$message .= "<tr><td><strong>TOEFL/IELTS Score:</strong> </td><td>" . $_POST['toefl_score'] . "</td></tr>";
			$message .= "<tr><td><strong>Engineering Marks:</strong> </td><td>" .$_POST['eng_marks'] . "</td></tr>";
			$message .= "<tr><td><strong>Department:</strong> </td><td>" .$_POST['department'] . "</td></tr>";
		    $message .= "<tr><td><strong>Which Course? </strong> </td><td?" .$_POST['course_type'] . "</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";

// Send Mail By PHP Mail Function
mail("yash119ambaskar@gmail.com", $subject, , $headers);
echo "Your mail has been sent successfuly ! Thank you for your feedback";
}
}
}
?>