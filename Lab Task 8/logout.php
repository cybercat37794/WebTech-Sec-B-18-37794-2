<?php
# Lab Task 6
# logout.php

session_start(); # session start

session_destroy(); # session destroy

header('location:login.php');

?>
