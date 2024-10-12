<?php include 'includes/connection.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM empleados WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $connection->error;
    }
} else {
    header("Location: index.php");
}
?>
