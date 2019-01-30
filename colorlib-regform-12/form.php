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
		    $message .= "<tr><td><strong>Which Course? </strong> </td><td>" .$_POST['course_type'] . "</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";

// Send Mail By PHP Mail Function
mail("yash119ambaskar@gmail.com", $subject, $headers);
echo "Your mail has been sent successfuly ! Thank you for your feedback";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <div class="container">
            <form method="POST" class="appointment-form" id="appointment-form">
                <h2>education appointment form</h2>
                <div class="form-group-1">
					<input type="text" name="name" id="name" placeholder="Your Full Name" required />
					<input type="email" name="email" id="email" placeholder="Email" required />
					<input type="number" name="phone_number" id="phone_number" placeholder="Phone number" required />
                    <input type="text" name="gre_score" id="gre" placeholder="GRE Score" required />
					<input type="text" name="toefl_score" id="toefl" placeholder="TOEFL/IELTS Score" />
					<input type="text" name="eng_marks" id="engineering" placeholder="Engineering Score (Grades)" />
					
					<div class="select-list">
                        <select name="department" id="department">
                            <option selected value="">Engineering Department?</option>
                            <option value="civil">Civil Engineering</option>
                            <option value="elec_comm">Electronics and Communication Engineering</option>
							<option value="electrical">Electrical Engineering</option>
							<option value="it">Information Technology Engineering</option>
							<option value="compscience">Computer Science</option>
                        </select>
                    </div>
					<div class="select-list">
                        <select name="course_type" id="course_type">
                            <option selected value="">Which Course?</option>
                            <option value="">By email</option>
							<option value="">By email</option>
							<option value="">By email</option>
							<option value="">By email</option>
							<option value="">By email</option>
                        </select>
                    </div>
				</div>
                
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="Request an appointment" />
                </div>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
