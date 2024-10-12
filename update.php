<?php include 'includes/header.php'; ?>
<?php include 'includes/connection.php'; ?>

<?php
$id = $_GET['id'];

$sql = "SELECT * FROM empleados WHERE id=$id";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $puesto = $_POST['puesto'];
    $salario = $_POST['salario'];

    $sql = "UPDATE empleados SET nombre='$nombre', email='$email', puesto='$puesto', salario='$salario' WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>

<form action="update.php?id=<?php echo $id; ?>" method="POST" class="bg-white p-6 rounded shadow-md">
    <div class="mb-4">
        <label for="nombre" class="block text-gray-700">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="w-full px-4 py-2 border rounded" value="<?php echo $row['nombre']; ?>" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded" value="<?php echo $row['email']; ?>" required>
    </div>
    <div class="mb-4">
        <label for="puesto" class="block text-gray-700">Puesto</label>
        <input type="text" name="puesto" id="puesto" class="w-full px-4 py-2 border rounded" value="<?php echo $row['puesto']; ?>" required>
    </div>
    <div class="mb-4">
        <label for="salario" class="block text-gray-700">Salario</label>
        <input type="number" name="salario" id="salario" class="w-full px-4 py-2 border rounded" value="<?php echo $row['salario']; ?>" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
</form>

<?php include 'includes/footer.php'; ?>
