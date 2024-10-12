<?php include 'includes/header.php'; ?>
<?php include 'includes/connection.php'; ?>

<a href="create.php" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar Empleado</a>

<table class="table-auto w-full mt-4">
    <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Nombre</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Puesto</th>
            <th class="px-4 py-2">Salario</th>
            <th class="px-4 py-2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Una vez se crea la cabecera de la tabla, se inserta un script de PHP con el objetivo de hacer una consulta SQL para 
             obtener todos los empleados. Se comprueba si la consulta trajo al menos 1 fila, en caso contrario, se muestra
             "No hay empleados registrados"
        -->
        <?php
        $sql = "SELECT * FROM empleados";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='border px-4 py-2'>" . $row['id'] . "</td>";
                echo "<td class='border px-4 py-2'>" . $row['nombre'] . "</td>";
                echo "<td class='border px-4 py-2'>" . $row['email'] . "</td>";
                echo "<td class='border px-4 py-2'>" . $row['puesto'] . "</td>";
                echo "<td class='border px-4 py-2'>" . $row['salario'] . " USD"."</td>";
                // En este punto, se añaden dos botones: uno para editar y otro para eliminar un empleado. Ambos botones 
                // tienen un enlace que incluye el ID del empleado, de esta forma, al hacer clic en uno de los botones, se
                // redirige a la página correspondiente con el ID del empleado.
                // El boton de eliminar empleado, en lugar de un enlace, se utiliza un botón con un evento onclick que llama
                // a la función openModal() y pasa el ID del empleado como argumento.
                
                echo "<td class='border px-4 py-2 flex justify-around'>
                        <a href='update.php?id=".$row['id']."' class='bg-yellow-500 text-white px-2 py-1 rounded'>Modificar</a>
                        <button onclick='openModal(".$row['id'].")' class='bg-red-500 text-white px-2 py-1 rounded'>Eliminar</button>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center py-4'>No hay empleados registrados</td></tr>";
        }
        ?>
    </tbody>
</table>

<!-- Modal de confirmación -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white p-6 rounded shadow-lg text-center">
        <h2 class="text-xl font-bold mb-4">¿Estás seguro de eliminar este empleado?</h2>
        <p class="mb-6">Esta acción no se puede deshacer.</p>
        <div class="flex justify-center">
            <form id="deleteForm" method="POST" action="delete.php">
                <input type="hidden" name="id" id="deleteId">
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Eliminar</button>
            </form>
            <button onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
        </div>
    </div>
</div>

<script>
    // Función para abrir el modal, cuando es llamada la función, se le pasa el ID del empleado como argumento y se quita la clase Hidden para mostrar el modal
    function openModal(id) {
        document.getElementById('deleteId').value = id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    // Función para cerrar el modal
    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

<?php include 'includes/footer.php'; ?>
