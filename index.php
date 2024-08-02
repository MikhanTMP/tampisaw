<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css?v=15">
    <link rel="icon" href="/Tampisaw/images/logos/Logo.png" type="image/png">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css?v=1" />
    <title>Tampisaw</title>
</head>
<?php 
    session_start();
?>
<body>

    <div class="side">
        <a href="#home" style="background:#e74c3c;">
            Home
            <img width="24" height="24" src="https://img.icons8.com/glyph-neue/64/FFFFFF/home--v1.png" alt="home--v1"/>
        </a>
        <a href="#about" style="background:#3498db;">
            About
            <img width="24" height="24" src="https://img.icons8.com/glyph-neue/64/FFFFFF/about--v1.png" alt="about--v1"/>
        </a>
        <a href="#resort" style="background:#2ecc71;">
            Resorts
            <img width="24" height="24" src="https://img.icons8.com/external-smashingstocks-glyph-smashing-stocks/66/FFFFFF/external-Resort-singapore-smashingstocks-glyph-smashing-stocks.png" alt="external-Resort-singapore-smashingstocks-glyph-smashing-stocks"/>
        </a>
        <a href="#owner" style="background:#f1c40f;">
            Owner
            <img width="24" height="24" src="https://img.icons8.com/ios-filled/50/FFFFFF/landlord.png" alt="landlord"/>
        </a>
        <a href="#" style="background:#f39c12;">
            Book now
            <img width="24" height="24" src="https://img.icons8.com/external-photo3ideastudio-solid-photo3ideastudio/64/FFFFFF/external-booking-hostel-photo3ideastudio-solid-photo3ideastudio.png" alt="external-booking-hostel-photo3ideastudio-solid-photo3ideastudio"/>
        </a>
    </div>
    <nav class="nav-bar">
            <?php 
            if(isset($_SESSION['userID'])){
                echo '
                <a href=""> Welcome back!</a>
                ';
            }
            else{
                echo '
                <a href="/tampisaw/php/user-join.php"> Login</a>
                ';
            }
            ?>

        <img src="images/logos/Logo.png" alt="">

        <?php 
            if(isset($_SESSION['userID'])){
                $username = $_SESSION['fullname'];
                echo '
                <a href="/tampisaw/php/user-dashboard.php">'.$username.'</a>
                ';
            }
            else{
                echo '
                <a href="/tampisaw/php/user-join.php"> Signup</a>
                ';
            }
            ?>
    </nav>

    <div class="first-section" id="home">
        <div class="fs-container">
            <div class="image-container">
                <div class="description">
                    <h1>Experience Serenity</h1>
                    <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Discover a curated selection of serene and picturesque getaways in Bulalacao, where you can unwind amidst nature's beauty, indulge in luxurious amenities, and create cherished memories with your loved ones. Embrace relaxation and adventure, all in one seamless experience at Tampisaw.</p>
                    <button>
                    <span href="#about">Get Started</span>
                    </button>
                </div>
                <div class="vid-cont">
                    <video autoplay loop muted plays-inline src="/Tampisaw/images/landingpage/bg6.mp4"></video>
                </div>
            </div>
        </div>
    </div>

    <div class="second-section" id="about">
        <div class="ss-container">
            <div class="left-side">
                <h1>about</h1>
                <h2>Bulalacao Oriental Mindoro</h2>
            </div>
            <div class="right-side">
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    Bulalacao, Oriental Mindoro, is a serene and picturesque coastal municipality in the Philippines, known for its pristine beaches and tranquil ambiance. The area boasts a collection of stunning beaches with powdery white sands, crystal-clear waters, and lush green surroundings. Visitors can indulge in various water activities such as snorkeling, diving, and island hopping, exploring the rich marine life and vibrant coral reefs. The beaches in Bulalacao, like Tabinay and Malitbog, offer a perfect escape from the bustling city life, providing a peaceful retreat to unwind and connect with nature. With its unspoiled beauty and warm hospitality, Bulalacao beckons travelers seeking an idyllic beach destination off the beaten path.</p>
                    <button id="btn1">
                        Readmore
                    </button>
            </div>
        </div>
    </div>

    <div class="third-section" id="resort">
        <div class="ts-container">
            <h1 id="resort-tit">Resort List</h1>
            <p id="resort-desc">This resort list features diverse and luxurious establishments, each offering a unique experience for travelers. Provided by the owners themselves, the ratings reflect their belief that their resort is the highest-rated. Please note that the ratings are based on the owners' own perspectives.</p>
            <div class="viewmore">
                <a class="learn-more" href="./php/resort-list.php">
                    <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">View All</span>
                </a>
            </div>
            <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php 
                                include '../Tampisaw/php/connect.php';
                                $getresortinfo = "SELECT resort_ID, resortname, resort_contact, resort_desc FROM resorts "; 
                                $result = mysqli_query($conn, $getresortinfo);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $resortID = $row['resort_ID'];
                                        $resortName = $row['resortname'];
                                        $resortContact = $row['resort_contact'];
                                        $resortDescription = $row['resort_desc'];
                                        $resortDescription = substr($resortDescription, 0, 250) . "...";
                                        $getImagesQuery = "SELECT filepath FROM images WHERE resort_ID = '$resortID' LIMIT 1";
                                        $imageResult = mysqli_query($conn, $getImagesQuery);
                                        $imgrow = mysqli_fetch_assoc($imageResult);
                                        $imageFilepath = $imgrow['filepath'];
                                        echo '<div class="swiper-slide">';
                                        echo '<img src="../Tampisaw/images/resorts/' .$imageFilepath.'" alt="">';
                                        echo '<div class="desc">';
                                        echo '<span class="price">' . $resortName. '</span>';
                                        echo '<h3 class="resnum">+639' . $resortContact . '</h3>';
                                        echo '<p class="resdesc">' . $resortDescription . '</p>';
                                        echo '<button>See More</button>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "No resorts found in the database.";
                                }
                                mysqli_close($conn);
                            ?>
                            
                        </div>
                    </div>
        </div>
    </div>

    <div class="fourth-section">
        <div class="fts-container">
            <img src="../Tampisaw/images/landingpage/beach-gb1d5745a3_1280.jpg" alt="">
            <img src="../Tampisaw/images/landingpage/beach-gca6ab8be1_1280.jpg" alt="">
            <img src="../Tampisaw/images/landingpage/beach-g81d372a6e_1280.jpg" alt="">
        </div>
    </div>
    <div class="fifth-section" id="owner">
        <div class="fifth-container">
            <div class="left-side">
                <h2>Owner Signup: Unlock the Potential of Your Resort with Tampisaw</h2>
                <p>&nbsp; &nbsp; Discover a world of opportunities for your resort by joining Tampisaw. Showcase your property to a diverse audience of travelers, and let our dedicated team handle the marketing to ensure your resort shines among the best in Bulalacao, Oriental Mindoro. Embrace success in the hospitality industry with Tampisaw as your trusted partner.</p>
                    <a href="../Tampisaw/php/Owner-Signup.php" id="btn1" >
                        Sign Up Now!
                    </a>
            </div>
            <div class="right-side">
                <img src="../Tampisaw/images/landingpage/beach-gb94461c51_1280.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="sixth-section" id="contact">
        <div class="sixth-container" >
            
            <div class="container">
                <div class="screen">
                <div class="screen-header">
                    <div class="screen-header-left">
                    <div class="screen-header-button close"></div>
                    <div class="screen-header-button maximize"></div>
                    <div class="screen-header-button minimize"></div>
                    </div>
                    <div class="screen-header-right">
                    <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                    </div>
                </div>
                <div class="screen-body">
                    <div class="screen-body-item left">
                    <div class="app-title">
                        <span>CONTACT</span>
                        <span>US</span>
                    </div>
                    <div class="app-contact">CONTACT INFO : +629 314 928 595</div>
                    </div>
                    <div class="screen-body-item">
                    <div class="app-form">
                        <div class="app-form-group">
                        <input class="app-form-control" placeholder="NAME" value="">
                        </div>
                        <div class="app-form-group">
                        <input class="app-form-control" placeholder="EMAIL">
                        </div>
                        <div class="app-form-group">
                        <input class="app-form-control" placeholder="CONTACT NO">
                        </div>
                        <div class="app-form-group message">
                        <input class="app-form-control" placeholder="MESSAGE">
                        </div>
                        <div class="app-form-group buttons">
                        <button class="app-form-button">CANCEL</button>
                        <button class="app-form-button">SEND</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <nav class="footer-inner">
          <section class="footer-item">
            <h1>Tampisaw</h1>
            
            <h2>We are your portal <br>for you to connect to the world's best beaches.<br><b class="color">Tara Na!</b></h2>
          </section>
              
          <section class="footer-item">
            <h3>Re-explore</h3>
              <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Resort</a></li>
                <li><a href="#jobs">Signup</a></li>
              </ul>
          </section>
                
          <section class="footer-item">
            <h3>Visit</h3>
              <a href="#">
              <p>Bulalacao, Oriental Mindoro</p>
              <p>Odiong Campaasan</p>
              </a>
                  
            <h3 class="desktop">Contact Us</h3>
            <p class="desktop"><a href="#">tampisaw@gmail.com</a></p>
              <p class="desktop"><a href="#">+6393 0286 6733</a></p>
          </section>
                  
          <section class="footer-item">
            <h3>Visit</h3>
              <a href="#">
              <p>Bulalacao, Oriental Mindoro</p>
              <p>Odiong Campaasan</p>
              </a>
                  
            <h3 class="desktop">Contact Us</h3>
              <p class="desktop"><a href="#">tampisaw@gmail.com</a></p>
              <p class="desktop"><a href="#">+6393 0286 6733</a></p>
          </section>
              
          <section class="footer-item">
            <h3>Follow</h3>
              <ul>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">LinkedIn</a></li>
              </ul>
          </section>
              
          <section class="footer-item">
            <h3>Customer Service</h3>
              <ul>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
              </ul>
          </section>
        </nav>
      </footer>
<script src="../Tampisaw/scripts/script.js?v=3"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js?v=1"></script>
</body>

</html>