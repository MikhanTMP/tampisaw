<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resort Details</title>
    <link rel="icon" href="/Tampisaw/images/logos/Logo.png" type="image/png">
    <link rel="stylesheet" href="../css/resortdetails.css?v=3">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!--<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />-->
</head>
<?php
    session_start();

        $i = $_SESSION['current_index'];
        $resID = $_GET['resort_id'];
        include 'connect.php';
        $getresortinfo = "SELECT * FROM resorts WHERE resort_ID='$resID'";
        $result = mysqli_query($conn, $getresortinfo);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $resortID = $row['resort_ID'];
            $resortName = $row['resortname'];
            $resortAddress = $row['resort_address'];
            $resortContact = $row['resort_contact'];
            $resortDescription = $row['resort_desc'];
            
        } else {

        }
?>
<body>
    
    <nav class="nav-bar">
            <a href="../index.php">Home</a>
            <a href="resort-list.php">Book Now</a>
            <img src="../images/logos/Logo.png" alt="">
            <?php 

            if(isset($_SESSION['userID'])){
                $userfullname = $_SESSION['fullname'];
                echo '
                <a href="/tampisaw/php/user-dashboard.php">'.$userfullname.'</a>
                ';
            }
            else{
                echo '
                <a href="/tampisaw/php/user-join.php"> Login / Signup</a>
                ';
            }
            ?>
    </nav>
    <!---------------------detail----------------------->
    <main class="detail">
        <div id="carouselInterval" class="carousel slide mb-4 d-md-none" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active position-relative" data-interval="10000">
                    <img class="img-cover w-100"
                        src="">
                    </img>
                </div>
                <div class="carousel-item position-relative" data-interval="10000">
                    <img class="img-cover w-100"
                        src="">
                    </img>
                </div>
                <div class="carousel-item position-relative" data-interval="10000">
                    <img class="img-cover w-100"
                        src="">
                    </img>
                </div>
                <div class="carousel-item position-relative" data-interval="10000">
                    <img class="img-cover w-100"
                        src="">
                    </img>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselInterval" role="button" data-slide="prev">
                <span class="material-icons" aria-hidden="true">arrow_back_ios</span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselInterval" role="button" data-slide="next">
                <span class="material-icons" aria-hidden="true">arrow_forward_ios</span>
                <span class="sr-only">Next</span>
            </a>
        </div>
            <?php 

                $getImagesQuery = "SELECT filepath FROM images WHERE resort_ID = '$resortID' LIMIT 1";
                $imageResult = mysqli_query($conn, $getImagesQuery);
                $imgrows = mysqli_fetch_assoc($imageResult);
                $imageFilepath = $imgrows['filepath'];

                $imageFilepaths = array();
                $getImagesQuerymore = "SELECT filepath FROM images WHERE resort_ID = '$resortID'";
                $imageResults = mysqli_query($conn, $getImagesQuerymore);
                while ($imgrow = mysqli_fetch_assoc($imageResults)) {
                    $imageFilepaths[] = $imgrow['filepath'];
                }
                echo '
                <div class="container position-relative">
                    <div class="row no-gutters pt-md-4 pt-lg-6 mb-6 d-none d-md-flex">
                        <div class="col-md-7 bg-cover rounded"
                            style="background-image: url(../images/resorts/'.$imageFilepath.'); padding-top: 40%;">
                        </div>
                        <div class="col-md-5">
                            <div class="rounded bg-cover ml-1 mb-1"
                                style="background-image: url(../images/resorts/'.$imageFilepaths[1].'); padding-top: 50%;">
                            </div>
                            <div class="d-flex">
                                <div class="rounded bg-cover ml-1 w-100"
                                    style="background-image: url(../images/resorts/'.$imageFilepaths[2].'); padding-top: 50%;">
                                </div>
                                <div class="ml-1 w-100 h-100">
                                    <div class="rounded bg-cover mb-1"
                                        style="background-image: url(../images/resorts/'.$imageFilepaths[4].'); padding-top: 75%;">
                                    </div>
                                    <a class="btn btn-black btn-block font-xs font-sm-lg h6-lg px-0 font-weight-bold py-4"
                                        href="#">SEE ALL 10 PHOTOS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-lg-7 mb-12 mb-lg-18">
                            <div class="d-md-flex align-content-center" data-aos="fade-up">
                                <h2 class="mr-4 mb-2 mb-md-0">'.$resortName.'</h2>
                                <div class="mb-2 mb-md-0 d-flex align-items-center">
                                    <span class="material-icons font-size-18 text-black"></span>
                                    <span class="font-sm"></span>
                                </div>
                            </div>
                            <a class="font-sm mb-6 d-block text-decoration-none" href="#" data-aos="fade-up">'.$resortAddress.'</a>
                            <p class="" data-aos="fade-up">'.$resortDescription.'</p>
                        </div>
                        <div class="col-12 mb-4 mb-md-6" data-aos="fade-up">
                            <h4>Available Rooms</h4>
                        </div>
                    </div>
                    <div class="row no-gutters d-none d-md-flex border-bottom pb-2 mb-6" data-aos="fade-up">
                            <h5 class="col-6 h6 font-family-openSnas">ROOM TYPE</h5>
                            <h5 class="col-2 h6 font-family-openSnas text-center">CAPACITY</h5>
                        <div class="col-4 d-flex justify-content-between justify-content-md-around ">
                            <h5 class="h6 font-family-openSnas text-center">PRICE</h5>
                            <h5 class="h6 font-family-openSnas text-center">ACTION</h5>
                        </div>
                        
                    </div>
                '; 
            ?>
            <?php 
                $max = 1;
                $roomquery = "SELECT * FROM rooms WHERE resort_ID='$resID'";
                $roomresult = $conn->query($roomquery);
                if (mysqli_num_rows($roomresult) > 0) {
                    while ($roomrow = mysqli_fetch_assoc($roomresult)) {
                        $roomID = $roomrow ['room_ID'];
                        $roomName = $roomrow['room_name'];
                        $roomSize = $roomrow['room_size'];
                        $roomQuantity = $roomrow['room_quantity'];
                        $roomCapacity = $roomrow['room_capacity'];
                        $roomRate = $roomrow['room_rate'];
                        $bedQuantity = $roomrow['bed_quantity'];
                        $bedType = $roomrow['bed_type'];
                        $roomIMG = $roomrow['room_img'];
                        $dataURL = 'data:image/jpeg;base64,' . base64_encode($roomIMG);
                    echo '
                    <ul class="list-unstyled mb-12 mb-lg-18">
                        <li class="border-bottom pb-md-4 pb-lg-6 mb-2 mb-md-5" data-aos="fade-up">
                            <div class="row no-gutters d-flex align-items-center border rounded border-0-md">
                                <div class="col-6 col-md-3">
                                    <img src="'.$dataURL.'" alt="roomA" class="card-img img-cover">
                                </div>
                                <div class="col-6 col-md-3 py-2 pl-2 pl-lg-4 align-self-xl-start">
                                    <h3 class="h6 mb-1 mb-md-0 mb-lg-0 font-family-openSnas">'.$roomName.'</h3>
                                    <p class="font-xs mb-2 mb-md-4">'.$roomSize.'</p>
                                    <ul class="list-unstyled d-flex flex-wrap justify-content-xl-between mb-2">
                                        <li class="w-xl-50 mr-2 mr-xl-0">
                                            <p id="amenities" class="d-none d-xl-inline ">Free Wifi</p><br>
                                            <p id="amenities" class="d-none d-xl-inline ">Ocean View</p><br>
                                            <p id="amenities" class="d-none d-xl-inline ">Complimentary Breakfast</p>
                                    </ul>

                                </div>
                                <div class="col-md-2 d-none d-md-block">
                                    <p class="text-center text-black">
                                        '.$roomCapacity.' People
                                    </p>
                                </div>
                                <div
                                    class="col-md-4 d-flex flex-md-row-reverse justify-content-between justify-content-md-around align-items-center bg-light bg-white-md px-2 px-md-0 rounded-bottom">
                                    <div class="d-flex align-items-center">
                                        <button class="btn px-2 text-black" id="bookbtn'.$max.'">
                                            <span class="material-icons">Book</span>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <div class="font-sm">Rate</div>
                                        <p class="font-weight-bold text-black">PHP
                                            <span class="text-primary">'.$roomRate.'</span></p>
                                        <p class="font-xs d-none d-md-block">per night</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    ';
                    $max++;
                    }
                    }
            ?>

    <!---------------------Subscribe----------------------->
    <section class="bg-light py-6">
        <div class="container">
            <div class="row align-items-center">
                <h2 class="h4 h2-lg mb-4 mb-md-0 col-md-4 col-xl-5" data-aos="zoom-in" data-aos-easing="ease-in-sine"
                    data-aos-duration="300">Subscribe for Exclusive Offer</h2>
                <div class="col-md-8 col-xl-7" data-aos="zoom-in" data-aos-easing="ease-in-sine"
                    data-aos-duration="300">
                    <div class="input-group">
                        <input type="text" class="form-control border-0" placeholder="Your email address"
                            aria-describedby="subscribe">
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-primary font-weight-bold px-4 px-md-8"
                                value="SUBSCRIBE">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---------------------footer----------------------->
    <footer class="text-sm container text-gray610 py-4">
        <div class="row align-items-baseline">
            <div
                class="col-12 col-md-5 col-lg-3 order-1 order-md-0 d-flex justify-content-center justify-content-md-start">
                <p class="footer_copyright mb-0">© 2023 Tampisaw | All rights reserved.</p>
            </div>
            <ul
                class="col-12 col-md-5 col-lg-4 offset-md-2 offset-lg-0 d-flex justify-content-center justify-content-md-end mb-0">
                <li class="mr-4"><a href="#">FAQs</a></li>
                <li class="mr-4"><a href="#">Terms of use</a></li>
                <li><a href="#">Privacy policy</a></li>
            </ul>
            <div class="col-lg-3 offset-lg-2 d-none d-lg-flex justify-content-end">
                <div class="mr-4 d-flex align-items-center ">
                    <span class="material-icons ">Tampisaw</span>

                </div>

            </div>
        </div>
    </footer>

