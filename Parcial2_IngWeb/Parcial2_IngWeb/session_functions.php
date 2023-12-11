<?php
session_start();

function is_authenticated() {
    return isset($_SESSION['user_id']);
}

?>
