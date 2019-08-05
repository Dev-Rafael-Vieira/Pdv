<?php
session_start();

$_SESSION['login'] = 0;

header("Location: http://localhost/pdv/?view=Dashboard1");
?>