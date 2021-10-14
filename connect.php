<?php
$con = mysqli_connect('eu-cdbr-west-01.cleardb.com', 'b5f4671c90ec0c', '06fdfc84', 'heroku_008dd6fd6858b5c');
if (!$con) {
    die('Can`\'t connect to database');
}

//mysql://b5f4671c90ec0c:06fdfc84@eu-cdbr-west-01.cleardb.com/heroku_008dd6fd6858b5c?reconnect=true