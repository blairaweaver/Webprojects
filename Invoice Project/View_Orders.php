<?php
/**
 * User: blair
 * Date: 4/7/18
 * Time: 11:09 AM
 */

$document_root = '/home/students/bw2335/public_html/orders';
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
$orders = file("$document_root/invoices.txt");

//count the total number of orders
$num_of_orders = count($orders);

//lets user know if no orders are there
if ($num_of_orders == 0) {
    echo "<p><strong>No orders have been made. Try again later</strong></p>";
}

//creates header of table
echo "<table>\n";
echo "<tr>
        <th>Order Number</th>
        <th>Item</th>
        <th>Description</th>
        <th>Unit Cost</th>
        <th>Quantity</th>
      </tr>";

//cycle through the orders
for ($i = 0; $i < $num_of_orders; $i++){
    //split order into rows
    $row = explode(",",$orders[$i]);

    //set order number
    $on = $i +1;

    //cycle through rows of the order
    for ($j = 0; $j < count($row); $j++) {
        //split the rows into cells
        $line = explode("\t",$row[$j]);

        //put data into table
        echo "<tr>
        <td>".$on."</td>
        <td>".$line[0]."</td>
        <td>".$line[1]."</td>
        <td>".$line[2]."</td>
        <td>".$line[3]."</td>
      </tr>";
    }

    //Some spacer rows. Would be better to implement with CSS. Temporary Solution
    echo "<tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>";
    echo "<tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>";
}

echo "</table>";

?>

</body>
</html>
