<?php
include 'db_donor_and_requests.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_type = $_POST['blood_type'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $health_condition = $_POST['health_condition'];
    $last_donation_date = $_POST['last_donation_date'];

    // Insert data into database
    $sql = "INSERT INTO donors_list (full_name, age, gender, blood_type, contact_number, address, health_condition, last_donation_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssss", $full_name, $age, $gender, $blood_type, $contact_number, $address, $health_condition, $last_donation_date,);

    if ($stmt->execute()) {
        echo "Success";
        header("Location: home.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
