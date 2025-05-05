<section class="container-fluid bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="nav nav-justified py-2 nav-pills">
                <?php if (isset($_GET["modulo"])): ?>

                    <?php if ($_GET["modulo"] == "registro"): ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=registro" class="nav-link active">Registro</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=registro" class="nav-link">Registro</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["modulo"] == "ingreso"): ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=ingreso" class="nav-link active">Ingreso</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=ingreso" class="nav-link">Ingreso</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["modulo"] == "inicio"): ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=inicio" class="nav-link active">Inicio</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=inicio" class="nav-link">Inicio</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["modulo"] == "inventario"): ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=inventario" class="nav-link active">Inventario</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=inventario" class="nav-link">Inventario</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["modulo"] == "salir"): ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=salir" class="nav-link active">Salir</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=salir" class="nav-link">Salir</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["modulo"] == "roles"): ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=roles" class="nav-link active">Roles</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php?modulo=roles" class="nav-link">Roles</a>
                        </li>
                    <?php endif ?>

                <?php else: ?>
                    <li class="nav-item">
                        <a href="index.php?modulo=roles" class="nav-link">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?modulo=registro" class="nav-link">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?modulo=ingreso" class="nav-link">Ingreso</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?modulo=contenido" class="nav-link active">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?modulo=inventario" class="nav-link">Inventario</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Salir</a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>       
    </div>
</section>
