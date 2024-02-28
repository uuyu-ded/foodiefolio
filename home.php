<?php
session_start();
include("connection.php");
if(!isset($_SESSION["username"])){
    echo "milena";
    //header("location:login.html");
    exit();
}