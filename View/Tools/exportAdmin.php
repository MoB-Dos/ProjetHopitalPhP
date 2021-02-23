<?php
    $host="localhost";
    $username="root";
    $password="";
    $dbname="hopitalphp";
    $con = new mysqli($host, $username, $password,$dbname); 

        $sql_data="select * from infouser where idinfo=1";
        $result_data=$con->query($sql_data);
        $results=array();
    $filename = "Webinfo.xls"; // File Name
    // Download file
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;
    while ($row = mysqli_fetch_assoc($result_data)) {
        if (!$flag) {
            // display field/column names as first row
            echo implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
        }
        echo implode("\t", array_values($row)) . "\r\n";
    }
    ?>