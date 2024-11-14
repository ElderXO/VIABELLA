<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViaBella - Moda y Accesorios</title>
    <link rel="stylesheet" href="../login/styleL.css">
    <link rel="stylesheet" href="styleP.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<header class="header">
        <div class="header-left">
            <a href="#" style="color: white;">Servicio al Cliente</a>
        </div>
        <div class="header-center">
            Via Bella
        </div>
        <div class="header-right">
            <a href="#">👜</a>
        </div>
    </header>

    <div class="menu-container">
        <nav class="menu">
            <a href="#">Polos</a>
            <a href="#">Poleras</a>
            <a href="#">Conjuntos</a>
            <a href="#">Pantalones</a>
        </nav>
        
        <div class="search-bar">
            <input type="text" placeholder="Buscar productos">
            <button>🔍</button>
        </div>
    </div>

    <main class="main-content">
      <section>
      <img src="../imagenes/main/img1.jpeg">
      <img src="../imagenes/main/img2.jpeg">
      <img src="../imagenes/main/img3.jpeg">
      <img src="../imagenes/main/img4.jpeg">
      <img src="../imagenes/main/img5.jpeg">
   </section>
        <h2>Favoritos</h2>
        <!-- Galería de productos en 3 filas con 4 productos cada una -->
        <div class="product-gallery">
            <div class="product">
               <img src="../imagenes/Poleras/polera1.webp" alt="" id="img1">
               <img src="../imagenes/Poleras/polera1.1.webp" alt="" id="img2">
               <h3>Polera Básica Clásica</h3>
               <h4>S/55.00</h4>
            </div>
            <div class="product">
               <img src="../imagenes/Polos/Polo1.1.webp" alt="" id="img1">
               <img src="../imagenes/Polos/polo1.webp" alt="" id="img2">
               <h3>Polo de Cuello Camisero</h3>
               <h4>S/80.00</h4>
            </div>
            <div class="product">
               <img src="../imagenes/Pantalones/pantalon3.1.webp" alt="" id="img1">
               <img src="../imagenes/Pantalones/pantalon3.webp" alt="" id="img2">
               <h3>Pantalón Denim Clásico	</h3>
               <h4>S/90.00</h4>
            </div>
            <div class="product">
                <img src="../imagenes/Conjuntos/conjunto1.1.webp" alt="" id="img1">
                <img src="../imagenes/Conjuntos/conjunto1.webp" alt="" id="img2">
                <h3>Conjunto Deportivo Casual</h3>
               <h4>S/130.00</h4>
             </div>
             <div class="product">
                <img src="../imagenes/Poleras/polera2.1.webp" alt="" id="img1">
                <img src="../imagenes/Poleras/polera2.webp" alt="" id="img2">
                <h3>Polera Estampada Tropical</h3>
               <h4>S/70.00</h4>
             </div>
             <div class="product">
                <img src="../imagenes/Polos/polo9.1.webp" alt="" id="img1">
                <img src="../imagenes/Polos/polo9.webp" alt="" id="img2">
                <h3>Polo de Rayas Elegantes</h3>
               <h4>S/80.00</h4>
             </div>
             <div class="product">
                <img src="../imagenes/Pantalones/pantalon4.1.webp" alt="" id="img1">
                <img src="../imagenes/Pantalones/pantalon4.webp" alt="" id="img2">
                <h3>Pantalón Jogger Cómodo</h3>
               <h4>S/70.00</h4>
             </div>
             <div class="product">
                <img src="../imagenes/Conjuntos/conjunto2.2.webp" alt="" id="img1">
                <img src="../imagenes/Conjuntos/conjunto2.webp" alt="" id="img2">
                <h3>Conjunto "Sueños de Seda"</h3>
               <h4>S/150.00</h4>
             </div>
             <div class="product">
                <img src="../imagenes/Poleras/polera3.1.webp" alt="" id="img1">
                <img src="../imagenes/Poleras/polera3.webp" alt="" id="img2">
                <h3>Polera de Rayas Marineras</h3>
               <h4>S/60.00</h4>
             </div>
             <div class="product">
                <img src="../imagenes/Polos/polo6.1.webp" alt="" id="img1">
                <img src="../imagenes/Polos/polo6.webp" alt="" id="img2">
                <h3>Polo de Algodón Orgánico</h3>
               <h4>S/74.00</h4>
             </div>
             <div class="product">
                <img src="../imagenes/Pantalones/pantalon9.1.webp" alt="" id="img1">
                <img src="../imagenes/Pantalones/pantalon9.webp" alt="" id="img2">
                <h3>Pantalón "Chic Casual"</h3>
               <h4>S/90.00</h4>
             </div>
             <div class="product">
                <img src="../imagenes/Conjuntos/conjunto11.1.webp" alt="" id="img1">
                <img src="../imagenes/Conjuntos/conjunto11.webp" alt="" id="img2">
                <h3>Conjunto de Pijama Suave</h3>
               <h4>S/111.00</h4>
             </div>
        </div>
    </main>

        <!-- Menú de usuario -->
        <div class="user-menu">
            <button id="menuButton" class="menu-button">
            <a >Iniciar sesión</a>
            </button>
            <div id="dropdownMenu" class="dropdown-menu" style="display: none;">
                <?php if(!isset($_SESSION['id_cli'])): ?>
                    <button onclick="showModal('loginModal')">
                        <i class="fas fa-user"></i> Iniciar Sesión
                    </button>
                    <button onclick="showModal('registerModal')">
                        <i class="fas fa-user-plus"></i> Registrarse
                    </button>
                <?php else: ?>
                    <button onclick="logout()">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal de Login -->
    <div id="loginModal" class="modal-overlay" style="display: none;">
        <div class="modal">
            <button class="modal-close" onclick="hideModal('loginModal')">
                <i class="fas fa-times"></i>
            </button>
            <h2>Iniciar Sesión</h2>
            <form id="loginForm" onsubmit="handleLogin(event)">
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="submit-button">Ingresar</button>
            </form>
        </div>
    </div>

    <!-- Modal de Registro -->
    <div id="registerModal" class="modal-overlay" style="display: none;">
        <div class="modal">
            <button class="modal-close" onclick="hideModal('registerModal')">
                <i class="fas fa-times"></i>
            </button>
            <h2>Registrarse</h2>
            <form id="registerForm" onsubmit="handleRegister(event)">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nombre" placeholder="Nombre Completo" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-phone"></i>
                    <input type="tel" name="telefono" placeholder="Teléfono" required pattern="[0-9]{9}" maxlength="9">
                </div>
                <button type="submit" class="submit-button">Registrarse</button>
            </form>
        </div>
    </div>

    <script>
        // Manejo del menú desplegable
        const menuButton = document.getElementById('menuButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        menuButton.addEventListener('click', () => {
            dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
        });

        // Cerrar el menú al hacer clic fuera
        document.addEventListener('click', (e) => {
            if (!menuButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.style.display = 'none';
            }
        });

        // Funciones para mostrar/ocultar modales
        function showModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
            dropdownMenu.style.display = 'none';
        }

        function hideModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Manejo del formulario de login
        async function handleLogin(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            const data = {
                correo: formData.get('email'),
                contrasena: formData.get('password')
            };

            try {
                const response = await fetch('../../Controlador/api/login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });s

                const result = await response.json();

                if (response.ok) {
                    alert('Login exitoso');
                    hideModal('loginModal');
                    location.reload();
                } else {
                    alert(result.message || 'Error en el login');
                }
            } catch (error) {
                alert('Error al conectar con el servidor hola');
            }
        }

        // Manejo del formulario de registro
        async function handleRegister(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            const data = {
                nombres: formData.get('nombre'),
                correo: formData.get('email'),
                contrasena: formData.get('password'),
                telefono: formData.get('telefono')
            };

            try {
                const response = await fetch('../../Controlador/api/register.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    alert('Registro exitoso');
                    hideModal('registerModal');
                    showModal('loginModal');
                } else {
                    alert(result.message || 'Error en el registro');
                }
            } catch (error) {
                alert('Error al conectar con el servidor');
            }
        }

        // Función de logout
        async function logout() {
            try {
                const response = await fetch('../Controlador/api/logout.php');
                if (response.ok) {
                    location.reload();
                }
            } catch (error) {
                alert('Error al cerrar sesión');
            }
        }
    </script>
</body>
</html>