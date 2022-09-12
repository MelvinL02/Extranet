<?php

// Deconnexion de la session connectée //

session_start();
session_destroy();
header("location:login.php");
?>