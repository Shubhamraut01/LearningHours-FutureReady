
<?php 

    $to_email = $_POST['to']; 
    $subject = "Otp"; 
    $body = "hcvbghd"; 
    $headers = "From: doleoutt@gmail.com"; 
 
    if (mail($to_email, $subject, $body, $headers)) { 

        echo "Email successfully sent to $to_email..."; 
    } else { 
        echo "Email sending failed..."; 
    
}