<?php
$db_conx = mysqli_connect("localhost", "db_user", "db_password", "db_name");
if (!$db_conx) { die( mysqli_connect_error() ); }

$list = "";
$sql = "SELECT customers.customerName, customers.country, employees.firstName, employees.lastName
FROM customers INNER JOIN employees
ON customers.salesRepEmployeeNumber = employees.employeeNumber
ORDER BY country, customerName;";
$query = mysqli_query($db_conx, $sql) or die( mysqli_error($db_conx) );
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
    $list .= $row["customerName"].", ".$row["country"]." - ".$row["firstName"]." ".$row["lastName"];
    }

    mysqli_close($db_conx);
    echo $list;
    ?>
