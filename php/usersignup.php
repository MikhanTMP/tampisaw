<?php 
    include 'connect.php';
    try{
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST ['password'];
        $sql = "INSERT INTO users (fullname, email, user_password) VALUES ('$fullname', '$email', '$password')";
        if ($conn->query($sql)) {
            echo '
            <div class="modal" id="paymentModal">
                <div class="modal-content">
                    <h2>Signup Successful!</h2>
                    <p>Thank you for signing up!.</p>
                    <button class="proceed-btn" onclick="proceedToResortList()">Proceed</button>
                </div>
            </div>
        ';
        } else {
            throw new Exception("An error occurred while processing the form.");
        }
    }catch (Exception $e) {
        echo '
        <div class="modal" id="paymentModal">
            <div class="modal-content">
                <h2>Signup Failed!</h2>
                <p>User Already Exist!</p>
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
                    window.location.href = "user-join.php";
                }
            </script>';
            $conn->close(); 
?>