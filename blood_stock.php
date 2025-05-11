<?php
include 'db_donor_and_recepient.php'; // Include database connection

$sql = "SELECT blood_type, units_available FROM blood_stock";
$result = $conn->query($sql);

$bloodStock = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bloodStock[$row['blood_type']] = $row['units_available'];
    }
}

header('Content-Type: application/json');
echo json_encode($bloodStock);

$conn->close();
?>