<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tampisaw/css/userlogin.css?v=4">
    <link rel="icon" href="/Tampisaw/images/logos/Logo.png" type="image/png">
    <title>Tampisaw: User Login / Signup</title>
</head>
<?php 
    session_start();
    $_SESSION = array();
    session_unset();
?>
<body>
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
        <div class="backbox">
            <div class="loginMsg">
                    <div class="textcontent">
                        <p class="title">Don't have an account?</p>
                        <p>Sign up to Book in our Resorts.</p>
                        <button id="switch1">Sign Up</button>
                    </div>
            </div>
            <div class="signupMsg visibility">

                    <div class="textcontent">
                        <p class="title">Have an account?</p>
                        <p>Log in to see all your bookings.</p>
                        <button id="switch2">LOG IN</button>
                    </div>
            </div>
        </div>
        <!-- backbox -->

        <div class="frontbox">
        <form action="" method="POST">
            <div class="login">
                <h2>LOG IN</h2>
                <div class="inputbox">
                    <input type="text" name="email" placeholder="  EMAIL">
                    <input type="password" name="password" placeholder="  PASSWORD">
                </div>
                <p>FORGET PASSWORD?</p>
                <button type="submit" name="submitlogin">LOG IN</button>
            </div>
        </form>
        <form action="" method="POST">
            <div class="signup hide">
                <h2>SIGN UP</h2>
                <div class="inputbox">
                    <input type="text" name="fullname" placeholder="  FULLNAME" required>
                    <input type="text" name="email" placeholder="  EMAIL" required>
                    <input type="password" name="password" placeholder="  PASSWORD" required>
                </div>
                <button name="submit" type="submit">SIGN UP</button>
            </div>
        </form>
        </div>
        <!-- frontbox -->
    </div>
    <div class="footer-link padding-top--24">
        <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center" style="text-align: center;">
            <span><a href="#">© Tampisaw</a></span>
            <span><a href="#">Contact</a></span>
            <span><a href="#">Privacy & terms</a></span>
        </div>
    </div>
    <?php 
    if(isset($_POST['submit'])){
        include 'usersignup.php';
    }else if (isset($_POST['submitlogin'])){
        include 'userlogin.php';
    }
    ?>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var $loginMsg = $('.loginMsg'),
        $login = $('.login'),
        $signupMsg = $('.signupMsg'),
        $signup = $('.signup'),
        $frontbox = $('.frontbox');

        $('#switch1').on('click', function() {
        $loginMsg.toggleClass("visibility");
        $frontbox.addClass("moving");
        $signupMsg.toggleClass("visibility");

        $signup.toggleClass('hide');
        $login.toggleClass('hide');
        })

        $('#switch2').on('click', function() {
        $loginMsg.toggleClass("visibility");
        $frontbox.removeClass("moving");
        $signupMsg.toggleClass("visibility");

        $signup.toggleClass('hide');
        $login.toggleClass('hide');
        })

        setTimeout(function(){
        $('#switch1').click()
        },1000)

        setTimeout(function(){
        $('#switch2').click()
        },3000)

                showModal();
                function showModal() {
                    document.getElementById("paymentModal").style.display = "block";
                }
        
                // Function to close the modal
                function closeModal() {
                    document.getElementById("paymentModal").style.display = "none";
                }
        
                // Function to proceed to the resort list page
                function proceedToResortList() {
                    window.location.href = "user-join.php";
                }
    </script>
</body>
</html>

</html>