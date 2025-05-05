<div class="container-fluid">
		
		<div class="container py-5">

            <div class="d-flex justify-content-center text-center py-3">

                <form class="p-5 bg-light" method="post">
            
                    <div class="form-group">
                        <label for="producto">Nombre del producto:</label>
            
                        <div class="input-group">
                            
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
            
                            <input type="text" class="form-control" id="producto" name="nombreProducto">
            
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
            
                        <div class="input-group">
                            
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
            
                            <input type="text" class="form-control" id="cantidad" name="cantidadProducto">
            
                        </div>
                        
                    </div>
            
                    <div class="form-group">
            
                        <label for="precio">Precio</label>
            
                        <div class="input-group">
                            
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
            
                            <input type="text" class="form-control" id="precio" name="precioProducto">
                        
                        </div>
                        
                    </div>          
           
                    
<?php

                        /*=============================================
                        FORMA EN QUE SE INSTA­NCIA LA CLASE DE UN MÉTODO ESTÁTICO
                        =============================================*/

                        $inventario = ControladorInventario::ctrInventario();

                        if ($inventario === 'ok') {
                            // Aquí sí entra cuando el método devuelve "ok"
                            echo '<script>
                                if (window.history.replaceState) {
                                    window.history.replaceState(null, null, window.location.href);
                                }
                            </script>';
                            echo '<div class="alert alert-success">El producto ha sido registrado</div>';
                        }

?>

                
                    <button type="submit" class="btn btn-primary">Guardar</button>
            
                </form>
            
            </div>

        </div>

    </div>