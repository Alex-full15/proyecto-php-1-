<div class="container-fluid">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                <form id="ingresoForm" class="p-5 bg-light rounded shadow" method="post" novalidate>
                    <h3 class="text-center mb-4"><i class="fas fa-user-circle"></i> Iniciar Sesión</h3>

                    <div class="form-group mb-3">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="usuario" name="usuario"
                                   required minlength="2" maxlength="45"
                                   placeholder="Ingrese su usuario">
                            <div class="invalid-feedback">El usuario debe tener al menos 2 caracteres</div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password"
                                   required minlength="4" maxlength="20"
                                   placeholder="Ingrese su contraseña">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="invalid-feedback">La contraseña debe tener entre 4 y 20 caracteres</div>
                        </div>
                    </div>

                    <?php
                    $login = new ControladorUsuarios();
                    $login->ctrIngresoUsuario();
                    ?>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-sign-in-alt"></i> Ingresar
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-eraser"></i> Limpiar
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        <p>¿No tiene cuenta? <a href="index.php?modulo=registro">Registrarse</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('ingresoForm');
    const password = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('click', function() {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
    });

    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });

    form.querySelectorAll('input').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value !== '') {
                this.classList.add('was-validated');
            }
        });
    });
});
</script>