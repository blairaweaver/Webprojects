<?php
/**
 * User: blair
 * Date: 4/5/18
 * Time: 4:32 PM
 */

//path for directory where file is stored. Not idea for security reasons
$document_root = "/home/students/bw2335/public_html/orders";
//set timezone for date. Not ideal since server could be in different timezone to customer
date_default_timezone_set("America/New_York");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Processed</title>
</head>
<body>

<?php
//initialize outputstring
$outputstring = "";

//set number of rows to end and c to zero
$end = count($_POST['rows']);
$c = 0;

//cycle through the rows
//(Current a bug where the last row is entered twice.
//Believe to be due to placement of $c+=1 since both if statements will be called)
foreach($_POST['rows'] as $row):

//    if not the last row
    if ($c < $end) {
//        add information to output string and 1 to c (comma distinguishes between rows)
        $outputstring .= $row['item']."\t".$row['description']."\t".$row['uc']."\t".$row['quantity'].",";
        $c+=1;
    }

//    if last row
    if ($c == $end) {

//      add information to output string
        $outputstring .= $row['item']."\t".$row['description']."\t".$row['uc']."\t".$row['quantity'];
    }
endforeach;

//add newline character to output (distinguishes between orders)
$outputstring .= "\n";

//open file for appending
@$fp = fopen("$document_root/invoices.txt",'ab');

//catch error if file could not be opened and exit
if (!$fp) {
    echo "<p><strong>Your order could not be processed at this time. Please try again later.</strong></p>";
    exit;
}
//Writing lock on file and writing output string to file. Then release lock and close file
flock($fp, LOCK_EX);
fwrite($fp,$outputstring);
flock($fp, LOCK_UN);
fclose($fp);

//message to user to let them know the order has been processed
echo "<p> Order Processed at ";
echo date('H:i, jS F Y');
echo "</p>";
?>

<body>
