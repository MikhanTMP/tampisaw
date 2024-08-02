<?php 
include 'connect.php';

$resortname = $_POST['resortname'];
$resortcontact = $_POST['resortcontact'];
$resorttype = $_POST['resort-type'];
$resortaddress = $_POST['resorttype'];
$accommodation = $_POST['accommodation-type'];
$description = $_POST['description'];
$payment = $_POST['payment'];
$resortID = $_SESSION['resortID'] ;

//$sql = "UPDATE resorts SET resortname='$resortname', resort_contact='$resortcontact', resort_type='$resorttype', resort_address='$resortaddress', accommodation='$accommodation', resort_desc='$description', payment='$payment' WHERE resort_ID=$resortID";

// SQL query using prepared statements
$sql = "UPDATE resorts SET resortname=?, resort_contact=?, resort_type=?, resort_address=?, accommodation=?, resort_desc=?, payment=? WHERE resort_ID=?";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters to the prepared statement
mysqli_stmt_bind_param($stmt, "sssssssi", $resortname, $resortcontact, $resorttype, $resortaddress, $accommodation, $description, $payment, $resortID);

if (mysqli_stmt_execute($stmt)) {
    echo '
        <div class="modal" id="paymentModal">
            <div class="modal-content">
                <h2>Resort Updated Successfully!!</h2>
                <p>You may now proceed.</p>
                <button class="proceed-btn" onclick="proceedToResortList()">Proceed</button>
            </div>
        </div>
    ';
}else{
    echo '
    <div class="modal" id="paymentModal">
        <div class="modal-content">
            <h2>There was a problem updating the Resort.</h2>
            <p>Please, try again.</p>
            <button class="proceed-btn" onclick="proceedToResortList()">Proceed</button>
        </div>
    </div>
';
}
echo'
<style>
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
            }
            
            .modal-content {
                background-color: #fff;
                width: 300px;
                margin: 100px auto;
                padding: 20px;
                text-align: center;
                border-radius: 8px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            }
            
            .close {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 24px;
                font-weight: bold;
                cursor: pointer;
            }
            
            .modal h2 {
                margin-bottom: 10px;
                color: #333;
            }
            
            .modal p {
                margin-bottom: 20px;
                color: #555;
            }
            
            .proceed-btn {
                background-color: #007BFF;
                color: #fff;
                padding: 8px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
            
            .proceed-btn:hover {
                background-color: #0056b3;
            }
            </style>
            <script>
                showModal();
                function showModal() {
                    document.getElementById("paymentModal").style.display = "block";
                }
        
                // Function to close the modal
                function closeModal() {
                    document.getElementById("paymentModal").style.display = "none";
                }
        
                // Function to proceed to the resort list page
                function proceedToResortList() {
                    window.location.href = "Owner-Dashboard.php";
                }
            </script>
';

?>