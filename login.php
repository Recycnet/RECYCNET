
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycnet - Registro</title>
    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="estilo.css">
    <!-- Agregamos Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="barra.css">
    <link rel="stylesheet" href="https://tudominio.com/ruta/barra.css">
    
    <style>
        /* Estilos específicos para la página de registro */
        .register-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .register-header .logo {
            font-size: 2em;
            color: #2ecc71;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .register-header .logo i {
            margin-right: 10px;
        }
        
        .register-form .form-group {
            margin-bottom: 20px;
        }
        
        .register-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .register-form input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .register-form button {
            width: 100%;
            padding: 12px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .register-form button:hover {
            background-color: #27ae60;
        }
        
        .register-footer {
            text-align: center;
            margin-top: 20px;
        }
        
        .register-footer a {
            color: #2ecc71;
            text-decoration: none;
        }
        
        .register-footer a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>

   <!-- Botón de Alternar Barra Lateral -->
    <button class="toggle-btn" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Barra lateral -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-recycle"></i>
                Recycnet
            </div>
        </div>
        <div class="sidebar-menu">
            <a href="index.html" class="menu-item active">
                <i class="fas fa-home"></i>
                Inicio
            </a>
            <a href="comprar.html" class="menu-item">
                <i class="fas fa-shopping-cart"></i>
                Comprar
            </a>
            <a href="publicar.php" class="menu-item">
                <i class="fas fa-upload"></i>
                Publicar
            </a>
            <a href="foro.html" class="menu-item">
                <i class="fas fa-comments"></i>
                Foro
            </a>
        </div>
    </div>

<body>
    <!-- Encabezado con navegación -->
    <header>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <i class="fas fa-recycle"></i>
                    Recycnet
            </div>
        </div>
    </header>

    <!-- Formulario de registro -->
    <section class="register-section">
        <div class="container">
            <div class="register-container">
                <div class="register-header">
                    <div class="logo">
                        <i class="fas fa-recycle"></i>
                        Recycnet
                    </div>
                    <h2>Crear Cuenta</h2>
                    <p>Regístrate para comenzar a intercambiar materiales reciclables</p>
                </div>
                <form class="register-form" id="registerForm">
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" id="username" name="username" required>
                        <div class="error-message" id="username-error">El nombre de usuario no puede contener símbolos especiales</div>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" id="email" name="email" required>
                        <div class="error-message" id="email-error">Por favor, introduce un correo electrónico válido</div>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirmar contraseña</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                        <div class="error-message" id="password-error">Las contraseñas no coinciden</div>
                    </div>
                    <button type="submit">Registrarme</button>
                </form>
                <div class="register-footer">
                    <p>¿Ya tienes una cuenta? <a href="inicio_sesion.html">Inicia sesión</a></p>
                </div>
            </div>
        </div>
    </section>


    <!-- Script para la página -->
    <script>
        // Función para validar el nombre de usuario (sin símbolos)
        function validateUsername(username) {
            // Expresión regular que acepta letras, números y guiones bajos
            const regex = /^[a-zA-Z0-9_]+$/;
            return regex.test(username);
        }

        // Función para manejar el envío del formulario de registro
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Obtenemos los valores del formulario
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            
            // Validación del nombre de usuario
            if (!validateUsername(username)) {
                document.getElementById('username-error').style.display = 'block';
                return;
            } else {
                document.getElementById('username-error').style.display = 'none';
            }
            
            // Validación de las contraseñas
            if (password !== confirmPassword) {
                document.getElementById('password-error').style.display = 'block';
                return;
            } else {
                document.getElementById('password-error').style.display = 'none';
            }
            
            // Guardamos los datos del usuario en localStorage
            const users = JSON.parse(localStorage.getItem('users')) || [];
            
            // Verificamos si el correo ya existe
            if (users.some(user => user.email === email)) {
                alert('Este correo electrónico ya está registrado. Por favor, utiliza otro.');
                return;
            }
            
            // Añadimos el nuevo usuario
            users.push({
                username,
                email,
                password
            });
            
            localStorage.setItem('users', JSON.stringify(users));
            
            // Guardamos el estado de inicio de sesión
            localStorage.setItem('currentUser', JSON.stringify({
                username,
                email,
                isLoggedIn: true
            }));
            
            // Mostramos mensaje de éxito y redirigimos a la página principal
            alert('¡Registro completado con éxito!');
            window.location.href = 'index.html';
        });
    </script>
    <script src="back.js"></script>
    <script>
        // Script para alternar la barra lateral
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        });
        // Cerrar la barra lateral al hacer clic fuera de ella
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>
</html>