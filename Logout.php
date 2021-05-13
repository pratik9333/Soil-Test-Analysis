<?php
session_start();
session_destroy();
header("location:http://localhost/Soil Test Analysis/index.php");
?>