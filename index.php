<?php
require __DIR__ . '/functions.php';

$autos = get_cars(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5" style="background-color: #a5deea; border: 2px solid #071138;">
    <div class="d-flex flex-lg-column p-5 justify-content-center">
        <h1 class="p-2 bd-highlight text-center">Vehículos de ocasión</h1>
        <table class="table table-hover">
            <thead class="table-primary">
            <tr>
                <th scope="col">Marca</th>
                <th scope="col">Año</th>
                <th scope="col">Color</th>
                <th scope="col">Precio</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($autos as $key => $auto): ?>
                <tr>
                    <td><?php echo $auto['brand']; ?></td>
                    <td><?php echo $auto['year']; ?></td>
                    <td><?php echo $auto['color']; ?></td>
                    <td><?php echo $auto['price']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tbody>
        </table>
    </div>
    <div class="d-flex flex-lg-column p-5 text-center bg-primary text-white mb-5">
        <?php
        if (!isset($_POST['submit'])) {
            echo "<h3>Selecciona el vehículo que quieres comprar</h3>";
        } else {

            $name = $_POST['vehicle_name'];
            echo "Haz seleccionado un vehículo de la siguiente marca : <h2 class='p-3 mt-3'> $name </h2>";
            echo "<br>Puedes cambiar tu selección, haciendo clic en el selector nuevamente";
        }
        ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="d-flex flex-row justify-content-center p-5">
                <select style="max-width: 300px; border: 1px solid #fff"
                        class="form-select center-block form-control btn drp-dwn-width btn-default btn-lg dropdown-toggle mb-5"
                        name="vehicle_name">
                    <option value="">Selecciona aquí tu vehículo</option>
                    <?php foreach ($autos as $key => $auto): ?>
                        <option value="<?php echo $key; ?>"><?php echo $auto['brand']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input class="btn btn-warning" type="submit" name="submit" value="Comprar"><br>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>