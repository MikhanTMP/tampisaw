<?php 
    include 'connect.php';
    if (isset($_POST['addroomsubmit'])) {
        $conn->autocommit(FALSE);
        try {
            $resortID = $_SESSION['resortID'];
            $tmp_name = $_FILES['roomimg']['tmp_name'];
            $imgData = addslashes(file_get_contents($tmp_name)); // Convert image to blob data
            $roomname = $_POST['roomname'];
            $roomsize = $_POST['roomsize']." sqm";
            $roomquantity = $_POST['roomquantity'];
            $roomcapacity = $_POST['roomcapacity'];
            $roomrate = $_POST['roomrate'];
            $bedquantity = $_POST['bedquantity'];
            $bedtype = $_POST['bedtype'];
            $sqlRoom = "INSERT INTO rooms (resort_ID, room_name, room_size, room_quantity, room_capacity, room_rate, bed_quantity, bed_type, room_img) 
            VALUES ('$resortID','$roomname', '$roomsize', '$roomquantity', '$roomcapacity', '$roomrate', '$bedquantity', '$bedtype', '$imgData')";
            $conn->query($sqlRoom);
            $roomID = $conn->insert_id;
            if (!empty($_POST['amenities'])) {
                $amenities = $_POST['amenities'];
                foreach ($amenities as $amenity) {
                    // Perform the amenities insertion query
                    $sqlAmenity = "INSERT INTO amenities (room_ID, amenity_name) VALUES ('$roomID', '$amenity')";
                    $conn->query($sqlAmenity);
                }
            }
             else{
                echo 'Something wrong happened';
            }

            $conn->commit();
            exit();

        }
        catch(Exception $e){
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
    $conn->close();
?>