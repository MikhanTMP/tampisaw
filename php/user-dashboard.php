<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tampisaw/css/userdashboard.css?v=5">
    <link rel="icon" href="/Tampisaw/images/logos/Logo.png" type="image/png">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>User Dashboard</title>
</head>

<?php
    session_start();
    var_dump($_SESSION);
        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
          include 'connect.php';
          $userID = $_SESSION['userID'];
          $sql = "SELECT * FROM users WHERE user_ID = '$userID'";
          $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                        $name = $row['fullname'];  
                        $email = $row['email']; 
                } else {
                    echo 'No available data';
                }
        }
        else {
            header("Location: user-join.php");
            session_destroy(); 
            exit(); 
        }
?>      
<body>
    <!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container" id="cont">
    <a class="navbar-brand js-scroll-trigger" href="../index.php">TAMPISAW</a>
    <div>
      <ul class="navbar-nav text-uppercase ml-auto">
        <li class="nav-item">
          <a class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-sign-out"></i> Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--our content goes here-->
<div class="container content">
  <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar position-fixed">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <img src="" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            <?php echo $name ?>
          </div>
          <div class="profile-usertitle-job">
          <?php echo $email ?>
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm">Edit</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu sidebar-sticky">
          <ul class="nav flex-column">
          <li class="nav-item">
              <a class="nav-link" href="../index.php">
                <i class="fa fa-check"></i>
                Home </a>
            </li>
            <li class="active nav-item">
              <a href="#" class="nav-link active">
                <i class="fa fa-home"></i>
                Overview </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" target="_blank">
                <i class="fa fa-check"></i>
                Help </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="destroyuser.php">
                <i class="fa fa-flag"></i>
                Logout </a>
            </li>
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
    <div class="col-md-9">
      <div class="profile-content">
      <table id="bookingTable">
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
              $query = "SELECT * FROM bookings WHERE user_ID=".$userID;
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
              mysqli_close($conn);
          ?> 
        </tbody>
    </table>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-9 ft">
      <footer class="footer">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; TAMPISAW 2023</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
</div>

</body>
</html>