<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroAdriancho Security - Cámaras de Seguridad Profesional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-50">
    <!-- Barra Lateral -->
    <div id="sidebar" class="sidebar">
        <!-- Logo -->
        <div class="p-6 border-b border-blue-700">
            <div class="flex items-center space-x-3">
                <i class="fas fa-shield-alt text-2xl"></i>
                <div>
                    <h1 class="text-xl font-bold">ELECTROADRIANCHO</h1>
                    <p class="text-sm text-blue-200">SECURITY SYSTEMS</p>
                </div>
            </div>
        </div>
        
        <!-- Menú Principal -->
        <div class="sidebar-section">
            <div class="sidebar-title">Main</div>
            <a href="#" onclick="goHome()" class="sidebar-item active">
                <i class="fas fa-home"></i>
                <span>HOME</span>
            </a>
            <a href="#productos" onclick="scrollToProducts()" class="sidebar-item">
                <i class="fas fa-video"></i>
                <span>PRODUCTOS</span>
            </a>
            <a href="#servicios" onclick="scrollToServices()" class="sidebar-item">
                <i class="fas fa-tools"></i>
                <span>SERVICIOS</span>
            </a>
            <a href="#caracteristicas" onclick="scrollToFeatures()" class="sidebar-item">
                <i class="fas fa-star"></i>
                <span>CARACTERÍSTICAS</span>
            </a>
            <a href="#contacto" onclick="scrollToContact()" class="sidebar-item">
                <i class="fas fa-envelope"></i>
                <span>CONTACTO</span>
            </a>
        </div>
        
        <!-- Administración -->
        <div class="sidebar-section">
            <div class="sidebar-title">Administración</div>
            <a href="#" class="sidebar-item" onclick="showCrudSection('encuestas')">
                <i class="fas fa-poll"></i>
                <span>CRUD de Encuestas</span>
            </a>
           <a href="crud.html" class="sidebar-item" target="_blank">
                <i class="fas fa-camera"></i>
                <span>CRUD de Productos</span>
            </a>

            <a href="#" class="sidebar-item" onclick="showCrudSection('preguntas')">
                <i class="fas fa-question-circle"></i>
                <span>CRUD de Preguntas</span>
            </a>
            <a href="#" class="sidebar-item" onclick="showCrudSection('activar')">
                <i class="fas fa-toggle-on"></i>
                <span>Activar/Desactivar</span>
            </a>
            <a href="#" class="sidebar-item" onclick="showCrudSection('exportar')">
                <i class="fas fa-file-csv"></i>
                <span>Exportar CSV</span>
            </a>
        </div>
        
        <!-- Sección de Usuario -->
        <div class="sidebar-section">
            <div class="sidebar-title">Usuario</div>
            <a href="#" class="sidebar-item" onclick="toggleCart()">
                <i class="fas fa-shopping-cart"></i>
                <span>Carrito (<span id="sidebarCartCount">0</span>)</span>
            </a>
        </div>
        
        <button onclick="toggleSidebar()" id="hideButton"
            class="floating-button">
            <i class="fas fa-chevron-left"></i>
            <span>Ocultar menú</span>
        </button>

        <!-- Botón MOSTRAR (flotante) -->
        <button onclick="toggleSidebar()" id="showButton"
            class="floating-button">
            <i class="fas fa-chevron-right"></i>
            <span>Mostrar menú</span>
        </button>    
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const toggleButton = document.getElementById('toggleButton');
            const showButton = document.getElementById('showButton');

            sidebar.classList.toggle('sidebar-closed');

            // Cambiar la visibilidad de los botones
            if (sidebar.classList.contains('sidebar-closed')) {
                toggleButton.classList.add('hidden');
                showButton.classList.remove('hidden');
            } else {
                toggleButton.classList.remove('hidden');
                showButton.classList.add('hidden');
            }
        }
    </script>
    
    <!-- Contenido Principal -->
    <div id="mainContent" class="main-content">
        <!-- Header -->
        <header class="bg-white shadow-sm sticky top-0 z-30">
            <nav class="container mx-auto px-4 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button onclick="toggleSidebar()" class="sidebar-toggle text-gray-600">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                            <span class="text-2xl font-bold text-gray-800 hidden md:inline">ElectroAdriancho Security</span>
                        </div>
                    </div>
                    
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#productos" class="text-gray-600 hover:text-blue-600 transition">Productos</a>
                        <a href="#caracteristicas" class="text-gray-600 hover:text-blue-600 transition">Características</a>
                        <a href="#servicios" class="text-gray-600 hover:text-blue-600 transition">Servicios</a>
                        <a href="#contacto" class="text-gray-600 hover:text-blue-600 transition">Contacto</a>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <button onclick="toggleCart()" class="relative text-gray-600 hover:text-blue-600 transition">
                            <i class="fas fa-shopping-cart text-xl"></i>
                            <span id="cartCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                        </button>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Sección CRUD (Oculta por defecto) -->
        <div id="crudSection" class="hidden">
            <div class="container mx-auto px-4 py-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div id="crudContent">
                        <!-- El contenido CRUD se cargará aquí dinámicamente -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Página de Crear Encuesta (Oculta por defecto) -->
        <div id="createSurveyPage" class="hidden">
            <div class="container mx-auto px-4 py-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-blue-600">Crear Nueva Encuesta</h2>
                        <button onclick="goBackToCrud()" class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-arrow-left mr-2"></i> Volver
                        </button>
                    </div>
                    
                    <div class="step-indicator mb-8">
                        <div class="step active" id="step1">1</div>
                        <div class="step-line" id="line1"></div>
                        <div class="step" id="step2">2</div>
                        <div class="step-line" id="line2"></div>
                        <div class="step" id="step3">3</div>
                        <div class="step-line" id="line3"></div>
                        <div class="step" id="step4">4</div>
                    </div>
                    
                    <!-- Paso 1: Información Básica -->
                    <div id="step1-form" class="form-step active">
                        <h3 class="text-xl font-semibold mb-4">Información Básica de la Encuesta</h3>
                        <form id="basicInfoForm" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Título de la Encuesta *</label>
                                <input type="text" id="surveyTitle" required 
                                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Ej: Satisfacción del Cliente">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Descripción</label>
                                <textarea id="surveyDescription" rows="3"
                                          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                          placeholder="Describe el propósito de esta encuesta"></textarea>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Fecha de Inicio</label>
                                    <input type="date" id="surveyStartDate"
                                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Fecha de Fin</label>
                                    <input type="date" id="surveyEndDate"
                                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" onclick="nextStep(2)" 
                                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                                    Siguiente <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Paso 2: Agregar Preguntas -->
                    <div id="step2-form" class="form-step">
                        <h3 class="text-xl font-semibold mb-4">Agregar Preguntas</h3>
                        <div id="questionsContainer" class="mb-6">
                            <!-- Las preguntas se agregarán aquí dinámicamente -->
                        </div>
                        
                        <div class="mb-6">
                            <button onclick="addQuestion()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition mb-4">
                                <i class="fas fa-plus mr-2"></i> Agregar Pregunta
                            </button>
                            
                            <div class="text-sm text-gray-600 mb-4">
                                <p><i class="fas fa-info-circle mr-2"></i> Puedes agregar preguntas de texto o de opción múltiple.</p>
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(1)" 
                                    class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                                <i class="fas fa-arrow-left mr-2"></i> Anterior
                            </button>
                            <button type="button" onclick="nextStep(3)" 
                                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                                Siguiente <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Paso 3: Configuración -->
                    <div id="step3-form" class="form-step">
                        <h3 class="text-xl font-semibold mb-4">Configuración de la Encuesta</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" id="surveyActive" class="mr-2" checked>
                                    <span>Encuesta activa (los usuarios pueden responderla)</span>
                                </label>
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" id="surveyAnonymous" class="mr-2">
                                    <span>Respuestas anónimas</span>
                                </label>
                            </div>
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" id="surveyRequired" class="mr-2">
                                    <span>Todas las preguntas son obligatorias</span>
                                </label>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Mensaje de agradecimiento</label>
                                <textarea id="surveyThankYou" rows="2"
                                          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                          placeholder="Mensaje que verán los usuarios después de completar la encuesta"></textarea>
                            </div>
                        </div>
                        
                        <div class="flex justify-between mt-6">
                            <button type="button" onclick="prevStep(2)" 
                                    class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                                <i class="fas fa-arrow-left mr-2"></i> Anterior
                            </button>
                            <button type="button" onclick="nextStep(4)" 
                                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                                Siguiente <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Paso 4: Revisar y Guardar -->
                    <div id="step4-form" class="form-step">
                        <h3 class="text-xl font-semibold mb-4">Revisar y Guardar Encuesta</h3>
                        <div class="bg-gray-50 p-6 rounded-lg mb-6">
                            <h4 class="font-semibold text-lg mb-4">Resumen de la Encuesta</h4>
                            <div id="surveySummary">
                                <!-- El resumen se generará aquí -->
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            <button type="button" onclick="prevStep(3)" 
                                    class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                                <i class="fas fa-arrow-left mr-2"></i> Anterior
                            </button>
                            <button type="button" onclick="saveSurvey()" 
                                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                                <i class="fas fa-save mr-2"></i> Guardar Encuesta
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Página de Editar Encuesta (Oculta por defecto) -->
        <div id="editSurveyPage" class="hidden">
            <div class="container mx-auto px-4 py-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-blue-600" id="editSurveyTitle">Editar Encuesta</h2>
                        <button onclick="goBackToCrud()" class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-arrow-left mr-2"></i> Volver
                        </button>
                    </div>
                    <div id="editSurveyContent">
                        <!-- Contenido de edición se cargará aquí -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Página de Agregar Pregunta (Oculta por defecto) -->
        <div id="addQuestionPage" class="hidden">
            <div class="container mx-auto px-4 py-8">
                <div class="bg-white rounded-lg shadow-lg p-6 question-form-container">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-blue-600" id="addQuestionTitle">Agregar Pregunta</h2>
                        <button onclick="goBackToQuestions()" class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-arrow-left mr-2"></i> Volver
                        </button>
                    </div>
                    <div id="addQuestionContent">
                        <!-- Formulario para agregar pregunta se cargará aquí -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Página de Exportar CSV (Oculta por defecto) -->
        <div id="exportCsvPage" class="hidden">
            <div class="container mx-auto px-4 py-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-blue-600" id="exportCsvTitle">Exportar Respuestas en CSV</h2>
                        <button onclick="goBackToCrud()" class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-arrow-left mr-2"></i> Volver
                        </button>
                    </div>
                    <div id="exportCsvContent">
                        <!-- Contenido de exportación se cargará aquí -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <section id="homeSection" class="hero-gradient text-white py-20">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold mb-6">Protege lo que más importa</h1>
                        <p class="text-xl mb-8 text-blue-100">Cámaras de seguridad de última tecnología para tu hogar o negocio. Calidad HD, visión nocturna y acceso remoto 24/7.</p>
                        <div class="flex flex-wrap gap-4">
                            <button onclick="scrollToProducts()" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition">
                                Ver Productos
                            </button>
                            <button onclick="showDemo()" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                                Ver Demo
                            </button>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="imagen1.jpg" alt="Cámaras de seguridad" class="hero-image shadow-2xl">
                        <div class="absolute -bottom-4 -left-4 bg-white text-gray-800 p-4 rounded-lg shadow-lg">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="font-semibold">Instalación profesional incluida</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="caracteristicas" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">¿Por qué elegir ElectroAdriancho Security?</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-video text-blue-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Video 4K Ultra HD</h3>
                        <p class="text-gray-600">Calidad de imagen cristalina con resolución 4K para capturar cada detalle.</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-moon text-blue-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Visión Nocturna</h3>
                        <p class="text-gray-600">Visión nocturna a color hasta 30 metros para protección 24/7.</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-mobile-alt text-blue-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">App Móvil</h3>
                        <p class="text-gray-600">Monitorea desde cualquier lugar con nuestra aplicación intuitiva.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section id="productos" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Nuestros Productos</h2>
                
                <!-- Filter Buttons -->
                <div class="flex flex-wrap justify-center gap-4 mb-8">
                    <button onclick="filterProducts('all')" class="filter-btn bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        Todos
                    </button>
                    <button onclick="filterProducts('domo')" class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                        Domo
                    </button>
                    <button onclick="filterProducts('bullet')" class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                        Bullet
                    </button>
                    <button onclick="filterProducts('ip')" class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                        IP
                    </button>
                    <button onclick="filterProducts('ptz')" class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                        PTZ
                    </button>
                    <button onclick="filterProducts('solares')" class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                        Solares
                    </button>
                    <button onclick="filterProducts('kit')" class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                        Kits
                    </button>
                </div>
                
                <!-- Products Grid -->
                <div id="productsGrid" class="grid md:grid-cols-3 gap-8">
                    <!-- Product cards will be inserted here by JavaScript -->
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="servicios" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Nuestros Servicios</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-gray-50 p-6 rounded-lg card-hover">
                        <i class="fas fa-tools text-blue-600 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Instalación Profesional</h3>
                        <p class="text-gray-600">Instalación realizada por técnicos certificados con garantía.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg card-hover">
                        <i class="fas fa-headset text-blue-600 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Soporte 24/7</h3>
                        <p class="text-gray-600">Asistencia técnica disponible todos los días del año.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg card-hover">
                        <i class="fas fa-shield-alt text-blue-600 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Garantía Extendida</h3>
                        <p class="text-gray-600">Hasta 3 años de garantía en todos nuestros productos.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg card-hover">
                        <i class="fas fa-sync-alt text-blue-600 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Mantenimiento</h3>
                        <p class="text-gray-600">Planes de mantenimiento preventivo para óptimo funcionamiento.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contacto" class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-3xl font-bold text-center mb-12">Contáctanos</h2>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Información de Contacto</h3>
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                                    <span>Carrera 5 1B-72 Pamplona</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-phone text-blue-600"></i>
                                    <span>322 73 75 888</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-envelope text-blue-600"></i>
                                    <span>angarita_adrian@hotmail.com</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-clock text-blue-600"></i>
                                    <span>Lun-Vie: 8:00 AM - 5:00 PM</span>
                                </div>
                            </div>
                            
                            <div class="mt-8">
                                <h4 class="font-semibold mb-3">Síguenos</h4>
                                <div class="flex space-x-4">
                                    <a href="#" class="text-gray-600 hover:text-blue-600 transition">
                                        <i class="fab fa-facebook text-2xl"></i>
                                    </a>
                                    <a href="#" class="text-gray-600 hover:text-blue-600 transition">
                                        <i class="fab fa-twitter text-2xl"></i>
                                    </a>
                                    <a href="#" class="text-gray-600 hover:text-blue-600 transition">
                                        <i class="fab fa-instagram text-2xl"></i>
                                    </a>
                                    <a href="#" class="text-gray-600 hover:text-blue-600 transition">
                                        <i class="fab fa-linkedin text-2xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <form onsubmit="handleContactSubmit(event)" class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Nombre</label>
                                    <input type="text" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Email</label>
                                    <input type="email" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Teléfono</label>
                                    <input type="tel" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Mensaje</label>
                                    <textarea rows="4" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                                </div>
                                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                                    Enviar Mensaje
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Shopping Cart Modal -->
        <div id="cartModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
            <div class="absolute right-0 top-0 h-full w-full max-w-md bg-white shadow-xl">
                <div class="p-6 border-b">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold">Carrito de Compras</h3>
                        <button onclick="toggleCart()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>
                
                <div id="cartItems" class="p-6 flex-1 overflow-y-auto" style="max-height: calc(100vh - 200px);">
                    <!-- Cart items will be inserted here -->
                </div>
                
                <div class="p-6 border-t">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold">Total:</span>
                        <span id="cartTotal" class="text-2xl font-bold text-blue-600">$0</span>
                    </div>
                    <button onclick="checkout()" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Proceder al Pago
                    </button>
                </div>
            </div>
        </div>

        <!-- Notification -->
        <div id="notification" class="fixed top-20 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg hidden notification">
            <div class="flex items-center space-x-2">
                <i class="fas fa-check-circle"></i>
                <span id="notificationText">Producto añadido al carrito</span>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-12">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <div class="flex items-center space-x-2 mb-4">
                            <i class="fas fa-shield-alt text-blue-400 text-2xl"></i>
                            <span class="text-xl font-bold">ElectroAdriancho Security</span>
                        </div>
                        <p class="text-gray-400">Líderes en soluciones de seguridad para hogares y empresas.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Productos</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition">Cámaras Domésticas</a></li>
                            <li><a href="#" class="hover:text-white transition">Cámaras Profesionales</a></li>
                            <li><a href="#" class="hover:text-white transition">Sistemas IP</a></li>
                            <li><a href="#" class="hover:text-white transition">Accesorios</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Soporte</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition">Guías de Instalación</a></li>
                            <li><a href="#" class="hover:text-white transition">Preguntas Frecuentes</a></li>
                            <li><a href="#" class="hover:text-white transition">Descargas</a></li>
                            <li><a href="#" class="hover:text-white transition">Garantía</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Newsletter</h4>
                        <p class="text-gray-400 mb-4">Suscríbete para recibir ofertas exclusivas.</p>
                        <form onsubmit="handleNewsletterSubmit(event)" class="flex">
                            <input type="email" placeholder="Tu email" required class="flex-1 px-4 py-2 rounded-l-lg text-gray-800">
                            <button type="submit" class="bg-blue-600 px-4 py-2 rounded-r-lg hover:bg-blue-700 transition">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 ElectroAdriancho Security. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>    
        // Product data
        const products = [
            
        // DOMO
            {
                id: 1,
                name: "Cámara Domo 4K",
                category: "domo",
                price: 130200,
                image: "cámara_Domo_4K.jpg",
                description: "Perfecta para interiores, visión nocturna IR",
                features: ["4k", "Visión nocturna 40m", "Ángulo 110°", "Audio bidireccional"]
            },
            {
                id: 2,
                name: "Cámara Domo Inteligente",
                category: "domo",
                price: 145000,
                image: "cámara_domo_inteligente.jpg",
                description: "Detección de movimiento con alertas al móvil",
                features: ["Full HD", "WiFi", "Audio bidireccional", "Notificaciones móviles"]
            },
            {
                id: 3,
                name: "Cámara Domo IR 1080p",
                category: "domo",
                price: 120500,
                image: "cámara_domo_ir1080p.jpg",
                description: "Visión nocturna hasta 30 metros",
                features: ["1080p HD", "IR 30m", "Ángulo 120°", "Montaje fácil"]
            },
            {
                id: 4,
                name: "Cámara Domo Exterior",
                category: "domo",
                price: 160300,
                image: "cámara_domo_exterior.jpg",
                description: "Resistente al agua y polvo",
                features: ["IP66", "Full HD", "Detección de movimiento", "Audio bidireccional"]
            },
            {
                id: 5,
                name: "Cámara Domo PTZ",
                category: "domo",
                price: 200400,
                image: "cámara_domo_ptz.jpg",
                description: "Pan, tilt y zoom para vigilancia total",
                features: ["Zoom 5x", "Rotación 360°", "Control remoto", "Grabación en la nube"]
            },

            // BULLET
            {
                id: 6,
                name: "Cámara Bullet 4K Pro",
                category: "bullet",
                price: 199300,
                image: "imagen3.jpg",
                description: "Ideal para exteriores, resistente al agua",
                features: ["4K Ultra HD", "IP67 Resistente", "Visión nocturna 50m", "Detección de movimiento"]
            },
            {
                id: 7,
                name: "Cámara Bullet 1080p",
                category: "bullet",
                price: 125000,
                image: "cámara_bullet_1080p.jpg",
                description: "Compacta y resistente a la intemperie",
                features: ["1080p HD", "IP65", "Visión nocturna", "Alertas móviles"]
            },
            {
                id: 8,
                name: "Bullet Pro Outdoor",
                category: "bullet",
                price: 150000,
                image: "bullet_pro_outdoor.jpg",
                description: "Con sensor de movimiento avanzado",
                features: ["Full HD", "Visión nocturna 40m", "Detección humana", "Grabación continua"]
            },
            {
                id: 9,
                name: "Bullet Wide Angle",
                category: "bullet",
                price: 175500,
                image: "bullet_wide_angle.jpg",
                description: "Ángulo de visión ultra amplio",
                features: ["4K", "120° ángulo", "IP66", "Audio bidireccional"]
            },
            {
                id: 10,
                name: "Bullet Zoom 5x",
                category: "bullet",
                price: 210000,
                image: "bullet_zoom_5x.png",
                description: "Zoom óptico 5x para vigilancia detallada",
                features: ["4K", "Zoom 5x", "IP67", "Control remoto"]
            },

            // IP
            {
                id: 11,
                name: "Cámara IP WiFi",
                category: "ip",
                price: 129600,
                image: "imagen4.jpg",
                description: "Conexión inalámbrica, fácil instalación",
                features: ["WiFi 5GHz", "Audio bidireccional", "Alertas móviles", "Compatible con Alexa"]
            },
            {
                id: 12,
                name: "Cámara IP 1080p",
                category: "ip",
                price: 95000,
                image: "camara_ip_1080p.jpg",
                description: "Para interiores, fácil de mover",
                features: ["1080p HD", "WiFi", "Grabación en la nube", "Audio bidireccional"]
            },
            {
                id: 13,
                name: "Cámara IP PTZ",
                category: "ip",
                price: 180000,
                image: "camara_ip_ptz.png",
                description: "Control total desde app móvil",
                features: ["Rotación 360°", "Zoom 4x", "WiFi", "Detección de movimiento"]
            },
            {
                id: 14,
                name: "Cámara IP Baby Monitor",
                category: "ip",
                price: 110000,
                image: "camara_ip_baby.jpeg",
                description: "Perfecta para monitorear bebés y mascotas",
                features: ["1080p", "Audio bidireccional", "Alertas de sonido", "WiFi"]
            },
            {
                id: 15,
                name: "Cámara IP Inteligente",
                category: "ip",
                price: 140000,
                image: "camara_ip_inteligente.jpg",
                description: "Compatible con asistentes inteligentes",
                features: ["Full HD", "WiFi", "Notificaciones móviles", "Alexa/Google Home"]
            },

            // KIT
            {
                id: 16,
                name: "Kit 4 Cámaras HD",
                category: "kit",
                price: 299900,
                image: "imagen5.jpg",
                description: "Sistema completo para tu hogar",
                features: ["4 cámaras HD", "DVR 1TB", "Visión remota", "Grabación continua"]
            },
            {
                id: 17,
                name: "Kit 8 Cámaras Full HD",
                category: "kit",
                price: 450000,
                image: "kit_8.png",
                description: "Sistema de vigilancia completo para exteriores",
                features: ["8 cámaras", "DVR 2TB", "IP66", "Grabación remota"]
            },
            {
                id: 18,
                name: "Kit 4 Cámaras Bullet",
                category: "kit",
                price: 320000,
                image: "kit_4_bullet.jpg",
                description: "Instalación rápida y sencilla",
                features: ["4 cámaras", "DVR 1TB", "Visión nocturna", "Control remoto"]
            },
            {
                id: 19,
                name: "Kit 6 Cámaras Domo",
                category: "kit",
                price: 400000,
                image: "kit_6_bullet.jpg",
                description: "Monitoreo integral para tu hogar",
                features: ["6 cámaras HD", "DVR 1TB", "Audio bidireccional", "Grabación continua"]
            },
            {
                id: 20,
                name: "Kit 4 Cámaras IP",
                category: "kit",
                price: 350000,
                image: "kit_4_ip.jpeg",
                description: "Sistema inalámbrico y escalable",
                features: ["4 cámaras IP", "WiFi", "Grabación en la nube", "Alertas móviles"]
            },

            // PTZ
            {
                id: 21,
                name: "Cámara PTZ 360°",
                category: "ptz",
                price: 349100,
                image: "imagen6.jpg",
                description: "Control remoto de pan, tilt y zoom",
                features: ["Zoom óptico 10x", "Rotación 360°", "Seguimiento automático", "Preposiciones"]
            },
            {
                id: 22,
                name: "PTZ Zoom 20x",
                category: "ptz",
                price: 500000,
                image: "ptz_zoom_20x.jpg",
                description: "Vigilancia profesional para exteriores",
                features: ["Zoom 20x", "Rotación 360°", "IP66", "Detección de movimiento"]
            },
            {
                id: 23,
                name: "PTZ Exterior IP",
                category: "ptz",
                price: 430000,
                image: "ptz_exterior_ip.jpeg",
                description: "Alta definición y resistencia al clima",
                features: ["Full HD", "IP67", "Zoom 10x", "Rotación 360°"]
            },
            {
                id: 24,
                name: "PTZ Inteligente",
                category: "ptz",
                price: 480000,
                image: "ptz_inteligente.jpeg",
                description: "Seguimiento automático de personas",
                features: ["Zoom 15x", "IA de seguimiento", "Audio bidireccional", "IP66"]
            },
            {
                id: 25,
                name: "PTZ Mini",
                category: "ptz",
                price: 320000,
                image: "ptz_mini.jpg",
                description: "Compacta para interiores con control remoto",
                features: ["Zoom 5x", "Rotación 180°", "WiFi", "Grabación continua"]
            },

            // DOMÉSTICA / MINI
            {
                id: 26,
                name: "Cámara Mini Oculta",
                category: "domestica",
                price: 59500,
                image: "imagen7.jpg",
                description: "Diseño discreto para vigilancia encubierta",
                features: ["Tamaño compacto", "1080p HD", "Batería larga duración", "Grabación en loop"]
            },
            {
                id: 27,
                name: "Cámara Oculta WiFi",
                category: "domestica",
                price: 78000,
                image: "camara_oculta_wifi.png",
                description: "Grabación discreta y control desde app",
                features: ["1080p", "WiFi", "Detección de movimiento", "Audio bidireccional"]
            },
            {
                id: 28,
                name: "Cámara de Escritorio",
                category: "domestica",
                price: 65000,
                image: "imagen11.jpg",
                description: "Ideal para oficinas y hogares",
                features: ["1080p HD", "WiFi", "Alertas móviles", "Audio bidireccional"]
            },
            {
                id: 29,
                name: "Cámara Mini PTZ",
                category: "domestica",
                price: 90000,
                image: "imagen12.png",
                description: "Control remoto y visión nocturna",
                features: ["Zoom 3x", "WiFi", "Rotación 180°", "Grabación en loop"]
            },
            {
                id: 30,
                name: "Cámara Plug & Play",
                category: "domestica",
                price: 72000,
                image: "imagen31.jpg",
                description: "Fácil instalación y portátil",
                features: ["1080p HD", "WiFi", "Alertas en app", "Audio bidireccional"]
            },

            // SOLARES
            {
                id: 31,
                name: "Cámara Solar 1080p",
                category: "solares",
                price: 150000,
                image: "imagen32.png",
                description: "Alimentación solar para exteriores",
                features: ["1080p HD", "Panel solar", "WiFi", "Detección de movimiento"]
            },
            {
                id: 32,
                name: "Cámara Solar PTZ",
                category: "solares",
                price: 250000,
                image: "imagen33.png",
                description: "Rotación 360° con energía solar",
                features: ["Full HD", "Panel solar", "Zoom 10x", "Control remoto"]
            },
            {
                id: 33,
                name: "Cámara Solar Bullet",
                category: "solares",
                price: 200000,
                image: "imagen34.jpg",
                description: "Resistente al agua y autónoma",
                features: ["1080p", "IP65", "Panel solar", "Alertas móviles"]
            },
            {
                id: 34,
                name: "Cámara Solar Domo",
                category: "solares",
                price: 180000,
                image: "imagen35.jpg",
                description: "Vigilancia discreta con energía solar",
                features: ["Full HD", "Panel solar", "Audio bidireccional", "Visión nocturna"]
            },
            {
                id: 35,
                name: "Cámara Solar Kit 2 en 1",
                category: "solares",
                price: 300000,
                image: "imagen36.jpg",
                description: "Sistema solar completo con 2 cámaras",
                features: ["2 cámaras HD", "Panel solar", "WiFi", "Grabación remota"]
            }
        ];
                  
        // Shopping cart
        let cart = [];
        let sidebarOpen = true;
        let currentStep = 1;
        let questions = [];
        let allQuestions = [
            {
                id: 1,
                type: "text",
                question: "¿Qué producto compró?",
                required: true
            },
            {
                id: 2,
                type: "multiple",
                question: "¿Cómo calificaría nuestro servicio?",
                options: ["Excelente", "Bueno", "Regular", "Malo"],
                required: true
            }
        ];
        
        let surveys = [
            {
                id: 1,
                title: "Satisfacción del Cliente",
                description: "Encuesta sobre productos de seguridad",
                startDate: "2024-01-01",
                endDate: "2024-12-31",
                active: true,
                questions: [
                    { type: "text", question: "¿Qué producto compró?", required: true },
                    { type: "multiple", question: "¿Cómo calificaría nuestro servicio?", options: ["Excelente", "Bueno", "Regular", "Malo"], required: true }
                ],
                responses: [
                    {
                        id: 1,
                        date: "2024-01-15 10:30:00",
                        answers: ["Cámara Domo 4k", "Excelente"]
                    },
                    {
                        id: 2,
                        date: "2024-01-20 14:45:00",
                        answers: ["Kit 4 Cámaras HD", "Bueno"]
                    },
                    {
                        id: 3,
                        date: "2024-02-05 09:15:00",
                        answers: ["Cámara IP WiFi", "Regular"]
                    }
                ]
            },
            {
                id: 2,
                title: "Satisfacción con el Servicio Técnico",
                description: "Encuesta sobre nuestro servicio de soporte técnico",
                startDate: "2024-01-01",
                endDate: "2024-12-31",
                active: true,
                questions: [
                    { type: "text", question: "¿Cuál fue el motivo de su contacto con soporte técnico?", required: true },
                    { type: "multiple", question: "¿Cómo calificaría la atención recibida?", options: ["Excelente", "Buena", "Regular", "Mala"], required: true },
                    { type: "text", question: "¿Tiene algún comentario adicional?", required: false }
                ],
                responses: [
                    {
                        id: 1,
                        date: "2024-01-10 11:20:00",
                        answers: ["Problema de instalación", "Excelente", "Muy buen servicio, solucionaron mi problema rápidamente"]
                    },
                    {
                        id: 2,
                        date: "2024-01-25 16:30:00",
                        answers: ["Consulta sobre garantía", "Buena", ""]
                    }
                ]
            }
        ];

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            renderProducts('all');
            updateCartCount();
            setupSidebar();
        });

        // Setup sidebar
        function setupSidebar() {
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            sidebarItems.forEach(item => {
                item.addEventListener('click', function() {
                    sidebarItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        }

        // Toggle sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('sidebar-open');
            } else {
                sidebarOpen = !sidebarOpen;
                if (sidebarOpen) {
                    sidebar.classList.remove('sidebar-closed');
                    mainContent.classList.remove('main-content-full');
                } else {
                    sidebar.classList.add('sidebar-closed');
                    mainContent.classList.add('main-content-full');
                }
            }
        }

        // Show CRUD section
        function showCrudSection(section) {
            const crudSection = document.getElementById('crudSection');
            const homeSection = document.getElementById('homeSection');
            const createSurveyPage = document.getElementById('createSurveyPage');
            const editSurveyPage = document.getElementById('editSurveyPage');
            const addQuestionPage = document.getElementById('addQuestionPage');
            const exportCsvPage = document.getElementById('exportCsvPage');
            const crudContent = document.getElementById('crudContent');
            
            // Ocultar todas las secciones
            homeSection.style.display = 'none';
            createSurveyPage.classList.add('hidden');
            editSurveyPage.classList.add('hidden');
            addQuestionPage.classList.add('hidden');
            exportCsvPage.classList.add('hidden');
            crudSection.classList.remove('hidden');
            
            // Cargar contenido según la sección
            let content = '';
            switch(section) {
                case 'encuestas':
                    content = `
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-blue-600">CRUD de Encuestas</h2>
                            <button onclick="showCreateSurveyPage()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                <i class="fas fa-plus mr-2"></i> Nueva Encuesta
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="py-3 px-4 text-left">ID</th>
                                        <th class="py-3 px-4 text-left">Título</th>
                                        <th class="py-3 px-4 text-left">Descripción</th>
                                        <th class="py-3 px-4 text-left">Estado</th>
                                        <th class="py-3 px-4 text-left">Preguntas</th>
                                        <th class="py-3 px-4 text-left">Respuestas</th>
                                        <th class="py-3 px-4 text-left">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${surveys.map(survey => `
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-4">${survey.id}</td>
                                            <td class="py-3 px-4 font-medium">${survey.title}</td>
                                            <td class="py-3 px-4">${survey.description}</td>
                                            <td class="py-3 px-4">
                                                <span class="${survey.active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'} px-2 py-1 rounded text-sm">
                                                    ${survey.active ? 'Activa' : 'Inactiva'}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">${survey.questions ? survey.questions.length : 0}</td>
                                            <td class="py-3 px-4">${survey.responses ? survey.responses.length : 0}</td>
                                            <td class="py-3 px-4">
                                                <button onclick="editSurvey(${survey.id})" class="text-blue-600 hover:text-blue-800 mr-2" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button onclick="toggleSurveyStatus(${survey.id})" class="${survey.active ? 'text-yellow-600 hover:text-yellow-800' : 'text-green-600 hover:text-green-800'} mr-2" title="${survey.active ? 'Desactivar' : 'Activar'}">
                                                    <i class="fas fa-toggle-${survey.active ? 'on' : 'off'}"></i>
                                                </button>
                                                <button onclick="deleteSurvey(${survey.id})" class="text-red-600 hover:text-red-800" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    `).join('')}
                                    ${surveys.length === 0 ? `
                                        <tr>
                                            <td colspan="7" class="py-8 text-center text-gray-500">
                                                No hay encuestas creadas. <button onclick="showCreateSurveyPage()" class="text-blue-600 hover:text-blue-800 underline">Crea la primera</button>
                                            </td>
                                        </tr>
                                    ` : ''}
                                </tbody>
                            </table>
                        </div>
                    `;
                    break;
                    
                case 'preguntas':
                    content = `
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-blue-600">CRUD de Preguntas</h2>
                            <div class="flex space-x-2">
                                <button onclick="showAddTextQuestionPage()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                    <i class="fas fa-plus mr-2"></i>Agregar Pregunta de Texto
                                </button>
                                <button onclick="showAddMultipleQuestionPage()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                    <i class="fas fa-plus mr-2"></i>Agregar Pregunta Múltiple
                                </button>
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-xl font-semibold mb-4">Texto</h3>
                                ${allQuestions.filter(q => q.type === 'text').map(question => `
                                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="font-medium">${question.question}</p>
                                                <p class="text-sm text-gray-600">Tipo: Texto | Obligatoria: ${question.required ? 'Sí' : 'No'}</p>
                                            </div>
                                            <div class="flex space-x-2">
                                                <button onclick="editQuestion(${question.id})" class="text-blue-600 hover:text-blue-800" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button onclick="deleteQuestion(${question.id})" class="text-red-600 hover:text-red-800" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                `).join('')}
                                ${allQuestions.filter(q => q.type === 'text').length === 0 ? 
                                    '<p class="text-gray-500 text-center py-4">No hay preguntas de texto creadas</p>' : ''}
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-semibold mb-4">Opción Múltiple</h3>
                                ${allQuestions.filter(q => q.type === 'multiple').map(question => `
                                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="font-medium">${question.question}</p>
                                                <p class="text-sm text-gray-600">Tipo: Opción Múltiple | Obligatoria: ${question.required ? 'Sí' : 'No'}</p>
                                                <p class="text-sm text-gray-600 mt-1">Opciones: ${question.options ? question.options.join(', ') : 'No definidas'}</p>
                                            </div>
                                            <div class="flex space-x-2">
                                                <button onclick="editQuestion(${question.id})" class="text-blue-600 hover:text-blue-800" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button onclick="deleteQuestion(${question.id})" class="text-red-600 hover:text-red-800" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                `).join('')}
                                ${allQuestions.filter(q => q.type === 'multiple').length === 0 ? 
                                    '<p class="text-gray-500 text-center py-4">No hay preguntas múltiples creadas</p>' : ''}
                            </div>
                        </div>
                    `;
                    break;
                    
                case 'activar':
                    content = `
                        <h2 class="text-2xl font-bold mb-6 text-blue-600">Activar/Desactivar Encuestas</h2>
                        <div class="space-y-4">
                            ${surveys.map(survey => `
                                <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
                                    <div>
                                        <h4 class="font-medium">${survey.title}</h4>
                                        <p class="text-sm text-gray-600">ID: ENC-${survey.id.toString().padStart(3, '0')}</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="${survey.active ? 'text-green-600' : 'text-red-600'} font-medium">
                                            ${survey.active ? 'Activa' : 'Inactiva'}
                                        </span>
                                        <button onclick="toggleSurveyStatus(${survey.id})" class="${survey.active ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700'} text-white px-4 py-2 rounded-lg transition">
                                            ${survey.active ? 'Desactivar' : 'Activar'}
                                        </button>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    `;
                    break;
                    
                case 'exportar':
                    content = `
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-blue-600">Exportar Respuestas en CSV</h2>
                        </div>
                        <div class="bg-blue-50 p-6 rounded-lg mb-6">
                            <h3 class="text-lg font-semibold mb-4">Seleccione una encuesta para exportar:</h3>
                            <div class="space-y-4">
                                ${surveys.map(survey => `
                                    <div class="flex items-center justify-between bg-white p-4 rounded-lg border">
                                        <div>
                                            <h4 class="font-medium">${survey.title}</h4>
                                            <p class="text-sm text-gray-600">${survey.description}</p>
                                            <p class="text-sm text-gray-600">Respuestas: ${survey.responses ? survey.responses.length : 0}</p>
                                        </div>
                                        <button onclick="exportSurveyToCsv(${survey.id})" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex items-center">
                                            <i class="fas fa-file-csv mr-2"></i> Exportar CSV
                                        </button>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                        <div class="text-sm text-gray-600">
                            <p><i class="fas fa-info-circle mr-2"></i> El archivo CSV contendrá todas las respuestas de la encuesta seleccionada.</p>
                            <p><i class="fas fa-info-circle mr-2"></i> Cada fila representa una respuesta y cada columna una pregunta.</p>
                        </div>
                    `;
                    break;
            }
            
            crudContent.innerHTML = content;
            
            // Cerrar sidebar en móviles
            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        }

        // Exportar encuesta a CSV
        function exportSurveyToCsv(surveyId) {
            const survey = surveys.find(s => s.id === surveyId);
            if (!survey) {
                showNotification('Encuesta no encontrada', 'error');
                return;
            }
            
            const crudSection = document.getElementById('crudSection');
            const homeSection = document.getElementById('homeSection');
            const createSurveyPage = document.getElementById('createSurveyPage');
            const editSurveyPage = document.getElementById('editSurveyPage');
            const addQuestionPage = document.getElementById('addQuestionPage');
            const exportCsvPage = document.getElementById('exportCsvPage');
            const exportCsvContent = document.getElementById('exportCsvContent');
            
            // Ocultar otras secciones
            homeSection.style.display = 'none';
            crudSection.classList.add('hidden');
            createSurveyPage.classList.add('hidden');
            editSurveyPage.classList.add('hidden');
            addQuestionPage.classList.add('hidden');
            
            // Configurar página de exportación
            document.getElementById('exportCsvTitle').textContent = `Exportar Respuestas: ${survey.title}`;
            
            let exportHTML = `
                <div class="mb-6">
                    <div class="bg-blue-50 p-4 rounded-lg mb-4">
                        <h4 class="font-medium text-lg mb-2">Detalles de la Encuesta</h4>
                        <p><strong>Título:</strong> ${survey.title}</p>
                        <p><strong>Descripción:</strong> ${survey.description}</p>
                        <p><strong>Total de respuestas:</strong> ${survey.responses ? survey.responses.length : 0}</p>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="font-medium text-lg mb-4">Vista Previa de Datos</h4>
                        <div class="overflow-x-auto">
                            <table class="responses-table">
                                <thead>
                                    <tr>
                                        <th>ID Respuesta</th>
                                        <th>Fecha y Hora</th>
                                        ${survey.questions.map((q, index) => `<th>P${index + 1}: ${q.question}</th>`).join('')}
                                    </tr>
                                </thead>
                                <tbody>
                                    ${survey.responses && survey.responses.length > 0 ? 
                                        survey.responses.map(response => `
                                            <tr>
                                                <td>${response.id}</td>
                                                <td>${response.date}</td>
                                                ${response.answers.map(answer => `<td>${answer}</td>`).join('')}
                                            </tr>
                                        `).join('') : 
                                        `<tr><td colspan="${2 + survey.questions.length}" class="text-center py-4">No hay respuestas registradas</td></tr>`
                                    }
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="font-medium text-lg mb-4">Opciones de Exportación</h4>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="space-y-3">
                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" id="includeHeaders" class="mr-2" checked>
                                        <span>Incluir encabezados de columnas</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" id="includeTimestamps" class="mr-2" checked>
                                        <span>Incluir marcas de tiempo</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Separador de campos</label>
                                    <select id="fieldSeparator" class="w-full px-4 py-2 border rounded-lg">
                                        <option value=",">Coma (,)</option>
                                        <option value=";">Punto y coma (;)</option>
                                        <option value="\t">Tabulador</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Delimitador de texto</label>
                                    <select id="textDelimiter" class="w-full px-4 py-2 border rounded-lg">
                                        <option value='\"'>Comillas dobles (")</option>
                                        <option value="'">Comillas simples (')</option>
                                        <option value="">Sin delimitador</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between pt-4 border-t">
                        <button type="button" onclick="downloadCsv(${surveyId})" 
                                class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition flex items-center">
                            <i class="fas fa-download mr-2"></i> Descargar Archivo CSV
                        </button>
                        <button type="button" onclick="goBackToExport()" 
                                class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Volver
                        </button>
                    </div>
                </div>
            `;
            
            exportCsvContent.innerHTML = exportHTML;
            exportCsvPage.classList.remove('hidden');
            
            // Cerrar sidebar en móviles
            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        }

        // Descargar archivo CSV
        function downloadCsv(surveyId) {
            const survey = surveys.find(s => s.id === surveyId);
            if (!survey || !survey.responses || survey.responses.length === 0) {
                showNotification('No hay respuestas para exportar', 'error');
                return;
            }
            
            const includeHeaders = document.getElementById('includeHeaders').checked;
            const includeTimestamps = document.getElementById('includeTimestamps').checked;
            const fieldSeparator = document.getElementById('fieldSeparator').value;
            const textDelimiter = document.getElementById('textDelimiter').value;
            
            // Construir encabezados
            let csvContent = '';
            
            if (includeHeaders) {
                let headers = [];
                if (includeTimestamps) {
                    headers.push('ID Respuesta', 'Fecha y Hora');
                } else {
                    headers.push('ID Respuesta');
                }
                
                survey.questions.forEach((q, index) => {
                    headers.push(`P${index + 1}: ${q.question}`);
                });
                
                csvContent += headers.map(header => 
                    textDelimiter ? `${textDelimiter}${header}${textDelimiter}` : header
                ).join(fieldSeparator) + '\n';
            }
            
            // Construir filas de datos
            survey.responses.forEach(response => {
                let row = [];
                
                if (includeTimestamps) {
                    row.push(response.id, response.date);
                } else {
                    row.push(response.id);
                }
                
                // Agregar respuestas
                response.answers.forEach(answer => {
                    row.push(answer);
                });
                
                csvContent += row.map(cell => {
                    // Si el campo contiene el separador o comillas, lo encerramos en delimitador
                    if (textDelimiter && (cell.includes(fieldSeparator) || cell.includes('"'))) {
                        // Escapar comillas dobles si están presentes
                        const escapedCell = cell.replace(/"/g, '""');
                        return `${textDelimiter}${escapedCell}${textDelimiter}`;
                    }
                    return textDelimiter ? `${textDelimiter}${cell}${textDelimiter}` : cell;
                }).join(fieldSeparator) + '\n';
            });
            
            // Crear blob y descargar
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', `respuestas_${survey.title.replace(/\s+/g, '_')}_${new Date().toISOString().slice(0, 10)}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            showNotification(`Archivo CSV descargado exitosamente: ${survey.title}`);
            
            // Regresar a la vista de exportación después de un momento
            setTimeout(() => {
                goBackToExport();
            }, 1500);
        }

        // Regresar a la página de exportación
        function goBackToExport() {
            const crudSection = document.getElementById('crudSection');
            const homeSection = document.getElementById('homeSection');
            const createSurveyPage = document.getElementById('createSurveyPage');
            const editSurveyPage = document.getElementById('editSurveyPage');
            const addQuestionPage = document.getElementById('addQuestionPage');
            const exportCsvPage = document.getElementById('exportCsvPage');
            
            createSurveyPage.classList.add('hidden');
            editSurveyPage.classList.add('hidden');
            addQuestionPage.classList.add('hidden');
            exportCsvPage.classList.add('hidden');
            crudSection.classList.remove('hidden');
            homeSection.style.display = 'none';
            
            // Mostrar nuevamente el CRUD de exportar
            showCrudSection('exportar');
        }

        // Mostrar página para agregar pregunta de texto
        function showAddTextQuestionPage() {
            const crudSection = document.getElementById('crudSection');
            const homeSection = document.getElementById('homeSection');
            const createSurveyPage = document.getElementById('createSurveyPage');
            const editSurveyPage = document.getElementById('editSurveyPage');
            const addQuestionPage = document.getElementById('addQuestionPage');
            const exportCsvPage = document.getElementById('exportCsvPage');
            const addQuestionContent = document.getElementById('addQuestionContent');
            
            // Ocultar otras secciones
            homeSection.style.display = 'none';
            crudSection.classList.add('hidden');
            createSurveyPage.classList.add('hidden');
            editSurveyPage.classList.add('hidden');
            exportCsvPage.classList.add('hidden');
            
            // Configurar formulario
            document.getElementById('addQuestionTitle').textContent = 'Agregar Pregunta de Texto';
            
            let formHTML = `
                <form id="textQuestionForm" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium mb-1">Texto de la pregunta *</label>
                        <input type="text" id="questionText" required 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="¿Cuál es tu pregunta?">
                    </div>
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" id="questionRequired" class="mr-2">
                            <span>Pregunta obligatoria</span>
                        </label>
                    </div>
                    <div class="flex justify-between pt-4 border-t">
                        <button type="button" onclick="saveTextQuestion()" 
                                class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                            <i class="fas fa-save mr-2"></i> Guardar Pregunta
                        </button>
                        <button type="button" onclick="goBackToQuestions()" 
                                class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                            Cancelar
                        </button>
                    </div>
                </form>
            `;
            
            addQuestionContent.innerHTML = formHTML;
            addQuestionPage.classList.remove('hidden');
            
            // Cerrar sidebar en móviles
            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        }

        // Mostrar página para agregar pregunta múltiple
        function showAddMultipleQuestionPage() {
            const crudSection = document.getElementById('crudSection');
            const homeSection = document.getElementById('homeSection');
            const createSurveyPage = document.getElementById('createSurveyPage');
            const editSurveyPage = document.getElementById('editSurveyPage');
            const addQuestionPage = document.getElementById('addQuestionPage');
            const exportCsvPage = document.getElementById('exportCsvPage');
            const addQuestionContent = document.getElementById('addQuestionContent');
            
            // Ocultar otras secciones
            homeSection.style.display = 'none';
            crudSection.classList.add('hidden');
            createSurveyPage.classList.add('hidden');
            editSurveyPage.classList.add('hidden');
            exportCsvPage.classList.add('hidden');
            
            // Configurar formulario
            document.getElementById('addQuestionTitle').textContent = 'Agregar Pregunta Múltiple';
            
            let formHTML = `
                <form id="multipleQuestionForm" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium mb-1">Texto de la pregunta *</label>
                        <input type="text" id="multipleQuestionText" required 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="¿Cuál es tu pregunta?">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Opciones (una por línea) *</label>
                        <textarea id="questionOptions" rows="4" required 
                                  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                  placeholder="Ej: Excelente&#10;Bueno&#10;Regular&#10;Malo"></textarea>
                        <p class="text-sm text-gray-600 mt-1">Escribe cada opción en una línea separada.</p>
                    </div>
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" id="multipleQuestionRequired" class="mr-2">
                            <span>Pregunta obligatoria</span>
                        </label>
                    </div>
                    <div class="flex justify-between pt-4 border-t">
                        <button type="button" onclick="saveMultipleQuestion()" 
                                class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                            <i class="fas fa-save mr-2"></i> Guardar Pregunta
                        </button>
                        <button type="button" onclick="goBackToQuestions()" 
                                class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                            Cancelar
                        </button>
                    </div>
                </form>
            `;
            
            addQuestionContent.innerHTML = formHTML;
            addQuestionPage.classList.remove('hidden');
            
            // Cerrar sidebar en móviles
            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        }

        // Guardar pregunta de texto
        function saveTextQuestion() {
            const questionText = document.getElementById('questionText').value;
            const required = document.getElementById('questionRequired').checked;
            
            if (!questionText.trim()) {
                showNotification('Por favor ingresa el texto de la pregunta', 'error');
                return;
            }
            
            const newQuestion = {
                id: allQuestions.length > 0 ? Math.max(...allQuestions.map(q => q.id)) + 1 : 1,
                type: 'text',
                question: questionText,
                required: required
            };
            
            allQuestions.push(newQuestion);
            showNotification('Pregunta de texto guardada exitosamente');
            
            // Regresar al CRUD de preguntas
            setTimeout(() => {
                showCrudSection('preguntas');
            }, 1000);
        }

        // Guardar pregunta múltiple
        function saveMultipleQuestion() {
            const questionText = document.getElementById('multipleQuestionText').value;
            const optionsText = document.getElementById('questionOptions').value;
            const required = document.getElementById('multipleQuestionRequired').checked;
            
            if (!questionText.trim()) {
                showNotification('Por favor ingresa el texto de la pregunta', 'error');
                return;
            }
            
            const options = optionsText.split('\n')
                .map(option => option.trim())
                .filter(option => option !== '');
            
            if (options.length < 2) {
                showNotification('Debes ingresar al menos 2 opciones', 'error');
                return;
            }
            
            const newQuestion = {
                id: allQuestions.length > 0 ? Math.max(...allQuestions.map(q => q.id)) + 1 : 1,
                type: 'multiple',
                question: questionText,
                options: options,
                required: required
            };
            
            allQuestions.push(newQuestion);
            showNotification('Pregunta múltiple guardada exitosamente');
            
            // Regresar al CRUD de preguntas
            setTimeout(() => {
                showCrudSection('preguntas');
            }, 1000);
        }

        // Editar pregunta
        function editQuestion(questionId) {
            const question = allQuestions.find(q => q.id === questionId);
            if (!question) return;
            
            // Aquí puedes implementar la lógica para editar preguntas
            showNotification(`Editando pregunta: ${question.question}`);
        }

        // Eliminar pregunta
        function deleteQuestion(questionId) {
            if (confirm('¿Estás seguro de que deseas eliminar esta pregunta? Esta acción no se puede deshacer.')) {
                allQuestions = allQuestions.filter(q => q.id !== questionId);
                showNotification('Pregunta eliminada exitosamente');
                
                // Actualizar vista
                setTimeout(() => {
                    showCrudSection('preguntas');
                }, 1000);
            }
        }

        // Regresar al CRUD de preguntas
        function goBackToQuestions() {
            const crudSection = document.getElementById('crudSection');
            const homeSection = document.getElementById('homeSection');
            const createSurveyPage = document.getElementById('createSurveyPage');
            const editSurveyPage = document.getElementById('editSurveyPage');
            const addQuestionPage = document.getElementById('addQuestionPage');
            const exportCsvPage = document.getElementById('exportCsvPage');
            
            createSurveyPage.classList.add('hidden');
            editSurveyPage.classList.add('hidden');
            addQuestionPage.classList.add('hidden');
            exportCsvPage.classList.add('hidden');
            crudSection.classList.remove('hidden');
            homeSection.style.display = 'none';
            
            // Mostrar nuevamente el CRUD de preguntas
            showCrudSection('preguntas');
        }

        // Mostrar página de creación de encuesta
        function showCreateSurveyPage() {
            const crudSection = document.getElementById('crudSection');
            const homeSection = document.getElementById('homeSection');
            const createSurveyPage = document.getElementById('createSurveyPage');
            const editSurveyPage = document.getElementById('editSurveyPage');
            const addQuestionPage = document.getElementById('addQuestionPage');
            const exportCsvPage = document.getElementById('exportCsvPage');
            
            // Resetear formulario
            resetSurveyForm();
            
            // Ocultar otras secciones
            homeSection.style.display = 'none';
            crudSection.classList.add('hidden');
            editSurveyPage.classList.add('hidden');
            addQuestionPage.classList.add('hidden');
            exportCsvPage.classList.add('hidden');
            
            // Mostrar página de creación
            createSurveyPage.classList.remove('hidden');
            
            // Cerrar sidebar en móviles
            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        }

        // Resetear formulario de encuesta
        function resetSurveyForm() {
            currentStep = 1;
            questions = [];
            updateStepIndicator();
            
            // Limpiar formulario
            document.getElementById('surveyTitle').value = '';
            document.getElementById('surveyDescription').value = '';
            document.getElementById('surveyStartDate').value = '';
            document.getElementById('surveyEndDate').value = '';
            document.getElementById('surveyActive').checked = true;
            document.getElementById('surveyAnonymous').checked = false;
            document.getElementById('surveyRequired').checked = false;
            document.getElementById('surveyThankYou').value = '';
            
            // Limpiar preguntas
            document.getElementById('questionsContainer').innerHTML = '';
            
            // Mostrar paso 1
            document.querySelectorAll('.form-step').forEach(step => {
                step.classList.remove('active');
            });
            document.getElementById('step1-form').classList.add('active');
        }

        // Actualizar indicador de pasos
        function updateStepIndicator() {
            for (let i = 1; i <= 4; i++) {
                const step = document.getElementById(`step${i}`);
                const line = document.getElementById(`line${i}`);
                
                if (i < currentStep) {
                    step.classList.remove('active');
                    step.classList.add('completed');
                    if (line) line.classList.add('completed');
                } else if (i === currentStep) {
                    step.classList.add('active');
                    step.classList.remove('completed');
                    if (line) line.classList.remove('completed');
                } else {
                    step.classList.remove('active', 'completed');
                    if (line) line.classList.remove('completed');
                }
            }
        }

        // Navegar entre pasos
        function nextStep(step) {
            // Validar paso actual antes de avanzar
            if (step === 2 && !validateStep1()) return;
            if (step === 3 && !validateStep2()) return;
            
            currentStep = step;
            updateStepIndicator();
            
            // Ocultar todos los pasos
            document.querySelectorAll('.form-step').forEach(formStep => {
                formStep.classList.remove('active');
            });
            
            // Mostrar paso actual
            document.getElementById(`step${step}-form`).classList.add('active');
            
            // Si es el paso 4, generar resumen
            if (step === 4) {
                generateSurveySummary();
            }
        }

        function prevStep(step) {
            currentStep = step;
            updateStepIndicator();
            
            // Ocultar todos los pasos
            document.querySelectorAll('.form-step').forEach(formStep => {
                formStep.classList.remove('active');
            });
            
            // Mostrar paso anterior
            document.getElementById(`step${step}-form`).classList.add('active');
        }

        // Validar paso 1
        function validateStep1() {
            const title = document.getElementById('surveyTitle').value;
            if (!title.trim()) {
                showNotification('Por favor ingresa un título para la encuesta', 'error');
                return false;
            }
            return true;
        }

        // Validar paso 2
        function validateStep2() {
            if (questions.length === 0) {
                showNotification('Debes agregar al menos una pregunta', 'error');
                return false;
            }
            return true;
        }

        // Agregar pregunta
        function addQuestion() {
            const questionId = questions.length + 1;
            const questionHTML = `
                <div class="question-item" id="question-${questionId}">
                    <div class="flex justify-between items-start mb-3">
                        <h4 class="font-medium">Pregunta ${questionId}</h4>
                        <button onclick="removeQuestion(${questionId})" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium mb-1">Texto de la pregunta *</label>
                        <input type="text" id="question-text-${questionId}" 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="¿Cuál es tu pregunta?" 
                               onchange="updateQuestion(${questionId}, 'text', this.value)">
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium mb-1">Tipo de pregunta</label>
                        <select id="question-type-${questionId}" 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                onchange="changeQuestionType(${questionId}, this.value)">
                            <option value="text">Texto</option>
                            <option value="multiple">Opción Múltiple</option>
                        </select>
                    </div>
                    <div id="question-options-${questionId}" class="hidden">
                        <label class="block text-sm font-medium mb-1">Opciones (una por línea)</label>
                        <textarea id="question-options-text-${questionId}" rows="3"
                                  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                  placeholder="Ej: Excelente&#10;Bueno&#10;Regular&#10;Malo"
                                  onchange="updateQuestionOptions(${questionId}, this.value)"></textarea>
                    </div>
                    <div class="mt-3">
                        <label class="flex items-center">
                            <input type="checkbox" id="question-required-${questionId}" 
                                   onchange="updateQuestion(${questionId}, 'required', this.checked)">
                            <span class="ml-2">Pregunta obligatoria</span>
                        </label>
                    </div>
                </div>
            `;
            
            document.getElementById('questionsContainer').insertAdjacentHTML('beforeend', questionHTML);
            
            // Agregar al array de preguntas
            questions.push({
                id: questionId,
                text: '',
                type: 'text',
                options: [],
                required: false
            });
        }

        // Cambiar tipo de pregunta
        function changeQuestionType(questionId, type) {
            const question = questions.find(q => q.id === questionId);
            if (question) {
                question.type = type;
                const optionsDiv = document.getElementById(`question-options-${questionId}`);
                if (type === 'multiple') {
                    optionsDiv.classList.remove('hidden');
                } else {
                    optionsDiv.classList.add('hidden');
                }
            }
        }

        // Actualizar pregunta
        function updateQuestion(questionId, field, value) {
            const question = questions.find(q => q.id === questionId);
            if (question) {
                if (field === 'text') {
                    question.text = value;
                } else if (field === 'required') {
                    question.required = value;
                }
            }
        }

        // Actualizar opciones de pregunta
        function updateQuestionOptions(questionId, value) {
            const question = questions.find(q => q.id === questionId);
            if (question) {
                question.options = value.split('\n').filter(option => option.trim() !== '');
            }
        }

        // Eliminar pregunta
        function removeQuestion(questionId) {
            questions = questions.filter(q => q.id !== questionId);
            const questionElement = document.getElementById(`question-${questionId}`);
            if (questionElement) {
                questionElement.remove();
            }
            
            // Renumerar preguntas restantes
            questions.forEach((q, index) => {
                q.id = index + 1;
                const questionElement = document.getElementById(`question-${questionId}`);
                if (questionElement) {
                    const header = questionElement.querySelector('h4');
                    if (header) {
                        header.textContent = `Pregunta ${q.id}`;
                    }
                }
            });
        }

        // Generar resumen de la encuesta
        function generateSurveySummary() {
            const title = document.getElementById('surveyTitle').value;
            const description = document.getElementById('surveyDescription').value;
            const startDate = document.getElementById('surveyStartDate').value;
            const endDate = document.getElementById('surveyEndDate').value;
            const active = document.getElementById('surveyActive').checked;
            const anonymous = document.getElementById('surveyAnonymous').checked;
            const required = document.getElementById('surveyRequired').checked;
            const thankYou = document.getElementById('surveyThankYou').value;
            
            let summaryHTML = `
                <div class="space-y-4">
                    <div>
                        <strong>Título:</strong> ${title || 'No especificado'}
                    </div>
                    <div>
                        <strong>Descripción:</strong> ${description || 'No especificada'}
                    </div>
                    <div>
                        <strong>Período:</strong> ${startDate ? `Del ${startDate}` : 'Sin fecha de inicio'} 
                        ${endDate ? ` al ${endDate}` : ' sin fecha de fin'}
                    </div>
                    <div>
                        <strong>Estado:</strong> <span class="${active ? 'text-green-600' : 'text-red-600'}">
                            ${active ? 'Activa' : 'Inactiva'}
                        </span>
                    </div>
                    <div>
                        <strong>Configuración:</strong> 
                        ${anonymous ? 'Respuestas anónimas, ' : ''}
                        ${required ? 'Todas las preguntas obligatorias' : ''}
                        ${!anonymous && !required ? 'Configuración predeterminada' : ''}
                    </div>
                    <div class="mt-6">
                        <strong>Preguntas (${questions.length}):</strong>
                        <div class="mt-2 space-y-2">
            `;
            
            questions.forEach((q, index) => {
                summaryHTML += `
                    <div class="pl-4 border-l-2 border-blue-200">
                        <strong>${index + 1}. ${q.text || 'Pregunta sin texto'}</strong><br>
                        <small class="text-gray-600">
                            Tipo: ${q.type === 'text' ? 'Texto' : 'Opción Múltiple'} | 
                            Obligatoria: ${q.required ? 'Sí' : 'No'}
                            ${q.type === 'multiple' && q.options.length > 0 ? `| Opciones: ${q.options.join(', ')}` : ''}
                        </small>
                    </div>
                `;
            });
            
            summaryHTML += `
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('surveySummary').innerHTML = summaryHTML;
        }

        // Guardar encuesta
        function saveSurvey() {
            const title = document.getElementById('surveyTitle').value;
            const description = document.getElementById('surveyDescription').value;
            const startDate = document.getElementById('surveyStartDate').value;
            const endDate = document.getElementById('surveyEndDate').value;
            const active = document.getElementById('surveyActive').checked;
            const anonymous = document.getElementById('surveyAnonymous').checked;
            const required = document.getElementById('surveyRequired').checked;
            const thankYou = document.getElementById('surveyThankYou').value;
            
            // Validar que haya preguntas
            if (questions.length === 0) {
                showNotification('Debes agregar al menos una pregunta', 'error');
                return;
            }
            
            // Validar que todas las preguntas tengan texto
            for (const q of questions) {
                if (!q.text.trim()) {
                    showNotification(`La pregunta ${q.id} no tiene texto`, 'error');
                    return;
                }
            }
            
            // Crear nueva encuesta
            const newSurvey = {
                id: surveys.length > 0 ? Math.max(...surveys.map(s => s.id)) + 1 : 1,
                title: title,
                description: description,
                startDate: startDate,
                endDate: endDate,
                active: active,
                anonymous: anonymous,
                requiredAll: required,
                thankYouMessage: thankYou,
                questions: questions.map(q => ({
                    type: q.type,
                    question: q.text,
                    options: q.type === 'multiple' ? q.options : [],
                    required: q.required
                })),
                createdAt: new Date().toISOString(),
                responses: []
            };
            
            // Agregar al array de encuestas
            surveys.push(newSurvey);
            
            // Mostrar mensaje de éxito
            showNotification(`Encuesta "${title}" creada exitosamente`);
            
            // Regresar al CRUD
            setTimeout(() => {
                showCrudSection('encuestas');
            }, 1500);
        }

        // Editar encuesta
        function editSurvey(surveyId) {
            const survey = surveys.find(s => s.id === surveyId);
            if (!survey) return;
            
            const crudSection = document.getElementById('crudSection');
            const homeSection = document.getElementById('homeSection');
            const createSurveyPage = document.getElementById('createSurveyPage');
            const editSurveyPage = document.getElementById('editSurveyPage');
            const editSurveyContent = document.getElementById('editSurveyContent');
            
            // Ocultar otras secciones
            homeSection.style.display = 'none';
            crudSection.classList.add('hidden');
            createSurveyPage.classList.add('hidden');
            
            // Configurar formulario de edición
            document.getElementById('editSurveyTitle').textContent = `Editar Encuesta: ${survey.title}`;
            
            let editHTML = `
                <form id="editSurveyForm" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium mb-1">Título de la Encuesta *</label>
                        <input type="text" value="${survey.title}" required 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Descripción</label>
                        <textarea rows="3"
                                  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">${survey.description || ''}</textarea>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Fecha de Inicio</label>
                            <input type="date" value="${survey.startDate || ''}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Fecha de Fin</label>
                            <input type="date" value="${survey.endDate || ''}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" ${survey.active ? 'checked' : ''} class="mr-2">
                            <span>Encuesta activa</span>
                        </label>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-lg font-semibold mb-4">Preguntas (${survey.questions.length})</h4>
                        <div class="space-y-4">
                            ${survey.questions.map((q, index) => `
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="flex justify-between items-start mb-2">
                                        <strong>${index + 1}. ${q.question}</strong>
                                        <span class="text-sm px-2 py-1 bg-blue-100 text-blue-800 rounded">${q.type === 'text' ? 'Texto' : 'Opción Múltiple'}</span>
                                    </div>
                                    <p class="text-sm text-gray-600">
                                        Obligatoria: ${q.required ? 'Sí' : 'No'}
                                        ${q.type === 'multiple' && q.options.length > 0 ? `| Opciones: ${q.options.join(', ')}` : ''}
                                    </p>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                    <div class="flex justify-between pt-6 border-t">
                        <button type="button" onclick="updateSurvey(${surveyId})" 
                                class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                            <i class="fas fa-save mr-2"></i> Guardar Cambios
                        </button>
                        <button type="button" onclick="goBackToCrud()" 
                                class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                            Cancelar
                        </button>
                    </div>
                </form>
            `;
            
            editSurveyContent.innerHTML = editHTML;
            editSurveyPage.classList.remove('hidden');
            
            // Cerrar sidebar en móviles
            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        }

        // Actualizar encuesta
        function updateSurvey(surveyId) {
            const survey = surveys.find(s => s.id === surveyId);
            if (!survey) return;
            
            const form = document.getElementById('editSurveyForm');
            const inputs = form.querySelectorAll('input, textarea, select');
            
            // Aquí iría la lógica para actualizar la encuesta
            showNotification(`Encuesta "${survey.title}" actualizada exitosamente`);
            
            // Regresar al CRUD
            setTimeout(() => {
                showCrudSection('encuestas');
            }, 1500);
        }

        // Cambiar estado de encuesta
        function toggleSurveyStatus(surveyId) {
            const survey = surveys.find(s => s.id === surveyId);
            if (survey) {
                survey.active = !survey.active;
                showNotification(`Encuesta ${survey.active ? 'activada' : 'desactivada'} exitosamente`);
                
                // Actualizar vista
                setTimeout(() => {
                    showCrudSection('encuestas');
                }, 1000);
            }
        }

        // Eliminar encuesta
        function deleteSurvey(surveyId) {
            if (confirm('¿Estás seguro de que deseas eliminar esta encuesta? Esta acción no se puede deshacer.')) {
                surveys = surveys.filter(s => s.id !== surveyId);
                showNotification('Encuesta eliminada exitosamente');
                
                // Actualizar vista
                setTimeout(() => {
                    showCrudSection('encuestas');
                }, 1000);
            }
        }

        // Regresar al CRUD
        function goBackToCrud() {
            const crudSection = document.getElementById('crudSection');
            const homeSection = document.getElementById('homeSection');
            const createSurveyPage = document.getElementById('createSurveyPage');
            const editSurveyPage = document.getElementById('editSurveyPage');
            const addQuestionPage = document.getElementById('addQuestionPage');
            const exportCsvPage = document.getElementById('exportCsvPage');
            
            createSurveyPage.classList.add('hidden');
            editSurveyPage.classList.add('hidden');
            addQuestionPage.classList.add('hidden');
            exportCsvPage.classList.add('hidden');
            crudSection.classList.remove('hidden');
            homeSection.style.display = 'none';
        }

        // Regresar al home
        function goHome() {
            const crudSection = document.getElementById('crudSection');
            const homeSection = document.getElementById('homeSection');
            const createSurveyPage = document.getElementById('createSurveyPage');
            const editSurveyPage = document.getElementById('editSurveyPage');
            const addQuestionPage = document.getElementById('addQuestionPage');
            const exportCsvPage = document.getElementById('exportCsvPage');
            
            crudSection.classList.add('hidden');
            createSurveyPage.classList.add('hidden');
            editSurveyPage.classList.add('hidden');
            addQuestionPage.classList.add('hidden');
            exportCsvPage.classList.add('hidden');
            homeSection.style.display = 'block';
        }

        // Render products
        function renderProducts(category) {
            const productsGrid = document.getElementById('productsGrid');
            const filteredProducts = category === 'all' ? products : products.filter(p => p.category === category);
            
            productsGrid.innerHTML = filteredProducts.map(product => `
                <div class="bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                    <img src="${product.image}" alt="${product.name}" class="product-image">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">${product.name}</h3>
                        <p class="text-gray-600 mb-4">${product.description}</p>
                        <div class="mb-4">
                            <ul class="text-sm text-gray-600 space-y-1">
                                ${product.features.map(feature => `<li><i class="fas fa-check text-green-500 mr-2"></i>${feature}</li>`).join('')}
                            </ul>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-blue-600">$${product.price}</span>
                            <button onclick="addToCart(${product.id})" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                <i class="fas fa-cart-plus mr-2"></i>Añadir
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Filter products
        function filterProducts(category) {
            // Update button styles
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            event.target.classList.remove('bg-gray-200', 'text-gray-700');
            event.target.classList.add('bg-blue-600', 'text-white');
            
            renderProducts(category);
        }

        // Add to cart
        function addToCart(productId) {
            const product = products.find(p => p.id === productId);
            const existingItem = cart.find(item => item.id === productId);
            
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ ...product, quantity: 1 });
            }
            
            updateCartCount();
            showNotification('Producto añadido al carrito');
        }

        // Update cart count
        function updateCartCount() {
            const count = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cartCount').textContent = count;
            document.getElementById('sidebarCartCount').textContent = count;
        }

        // Toggle cart
        function toggleCart() {
            const cartModal = document.getElementById('cartModal');
            cartModal.classList.toggle('hidden');
            
            if (!cartModal.classList.contains('hidden')) {
                renderCart();
            }
            
            // Cerrar sidebar en móviles
            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        }

        // Render cart
        function renderCart() {
            const cartItems = document.getElementById('cartItems');
            const cartTotal = document.getElementById('cartTotal');
            
            if (cart.length === 0) {
                cartItems.innerHTML = '<p class="text-gray-500 text-center">Tu carrito está vacío</p>';
                cartTotal.textContent = '$0';
                return;
            }
            
            cartItems.innerHTML = cart.map(item => `
                <div class="flex items-center space-x-4 mb-4 p-4 bg-gray-50 rounded-lg cart-item-enter">
                    <img src="${item.image}" alt="${item.name}" class="cart-image">
                    <div class="flex-1">
                        <h4 class="font-semibold">${item.name}</h4>
                        <p class="text-gray-600">$${item.price}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="updateQuantity(${item.id}, -1)" class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 transition">
                            <i class="fas fa-minus text-sm"></i>
                        </button>
                        <span class="w-8 text-center">${item.quantity}</span>
                        <button onclick="updateQuantity(${item.id}, 1)" class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 transition">
                            <i class="fas fa-plus text-sm"></i>
                        </button>
                    </div>
                    <button onclick="removeFromCart(${item.id})" class="text-red-500 hover:text-red-700 transition">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `).join('');
            
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            cartTotal.textContent = `$${total.toFixed(2)}`;
        }

        // Update quantity
        function updateQuantity(productId, change) {
            const item = cart.find(item => item.id === productId);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    removeFromCart(productId);
                } else {
                    updateCartCount();
                    renderCart();
                }
            }
        }

        // Remove from cart
        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            updateCartCount();
            renderCart();
            showNotification('Producto eliminado del carrito');
        }

        // Checkout
        function checkout() {
            if (cart.length === 0) {
                showNotification('Tu carrito está vacío', 'error');
                return;
            }
            
            // Simulate checkout process
            showNotification('Redirigiendo al pago...', 'info');
            setTimeout(() => {
                alert('¡Gracias por tu compra! Te contactaremos pronto para confirmar los detalles.');
                cart = [];
                updateCartCount();
                toggleCart();
            }, 1500);
        }

        // Show notification
        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            const notificationText = document.getElementById('notificationText');
            
            notificationText.textContent = message;
            notification.className = `fixed top-20 right-4 px-6 py-3 rounded-lg shadow-lg notification ${
                type === 'success' ? 'bg-green-500' : 
                type === 'error' ? 'bg-red-500' : 
                'bg-blue-500'
            } text-white`;
            
            notification.classList.remove('hidden');
            
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 3000);
        }

        // Handle contact form
        function handleContactSubmit(event) {
            event.preventDefault();
            showNotification('Mensaje enviado. Te contactaremos pronto.');
            event.target.reset();
        }

        // Handle newsletter
        function handleNewsletterSubmit(event) {
            event.preventDefault();
            showNotification('¡Gracias por suscribirte!');
            event.target.reset();
        }

        // Logout
        function logout() {
            showNotification('Sesión cerrada correctamente', 'info');
            setTimeout(() => {
                alert('Has cerrado sesión. Redirigiendo...');
            }, 1000);
        }

        // Scroll functions
        function scrollToProducts() {
            document.getElementById('productos').scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToServices() {
            document.getElementById('servicios').scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToFeatures() {
            document.getElementById('caracteristicas').scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToContact() {
            document.getElementById('contacto').scrollIntoView({ behavior: 'smooth' });
        }

        // Show demo
        function showDemo() {
            showNotification('Demostración iniciada. Revisa tu email.', 'info');
        }

        // Close cart when clicking outside
        document.getElementById('cartModal').addEventListener('click', function(e) {
            if (e.target === this) {
                toggleCart();
            }
        });

        // Cerrar sidebar al hacer clic fuera en móviles
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(e.target) && 
                !sidebarToggle.contains(e.target) &&
                sidebar.classList.contains('sidebar-open')) {
                sidebar.classList.remove('sidebar-open');
            }
        });
     
    </script>
    <!-- Scripts de sincronización -->
    <script src="sync.js"></script>
    <script src="update-products.js"></script>

</body>
</html>