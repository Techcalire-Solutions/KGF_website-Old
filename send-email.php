<?php

$errors = [];

if (!empty($_POST)) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
 
  if (empty($name)) {
      $errors[] = 'Name is empty';
  }

  if (empty($email)) {
      $errors[] = 'Email is empty';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Email is invalid';
  }

  if (empty($message)) {
      $errors[] = 'Message is empty';
  }

  if (empty($errors)) {
    $to = 'anupamav08@gmail.com'; // Your email address
    $subject = 'New Message from Contact Form';
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $body, $headers)) {
        echo 'Email sent successfully';
    } else {
        echo 'Email sending failed';
    }
  } else {
    foreach ($errors as $error) {
      echo '<p>' . $error . '</p>';
    }
  }
}
?>
