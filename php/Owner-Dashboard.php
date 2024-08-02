<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tampisaw/css/ownerdash.css?v=6">
    <link rel="icon" href="/Tampisaw/images/logos/Logo.png" type="image/png">
    <title>Owner Dashboard</title>
</head>
<?php
session_start();

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    include 'connect.php';

    $ownerID = $_SESSION['ownerID'];
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM owners WHERE owner_ID = '$ownerID'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['owner_name'];
        $id = $row['owner_ID'];
        $regdate = $row['reg_date'];
        $email = $row['owner_email'];
        $verificationstatus = $row['verification'];
        $dob = $row['owner_dob'];
        $gender = $row['owner_gender'];
        $contact = $row['owner_contact'];
    } else {
        echo 'No Available Data';
    }
    $getresortinfo = "SELECT * FROM resorts WHERE owner_email = '$email'";
    $resortresult = $conn->query($getresortinfo);
    if ($resortresult->num_rows == 1) {
        $resortrow = $resortresult->fetch_assoc();
        $resortname = $resortrow['resortname'];
        $resortID = $resortrow['resort_ID'];
        $_SESSION['resortID'] = $resortID;
        $resortcontact = $resortrow['resort_contact'];
        $resorttype = $resortrow['resort_type'];
        $resortaddress = $resortrow['resort_address'];
        $accommodation = $resortrow['accommodation'];
        $description = $resortrow['resort_desc'];
        $payment = $resortrow['payment'];
    } else {
        echo 'modal again here to tell na error langs';
    }
    $_SESSION['resortID'] = $resortID;
} else {
    header("Location: Owner-Login.php");
    session_destroy();
    exit();
}
?>

