<?php

if (!isset($_SESSION["iniciarSesion"]) || $_SESSION["iniciarSesion"] != "ok") {
    echo '<script>
        window.location = "index.php?modulo=ingreso";
    </script>';
    return;
}

$productos = ControladorInventario::ctrMostrarInventario();

$editar = null;
if (isset($_GET["editar"])) {
    $id = intval($_GET["editar"]);
    foreach ($productos as $p) {
        if ($p["pk_id_inventario"] == $id) {
            $editar = $p;
            break;
        }
    }
}

$crearProducto = new ControladorInventario();
$crearProducto->ctrInventario();

$editarProducto = new ControladorInventario();
$editarProducto->ctrEditarProducto();

$eliminar = new ControladorInventario();
$eliminar->ctrEliminarProducto();
?>

<div class="container-fluid py-4">
    <h2 class="text-center mb-4"><i class="fas fa-boxes"></i> Gestión de Inventario</h2>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="fas fa-list"></i> Lista de Productos</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="tablaInventario">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($productos)): ?>
                                <tr>
                                    <td colspan="5" class="text-muted">No hay productos registrados</td>
                                </tr>
                                <?php else: ?>
                                <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td><?php echo $producto['pk_id_inventario']; ?></td>
                                    <td><?php echo htmlspecialchars($producto['inve_nombre_producto']); ?></td>
                                    <td><span class="badge bg-info"><?php echo $producto['inve_cantidad_producto']; ?></span></td>
                                    <td>$<?php echo number_format($producto['inve_precio_producto'], 2); ?></td>
                                    <td>
                                        <a href="index.php?modulo=inventario&editar=<?php echo $producto['pk_id_inventario']; ?>" 
                                           class="btn btn-sm btn-warning" title="Editar">Editar
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="index.php?modulo=inventario&eliminar=<?php echo $producto['pk_id_inventario']; ?>" 
                                           class="btn btn-sm btn-danger" title="Eliminar"
                                           onclick="return confirm('¿Está seguro de eliminar este producto?');">Eliminar
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-plus-circle"></i> <?php echo $editar ? 'Editar Producto' : 'Registrar Producto'; ?></h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="idProducto" value="<?php echo $editar['pk_id_inventario'] ?? ''; ?>">

                        <div class="mb-3">
                            <label for="nombreProducto" class="form-label">Nombre del producto:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                                <input type="text" class="form-control" id="nombreProducto" name="nombreProducto"
                                       value="<?php echo $editar['inve_nombre_producto'] ?? ''; ?>"
                                       placeholder="Ingrese el nombre" required
                                       pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]{2,100}$"
                                       minlength="2" maxlength="100">
                                <div class="invalid-feedback">Nombre inválido (2-100 caracteres)</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="cantidadProducto" class="form-label">Cantidad:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                <input type="number" class="form-control" id="cantidadProducto" name="cantidadProducto"
                                       value="<?php echo $editar['inve_cantidad_producto'] ?? ''; ?>"
                                       placeholder="Cantidad" required min="0" max="999999">
                                <div class="invalid-feedback">Cantidad inválida</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="precioProducto" class="form-label">Precio:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                <input type="number" class="form-control" id="precioProducto" name="precioProducto"
                                       value="<?php echo $editar['inve_precio_producto'] ?? ''; ?>"
                                       placeholder="0.00" required min="0" step="0.01">
                                <div class="invalid-feedback">Precio inválido</div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> <?php echo $editar ? 'Actualizar' : 'Guardar'; ?>
                            </button>
                            <?php if ($editar): ?>
                            <a href="index.php?modulo=inventario" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>