<!--Modal -->
<div class="modal-overlay" style="display: none;"></div>
<div class="booking-widget" style="display: none;">
        <FORM method="post" action="booking.php">
        <?php 

        $_SESSION['roomID'] = $roomID;
        $_SESSION['resID'] = $resID;
        $_SESSION['roomName'] = $roomName;
        $_SESSION['roomRate'] = $roomRate;
        ?>
                <div class='booking-widget__header'>
                    <figure>
                    <img src="<?php echo $dataURL;?>">
                    <figcaption class='header-caption'>
                        <h3 id=""><?php echo $roomName?></h3>
                        <span id=""><i class="fa fa-map-marker" aria-hidden="true"></i>PHP <?php echo $roomRate?></span>
                      </figcaption>         
                    </figure>
                </div>
                    <ul class='booking-widget__form'>
                        <li>
                            <label for='check-in'>Check in</label>
                            <div id='check-in' class='form-field'>
                                <input name="checkin" type="date" value="" placeholder="9 July, 2016">
                            </div>
                        </li>
                        <li>
                            <label for='check-in'>Check out</label>
                            <div id='check-out' class='form-field'>
                                <input name="checkout" type="date" value="" placeholder="19 July, 2016">
                            </div>
                        </li>
                        <li>
                        <label for="flexibleDates">Additional Request</label>
                          <div class='form-field' id='check-in'>
                            <input type="text" id='flexibleDates' value="">
                          </div>

                        </li>
                        <li>
                            <div class='form__dropdown'>
                                <label for='adultsAmount'>Adults</label>
                                <div class='form-field'> 
                                <select id='adultsAmount' name="adult">    
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                </select>
                            </div>
                            </div>
                            <div class='form__dropdown'>
                                <label for='childrenAmount'>Children</label>
                                <br>
                              <div class='form-field'> 
                                <select id='childrenAmount' name="children"> 
                                        <option value="0" selected="selected"></option>                        
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                </select>
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="submit" id='bookingSubmit' class='form__submit' value='Pay Now'
                            style="
                            text-decoration:none;
                            text-align:center;
                            display:flex;
                            align-items:center;
                            justify-content:center;"></input>
                        </li>
                    </ul>       
                </form>
            </div>


    <script src="../scripts/resortdetails.js?v=3"> </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>