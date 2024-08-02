<?php 
    include 'connect.php'; 
    session_start();
    $resortID = $_SESSION['resortID'];
    echo $resortID;
    $sql = "SELECT booking_ID, user_ID, resort_ID, room_ID, payment_cost, checkin, checkout, adult, children FROM bookings WHERE resort_ID='$resortID'";
    $result = $connection->query($sql);
    $bookings = array();

    if ($result->num_rows > 0) {
        // Loop through the results and add them to the bookings array
        while ($row = $result->fetch_assoc()) {
            $bookings[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($bookings);
    $conn->close();
?>