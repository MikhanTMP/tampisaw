<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tampisaw/css/osignup.css?v=3">
    <link rel="icon" href="/Tampisaw/images/logos/Logo.png" type="image/png">
    <title>Tampisaw: Sign Up</title>
</head>
<body>
    
                    <!-- Disable Caching -->
    <?php
        header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1
        header("Pragma: no-cache"); // HTTP 1.0
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    ?>
<a id="backhome" href="../index.php">
  <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
  <span>Back</span>
</a >

    <section>
        <div class='air air1'></div>
        <div class='air air2'></div>
        <div class='air air3'></div>
        <div class='air air4'></div>
      </section>
    <div class="container">
        <div class="signupform">
            <form method="POST" enctype="multipart/form-data">
                <h1>Signup</h1>
                <hr>
                <div id="personal-information">
                    <!-- Personal Information -->
                    <h2>Step-1 | Personal Information</h2>
                    <hr>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required >

                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required >
                    
                    <label for="ownercontact">Contact Number</label>
                    <input type="text" id="ownercontact" name="ownercontact" required >

                    <label class="gender-label">Gender</label>
                    <div class="gender-options">
                        <div id="gender-gender">
                            <input type="radio" id="gender-male" name="gender" value="male" class="gender-radio">
                            <label for="gender-male">Male</label>
                        </div>
                        <div id="gender-gender">
                            <input type="radio" id="gender-female" name="gender" value="female" class="gender-radio">
                            <label for="gender-female">Female</label>
                        </div>
                        <div id="gender-gender">
                            <input type="radio" id="gender-other" name="gender" value="other" class="gender-radio">
                            <label for="gender-other">Other</label>
                        </div>
                    </div>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required minlength="">

                    <label for="password">Confirm Password</label>
                    <input type="password" id="con-password" name="" required minlength="">
                    <span id="pass-warning"></span>
                    <br>
                    <br>
                    <!-- Next Button -->
                    <input type="button" value="Next" class="submit-button" onclick="showNextSection()">
                </div>

                <!-- Resort Information Section -->
                <div id="resort-information" class="form-section">
                    <h2>Step-2 | Resort Information</h2>
                    <hr>
                    <label for="resort-name">Resort Name</label>
                    <input type="text" id="resort-name" name="resort-name" required>

                    <label for="resort-type">Resort Type</label>
                    <select id="resort-type" name="resort-type" required>
                        <option value="" disabled selected>Select Resort Type</option>
                        <option value="beach">Beach Resort</option>
                        <option value="mountain">Mountain Resort</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="accommodation-type">Accommodation Type</label>
                    <select id="accommodation-type" name="accommodation-type" required>
                        <option value="" disabled selected>Select Accommodation Type</option>
                        <option value="hotel">Hotel</option>
                        <option value="resort">Resort</option>
                        <option value="vacation-rentals">Vacation Rentals</option>
                    </select>

                    <label for="resort-address">Resort Address</label>
                    <input type="text" id="resort-address" name="resort-address" required>

                    <label for="resort-contact">Resort Contact Information</label>
                    <input type="text" id="resort-contact" name="resort-contact" required>

                    <label for="License ">License</label>
                    <input type="file" id="license" name="License" accept=".pdf,image/*" onchange="checkFileSize(this)">

                    <label class="checkbox-label">
                        <input type="checkbox" id="terms" name="terms" required>
                        I agree to the <a href="#">Terms and Conditions </a>
                    </label>

                    <input type="date" name="myDateInput" id="myDateInput" style="display:none;">

                    <!-- Final Submit Button -->
                    <div id="buttons">
                        <input type="" value="Back" class="submit-button" onclick="backSection()">
                        <input type="submit" value="Submit" class="submit-button" id="submit-button" onclick="validatepart2()">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="jumptologin">
        <p>Already have an account? <a style="text-decoration: unset;" href="Owner-Login.php">Login</a></p>
    </div>
    <div class="footer-link padding-top--24">
        <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
            <span><a href="#">© Tampisaw</a></span>
            <span><a href="#">Contact</a></span>
            <span><a href="#">Privacy & terms</a></span>
        </div>
    </div>
    <script src="/tampisaw/scripts/oscript.js?v=4"></script>
        <!--php-->
    <?php
    include 'connect.php';
        if (isset($_POST['submit'])) {
            include 'insert.php'; 
        }
        $conn->close();
    ?>

</body>
</html>