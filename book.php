<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="book.css">
</head>
<style>
    .container{
       background-color :#f7dcee;
    }
body {
    background-image: url('https://us.123rf.com/450wm/juliaemelianova/juliaemelianova2101/juliaemelianova210100065/162777587-seamless-pattern-manicure-tools-on-a-pink-background-vector-illustration-hand-drawing-manicure-tools.jpg?ver=6');
    background-size: auto;
    background-repeat: repeat; /* Adjust repeat if needed */
    background-position: center; /* Center the background image */
}
</style>
<body>
    <section id="header" class="header">
        <a href="#" class="logo">HEY!GIRL'S</a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="service.php">Services</a>
            <a href="contact.php">Contact Us</a>
           
            <?php
            session_start();
            if(isset($_SESSION['user_id'])){
            
               echo '<a href="booking_history.php">Booking history</a>';
               echo '<a href="logout.php">Logout</a>';
               echo '<a href="book.php" class="button">Book your appointment Now</a>';
            }
            else{
                echo '<a href="login.php">Login</a> | <a href="register.php">Register</a>';
            }
            ?>
        </nav>
    </section>
    <section class="services">
        <div class="container">
            <h1>Book your Appointment Now</h1>
            <form id="bookingForm" action="includes/bookinc.php" method="POST">
                <input type="hidden" name="userid" value="<?php echo isset($_SESSION['user_id']) ? htmlspecialchars($_SESSION['user_id']) : ''; ?>">

                <input type="hidden" name="customername " value="<?php echo isset($_SESSION['user_username']) ? htmlspecialchars($_SESSION['user_username']) : ''; ?>">
               <br> <br>
                <label for="appointment_date">Appointment Date:</label>
    <input type="date" id="appointment_date" name="appointment_date" required>

    <label for="appointment_time">Appointment Time:</label>
    <select id="appointment_time" name="appointment_time" required>
        <option value="" disabled selected>Select Time</option>
        <option value="07:00am-09:00am">07:00am-09:00am</option>
        <option value="09:00am-11:00am">09:00am-11:00am</option>
        <option value="12:00pm-02:00pm">12:00pm-02:00pm</option>
        <option value="02:00pm-04:00pm">02:00pm-04:00pm</option>
        <option value="04:00pm-06:00pm">04:00pm-06:00pm</option>
        <option value="06:00pm-08:00pm">06:00pm-08:00pm</option>
      
    </select>

    <script>// Function to check if a time slot is in the past