<body>
    <div class="container">
        <div id="sidebar">
            <div class="list">
                <div class="item" id="mp"><a href="#">My Profile</a> </div>
                <div class="item" id="bs"><a href="#">Bookings</a></div>
                <div class="item" id="ri"><a href="#">Resort Information</a></div>
                <div class="item" id="st"><a href="#">Settings</a></div>
                <div class="item" id="hp"><a href="#">Help</a></div>
                <div class="item" id="lo"><a href="destroyowner.php">Logout</a></div>
            </div>
        </div>

        <div class="my-profile" style="display: none;">
            <header class="navbar">
                    <div class="left-side">Tampisaw</div>
                    <div class="right-side">
                        <button class="logout-button">Logout</button>
                    </div>
            </header>
            <div class="content">
                <div class="content-container">
                    <img src="/tampisaw/images/icons/man_318-233556.avif" alt="Profile Picture" class="profile-img">
                    <div class="content-details">
                        <p id="name-handler"><?php echo $name; ?></p>
                        <p id="id-handler">Owner ID: <?php echo $ownerID; ?></p>
                        <div class="details-button">
                            <button class="edit-button">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="more-info-1">
                    <div class="info-1-cont">
                        <p>Registration Date:<span id="regdate"><?php echo $regdate; ?></span></p>
                        <p>Verification Status: <span id="verstat"><?php echo $verificationstatus; ?></span></p>
                        <p>Role: <span id="role">Resort Owner</span></p>
                        <p>Status: <span id="status">Active</span></p>
                        <div class="table-info">
                            <table class="table-info-1">
                                <tbody>
                                    <tr>
                                        <th>Website Permission</th>
                                        <th>Read</th>
                                        <th>Write</th>
                                        <th>Create</th>
                                        <th>Delete</th>
                                    </tr>
                                    <tr>
                                        <td>Users</td>
                                        <td><img src="/tampisaw/images/icons/check.svg" alt="Yes"></td>
                                        <td><img src="/tampisaw/images/icons/x.png" alt=""></td>
                                        <td><img src="/tampisaw/images/icons/x.png" alt=""></td>
                                        <td><img src="/tampisaw/images/icons/x.png" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td>Owners</td>
                                        <td><img src="/tampisaw/images/icons/check.svg" alt=""></td>
                                        <td><img src="/tampisaw/images/icons/check.svg" alt=""></td>
                                        <td><img src="/tampisaw/images/icons/check.svg" alt=""></td>
                                        <td><img src="/tampisaw/images/icons/x.png" alt=""></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="more-info-2">
                    <div class="info-2-cont">
                        <h1>Personal Info:</h1>
                        <p>Name: <span id="name"><?php echo $name; ?></span></p>
                        <p>Email: <span id="email"><?php echo $email; ?></span></p>
                        <p>Date of Birth: <span id="dob"><?php echo $dob; ?></span></p>
                        <p>Gender: <span id="gender"><?php echo $gender; ?></span></p>
                        <p>Contact Information: +639<span id="contact-info"><?php echo $contact; ?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bookings" style="display: none;">
            <header class="navbar">
                    <div class="left-side">Tampisaw</div>
                    <div class="right-side">
                        <button class="logout-button">Logout</button>
                    </div>
            </header>
            <div class="content-2">
                <div class="bookinginfo">
                    <div id="bookingMonitor">
                        <h2>Booking Monitor</h2>
                        <table>
                            <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>User ID</th>
                                <th>Resort Name</th>
                                <th>Room ID</th>
                                <th>Payment Cost</th>
                                <th>Check-in</th>
                                <th>Checkout</th>
                                <th>Adult</th>
                                <th>Children</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                include 'connect.php';
                                    $query = "SELECT * FROM bookings WHERE resort_ID=".$resortID;
                                    $result = mysqli_query($conn, $query);
                                    $loopindex = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $bookID = $row['booking_ID'];
                                        $userID = $row['user_ID'];
                                        $resortID = $row['resort_ID'];
                                            $query2 = "SELECT resortname FROM resorts WHERE resort_ID=".$resortID; 
                                            $result2 = mysqli_query($conn, $query2); 
                                            if ($result2->num_rows == 1) {
                                            $row2 = $result2->fetch_assoc();
                                            $resortName = $row2['resortname']; 
                                            }
                                        $roomID = $row['room_ID'];
                                            $query3 = "SELECT room_name FROM rooms WHERE room_ID=".$roomID; 
                                            $result3 = mysqli_query($conn, $query3); 
                                            if ($result3->num_rows == 1) {
                                            $row3 = $result3->fetch_assoc();
                                            $roomName = $row3['room_name']; 
                                            }
                                        $paymentCost = $row['payment_cost'];
                                        $checkin = $row['checkin'];
                                        $checkout = $row['checkout'];
                                        $adult = $row['adult'];
                                        $children = $row['children'];
                                        echo "
                                            <tr>
                                                <td>$bookID</td>
                                                <td>$userID</td>
                                                <td>$resortName</td>
                                                <td>$roomName</td>
                                                <td>$paymentCost</td>
                                                <td>$checkin</td>
                                                <td>$checkout</td>
                                                <td>$adult</td>
                                                <td>$children</td>
                                            </tr>";
                                    }
                                ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="resort-info">
            <header class="navbar">
                <div class="left-side">Tampisaw</div>
                <div class="right-side">
                    <button class="logout-button">Logout</button>
                </div>
            </header>
            <div class="content-3">
                <div class="resort-details">
                    <form action="upload-images.php" method="POST" enctype="multipart/form-data">
                        <label for="images"> </label>
                        <input type="file" name="images[]" accept="image/jpeg, image/png, image/gif" multiple>
                        <input type="submit" name="submit" value="Upload">
                    </form>
                    <h2>Images: </h2>
                    <div class="imageflex">
                    <?php
                        include 'get-images.php';
                        foreach ($imagePaths as $imagePath) {
                            $imageUrl = "../images/resorts/" . $imagePath;
                            echo "<img src='$imageUrl' alt='Uploaded Image' style='width: 300px; height: 200px; margin: 10px;' id='imageflex'>";
                        }
                    ?>
                    </div>

                    <div class="card">
                        <div class="cardcard">
                        <div class="circles">
                            <div class="c"></div>
                            <div class="c"></div>
                            <div class="c"></div>
                        </div>
                        </div>
                        <div class="card-contents">
                            <div class="cont-1">
                            <h2>Resort ID: <span><?php echo $resortID; ?></span></h2>
                            <h2>Resort Name: <span><?php echo $resortname; ?></span></h2>
                            <h2>Resort Contact: +639<span><?php echo $resortcontact; ?></span></h2>
                            <h2>Resort Type: <span><?php echo $resorttype; ?></span></h2>
                            <h2>Resort Address: <span><?php echo $resortaddress; ?></span></h2>
                            <h2>Resort Accommodation: <span><?php echo $accommodation; ?></span></h2>
                            <h2>Resort Description: <span><?php echo $description; ?></span></h2>
                            <h2>Payment Settings: <span><?php echo $payment; ?></span></h2>
                            <h2>Rooms: <button id="addroombtn">Add Room</button></h2>
                            <h2>Edit Details: <button id="editbtn">Edit</button></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-rooms" id="add-rooms" style="display: none;">
            <form action="" method="POST" enctype="multipart/form-data">
                <h1>ADD ROOM</h1>
                <label for="roomname">Room Name: </label>
                <input type="text" name="roomname">
                <br>
                <label for="roomsize">Size (sqm): </label>
                <input type="text" name="roomsize">
                <br>
                <label for="roomquantity">Quantity: </label>
                <input type="text" name="roomquantity">
                <br>
                <label for="roomcapacity">Capacity: </label>
                <input type="text" name="roomcapacity">
                <br>
                <label for="roomrate">Rate: </label>
                <input type="text" name="roomrate">
                <br>
                <label for="bedquantity">Beds:</label>
                <input type="text" name="bedquantity">
                <br>
                <label for="bedtype">Bed Type: </label>
                <input type="text" name="bedtype">
                <br>
                <label for="roomimg">Room Footage: </label>
                <input type="file" name="roomimg">
                <br>
                <div class="amenities">
                    <h3>Select Ameneties</h3>
                    <input type="checkbox" id="oceanView" name="amenities[]" value="Ocean View">
                    <label for="oceanView">Ocean View</label><br>

                    <input type="checkbox" id="privateBalcony" name="amenities[]" value="Private Balcony/Patio">
                    <label for="privateBalcony">Private Balcony/Patio</label><br>

                    <input type="checkbox" id="airConditioning" name="amenities[]" value="Air Conditioning">
                    <label for="airConditioning">Air Conditioning</label><br>

                    <input type="checkbox" id="freeWifi" name="amenities[]" value="Free Wi-Fi">
                    <label for="freeWifi">Free Wi-Fi</label><br>

                    <input type="checkbox" id="flatScreenTV" name="amenities[]" value="Flat-screen TV">
                    <label for="flatScreenTV">Flat-screen TV</label><br>

                    <input type="checkbox" id="miniFridge" name="amenities[]" value="Mini Fridge">
                    <label for="miniFridge">Mini Fridge</label><br>

                    <input type="checkbox" id="roomService" name="amenities[]" value="Room Service">
                    <label for="roomService">Room Service</label><br>

                    <input type="checkbox" id="inRoomSafe" name="amenities[]" value="In-room Safe">
                    <label for="inRoomSafe">In-room Safe</label><br>

                    <input type="checkbox" id="complimentaryBreakfast" name="amenities[]" value="Complimentary Breakfast">
                    <label for="complimentaryBreakfast">Complimentary Breakfast</label><br>

                    <input type="checkbox" id="swimmingPool" name="amenities[]" value="Swimming Pool">
                    <label for="swimmingPool">Swimming Pool</label><br>

                    <input type="checkbox" id="beachAccess" name="amenities[]" value="Beach Access">
                    <label for="beachAccess">Beach Access</label><br>

                    <input type="checkbox" id="spaServices" name="amenities[]" value="Spa Services">
                    <label for="spaServices">Spa Services</label><br>

                    <input type="checkbox" id="fitnessCenter" name="amenities[]" value="Fitness Center">
                    <label for="fitnessCenter">Fitness Center</label><br>

                    <input type="checkbox" id="waterSportsRental" name="amenities[]" value="Water Sports Equipment Rental">
                    <label for="waterSportsRental">Water Sports Equipment Rental</label><br>

                    <input type="checkbox" id="kidsClub" name="amenities[]" value="Kids' Club">
                    <label for="kidsClub">Kids' Club</label><br>

                    <input type="checkbox" id="onSiteRestaurant" name="amenities[]" value="On-site Restaurant">
                    <label for="onSiteRestaurant">On-site Restaurant</label><br>

                    <input type="checkbox" id="beachfrontBar" name="amenities[]" value="Beachfront Bar">
                    <label for="beachfrontBar">Beachfront Bar</label><br>

                    <input type="checkbox" id="conciergeService" name="amenities[]" value="Concierge Service">
                    <label for="conciergeService">Concierge Service</label><br>

                    <input type="checkbox" id="laundryFacilities" name="amenities[]" value="Laundry Facilities">
                    <label for="laundryFacilities">Laundry Facilities</label><br>

                    <input type="checkbox" id="shuttleService" name="amenities[]" value="Shuttle Service">
                    <label for="shuttleService">Shuttle Service</label><br>
                </div>
                <button type="submit" name="addroomsubmit">Add Room</button>
                <button id="cancelbtn" style="background-color: red;">Cancel</button>
            </form>
        </div>

        <div class="edit-resort-info"style="display: none;" >
            <form action="" method="POST" enctype="multipart/form-data"">
                        <h1>Edit</h1>
                        <label for=" resortname">Resort Name: </label>
                <input type="text" name="resortname" value="<?php echo $resortname; ?>">
                <br>
                <label for="resortcontact">Resort Contact: </label>
                <input type="text" name="resortcontact" value="<?php echo $resortcontact; ?>">
                <br>
                <label for="resort-type">Resort Type</label>
                <select id="resort-type" name="resort-type" required>
                    <option value="Beach" <?php if ($resorttype === "beach") echo "selected"; ?>>Beach Resort</option>
                    <option value="Mountain" <?php if ($resorttype === "mountain") echo "selected"; ?>>Mountain Resort
                    </option>
                    <option value="Other" <?php if ($resorttype === "other") echo "selected"; ?>>Other</option>
                </select>
                <br>
                <label for="resorttype">Resort Address: </label>
                <input type="text" name="resorttype" value="<?php echo $resortaddress; ?>">
                <br>
                <label for="accomodation-type">Accommodation: </label>
                <select id="accommodation-type" name="accommodation-type">
                    <option value="hotel" <?php if ($accommodation === "hotel") echo "selected"; ?>>Hotel</option>
                    <option value="resort" <?php if ($accommodation === "resort") echo "selected"; ?>>Resort</option>
                    <option value="vacation-rentals" <?php if ($accommodation === "vacation-rentals") echo "selected"; ?>>Vacation Rentals</option>
                </select>
                <br>
                <label for="description"> Resort Description: </label>
                <textarea name="description" id="" cols="50" rows="10"><?php echo $description; ?></textarea>
                <br>
                <label for="payment">Payment: </label>
                <select id="payment" name="payment">
                    <option value="" <?php if ($payment === "") echo "selected"; ?> disabled> Select Payment Method
                    </option>
                    <option value="Gcash" <?php if ($payment === "Gcash") echo "selected"; ?>>Gcash</option>
                    <option value="Paypal" <?php if ($payment === "Paypal") echo "selected"; ?>>Paypal</option>
                    <option value="Cash" <?php if ($payment === "Cash") echo "selected"; ?>>Cash</option>
                </select>
                <br>
                <button type="submit" name="editsubmit">Edit</button>
                <button id="cancelbtn" style="background-color: red;">Cancel</button>
            </form>
        </div>
    </div>
    <?php 
        if(isset($_POST['editsubmit'])){
            include 'edit-resort.php'; 
        }else if(isset($_POST['addroomsubmit'])){
            include 'add-room.php';
        }
        ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../scripts/owner.js?v=6"></script>

</body>

</html>