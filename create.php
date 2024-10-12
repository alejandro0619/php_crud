<?php include 'includes/header.php'; ?>
<?php include 'includes/connection.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $puesto = $_POST['puesto'];
    $salario = $_POST['salario'];

    $sql = "INSERT INTO empleados (nombre, email, puesto, salario) VALUES ('$nombre', '$email', '$puesto', '$salario')";

    if ($connection->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>

<form action="create.php" method="POST" class="bg-white p-6 rounded shadow-md">
    <div class="mb-4">
        <label for="nombre" class="block text-gray-700">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="w-full px-4 py-2 border rounded" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded" required>
    </div>
    <div class="mb-4">
        <label for="puesto" class="block text-gray-700">Puesto</label>
        <input type="text" name="puesto" id="puesto" class="w-full px-4 py-2 border rounded" required>
    </div>
    <div class="mb-4">
        <label for="salario" class="block text-gray-700">Salario</label>
        <input type="number" name="salario" id="salario" class="w-full px-4 py-2 border rounded" required>
    </div>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Agregar</button>
</form>

<?php include 'includes/footer.php'; ?>
