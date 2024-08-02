<?php 
    session_destroy();
    session_unset();
    header("Location: Owner-Login.php");
?> 