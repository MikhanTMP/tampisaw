<?php 
try{
    $name = $_POST['name'];
    $dob= $_POST['dob'];
    $email= $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $verification = "Pending";
    $contactNum = $_POST['ownercontact'];

    $resortname =$_POST['resort-name'];
    $resorttype =$_POST['resort-type'];
    $accommodation =$_POST['accommodation-type'];
    $resortaddress =$_POST['resort-address'];
    $resortcontact =$_POST['resort-contact'];
    $license = file_get_contents($_FILES["License"]["tmp_name"]);
    $curdate = $_POST['myDateInput'];
    $license = $conn->real_escape_string($license);

    $sql = "INSERT INTO owners(owner_name, owner_dob, owner_email, owner_gender, owner_password, reg_date, verification, owner_contact)
            VALUES ('$name', '$dob', '$email', '$gender', '$password', '$curdate', '$verification' ,'$contactNum');";
    $sql .= "INSERT INTO resorts(owner_email, resortname, resort_type, accommodation, resort_address, resort_contact, license) 
            VALUES ('$email', '$resortname', '$resorttype', '$accommodation', '$resortaddress', '$resortcontact', '$license')";

    if ($conn->multi_query($sql)) {
        if ($conn->next_result()) {
            echo '
            <div class="modal-overlay" id="modal">
                <div class="modal-content success">
                    <h3>Success!</h3>
                    <p>Your registration has been submitted.</p>
                    <button id="successbtn">Ok</button>
                </div>
            </div>
                <script>
                        // JavaScript code for handling the "Ok" button click
                        document.getElementById("successbtn").addEventListener("click", function () {
                            closeModal();
                        });
                
                        function openModal() {
                            document.getElementById("modal").style.display = "block";
                        }
                
                        function closeModal() {
                            document.getElementById("modal").style.display = "none";
                        }
                
                        // Open the modal when the page loads (for demonstration purposes)
                        // You can remove this line and trigger the modal open function based on your use case.
                        openModal();
                </script>
                <style>
                .modal-overlay {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    z-index: 9999;
                }
        
                /* Styles for the modal content */
                .modal-content {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    text-align: center;
                    padding: 20px;
                    border: 2px solid #32CD32;
                    border-radius: 10px;
                    background-color: #f0f0f0;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    z-index: 10000;
                }
        
                h3 {
                    color: #32CD32;
                }
        
                #successbtn {
                    padding: 10px 20px;
                    margin-top: 20px;
                    background-color: #32CD32;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
        
                #successbtn:hover {
                    background-color: #228B22;
                }
                </style>
            ';
        } else {
            throw new Exception("An error occurred while processing the form.");
        }
    } else {
        throw new Exception("An error occurred while processing the form.");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>