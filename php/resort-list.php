<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/resortlist.css?v=6">
    <link rel="icon" href="/Tampisaw/images/logos/Logo.png" type="image/png">
    
    <title>Tampisaw: Resorts</title>
</head>
    <?php 
    
        include 'connect.php';
        $index = 0;
        $getresortinfo = "SELECT resort_ID, resortname, resort_contact, resort_desc FROM resorts "; 
        $result = mysqli_query($conn, $getresortinfo);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $index++; 
            }
        } else {
            echo "No resorts found in the database.";
        }
    
    
        function intToWords($number) {
            $words = array(
                0 => 'Zero',
                1 => 'One',
                2 => 'Two',
                3 => 'Three',
                4 => 'Four',
                5 => 'Five',
                6 => 'Six',
                7 => 'Seven',
                8 => 'Eight',
                9 => 'Nine',
                10 => 'Ten',
                11 => 'Eleven',
                12 => 'Twelve',
                13 => 'Thirteen',
                14 => 'Fourteen',
                15 => 'Fifteen',
                16 => 'Sixteen',
                17 => 'Seventeen',
                18 => 'Eighteen',
                19 => 'Nineteen',
                20 => 'Twenty'
            );
        
            if ($number <= 20) {
                return $words[$number];
            } elseif ($number < 100) {
                $tens = $words[floor($number / 10) * 10];
                $ones = $number % 10;
                return $tens . ($ones ? '-' . $words[$ones] : '');
            } else {
                return 'Number out of range';
            }
        }
        session_start();

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
    <br>
    <div id="wrapper">
        <div id="side-bar">
            <div id="menu"><i class="fas fa-bars"></i></div>
            <nav>
                <ul>
                    <?php 
                    for ($i = 1; $i <= $index; $i++){
                        $word = intToWords($i);
                        echo'<li><a class="smoothscroll active" id="'.$word.'" href="#page'.$i.'">0'.$i.'</a></li>
                        ';
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <?php
        $index = 0;
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
                    $index++; 
                echo'
                <div id="page'.$index.'">
                    <div class="contentContainer">
                        <h1 class="title"><span class="sub-title">Explore</span>'.$resortName.'</h1>
                        <a class="link-more" href="resort-detail.php?resort_id=' . $resortID .'"><br />Learn More</a>
                    </div>
                    <div class="imageContainer">
                        <div class="image image'.$index.'">
                        </div>
                    </div>
                </div>
                <style>
                    .imageContainer .image.image'.$index.' {
                        background: url("../images/resorts/'.$imageFilepath.'") 0% 50% no-repeat fixed;
                        background-size: cover;
                        background-position: center;
                    }
                </style>
                ';
            }
            } else {
                echo "No resorts found in the database.";
            }
            $_SESSION['current_index'] = $index;
            mysqli_close($conn);
        ?>
    </div>
<script src="../scripts/resortlist.js?v=2"> </script>
</body>

</html>