function isPastTime(time) {
    var now = new Date();
    var selectedDate = new Date(document.getElementById('appointment_date').value);
    var selectedTimeParts = time.split('-')[0].split(':');
    var selectedHour = parseInt(selectedTimeParts[0]);
    var selectedMinute = parseInt(selectedTimeParts[1]);

    // Adjust hour for PM times
    if (time.includes('pm') && selectedHour !== 12) {
        selectedHour += 12;
    }

    // Set the selected time to the selected date
    selectedDate.setHours(selectedHour, selectedMinute);

    return selectedDate < now;
}


        // Function to disable past time slots and enable future time slots
        function updateAppointmentTimes() {
            var selectedDate = new Date(document.getElementById('appointment_date').value);
            var currentDate = new Date();
            var appointmentTimeSelect = document.getElementById('appointment_time');

            // Clear previous state
            appointmentTimeSelect.querySelectorAll('option').forEach(option => {
                option.disabled = false;
            });

            // If selected date is today
            if (selectedDate.toDateString() === currentDate.toDateString()) {
                var currentHour = currentDate.getHours();
                var currentMinute = currentDate.getMinutes();
                var currentTime = currentHour.toString().padStart(2, '0') + ':' + currentMinute.toString().padStart(2, '0');

                // Disable past time slots
                appointmentTimeSelect.querySelectorAll('option').forEach(option => {
                    if (option.value !== "" && isPastTime(option.value)) {
                        option.disabled = true;
                    }
                });
            }
        }

        // Add change event listener to the appointment date input
        document.getElementById('appointment_date').addEventListener('change', updateAppointmentTimes);

        // Initialize time slots on page load
        updateAppointmentTimes();
    </script>



                
                <label for="selectCategory">Select Category:</label>
                <select id="selectCategory" name="selectCategory" required>
                    <option value="" disabled selected>Select Category</option>
                    <option value="Makeup">Makeup</option>
                    <option value="Hair Care">Hair Care</option>
                    <option value="Manicure/Pedicure">Manicure/Pedicure</option>
                    <option value="Hair Removal">Hair Removal</option>
                    <option value="Facial">Facial</option>
                    <option value="Nail">Nail</option>
                    <option value="Mehandi">Mehandi</option>
                    <option value="Massage">Massage</option>
                    <option value="Wedding Packages">Wedding Packages</option>
                </select>
                    
                <label for="service">Service:</label>
                <select id="serviceSelection" name="serviceSelection" required>
                    <option value="" disabled selected>Select a service</option>
                    <!-- Options will be dynamically populated based on the selected category -->
                </select>
                
                <button type="submit" name="submit">Book Now</button>
            </form>
        </div>
    </section>
    <script>
        document.getElementById('appointment_date').setAttribute('min', new Date().toISOString().split('T')[0]);
        
        document.getElementById('bookingForm').addEventListener('submit', function(event) {
            if (!validateTime()) {
                event.preventDefault(); // Prevent form submission if time is not valid
                alert("Please select a valid time slot for your appointment.");
            }
        });

        function validateTime() {
            var selectedTime = document.getElementById('appointment_time').value;
            // You can add custom validation for time if needed
            return selectedTime !== ""; // For now, just check if a time is selected
        }
    </script>

    <script>
        document.getElementById('selectCategory').addEventListener('change', function() {
            var category = this.value;
            var serviceDropdown = document.getElementById('serviceSelection');
            
            // Clear previous options
            serviceDropdown.innerHTML = '<option value="" disabled selected>Select a service</option>';
            
            // Populate options based on selected category
            switch(category) {
                case 'Makeup':
                    serviceDropdown.innerHTML += '<option value="Bridal Makeup">Bridal Makeup</option>';
                    serviceDropdown.innerHTML += '<option value="Party Makeup">Party Makeup</option>';
                    serviceDropdown.innerHTML += '<option value="Reception Makeup">Reception Makeup</option>';
                    break;
                case 'Hair Care':
                    serviceDropdown.innerHTML += '<option value="Haircut">Haircut</option>';
                    serviceDropdown.innerHTML += '<option value="Hair Coloring">Hair Coloring</option>';
                    serviceDropdown.innerHTML += '<option value="Hair Styling">Hair Styling</option>';
                    serviceDropdown.innerHTML += '<option value="Hair Keratin">Hair Keratin</option>';
                    serviceDropdown.innerHTML += '<option value="Permanent straight/curl">Permanent straight/curl</option>';
                    serviceDropdown.innerHTML += '<option value="Temporary straight/curl">Temporary straight/curl</option>';
                    serviceDropdown.innerHTML += '<option value="Wash And Blow Dry Setting">Wash And Blow Dry Setting</option>';
                    break;
                case 'Manicure/Pedicure':
                    serviceDropdown.innerHTML += '<option value="Manicure">Manicure</option>';
                    serviceDropdown.innerHTML += '<option value="Pedicure">Pedicure</option>';
                    serviceDropdown.innerHTML += '<option value="Both">Both</option>';
                    break;
                case 'Hair Removal':
                    serviceDropdown.innerHTML += '<option value="Threading">Threading</option>';
                    serviceDropdown.innerHTML += '<option value="Waxing">Waxing</option>';
                    break;
                case 'Facial':
                    serviceDropdown.innerHTML += '<option value="Fruit Facial">Fruit Facial</option>';
                    serviceDropdown.innerHTML += '<option value="Gold/Green Tea/Bob Facial">Gold/Green Tea/Bob Facial</option>';
                    serviceDropdown.innerHTML += '<option value="Lotus Professional">Lotus Professional</option>';         
                    break;
                case 'Nail':
                    serviceDropdown.innerHTML += '<option value="Gel Nail Extension">Gel Nail Extension</option>';
                    serviceDropdown.innerHTML += '<option value="Acrylic(Both Head)">Acrylic(Both Head)</option>';
                    serviceDropdown.innerHTML += '<option value="Gel Nail Polish">Gel Nail Polish</option>';
                    serviceDropdown.innerHTML += '<option value="Normal Nail Polish(Both Head)">Normal Nail Polish(Both Head)</option>';
                    break;
                case 'Mehandi':
                    serviceDropdown.innerHTML += '<option value="Full Hand ">Full Hand</option>';
                    serviceDropdown.innerHTML += '<option value="Half Hand">Half Hand</option>';
                    serviceDropdown.innerHTML += '<option value="Full Palm">Full Palm</option>';
                    serviceDropdown.innerHTML += '<option value="One Line">One Line</option>';
                    serviceDropdown.innerHTML += '<option value="Hand and Leg">Hand and Leg</option>';
                    break;
                case 'Massage':
                    serviceDropdown.innerHTML += '<option value="Head(Oil)">Head(Oil)</option>';
                    serviceDropdown.innerHTML += '<option value="Face">Face</option>';
                    serviceDropdown.innerHTML += '<option value="Hand">Hand</option>';
                    serviceDropdown.innerHTML += '<option value="Sholder and Neck">Sholder and Neck</option>';
                    break;
                case 'Wedding Packages':
                    serviceDropdown.innerHTML += '<option value="Includes all">Includes all</option>';    
                    break;
            }
        });
    </script>
</body>
</html>
