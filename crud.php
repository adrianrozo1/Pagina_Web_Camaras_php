<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroAdriancho - CRUD de Productos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --gray-color: #95a5a6;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: var(--dark-color);
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(180deg, #1a202c 0%, #2d3748 100%);
            color: white;
            overflow-y: auto;
            transition: var(--transition);
            z-index: 1000;
        }

        .sidebar-closed {
            transform: translateX(-260px);
        }

        .logo {
            padding: 1.5rem;
            border-bottom: 1px solid #4a5568;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logo i {
            font-size: 2rem;
            color: #4299e1;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-text span:first-child {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .logo-text span:last-child {
            font-size: 0.75rem;
            opacity: 0.8;
        }

        .sidebar-section {
            padding: 1rem 0;
            border-bottom: 1px solid #4a5568;
        }

        .sidebar-title {
            padding: 0 1.5rem 0.5rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #a0aec0;
            letter-spacing: 0.05em;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            color: #cbd5e0;
            text-decoration: none;
            transition: var(--transition);
            border-left: 3px solid transparent;
        }

        .sidebar-item:hover {
            background-color: #4a5568;
            color: white;
            border-left-color: #4299e1;
        }

        .sidebar-item.active {
            background-color: #2d3748;
            color: white;
            border-left-color: #4299e1;
        }

        .sidebar-item i {
            width: 1.25rem;
            text-align: center;
        }

        /* Botón flotante */
        .floating-button {
            position: fixed;
            left: 260px;
            top: 1rem;
            background: #2d3748;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0 20px 20px 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: var(--transition);
            z-index: 999;
        }

        .floating-button:hover {
            background: #4a5568;
        }

        .sidebar-closed + .floating-button {
            left: 0;
        }

        /* Contenido principal */
        .main-content {
            margin-left: 260px;
            transition: var(--transition);
            min-height: 100vh;
        }

        .main-content-full {
            margin-left: 0;
        }

        /* Header */
        .header {
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .menu-toggle {
            background: none;
            border: none;
            font-size: 1.25rem;
            color: #4a5568;
            cursor: pointer;
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2d3748;
        }

        /* Tarjetas */
        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }

        .card-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Formularios */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.25rem;
            font-weight: 500;
            color: #4a5568;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
        }

        /* Botones */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-primary {
            background-color: #4299e1;
            color: white;
        }

        .btn-primary:hover {
            background-color: #3182ce;
        }

        .btn-success {
            background-color: #38a169;
            color: white;
        }

        .btn-success:hover {
            background-color: #2f855a;
        }

        .btn-warning {
            background-color: #ed8936;
            color: white;
        }

        .btn-warning:hover {
            background-color: #dd6b20;
        }

        .btn-danger {
            background-color: #e53e3e;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c53030;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid #e2e8f0;
            color: #4a5568;
        }

        .btn-outline:hover {
            background-color: #f7fafc;
        }

        /* Grid de productos */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            overflow: hidden;
            transition: var(--transition);
            background: white;
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .product-image-container {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-badge {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: #4299e1;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .product-info {
            padding: 1rem;
        }

        .product-name {
            font-size: 1.125rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: #4299e1;
            margin-bottom: 0.5rem;
        }

        .product-description {
            color: #718096;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .product-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .feature-tag {
            background: #ebf8ff;
            color: #2b6cb0;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .product-actions {
            display: flex;
            gap: 0.5rem;
        }

        /* Subida de imágenes */
        .image-upload-container {
            border: 2px dashed #cbd5e0;
            border-radius: 0.5rem;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .image-upload-container:hover {
            border-color: #4299e1;
            background: #ebf8ff;
        }

        .image-preview {
            max-width: 100%;
            max-height: 200px;
            margin-top: 1rem;
            border-radius: 0.5rem;
        }

        /* Estadísticas */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .stat-card {
            background: white;
            border-radius: 0.5rem;
            padding: 1.5rem;
            text-align: center;
            box-shadow: var(--box-shadow);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #4299e1;
        }

        .stat-label {
            color: #718096;
            font-size: 0.875rem;
        }

        /* Notificaciones */
        .notification {
            position: fixed;
            top: 1rem;
            right: 1rem;
            background: white;
            border-radius: 0.5rem;
            padding: 1rem 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            z-index: 1000;
            transform: translateX(150%);
            transition: transform 0.3s ease;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification-success {
            border-left: 4px solid #38a169;
        }

        .notification-error {
            border-left: 4px solid #e53e3e;
        }

        .notification-warning {
            border-left: 4px solid #ed8936;
        }

        .notification-info {
            border-left: 4px solid #4299e1;
        }

        /* Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1001;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 0.5rem;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-body {
            padding: 1.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                transform: translateX(-100%);
            }
            
            .sidebar-open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .floating-button {
                left: 0;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Logo -->
        <div class="logo">
            <i class="fas fa-shield-alt"></i>
            <div class="logo-text">
                <span>ELECTROADRIANCHO</span>
                <span>CRUD PRODUCTOS</span>
            </div>
        </div>
        
        <!-- Menú Principal -->
        <div class="sidebar-section">
            <div class="sidebar-title">Navegación</div>
            <a href="index.html" class="sidebar-item">
                <i class="fas fa-home"></i>
                <span>Volver al Sitio</span>
            </a>
            <a href="#productos" class="sidebar-item active">
                <i class="fas fa-boxes"></i>
                <span>Gestión de Productos</span>
            </a>
            <a href="#estadisticas" class="sidebar-item">
                <i class="fas fa-chart-bar"></i>
                <span>Estadísticas</span>
            </a>
        </div>
        
        <!-- Botón para mostrar/ocultar sidebar -->
        <button class="floating-button" id="toggleSidebar">
            <i class="fas fa-bars"></i>
            <span>Menú</span>
        </button>
    </div>

    <!-- Contenido Principal -->
    <div class="main-content" id="mainContent">
        <!-- Header -->
        <header class="header">
            <div class="header-content">
                <div class="header-left">
                    <button class="menu-toggle" onclick="toggleSidebar()">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="header-title">
                        <i class="fas fa-camera mr-2"></i>
                        Sistema CRUD de Productos
                    </h1>
                </div>
                <div>
                    <button class="btn btn-success" onclick="showAddProductForm()">
                        <i class="fas fa-plus-circle"></i> Nuevo Producto
                    </button>
                </div>
            </div>
        </header>

        <!-- Contenido Principal -->
        <main class="p-6">
            <!-- Formulario para agregar/editar productos -->
            <div class="card mb-6" id="productFormSection">
                <div class="card-header">
                    <h2 class="card-title" id="formTitle">
                        <i class="fas fa-edit"></i>
                        <span id="formTitleText">Agregar Nuevo Producto</span>
                    </h2>
                </div>
                <div class="p-6">
                    <form id="productForm">
                        <input type="hidden" id="productId">
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Columna izquierda -->
                            <div>
                                <div class="form-group">
                                    <label class="form-label">Nombre del Producto *</label>
                                    <input type="text" id="productName" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Categoría *</label>
                                    <select id="productCategory" class="form-control" required>
                                        <option value="">Seleccionar categoría</option>
                                        <option value="domo">Cámara Domo</option>
                                        <option value="bullet">Cámara Bullet</option>
                                        <option value="ptz">Cámara PTZ</option>
                                        <option value="wifi">Cámara WiFi</option>
                                        <option value="ip">Cámara IP</option>
                                        <option value="kit">Kit Completo</option>
                                        <option value="solares">Cámara Solar</option>
                                        <option value="domestica">Cámara Doméstica</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Precio ($) *</label>
                                    <input type="number" id="productPrice" class="form-control" min="0" step="0.01" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Características (separadas por comas)</label>
                                    <input type="text" id="productFeatures" class="form-control" placeholder="Ej: 4K, Visión nocturna, Audio bidireccional">
                                </div>
                            </div>
                            
                            <!-- Columna derecha -->
                            <div>
                                <div class="form-group">
                                    <label class="form-label">Descripción *</label>
                                    <textarea id="productDescription" class="form-control" rows="4" required></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Imagen del Producto</label>
                                    
                                    <!-- Imagen actual (solo al editar) -->
                                    <div id="currentImageContainer" class="hidden mb-3">
                                        <p class="text-sm font-medium mb-2">Imagen actual:</p>
                                        <img id="currentImagePreview" src="" alt="Imagen actual" class="w-32 h-32 object-cover rounded">
                                        <button type="button" class="btn btn-outline mt-2" onclick="changeImage()">
                                            <i class="fas fa-sync-alt mr-1"></i> Cambiar imagen
                                        </button>
                                    </div>
                                    
                                    <!-- Subida de imagen -->
                                    <div id="imageUploadContainer" class="image-upload-container">
                                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3"></i>
                                        <p class="text-gray-600">Arrastra una imagen aquí o haz clic para seleccionar</p>
                                        <p class="text-sm text-gray-500 mt-1">Formatos: JPG, PNG, GIF (Máx. 2MB)</p>
                                        <input type="file" id="productImage" accept="image/*" class="hidden">
                                        <img id="imagePreview" class="image-preview hidden" src="" alt="Vista previa">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex gap-3 mt-6">
                            <button type="submit" class="btn btn-success flex-1">
                                <i class="fas fa-save mr-2"></i>
                                <span id="submitBtnText">Guardar Producto</span>
                            </button>
                            <button type="button" class="btn btn-outline" id="cancelBtn" style="display: none;">
                                <i class="fas fa-times mr-2"></i> Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Lista de productos -->
            <div class="card" id="productos">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-list"></i>
                        Catálogo de Productos
                    </h2>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium" id="productCount">0 productos</span>
                </div>
                
                <div class="p-6">
                    <!-- Búsqueda y filtros -->
                    <div class="flex flex-col md:flex-row gap-3 mb-6">
                        <div class="flex-1">
                            <input type="text" id="searchProduct" 
                                   class="form-control" 
                                   placeholder="Buscar por nombre, categoría o características...">
                        </div>
                        <select id="filterCategory" class="form-control md:w-48">
                            <option value="">Todas las categorías</option>
                            <option value="domo">Domo</option>
                            <option value="bullet">Bullet</option>
                            <option value="ptz">PTZ</option>
                            <option value="wifi">WiFi</option>
                            <option value="ip">IP</option>
                            <option value="kit">Kit</option>
                            <option value="solares">Solares</option>
                            <option value="domestica">Doméstica</option>
                        </select>
                        <button class="btn btn-outline" onclick="refreshProducts()">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                    
                    <!-- Grid de productos -->
                    <div id="productsList">
                        <div class="text-center py-12 text-gray-500">
                            <i class="fas fa-box-open text-4xl mb-3"></i>
                            <p class="text-lg">No hay productos en el catálogo</p>
                            <p class="text-sm">Comienza agregando tu primer producto</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas -->
            <div class="card mt-6" id="estadisticas">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-chart-bar"></i>
                        Estadísticas del Catálogo
                    </h2>
                </div>
                <div class="p-6">
                    <div class="stats-grid" id="statsContainer">
                        <!-- Estadísticas se cargarán aquí -->
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal de confirmación para eliminar -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-lg font-bold">
                    <i class="fas fa-exclamation-triangle text-yellow-500 mr-2"></i>
                    Confirmar Eliminación
                </h3>
                <button class="text-gray-500 hover:text-gray-700" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-4">¿Estás seguro de que quieres eliminar el producto "<span id="productToDeleteName" class="font-bold"></span>"?</p>
                <p class="text-red-600 mb-6">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    Esta acción no se puede deshacer.
                </p>
                <div class="flex justify-end gap-3">
                    <button class="btn btn-outline" onclick="closeModal()">Cancelar</button>
                    <button class="btn btn-danger" onclick="confirmDelete()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notificación -->
    <div class="notification" id="notification">
        <i class="fas fa-info-circle"></i>
        <span id="notificationText">Mensaje de notificación</span>
    </div>

    <script>
        // Variables globales
        let products = [];
        let isEditing = false;
        let productToDelete = null;
        let imageFile = null;

        // Inicializar cuando el DOM esté cargado
        document.addEventListener('DOMContentLoaded', function() {
            loadProducts();
            setupEventListeners();
            updateStats();
        });

        // ========== FUNCIONES DE UTILIDAD ==========
        function showNotification(message, type = 'info') {
            const notification = document.getElementById('notification');
            const icon = notification.querySelector('i');
            const text = document.getElementById('notificationText');
            
            // Configurar tipo
            notification.className = 'notification';
            if (type === 'success') {
                notification.classList.add('notification-success');
                icon.className = 'fas fa-check-circle text-green-500';
            } else if (type === 'error') {
                notification.classList.add('notification-error');
                icon.className = 'fas fa-exclamation-circle text-red-500';
            } else if (type === 'warning') {
                notification.classList.add('notification-warning');
                icon.className = 'fas fa-exclamation-triangle text-yellow-500';
            } else {
                notification.classList.add('notification-info');
                icon.className = 'fas fa-info-circle text-blue-500';
            }
            
            text.textContent = message;
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }

        function formatCurrency(amount) {
            return new Intl.NumberFormat('es-CO', {
                style: 'currency',
                currency: 'COP',
                minimumFractionDigits: 0
            }).format(amount);
        }

        function getCategoryName(category) {
            const categories = {
                'domo': 'Cámara Domo',
                'bullet': 'Cámara Bullet',
                'ptz': 'Cámara PTZ',
                'wifi': 'Cámara WiFi',
                'ip': 'Cámara IP',
                'kit': 'Kit Completo',
                'solares': 'Cámara Solar',
                'domestica': 'Cámara Doméstica'
            };
            return categories[category] || category;
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const toggleBtn = document.getElementById('toggleSidebar');
            
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('sidebar-open');
            } else {
                sidebar.classList.toggle('sidebar-closed');
                if (sidebar.classList.contains('sidebar-closed')) {
                    mainContent.style.marginLeft = '0';
                    toggleBtn.style.left = '0';
                } else {
                    mainContent.style.marginLeft = '260px';
                    toggleBtn.style.left = '260px';
                }
            }
        }

        // ========== FUNCIONES CRUD ==========
        function loadProducts() {
            const storedProducts = localStorage.getItem('electroProducts');
            if (storedProducts) {
                products = JSON.parse(storedProducts);
            } else {
                // Cargar productos iniciales desde tu data.js o de ejemplo
                products = [
                    {
                        id: '1',
                        name: 'Cámara Domo 4K',
                        category: 'domo',
                        price: 130200,
                        image: 'cámara_Domo_4K.jpg',
                        imageData: null,
                        description: 'Perfecta para interiores, visión nocturna IR',
                        features: ['4K', 'Visión nocturna 40m', 'Ángulo 110°', 'Audio bidireccional']
                    },
                    {
                        id: '2',
                        name: 'Cámara Bullet Exterior',
                        category: 'bullet',
                        price: 185000,
                        image: 'imagen3.jpg',
                        imageData: null,
                        description: 'Resistente a la intemperie, ideal para exteriores',
                        features: ['Full HD', 'Resistente agua IP67', 'Visión nocturna 30m', 'Detección de movimiento']
                    },
                    {
                        id: '3',
                        name: 'Cámara PTZ 360°',
                        category: 'ptz',
                        price: 245000,
                        image: 'imagen6.jpg',
                        imageData: null,
                        description: 'Control remoto de movimiento y zoom óptico',
                        features: ['360° rotación', 'Zoom óptico 10x', 'Seguimiento automático', 'Alarma integrada']
                    }
                ];
                saveProducts();
            }
            
            renderProducts();
        }

        function saveProducts() {
            localStorage.setItem('electroProducts', JSON.stringify(products));
        }

        function addProduct(product) {
            // Generar ID único
            if (!product.id) {
                product.id = Date.now().toString();
            }
            
            products.push(product);
            saveProducts();
            renderProducts();
            updateStats();
            showNotification('Producto agregado exitosamente', 'success');
        }

        function updateProduct(updatedProduct) {
            const index = products.findIndex(p => p.id === updatedProduct.id);
            if (index !== -1) {
                products[index] = updatedProduct;
                saveProducts();
                renderProducts();
                updateStats();
                showNotification('Producto actualizado exitosamente', 'success');
            }
        }

        function deleteProduct(productId) {
            products = products.filter(p => p.id !== productId);
            saveProducts();
            renderProducts();
            updateStats();
            showNotification('Producto eliminado exitosamente', 'success');
        }

        function getProductById(productId) {
            return products.find(p => p.id === productId);
        }

        // ========== RENDERIZADO ==========
        function renderProducts(filteredProducts = null) {
            const productsToRender = filteredProducts || products;
            const productsList = document.getElementById('productsList');
            const productCount = document.getElementById('productCount');
            
            if (productsToRender.length === 0) {
                productsList.innerHTML = `
                    <div class="text-center py-12 text-gray-500">
                        <i class="fas fa-search text-4xl mb-3"></i>
                        <p class="text-lg">No se encontraron productos</p>
                        <p class="text-sm">Intenta con otros términos de búsqueda</p>
                    </div>
                `;
                productCount.textContent = '0 productos';
                return;
            }
            
            let productsHTML = '<div class="products-grid">';
            
            productsToRender.forEach(product => {
                // Convertir features si es necesario
                const features = Array.isArray(product.features) 
                    ? product.features 
                    : (product.features || '').split(',').map(f => f.trim()).filter(f => f);
                
                productsHTML += `
                    <div class="product-card" data-id="${product.id}">
                        <div class="product-image-container">
                            <div class="product-badge">${getCategoryName(product.category)}</div>
                            <img src="${product.imageData || 'https://via.placeholder.com/300x200?text=Cámara+Seguridad'}" 
                                 alt="${product.name}" class="product-image">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">${product.name}</h3>
                            <div class="product-price">${formatCurrency(product.price)}</div>
                            <p class="product-description">${product.description}</p>
                            
                            ${features.length > 0 ? `
                                <div class="product-features">
                                    ${features.slice(0, 3).map(feature => 
                                        `<span class="feature-tag">${feature}</span>`
                                    ).join('')}
                                    ${features.length > 3 ? `<span class="feature-tag">+${features.length - 3} más</span>` : ''}
                                </div>
                            ` : ''}
                            
                            <div class="product-actions">
                                <button class="btn btn-warning btn-sm" onclick="editProduct('${product.id}')">
                                    <i class="fas fa-edit mr-1"></i> Editar
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="showDeleteModal('${product.id}')">
                                    <i class="fas fa-trash mr-1"></i> Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            productsHTML += '</div>';
            productsList.innerHTML = productsHTML;
            productCount.textContent = `${productsToRender.length} producto${productsToRender.length !== 1 ? 's' : ''}`;
        }

        function updateStats() {
            const totalProducts = products.length;
            const totalValue = products.reduce((sum, product) => sum + product.price, 0);
            const avgPrice = totalProducts > 0 ? totalValue / totalProducts : 0;
            
            // Contar por categoría
            const categoryCount = {};
            products.forEach(product => {
                categoryCount[product.category] = (categoryCount[product.category] || 0) + 1;
            });
            
            let statsHTML = `
                <div class="stat-card">
                    <div class="stat-value">${totalProducts}</div>
                    <div class="stat-label">Productos Totales</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">${formatCurrency(totalValue)}</div>
                    <div class="stat-label">Valor del Inventario</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">${formatCurrency(avgPrice)}</div>
                    <div class="stat-label">Precio Promedio</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">${Object.keys(categoryCount).length}</div>
                    <div class="stat-label">Categorías</div>
                </div>
            `;
            
            document.getElementById('statsContainer').innerHTML = statsHTML;
        }

        // ========== MANEJO DE FORMULARIO ==========
        function showAddProductForm() {
            resetForm();
            // Desplazar al formulario
            document.getElementById('productFormSection').scrollIntoView({ behavior: 'smooth' });
        }

        function resetForm() {
            document.getElementById('productForm').reset();
            document.getElementById('productId').value = '';
            document.getElementById('formTitleText').textContent = 'Agregar Nuevo Producto';
            document.getElementById('submitBtnText').textContent = 'Guardar Producto';
            document.getElementById('cancelBtn').style.display = 'none';
            document.getElementById('currentImageContainer').classList.add('hidden');
            document.getElementById('imageUploadContainer').classList.remove('hidden');
            document.getElementById('imagePreview').classList.add('hidden');
            isEditing = false;
            imageFile = null;
        }

        function editProduct(productId) {
            const product = getProductById(productId);
            if (!product) return;
            
            // Llenar formulario
            document.getElementById('productId').value = product.id;
            document.getElementById('productName').value = product.name;
            document.getElementById('productCategory').value = product.category;
            document.getElementById('productPrice').value = product.price;
            document.getElementById('productDescription').value = product.description;
            
            // Features
            if (Array.isArray(product.features)) {
                document.getElementById('productFeatures').value = product.features.join(', ');
            } else {
                document.getElementById('productFeatures').value = product.features || '';
            }
            
            // Imagen
            if (product.imageData) {
                document.getElementById('currentImagePreview').src = product.imageData;
                document.getElementById('currentImageContainer').classList.remove('hidden');
                document.getElementById('imageUploadContainer').classList.add('hidden');
            } else {
                document.getElementById('currentImageContainer').classList.add('hidden');
                document.getElementById('imageUploadContainer').classList.remove('hidden');
            }
            
            // Actualizar UI
            document.getElementById('formTitleText').textContent = 'Editar Producto';
            document.getElementById('submitBtnText').textContent = 'Actualizar Producto';
            document.getElementById('cancelBtn').style.display = 'block';
            isEditing = true;
            
            // Desplazar al formulario
            document.getElementById('productFormSection').scrollIntoView({ behavior: 'smooth' });
        }

        function changeImage() {
            document.getElementById('currentImageContainer').classList.add('hidden');
            document.getElementById('imageUploadContainer').classList.remove('hidden');
        }

        function handleFormSubmit(e) {
            e.preventDefault();
            
            // Validar
            if (!document.getElementById('productName').value.trim()) {
                showNotification('El nombre del producto es requerido', 'error');
                return;
            }
            
            if (!document.getElementById('productCategory').value) {
                showNotification('La categoría es requerida', 'error');
                return;
            }
            
            const price = parseFloat(document.getElementById('productPrice').value);
            if (!price || price <= 0) {
                showNotification('El precio debe ser un número positivo', 'error');
                return;
            }
            
            // Procesar características
            let features = [];
            const featuresText = document.getElementById('productFeatures').value.trim();
            if (featuresText) {
                features = featuresText.split(',').map(f => f.trim()).filter(f => f);
            }
            
            // Preparar producto
            const productData = {
                id: document.getElementById('productId').value || Date.now().toString(),
                name: document.getElementById('productName').value.trim(),
                category: document.getElementById('productCategory').value,
                price: price,
                description: document.getElementById('productDescription').value.trim(),
                features: features,
                imageData: null
            };
            
            // Manejar imagen
            if (imageFile) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    productData.imageData = e.target.result;
                    saveOrUpdateProduct(productData);
                };
                reader.readAsDataURL(imageFile);
            } else {
                // Mantener imagen anterior si estamos editando
                if (isEditing) {
                    const existingProduct = getProductById(productData.id);
                    if (existingProduct && existingProduct.imageData) {
                        productData.imageData = existingProduct.imageData;
                    }
                }
                saveOrUpdateProduct(productData);
            }
        }

        function saveOrUpdateProduct(productData) {
            if (isEditing) {
                updateProduct(productData);
            } else {
                addProduct(productData);
            }
            resetForm();
        }

        // ========== MANEJO DE IMÁGENES ==========
        function setupImageUpload() {
            const uploadContainer = document.getElementById('imageUploadContainer');
            const fileInput = document.getElementById('productImage');
            const preview = document.getElementById('imagePreview');
            
            // Click en contenedor
            uploadContainer.addEventListener('click', () => {
                fileInput.click();
            });
            
            // Cambio de archivo
            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    
                    // Validar tamaño (2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        showNotification('La imagen no debe exceder los 2MB', 'error');
                        return;
                    }
                    
                    // Validar tipo
                    if (!file.type.match('image.*')) {
                        showNotification('Solo se permiten imágenes', 'error');
                        return;
                    }
                    
                    // Mostrar preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        imageFile = file;
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            // Arrastrar y soltar
            uploadContainer.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadContainer.style.borderColor = '#4299e1';
                uploadContainer.style.background = '#ebf8ff';
            });
            
            uploadContainer.addEventListener('dragleave', () => {
                uploadContainer.style.borderColor = '#cbd5e0';
                uploadContainer.style.background = '';
            });
            
            uploadContainer.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadContainer.style.borderColor = '#cbd5e0';
                uploadContainer.style.background = '';
                
                if (e.dataTransfer.files.length > 0) {
                    const file = e.dataTransfer.files[0];
                    
                    // Validaciones
                    if (!file.type.match('image.*')) {
                        showNotification('Solo se permiten imágenes', 'error');
                        return;
                    }
                    
                    if (file.size > 2 * 1024 * 1024) {
                        showNotification('La imagen no debe exceder los 2MB', 'error');
                        return;
                    }
                    
                    // Mostrar preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        imageFile = file;
                        fileInput.files = e.dataTransfer.files;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // ========== BÚSQUEDA Y FILTRADO ==========
        function setupSearch() {
            const searchInput = document.getElementById('searchProduct');
            const categoryFilter = document.getElementById('filterCategory');
            
            // Búsqueda en tiempo real
            searchInput.addEventListener('input', filterProducts);
            categoryFilter.addEventListener('change', filterProducts);
        }

        function filterProducts() {
            const searchTerm = document.getElementById('searchProduct').value.toLowerCase();
            const categoryFilter = document.getElementById('filterCategory').value;
            
            let filtered = products;
            
            // Filtrar por categoría
            if (categoryFilter) {
                filtered = filtered.filter(product => product.category === categoryFilter);
            }
            
            // Filtrar por término de búsqueda
            if (searchTerm) {
                filtered = filtered.filter(product => 
                    product.name.toLowerCase().includes(searchTerm) ||
                    product.description.toLowerCase().includes(searchTerm) ||
                    (Array.isArray(product.features) && 
                     product.features.some(feature => 
                         feature.toLowerCase().includes(searchTerm)))
                );
            }
            
            renderProducts(filtered);
        }

        function refreshProducts() {
            renderProducts();
            showNotification('Productos actualizados', 'success');
        }

        // ========== ELIMINACIÓN ==========
        function showDeleteModal(productId) {
            const product = getProductById(productId);
            if (!product) return;
            
            productToDelete = productId;
            document.getElementById('productToDeleteName').textContent = product.name;
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.remove('active');
            productToDelete = null;
        }

        function confirmDelete() {
            if (productToDelete) {
                deleteProduct(productToDelete);
                closeModal();
            }
        }

        // ========== CONFIGURACIÓN INICIAL ==========
        function setupEventListeners() {
            // Formulario
            document.getElementById('productForm').addEventListener('submit', handleFormSubmit);
            
            // Botón cancelar
            document.getElementById('cancelBtn').addEventListener('click', resetForm);
            
            // Botón toggle sidebar
            document.getElementById('toggleSidebar').addEventListener('click', toggleSidebar);
            
            // Configurar subida de imágenes
            setupImageUpload();
            
            // Configurar búsqueda
            setupSearch();
            
            // Cerrar modal al hacer clic fuera
            document.getElementById('deleteModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });
        }
    </script>
</body>
</html>