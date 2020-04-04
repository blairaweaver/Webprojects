<?php
/**
 * User: blair
 * Date: 4/7/18
 * Time: 11:09 AM
 */

$document_root = '/home/students/bw2335/';
date_default_timezone_set("America/New_York");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <link
        rel="stylesheet"
        type="text/css"
        href="../html/invoicestyle.css"
    >
</head>
<body>

<?php

//read in the file
$orders = file("$document_root/contacts.txt");

//count the total number of orders
$num_of_orders = count($orders);

//lets user know if no orders are there
if ($num_of_orders == 0) {
    echo "<p><strong>No contacts have been saved. Try again later</strong></p>";
}

//creates header of table
echo "<table>\n";
echo "<tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Phone Number</th>
        <th>Email</th>
      </tr>";

//cycle through the orders
for ($i = 0; $i < $num_of_orders; $i++){
    //split order into rows
    $row = explode("\t",$orders[$i]);
    $uid = $i + 1;
    echo "<tr>
        <td>".$uid."</td>
        <td>".$row[0]."</td>
        <td>".$row[1]."</td>
        <td>".$row[2]."</td>
        <td>".$row[3]."</td>
        <td>".$row[4]."</td>
        <td>".$row[5]."</td>
        <td>".$row[6]."</td>
      </tr>";
}

echo "</table>";

?>

</body>
</html>
