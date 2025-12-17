// data.js - Archivo para sincronizar datos entre páginas
const ElectroAdrianchoData = {
    // Sistema CRUD de productos
    products: [],
    
    // Cargar productos
    loadProducts: function() {
        const storedProducts = localStorage.getItem('electroProducts');
        if (storedProducts) {
            this.products = JSON.parse(storedProducts);
        }
        return this.products;
    },
    
    // Guardar productos
    saveProducts: function() {
        localStorage.setItem('electroProducts', JSON.stringify(this.products));
    },
    
    // Agregar producto
    addProduct: function(product) {
        if (!product.id) {
            product.id = Date.now().toString();
        }
        this.products.push(product);
        this.saveProducts();
        return product;
    },
    
    // Actualizar producto
    updateProduct: function(updatedProduct) {
        const index = this.products.findIndex(p => p.id === updatedProduct.id);
        if (index !== -1) {
            this.products[index] = updatedProduct;
            this.saveProducts();
            return true;
        }
        return false;
    },
    
    // Eliminar producto
    deleteProduct: function(productId) {
        this.products = this.products.filter(p => p.id !== productId);
        this.saveProducts();
        return true;
    },
    
    // Obtener producto por ID
    getProductById: function(productId) {
        return this.products.find(p => p.id === productId);
    },
    
    // Buscar productos
    searchProducts: function(searchTerm, category = '') {
        let filtered = this.products;
        
        if (category) {
            filtered = filtered.filter(p => p.category === category);
        }
        
        if (searchTerm) {
            const term = searchTerm.toLowerCase();
            filtered = filtered.filter(p => 
                p.name.toLowerCase().includes(term) ||
                p.description.toLowerCase().includes(term) ||
                (Array.isArray(p.features) && p.features.some(f => f.toLowerCase().includes(term)))
            );
        }
        
        return filtered;
    },
    
    // Obtener estadísticas
    getStats: function() {
        const totalProducts = this.products.length;
        const totalValue = this.products.reduce((sum, p) => sum + p.price, 0);
        const avgPrice = totalProducts > 0 ? totalValue / totalProducts : 0;
        
        // Contar por categoría
        const categories = {};
        this.products.forEach(p => {
            categories[p.category] = (categories[p.category] || 0) + 1;
        });
        
        return {
            totalProducts,
            totalValue,
            avgPrice,
            categories: Object.keys(categories).length,
            categoryCount: categories
        };
    }
};

// Inicializar productos si no existen
if (!localStorage.getItem('electroProducts')) {
    const initialProducts = [
        {
            id: '1',
            name: 'Cámara Domo 4K',
            category: 'domo',
            price: 130200,
            image: 'cámara_Domo_4K.jpg',
            description: 'Perfecta para interiores, visión nocturna IR',
            features: ['4K', 'Visión nocturna 40m', 'Ángulo 110°', 'Audio bidireccional']
        },
        {
            id: '2',
            name: 'Cámara Bullet Exterior',
            category: 'bullet',
            price: 185000,
            image: 'imagen3.jpg',
            description: 'Resistente a la intemperie, ideal para exteriores',
            features: ['Full HD', 'Resistente agua IP67', 'Visión nocturna 30m', 'Detección de movimiento']
        },
        {
            id: '3',
            name: 'Cámara PTZ 360°',
            category: 'ptz',
            price: 245000,
            image: 'imagen6.jpg',
            description: 'Control remoto de movimiento y zoom óptico',
            features: ['360° rotación', 'Zoom óptico 10x', 'Seguimiento automático', 'Alarma integrada']
        }
    ];
    localStorage.setItem('electroProducts', JSON.stringify(initialProducts));
}

// Cargar productos al iniciar
ElectroAdrianchoData.loadProducts();