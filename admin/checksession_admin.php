<?php
session_start();
if(empty($_SESSION['admin']))
{
header('Location: admin_login.php');
}
?>