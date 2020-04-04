<?php
/**
 * Created by PhpStorm.
 * User: blair
 * Date: 4/28/18
 * Time: 7:49 PM
 */

//path for directory where file is stored. Not idea for security reasons
$document_root = "/home/students/bw2335/";
//set timezone for date. Not ideal since server could be in different timezone to customer
date_default_timezone_set("America/New_York");
$stat=1;

if($_POST["database"]) {
    require_once("../../config.php");
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO contacts(fname, lname, address, state, zip, phone, email) VALUES ('".$fname."','".$lname."','".$address."','".$state."','".$zip."','".$phone."','".$email."')";

    if (mysqli_query($conn, $sql)) {
        $stat=1;
    }
    else{
        $stat=0;
    }
}

if($_POST["file"]) {
    //initialize outputstring
    $outputstring = $_POST['fname']."\t".$_POST['lname']."\t".$_POST['address']."\t".$_POST['state']."\t".$_POST['zip']."\t".$_POST['phone']."\t".$_POST['email']."\n";
    @$fp = fopen("$document_root/contacts.txt",'ab');

//catch error if file could not be opened and exit
    if (!$fp) {
        exit;
        $stat = 0;
    }
//Writing lock on file and writing output string to file. Then release lock and close file
    flock($fp, LOCK_EX);
    fwrite($fp,$outputstring);
    flock($fp, LOCK_UN);
    fclose($fp);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form Processed</title>
</head>
<body>

<?php
if ($stat==0){
    echo "<p> Contact Information could not be saved at this time </p> ";
}
else {
    //message to user to let them know the order has been processed
    echo "<p> Contact Information was Processed at ";
    echo date('H:i, jS F Y');
    echo "</p>";
}
?>

<body>
