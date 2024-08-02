<?php 

function sanitize($data)
{
    return htmlspecialchars(trim($data));
}
$email = sanitize($_POST['email']);
$password = $_POST['password'];

$query = "SELECT owner_email, owner_password, owner_ID FROM owners WHERE owner_email = '$email' AND owner_password = '$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $ownerID = $row['owner_ID'];
    $_SESSION['email'] = $email;
    $_SESSION['ownerID'] = $ownerID;
    $_SESSION['authenticated'] = true;
    header("Location: /tampisaw/php/Owner-Dashboard.php");
    exit();
} else {
    // Password is incorrect
    $error_message = "Invalid email or password.";
}

echo $error_message;
?>
