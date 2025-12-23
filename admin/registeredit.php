<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Account</title>
    <style>
        body {
            background-image: url('https://static.vecteezy.com/system/resources/previews/004/487/827/non_2x/seamless-pattern-of-hairdressing-tools-scissors-combs-spray-rose-butterfly-beads-perfume-profile-of-a-girl-with-a-hairstyle-image-free-vector.jpg');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        p {
            text-align: right;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 50px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f1ecf3;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-top: 5px;
        }
        h1 {
            font-size: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Edit Customer Account</h1>
    <form action="../includes/edit_inc.php" method="post">
        <input name="id" value="<?=$_GET['id'];?>" hidden/>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?=$_GET['username'];?>"><br>
        <span class="error" id="username-error"></span>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?=$_GET['email'];?>"><br>
        <span class="error" id="email-error"></span>

        <label for="phone_number">Phone number:</label>
        <input type="tel" id="phone_number" name="phone_number" value="<?=$_GET['phone_number'];?>"><br>
        <span class="error" id="phone_number-error"></span>
        
        <input type="submit" name="submit" value="Update">
        <p><a href="customer_acc.php" class="button">Back --></a></p>
    </form>

    <script>
        // Simple client-side validation
        document.querySelector('form').addEventListener('submit', function(event) {
            var username = document.getElementById('username').value.trim();
            var email = document.getElementById('email').value.trim();
            var phoneNumber = document.getElementById('phone_number').value.trim();
            var errors = false;

            // Validate username
            if (username === '') {
                document.getElementById('username-error').innerText = 'Username is required.';
                errors = true;
            } else {
                document.getElementById('username-error').innerText = '';
            }

            // Validate email
            if (email === '') {
                document.getElementById('email-error').innerText = 'Email is required.';
                errors = true;
            } else if (!isValidEmail(email)) {
                document.getElementById('email-error').innerText = 'Invalid email format.';
                errors = true;
            } else {
                document.getElementById('email-error').innerText = '';
            }

            // Validate phone number
            if (phoneNumber === '') {
                document.getElementById('phone_number-error').innerText = 'Phone number is required.';
                errors = true;
            } else {
                document.getElementById('phone_number-error').innerText = '';
            }

            if (errors) {
                event.preventDefault(); // Prevent form submission if there are errors
            }
        });

        // Simple email validation function
        function isValidEmail(email) {
            // You can implement more sophisticated email validation if needed
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
</body>
</html>
