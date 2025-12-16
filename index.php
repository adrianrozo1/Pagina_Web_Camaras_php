<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ElectroAdriancho Security - Cámaras de Seguridad</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style_p.css">
</head>
<body>
    <!-- Header y Navegación -->
    <header>
        <div class="container nav-container">
            <a href="#" class="logo">
                <i class="fas fa-shield-alt"></i>
                <div class="logo-text">
                    <span>ElectroAdriancho Security</span>
                    <span>Protección Inteligente</span>
                </div>
            </a>
            
            <div class="nav-links">
                <a href="#services">Servicios</a>
                <a href="#products">Productos</a>
                <a href="#testimonials">Testimonios</a>
                <a href="#contact">Contacto</a>
                
                <div class="auth-buttons">
                    <button class="btn btn-outline" id="loginBtn">
                        <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                    </button>
                    <button class="btn btn-primary" id="registerBtn">
                        <i class="fas fa-user-plus"></i> Registrarse
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Seguridad Inteligente para tu Hogar y Negocio</h1>
            <p>Ofrecemos las mejores soluciones de vigilancia con tecnología de punta. Cámaras de seguridad, sistemas de monitoreo 24/7 y protección completa para tu tranquilidad.</p>
            
            <div class="cta-buttons">
                <button class="btn btn-primary btn-large" id="heroRegisterBtn">
                    <i class="fas fa-user-plus"></i> Crear Cuenta Gratis
                </button>
                <a href="camaraswed.php" class="btn btn-outline btn-large">
                    <i class="fas fa-camera"></i> Ver Productos
                </a>
            </div>
        </div>
    </section>

    <!-- Servicios -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Nuestros Servicios</h2>
                <p>Ofrecemos soluciones completas de seguridad adaptadas a tus necesidades específicas</p>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3>Vigilancia Residencial</h3>
                    <p>Sistemas de seguridad para hogares con monitoreo remoto desde tu smartphone.</p>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Seguridad Empresarial</h3>
                    <p>Protección integral para negocios con cámaras de alta definición y análisis de video.</p>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h3>Cámaras IP</h3>
                    <p>Cámaras conectadas a internet para vigilancia en tiempo real desde cualquier lugar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Formularios de Autenticación -->
    <section class="auth-forms" id="authSection">
        <div class="container">
            <div class="section-title">
                <h2>Acceso a Nuestra Plataforma</h2>
                <p>Regístrate o inicia sesión para acceder a nuestro catálogo completo y gestionar tu seguridad</p>
            </div>
            
            <div class="forms-container">
                <!-- Formulario de Inicio de Sesión -->
                <div class="form-wrapper">
                    <h3 class="form-title">Iniciar Sesión</h3>
                    <form id="loginForm">
                        <div class="form-group">
                            <label for="loginEmail">Correo Electrónico</label>
                            <input type="email" id="loginEmail" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="loginPassword">Contraseña</label>
                            <input type="password" id="loginPassword" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                        </button>
                        
                        <div class="form-footer">
                            <p>¿No tienes cuenta? <a href="#" id="showRegister">Regístrate aquí</a></p>
                        </div>
                    </form>
                </div>
                
                <!-- Formulario de Registro -->
                <div class="form-wrapper" id="registerFormWrapper" style="display: none;">
                    <h3 class="form-title">Crear Cuenta</h3>
                    <form id="registerForm">
                        <div class="form-group">
                            <label for="registerName">Nombre Completo</label>
                            <input type="text" id="registerName" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="registerEmail">Correo Electrónico</label>
                            <input type="email" id="registerEmail" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="registerPhone">Teléfono</label>
                            <input type="tel" id="registerPhone" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="registerPassword">Contraseña</label>
                            <input type="password" id="registerPassword" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="registerConfirmPassword">Confirmar Contraseña</label>
                            <input type="password" id="registerConfirmPassword" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-user-plus"></i> Crear Cuenta
                        </button>
                        
                        <div class="form-footer">
                            <p>¿Ya tienes cuenta? <a href="#" id="showLogin">Inicia sesión aquí</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonios -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Lo que Dicen Nuestros Clientes</h2>
                <p>Miles de hogares y negocios confían en nuestra protección</p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <p class="testimonial-text">"Instalé las cámaras de SecureVision en mi negocio y la tranquilidad que me dan es increíble. La aplicación es muy fácil de usar y el soporte técnico excelente."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">RC</div>
                        <div class="author-info">
                            <h4>Roberto Castillo</h4>
                            <p>Dueño de Restaurante</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <p class="testimonial-text">"Como madre soltera, la seguridad de mi hogar es primordial. SecureVision me ha dado la tranquilidad de poder monitorear mi casa desde el trabajo."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">MG</div>
                        <div class="author-info">
                            <h4>María González</h4>
                            <p>Cliente Residencial</p>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <p class="testimonial-text">"La instalación fue rápida y profesional. La calidad de video es excelente incluso de noche. Recomiendo SecureVision a cualquier negocio."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">AS</div>
                        <div class="author-info">
                            <h4>Ana Sánchez</h4>
                            <p>Gerente de Tienda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h3>ElectroAdriancho Security</h3>
                    <p>Líderes en soluciones de seguridad inteligente para hogares y negocios. Protegiendo lo que más importa desde 2010.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Enlaces Rápidos</h3>
                    <ul>
                        <li><a href="#services">Nuestros Servicios</a></li>
                        <li><a href="camaraswed.html">Catálogo de Productos</a></li>
                        <li><a href="#testimonials">Testimonios</a></li>
                        <li><a href="#contact">Contacto</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Contacto</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Carrera 5 1B-72 Pamplona</li>
                        <li><i class="fas fa-phone"></i> (+57) 322 737 5888</li>
                        <li><i class="fas fa-envelope"></i> angarita_adrian@hotmail.com</li>
                        <li><i class="fas fa-clock"></i> Lunes a Viernes: 8am - 5pm</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2025 ElectroAdriancho Security. Todos los derechos reservados. | <a href="#" style="color: var(--accent-color);">Política de Privacidad</a> | <a href="#" style="color: var(--accent-color);">Términos de Servicio</a></p>
            </div>
        </div>
    </footer>

    <!-- Modal para Login -->
    <div class="modal" id="loginModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Iniciar Sesión</h3>
                <button class="close-modal" id="closeLoginModal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="modalLoginForm">
                    <div class="form-group">
                        <label for="modalLoginEmail">Correo Electrónico</label>
                        <input type="email" id="modalLoginEmail" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="modalLoginPassword">Contraseña</label>
                        <input type="password" id="modalLoginPassword" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                    </button>
                    
                    <div class="form-footer">
                        <p>¿No tienes cuenta? <a href="#" id="showRegisterModal">Regístrate aquí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para Registro -->
    <div class="modal" id="registerModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Crear Cuenta</h3>
                <button class="close-modal" id="closeRegisterModal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="modalRegisterForm">
                    <div class="form-group">
                        <label for="modalRegisterName">Nombre Completo</label>
                        <input type="text" id="modalRegisterName" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="modalRegisterEmail">Correo Electrónico</label>
                        <input type="email" id="modalRegisterEmail" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="modalRegisterPhone">Teléfono</label>
                        <input type="tel" id="modalRegisterPhone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="modalRegisterPassword">Contraseña</label>
                        <input type="password" id="modalRegisterPassword" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="modalRegisterConfirmPassword">Confirmar Contraseña</label>
                            <input type="password" id="modalRegisterConfirmPassword" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-user-plus"></i> Crear Cuenta
                    </button>
                    
                    <div class="form-footer">
                        <p>¿Ya tienes cuenta? <a href="#" id="showLoginModal">Inicia sesión aquí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Funcionalidad para mostrar/ocultar formularios
        document.addEventListener('DOMContentLoaded', function() {
            // Referencias a elementos
            const loginBtn = document.getElementById('loginBtn');
            const registerBtn = document.getElementById('registerBtn');
            const heroRegisterBtn = document.getElementById('heroRegisterBtn');
            const showRegister = document.getElementById('showRegister');
            const showLogin = document.getElementById('showLogin');
            const loginFormWrapper = document.querySelector('.form-wrapper');
            const registerFormWrapper = document.getElementById('registerFormWrapper');
            const loginModal = document.getElementById('loginModal');
            const registerModal = document.getElementById('registerModal');
            const closeLoginModal = document.getElementById('closeLoginModal');
            const closeRegisterModal = document.getElementById('closeRegisterModal');
            const showRegisterModal = document.getElementById('showRegisterModal');
            const showLoginModal = document.getElementById('showLoginModal');
            
            // Mostrar formulario de registro en la sección principal
            showRegister.addEventListener('click', function(e) {
                e.preventDefault();
                loginFormWrapper.style.display = 'none';
                registerFormWrapper.style.display = 'block';
            });
            
            // Mostrar formulario de login en la sección principal
            showLogin.addEventListener('click', function(e) {
                e.preventDefault();
                registerFormWrapper.style.display = 'none';
                loginFormWrapper.style.display = 'block';
            });
            
            // Mostrar modal de login
            loginBtn.addEventListener('click', function() {
                loginModal.classList.add('active');
            });
            
            heroRegisterBtn.addEventListener('click', function() {
                registerModal.classList.add('active');
            });
            
            // Mostrar modal de registro
            registerBtn.addEventListener('click', function() {
                registerModal.classList.add('active');
            });
            
            // Cerrar modal de login
            closeLoginModal.addEventListener('click', function() {
                loginModal.classList.remove('active');
            });
            
            // Cerrar modal de registro
            closeRegisterModal.addEventListener('click', function() {
                registerModal.classList.remove('active');
            });
            
            // Cambiar a registro desde login modal
            showRegisterModal.addEventListener('click', function(e) {
                e.preventDefault();
                loginModal.classList.remove('active');
                registerModal.classList.add('active');
            });
            
            // Cambiar a login desde registro modal
            showLoginModal.addEventListener('click', function(e) {
                e.preventDefault();
                registerModal.classList.remove('active');
                loginModal.classList.add('active');
            });
            
            // Cerrar modales al hacer clic fuera
            window.addEventListener('click', function(e) {
                if (e.target === loginModal) {
                    loginModal.classList.remove('active');
                }
                if (e.target === registerModal) {
                    registerModal.classList.remove('active');
                }
            });
            
            // Manejo del formulario de login (principal)
            document.getElementById('loginForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const email = document.getElementById('loginEmail').value;
                const password = document.getElementById('loginPassword').value;
                
                // Validación simple
                if (email && password) {
                    // Guardar estado de sesión en localStorage
                    localStorage.setItem('userLoggedIn', 'true');
                    localStorage.setItem('userEmail', email);
                    
                    // Mostrar mensaje de éxito
                    alert('¡Inicio de sesión exitoso! Redirigiendo al catálogo...');
                    
                    // Redirigir a camaraswed.php
                    window.location.href = 'camaraswed.php';
                } else {
                    alert('Por favor, completa todos los campos.');
                }
            });
            
            // Manejo del formulario de registro (principal)
            document.getElementById('registerForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const name = document.getElementById('registerName').value;
                const email = document.getElementById('registerEmail').value;
                const phone = document.getElementById('registerPhone').value;
                const password = document.getElementById('registerPassword').value;
                const confirmPassword = document.getElementById('registerConfirmPassword').value;
                
                // Validación
                if (!name || !email || !phone || !password || !confirmPassword) {
                    alert('Por favor, completa todos los campos.');
                    return;
                }
                
                if (password !== confirmPassword) {
                    alert('Las contraseñas no coinciden.');
                    return;
                }
                
                // Guardar usuario en localStorage (simulando registro)
                const userData = {
                    name: name,
                    email: email,
                    phone: phone,
                    password: password // En un caso real, esto debería estar encriptado
                };
                
                localStorage.setItem('userData', JSON.stringify(userData));
                localStorage.setItem('userLoggedIn', 'true');
                localStorage.setItem('userEmail', email);
                
                // Mostrar mensaje de éxito
                alert('¡Registro exitoso! Redirigiendo al catálogo...');
                
                // Redirigir a camaraswed.php
                window.location.href = 'camaraswed.php';
            });
            
            // Manejo del formulario de login (modal)
            document.getElementById('modalLoginForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const email = document.getElementById('modalLoginEmail').value;
                const password = document.getElementById('modalLoginPassword').value;
                
                // Validación simple
                if (email && password) {
                    // Guardar estado de sesión en localStorage
                    localStorage.setItem('userLoggedIn', 'true');
                    localStorage.setItem('userEmail', email);
                    
                    // Cerrar modal
                    loginModal.classList.remove('active');
                    
                    // Mostrar mensaje de éxito
                    alert('¡Inicio de sesión exitoso! Redirigiendo al catálogo...');
                    
                    // Redirigir a camaraswed.php
                    window.location.href = 'camaraswed.php';
                } else {
                    alert('Por favor, completa todos los campos.');
                }
            });
            
            // Manejo del formulario de registro (modal)
            document.getElementById('modalRegisterForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const name = document.getElementById('modalRegisterName').value;
                const email = document.getElementById('modalRegisterEmail').value;
                const phone = document.getElementById('modalRegisterPhone').value;
                const password = document.getElementById('modalRegisterPassword').value;
                const confirmPassword = document.getElementById('modalRegisterConfirmPassword').value;
                
                // Validación
                if (!name || !email || !phone || !password || !confirmPassword) {
                    alert('Por favor, completa todos los campos.');
                    return;
                }
                
                if (password !== confirmPassword) {
                    alert('Las contraseñas no coinciden.');
                    return;
                }
                
                // Guardar usuario en localStorage (simulando registro)
                const userData = {
                    name: name,
                    email: email,
                    phone: phone,
                    password: password // En un caso real, esto debería estar encriptado
                };
                
                localStorage.setItem('userData', JSON.stringify(userData));
                localStorage.setItem('userLoggedIn', 'true');
                localStorage.setItem('userEmail', email);
                
                // Cerrar modal
                registerModal.classList.remove('active');
                
                // Mostrar mensaje de éxito
                alert('¡Registro exitoso! Redirigiendo al catálogo...');
                
                // Redirigir a camaraswed.php
                window.location.href = 'camaraswed.php';
            });
            
            // Verificar si ya hay una sesión activa
            if (localStorage.getItem('userLoggedIn') === 'true') {
                // Cambiar botones de autenticación
                const authButtons = document.querySelector('.auth-buttons');
                const userEmail = localStorage.getItem('userEmail');
                
                authButtons.innerHTML = `
                    <span style="color: white; margin-right: 1rem;">Bienvenido, ${userEmail}</span>
                    <button class="btn btn-outline" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </button>
                `;
                
                // Agregar funcionalidad al botón de cerrar sesión
                document.getElementById('logoutBtn').addEventListener('click', function() {
                    localStorage.removeItem('userLoggedIn');
                    localStorage.removeItem('userEmail');
                    location.reload();
                });
            }
            
            // Smooth scrolling para enlaces internos
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    if (this.getAttribute('href') === '#') return;
                    
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>