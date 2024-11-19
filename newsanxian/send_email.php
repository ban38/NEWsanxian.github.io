<?php
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Your email address
$your_email = 'a0973369873@gmail.com';

// Email subject for admin notification
$subject_to_you = "New message from your website";

// Email body for admin notification
$body_to_you = "Name: $name\nEmail: $email\nMessage:\n$message";

// Send email to you
mail($your_email, $subject_to_you, $body_to_you, "From: $email");

// Confirmation subject for the commenter
$subject_to_visitor = "Thank you for your message";

// Confirmation body for the visitor
$body_to_visitor = "Hello $name,\n\nThank you for reaching out! We have received your message:\n\n$message\n\nBest regards,\nYour Website Team";

// Send confirmation email to the commenter
mail($email, $subject_to_visitor, $body_to_visitor, "From: $your_email");

echo "Thank you for your message!";