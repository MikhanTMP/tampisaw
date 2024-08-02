<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="icon" href="/Tampisaw/images/logos/Logo.png" type="image/png">
    <link rel="stylesheet" href="../css/payment.css?v=4">
</head>
<?php 

    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $roomID = $_SESSION['roomID'];
        $resID = $_SESSION['resID'];
        $roomName = $_SESSION['roomName'];
        $roomRate = $_SESSION['roomRate'];
        $checkin = $_POST['checkin'] ;
        $checkout = $_POST['checkout'] ;
        $adult = $_POST['adult'];
        $children = $_POST['children'];
        $userID = $_SESSION['userID'];
    }else{
        echo'There was a problem handling your data';
    }


?>
<body>
        <div class="checkout-panel">
            <div class="panel-body">
                <h2 class="title">Pay Here!</h2>
            
                <div class="progress-bar">
                <div class="step active"></div>
                <div class="step active"></div>
                <div class="step"></div>
                <div class="step"></div>
                </div>
            
                <div class="payment-method">
                <label for="card" class="method card">
                    <div class="card-logos">
                    <img src="https://designmodo.com/demo/checkout-panel/img/visa_logo.png"/>
                    <img src="https://designmodo.com/demo/checkout-panel/img/mastercard_logo.png"/>
                    </div>
            
                    <div class="radio-input">
                    <input id="card" type="radio" name="payment">
                    Pay PHP <?php echo $roomRate?> with credit card
                    </div>
                </label>
            
                <label for="paypal" class="method paypal">
                    <img src="https://designmodo.com/demo/checkout-panel/img/paypal_logo.png"/>
                    <div class="radio-input">
                    <input id="paypal" type="radio" name="payment">
                    Pay PHP <?php echo $roomRate?> with PayPal
                    </div>
                </label>
                </div>
            
                <div class="input-fields">
                <div class="column-1">
                    <label for="cardholder">Name</label>
                    <input type="text" id="cardholder" value="<?php echo $roomName?>"/>
            
                    <div class="small-inputs">
                    <div>
                        <label for="date">Valid date</label>
                        <input type="text" id="date"/>
                    </div>
            
                    <div>
                        <label for="verification">CVV / CVC *</label>
                        <input type="password" id="verification"/>
                    </div>
                    </div>
            
                </div>
                <div class="column-2">
                    <label for="cardnumber">Card Number</label>
                    <input type="password" id="cardnumber"/>
            
                    <span class="info">* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
                </div>
                </div>
            </div>
            
            <div class="panel-footer">
                <button class="btn back-btn">Back</button>
                <button type='submit' id="finish-btn" class="btn next-btn" onclick="showModal()">Finish</button>
            </div>
        </div>

        <div class="modal" id="paymentModal">
            <div class="modal-content">
                <h2>Payment Successful!</h2>
                <p>Thank you for your payment.</p>
                <button class="proceed-btn" onclick="proceedToResortList()">Proceed</button>
            </div>
        </div>

<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'connect.php';
    $sql = "INSERT INTO bookings (resort_ID, user_ID, room_ID, payment_cost, checkin, checkout, adult, children)
            VALUES ('$resID', '$userID', '$roomID', '$roomRate', '$checkin', '$checkout', '$adult', '$children')";
    if (mysqli_query($conn, $sql)) {

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    // Close the database connection
    mysqli_close($conn);
} else {
    echo 'There was a problem handling your data';
}
?>
</body>
    <script>
        function showModal() {
            document.getElementById("paymentModal").style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById("paymentModal").style.display = "none";
        }

        // Function to proceed to the resort list page
        function proceedToResortList() {
            window.location.href = "resort-list.php";
        }
    </script>
</html>