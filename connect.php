<?php
$con= mysqli_connect('localhost', 'root', '', 'backend');
if(!$con){
    die('Can`\'t connect to database');
}