<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tampisaw/css/admindash.css?v=4">
    <link rel="icon" href="/Tampisaw/images/logos/Logo.png" type="image/png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>

<body>
    <header>

    </header>
    <div class="nav-btn">Menu</div>
    <div class="container">

        <div class="sidebar">
            <nav>
                <a href="#">Tampi<span>Saw</span></a>
                <ul>
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="admin-login.php">Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="main-content">
            <h1>Dashboard</h1>
            <p>Welcome back, admin!</p>
            <div class="panel-wrapper">
                <div class="panel-head">
                    Analytics
                </div>
                <div class="panel-body">
                    <div class="analytics-content">
                        <div class="user-num">
                            <img width="78" height="78" src="https://img.icons8.com/glyph-neue/64/group--v1.png"
                                alt="group--v1" />
                            <?php 
                        include 'connect.php';
                            $sql = "SELECT COUNT(user_ID) AS total_users FROM users";
                            $result = $conn->query($sql);
                            if ($result) {
                                // Fetch the result as an associative array
                                $row = $result->fetch_assoc();
                            
                                // Access the total_users value
                                $totalUsers = $row['total_users'];
                            
                                // Output the total number of users
                            } else {
                                // If the query was not successful, handle the error
                                echo "Error: " . $conn->error;
                            }
                            $conn->close();
                        ?>
                            <p>Users: <span><?php echo $totalUsers; ?></span></p>
                        </div>
                        <div class="owner-num">
                            <img width="78" height="78" src="https://img.icons8.com/ios-glyphs/60/caretaker.png"
                                alt="caretaker" />
                            <?php 
                        include 'connect.php';
                            $sql = "SELECT COUNT(owner_ID) AS total_owners FROM owners";
                            $result = $conn->query($sql);
                            if ($result) {
                                $row = $result->fetch_assoc();
                                $totalOwners = $row['total_owners'];
                            } else {
                                echo "Error: " . $conn->error;
                            }
                            $conn->close();
                        ?>
                            <p>Owners: <?php echo $totalOwners; ?></p>
                        </div>
                        <div class="booking-num">
                            <img width="78" height="78" src="https://img.icons8.com/sf-black-filled/64/booking.png"
                                alt="booking" />
                            <?php 
                        include 'connect.php';
                            $sql = "SELECT COUNT(booking_ID) AS total_books FROM bookings";
                            $result = $conn->query($sql);
                            if ($result) {
                                $row = $result->fetch_assoc();
                                $totalBooks = $row['total_books'];
                            } else {
                                echo "Error: " . $conn->error;
                            }
                            $conn->close();
                        ?>
                            <p>Bookings: <span><?php echo $totalBooks; ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-wrapper">
                <div class="panel-head">
                    Booking Table
                </div>
                <div class="panel-body">
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
                                    $query = "SELECT * FROM bookings";
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
                                    $conn->close(); 
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-wrapper">
                <div class="panel-head">
                    Owners
                </div>
                <div class="panel-body">
                    <table>
                            <thead>
                                <tr>
                                    <th>Owner ID</th>
                                    <th>Owner Email</th>
                                    <th>Owner Name</th>
                                    <th>Owner Contact</th>
                                    <th>Registration Date</th>
                                    <th>Verification Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                include 'connect.php';
                                    $query = "SELECT * FROM owners";
                                    $result = mysqli_query($conn, $query);
                                    $loopindex = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $ownername = $row['owner_name'];
                                        $owneremail = $row['owner_email'];
                                        $ownerID= $row['owner_ID'];
                                        $ownercontact = $row['owner_contact'];
                                        $regdate = $row['reg_date'];
                                        $verstat = $row['verification'];
                                    echo"
                                        <tr>
                                        <td>$ownerID</td>
                                        <td>$owneremail</td>
                                        <td>$ownername</td>
                                        <td>0$ownercontact</td>
                                        <td>$regdate</td>
                                        <td><select class='custom-select'>
                                            <option>$verstat</option>
                                            <option>Approved</option>
                                        </select></td>
                                        <td><button> Delete </button></td>
                                        </tr>
                                    ";
                                    }
                            ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>