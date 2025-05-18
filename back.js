// Este script maneja la funcionalidad de inicio de sesión y registro
document.addEventListener('DOMContentLoaded', function() {
    // Verificar si el usuario ha iniciado sesión
    const currentUser = JSON.parse(localStorage.getItem('currentUser'));
    const authButtons = document.querySelector('.auth-buttons');
    
    if (currentUser && currentUser.isLoggedIn) {
        // Si el usuario ha iniciado sesión, mostrar su perfil en lugar de los botones de autenticación
        authButtons.innerHTML = `
            <div class="user-profile">
                <div class="user-menu-container">
                    <div class="user-menu-trigger">
                        <i class="fas fa-user-circle"></i>
                        <span>${currentUser.username}</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fas fa-user"></i> Mi Perfil</a></li>
                            <li><a href="#"><i class="fas fa-exchange-alt"></i> Mis Intercambios</a></li>
                            <li><a href="#"><i class="fas fa-cog"></i> Configuración</a></li>
                            <li class="logout"><a href="#" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        `;
        
        // Añadir estilo para el menú del usuario
        const style = document.createElement('style');
        style.textContent = `
            .user-profile {
                position: relative;
            }
            
            .user-menu-container {
                position: relative;
            }
            
            .user-menu-trigger {
                display: flex;
                align-items: center;
                cursor: pointer;
                padding: 8px 12px;
                border-radius: 30px;
                background-color: #f8f9fa;
                transition: all 0.3s;
            }
            
            .user-menu-trigger:hover {
                background-color: #e9ecef;
            }
            
            .user-menu-trigger i.fa-user-circle {
                font-size: 20px;
                margin-right: 8px;
                color: #2ecc71;
            }
            
            .user-menu-trigger span {
                margin-right: 8px;
                font-weight: 600;
            }
            
            .user-menu {
                position: absolute;
                top: 100%;
                right: 0;
                width: 220px;
                background-color: white;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                margin-top: 10px;
                display: none;
                z-index: 100;
            }
            
            .user-menu-container:hover .user-menu {
                display: block;
            }
            
            .user-menu ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }
            
            .user-menu ul li {
                border-bottom: 1px solid #f1f1f1;
            }
            
            .user-menu ul li:last-child {
                border-bottom: none;
            }
            
            .user-menu ul li a {
                padding: 12px 15px;
                display: flex;
                align-items: center;
                color: #333;
                text-decoration: none;
                transition: background-color 0.3s;
            }
            
            .user-menu ul li a:hover {
                background-color: #f8f9fa;
            }
            
            .user-menu ul li i {
                margin-right: 10px;
                width: 20px;
                text-align: center;
            }
            
            .user-menu ul li.logout a {
                color: #e74c3c;
            }
        `;
        document.head.appendChild(style);
        
        // Añadir evento para cerrar sesión
        document.getElementById('logout-btn').addEventListener('click', function(e) {
            e.preventDefault();
            
            // Eliminar el estado de inicio de sesión
            localStorage.removeItem('currentUser');
            
            // Recargar la página
            window.location.reload();
        });
    }

    // Funcionalidad para la barra lateral
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    
    if (sidebarToggle && sidebar && mainContent) {
        // Verificar si hay una preferencia guardada para la barra lateral
        const sidebarState = localStorage.getItem('sidebarState');
        
        if (sidebarState === 'open') {
            sidebar.classList.add('active');
            mainContent.classList.add('shifted');
            sidebarToggle.classList.add('active');
        }
        
        // Agregar evento de clic al botón de alternar
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('shifted');
            this.classList.toggle('active');
            
            // Guardar el estado de la barra lateral
            if (sidebar.classList.contains('active')) {
                localStorage.setItem('sidebarState', 'open');
            } else {
                localStorage.setItem('sidebarState', 'closed');
            }
        });
        
        // Marcar el elemento de menú activo según la página actual
        const currentPage = window.location.pathname.split('/').pop() || 'index.html';
        const menuItems = document.querySelectorAll('.menu-item');
        
        menuItems.forEach(item => {
            const href = item.getAttribute('href');
            if (href === currentPage) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    }
});