<?php

$con = mysqli_connect('localhost','root','') or die('Cannot connect to server');
mysqli_select_db($con, 'attsystem') or die ('Cannot found database');
?>