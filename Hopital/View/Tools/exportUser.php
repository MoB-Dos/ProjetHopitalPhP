<?php
session_start ();

/**
 * Connect to MySQL using PDO.
 */
$user = 'root';
$password = '';
$server = 'localhost';
$database = 'hopitalphp';
$pdo = new PDO("mysql:host=$server;dbname=$database", $user, $password);
$bdd= new PDO('mysql:host=localhost;dbname=hopitalphp;charset=utf8','root','');

    $req=$bdd->prepare('SELECT * FROM user WHERE login=?');
    $req->execute(array( $_SESSION['login']));
    $data = $req->fetch();
 $ja=$data[0];
//Query our MySQL table
$sql = "SELECT * FROM infouser WHERE idinfo=?";
$stmt = $pdo->prepare($sql);
 $stmt->execute(array($ja));

 /*   //Sélection dans la table utilisateur
    $req=$bdd->prepare('SELECT * FROM infouser WHERE login= ?');
    $req->execute(array( $_SESSION['login']));
*/
//Retrieve the data from our table.
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
//The name of the Excel file that we want to force the
//browser to download.
$filename = 'MesInfo.xls';
 
//Send the correct headers to the browser so that it knows
//it is downloading an Excel file.
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename");  
header("Pragma: no-cache"); 
header("Expires: 0");
 
//Define the separator line
$separator = "\t";
 
//If our query returned rows
if(!empty($rows)){
    
    //Dynamically print out the column names as the first row in the document.
    //This means that each Excel column will have a header.
    echo implode($separator, array_keys($rows[0])) . "\n";
    
    //Loop through the rows
    foreach($rows as $row){
        
        //Clean the data and remove any special characters that might conflict
        foreach($row as $k => $v){
            $row[$k] = str_replace($separator . "$", "", $row[$k]);
            $row[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row[$k]);
            $row[$k] = trim($row[$k]);
        }
        
        //Implode and print the columns out using the 
        //$separator as the glue parameter
        echo implode($separator, $row) . "\n";
    }
}
?>