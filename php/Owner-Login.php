<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tampisaw/css/ologin.css?v=1">
    <link rel="icon" href="/Tampisaw/images/logos/Logo.png" type="image/png">
    <title>Tampisaw: Login</title>
</head>

<body>
    <?php
            session_start();
            $_SESSION = array();
            session_unset();
    ?>
    <section>
        <div class='air air1'></div>
        <div class='air air2'></div>
        <div class='air air3'></div>
        <div class='air air4'></div>
    </section>

    <div class="login-root">
        <div class="box-root" style="min-height: 100vh;flex-grow: 1;">
            <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
                <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                    <h1><a id="Tt" href="#" rel="dofollow">Tampisaw</a></h1>
                </div>
                <div class="formbg-outer">
                    <div class="formbg">
                        <div class="formbg-inner padding-horizontal--48">
                            <span class="padding-bottom--15">Sign in to your account</span>
                            <form id="stripe-login" method="POST">
                                <div class="field padding-bottom--24">
                                    <label for="email">Email</label>
                                    <input type="email" name="email">
                                </div>
                                <div class="field padding-bottom--24">
                                    <div class="grid--50-50">
                                        <label for="password">Password</label>
                                    </div>
                                    <input type="password" name="password">
                                </div>
                                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                                    <label for="checkbox">
                                        <input type="checkbox" name="checkbox"> Stay signed in
                                    </label>
                                </div>
                                <div class="field padding-bottom--24">
                                    <input type="submit" name="submit" value="Continue">
                                </div>
                                <div class="reset-pass">
                                    <a href="#">Forgot your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer-link padding-top--24">
                        <span>Don't have an account? <a href="Owner-Signup.php">Sign up</a></span>
                        <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center" style="text-align: center;">
                            <span><a href="#">© Tampisaw</a></span>
                            <span><a href="#">Contact</a></span>
                            <span><a href="#">Privacy & terms</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'connect.php';
        if (isset($_POST['submit'])) {
            var_dump($_SESSION);
            include 'login.php';
        }
    $conn->close();
    ?>
<a id="backhome" href="../index.php">
  <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
  <p>Back</p>
</a >
</body>

</html>