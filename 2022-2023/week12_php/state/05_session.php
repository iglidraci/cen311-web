<?php
session_start();
session_destroy();
header("Location: 03_session.php");
?>