<?php
/**
 * Created by PhpStorm.
 * User: blair
 * Date: 4/26/18
 * Time: 6:29 PM
 */

require_once ("../../config.php");

$sql = "SELECT * FROM contacts";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link
        rel="stylesheet"
        type="text/css"
        href="../html/invoicestyle.css"
    >
</head>
<h1>Contacts from Database</h1>
<?php
$results = mysqli_query($conn, $sql)
or die("Something is wrong with your SQL statement");
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
while ($row = mysqli_fetch_array($results)) {
    echo "<tr>
        <td>".$row['uid']."</td>
        <td>".$row['fname']."</td>
        <td>".$row['lname']."</td>
        <td>".$row['address']."</td>
        <td>".$row['state']."</td>
        <td>".$row['zip']."</td>
        <td>".$row['phone']."</td>
        <td>".$row['email']."</td>
      </tr>";
}
echo "</table>";
?>
</body>
</html>
