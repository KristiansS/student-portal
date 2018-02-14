<?php 
require("includes/base.php");
?>
<!DOCTYPE html>
<html>
<head>
<title> LilCode Registration </title>
</head>
<!--
 Parents will fill out registration form, and also pay for the first 8 hours
 of sessions

 Registration will require both parent and student information

 Parents:
 Fits Name
 Last Name
 Email
 Password

 Student Information
 First Name
 Last Name
 Email (Google Email preferred)
 Password
 Birthday
 Goals

 -->
<script src="https://js.braintreegateway.com/web/dropin/1.9.4/js/dropin.min.js"></script>
<body>

<div class="center-div">
	    <h1> Register</h1>
	    <p> Enter your details and the students details below </p>
        <form method="post" action="register.php">

            <div class="form-row">
                <div class="col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control is-valid" placeholder="First Name"  required>
                </div>
                <div class="col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="col-md-6">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm Password" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <label for="student_first_name">Student First Name</label>
                    <input type="text" name="student_first_name" id="student_first_name" class="form-control" placeholder="Student First Name" required><br>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <label for="student_last_name">Student Last Name</label>
                    <input type="text" name="student_last_name" id="student_last_name" class="form-control" placeholder="Student Last Name" required><br>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <label for="student_email">Student Email (Gmail Preferred)</label>
                    <input type="text" name="student_email" id="student_email" class="form-control" placeholder="student@gmail.com" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <label for="student_password">Student Password</label>
                    <input type="password" name="student_password" id="student_password" class="form-control" placeholder="Student Password" required>
                </div>
                <div class="col-md-6">
                    <label for="student_confirm_password">Student Password</label>
                    <input type="password" name="student_confirm_password" id="student_confirm_password" class="form-control" placeholder="Student Confirm Password" required>
                </div>
            </div>

            <div id="dropin-container"></div>
            <button id="submit-button">Request payment method</button>
            <script>
                var button = document.querySelector('#submit-button');

                braintree.dropin.create({
                    authorization: 'CLIENT_TOKEN_FROM_SERVER',
                    container: '#dropin-container'
                }, function (createErr, instance) {
                    button.addEventListener('click', function () {
                        instance.requestPaymentMethod(function (err, payload) {
                            // Submit payload.nonce to your server
                        });
                    });
                });
            </script>

            <div class="col-md-12">
            <input type="submit" name="register" id="register" value="Register" class="btn btn-primary" />
            </div>


        </form>
	</div>
</div>
</body>
</html>