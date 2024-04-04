<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $_SESSION['editButtonClickedId'] = $_POST['id'];
    }

?>