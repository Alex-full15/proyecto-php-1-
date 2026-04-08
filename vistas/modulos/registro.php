<div class="container--fluid">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form id="registroForm" class="p-5 bg-light rounded shadow" method="post" novalidate>
                    
                    <h3 class="text-center mb-4"><i class="fas fa-user-circle"></i> Crear Cuenta</h3>

                    <div class="form--group mb-3">
                        <label for="nombre" class="form-label">Nombre completo:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="nombre" name="registroNombre" 
                                   required minlength="2" maxlength="45" 
                                   pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{2,45}$"
                                   placeholder="Ingrese su nombre">
                            <div class="invalid-feedback">El nombre debe tener entre 2 y 45 caracteres (solo letras)</div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="tel" class="form-control" id="telefono" name="registroTelefono" 
                                   required pattern="^[0-9]{8,15}$"
                                   placeholder="Ingrese su teléfono">
                            <div class="invalid-feedback">Ingrese un teléfono válido (8-15 dígitos)</div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Correo electrónico:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="registroEmail" 
                                   required pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$"
                                   placeholder="correo@ejemplo.com">
                            <div class="invalid-feedback">Ingrese un correo electrónico válido</div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="registroPassword" 
                                   required minlength="8" maxlength="20"
                                   placeholder="Mínimo 8 caracteres">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="invalid-feedback">La contraseña debe tener entre 8 y 20 caracteres</div>
                        </div>
                        <ul class="password-requirements mt-2" style="font-size: 0.85rem;">
                            <li id="req-length"><i class="fas fa-circle"></i> Mínimo 8 caracteres</li>
                            <li id="req-number"><i class="fas fa-circle"></i> Al menos un número</li>
                            <li id="req-special"><i class="fas fa-circle"></i> Al menos un carácter especial</li>
                        </ul>
                    </div>

                    <div class="form-group mb-3">
                        <label for="confirmPassword" class="form-label">Confirmar contraseña:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="confirmPassword" name="registroConfirmPassword" 
                                   required placeholder="Repita su contraseña">
                            <div class="invalid-feedback">Las contraseñas no coinciden</div>
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="terminos" required>
                        <label class="form-check-label" for="terminos">
                            Acepto los <a href="#" data-bs-toggle="modal" data-bs-target="#terminosModal">términos y condiciones</a>
                        </label>
                        <div class="invalid-feedback">Debe aceptar los términos y condiciones</div>
                    </div>

                    <?php

                    $registro = ControladorRegistro::ctrRegistro();

                    if ($registro === 'ok') {
                        echo '<script>
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.href);
                            }
                        </script>';
                        echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
                    }

                    ?>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-user-plus"></i> Registrarse
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-eraser"></i> Limpiar formulario
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        <p>¿Ya tiene cuenta? <a href="?modulo=ingreso">Iniciar sesión</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="terminosModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Términos y Condiciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>Al registrarse, usted acepta proporcionar información veraz y precisa.</p>
                <p>Sus datos serán utilizados exclusivamente para los propósitos de esta aplicación.</p>
                <p>Nos comprometemos a proteger su información personal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registroForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const togglePassword = document.getElementById('togglePassword');

    password.addEventListener('input', function() {
        validatePassword();
    });

    confirmPassword.addEventListener('input', function() {
        validateConfirmPassword();
    });

    togglePassword.addEventListener('click', function() {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        confirmPassword.type = type;
        this.innerHTML = type === 'password' ? '<i class="fas fa-eyes"></i>' : '<i class="fas fa-eye-slash"></i>';
    });

    function validatePassword() {
        const value = password.value;
        const reqLength = document.getElementById('req-length');
        const reqNumber = document.getElementById('req-number');
        const reqSpecial = document.getElementById('req-special');

        reqLength.classList.toggle('valid', value.length >= 8);
        reqLength.querySelector('i').classList.toggle('fa-circle', value.length < 8);
        reqLength.querySelector('i').classList.toggle('fa-check-circle', value.length >= 8);

        reqNumber.classList.toggle('valid', /[0-9]/.test(value));
        reqNumber.querySelector('i').classList.toggle('fa-circle', !/[0-9]/.test(value));
        reqNumber.querySelector('i').classList.toggle('fa-check-circle', /[0-9]/.test(value));

        reqSpecial.classList.toggle('valid', /[!@#$%^&*(),.?":{}|<>]/.test(value));
        reqSpecial.querySelector('i').classList.toggle('fa-circle', !/[!@#$%^&*(),.?":{}|<>]/.test(value));
        reqSpecial.querySelector('i').classList.toggle('fa-check-circle', /[!@#$%^&*(),.?":{}|<>]/.test(value));
    }

    function validateConfirmPassword() {
        if (confirmPassword.value === '') {
            confirmPassword.classList.remove('is-valid', 'is-invalid');
            return;
        }
        if (confirmPassword.value === password.value) {
            confirmPassword.classList.remove('is-invalid');
            confirmPassword.classList.add('is-valid');
        } else {
            confirmPassword.classList.remove('is-valid');
            confirmPassword.classList.add('is-invalid');
        }
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        validateConfirmPassword();

        if (!form.checkValidity()) {
            event.stopPropagation();
        } else if (password.value !== confirmPassword.value) {
            confirmPassword.classList.add('is-invalid');
            event.stopPropagation();
        } else {
            form.submit();
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
