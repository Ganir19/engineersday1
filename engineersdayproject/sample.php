<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        /* Styling for the button */
        #showFormButton {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        /* Styling for the form */
        #contactForm {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <button id="showFormButton">Contact Us</button>

    <div id="contactForm">
        <h2>Contact Us</h2>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea><br>

            <button type="submit" name="submit">Submit</button>
        </form>
        <button id="closeFormButton">Close</button>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        // Send an email (you need to configure your mail server settings)
        $to = 'admin@example.com'; // Replace with the admin's email address
        $subject = 'New Contact Form Submission from ' . $name;
        $messageBody = "Name: $name\nEmail: $email\nMessage: $message";
        $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $messageBody, $headers);
    }
    ?>

    <script>
        // JavaScript to toggle the visibility of the form
        const showFormButton = document.getElementById("showFormButton");
        const contactForm = document.getElementById("contactForm");
        const closeFormButton = document.getElementById("closeFormButton");

        showFormButton.addEventListener("click", () => {
            contactForm.style.display = "block";
        });

        closeFormButton.addEventListener("click", () => {
            contactForm.style.display = "none";
        });
    </script>
</body>
</html>
