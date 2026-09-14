// Beletronicx - Custom JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Slider principal
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const slideCount = slides.length;
    
    function showSlide(n) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        currentSlide = (n + slideCount) % slideCount;
        
        slides[currentSlide].classList.add('active');
        if (dots[currentSlide]) {
            dots[currentSlide].classList.add('active');
        }
    }
    
    // Iniciar slider automático
    if (slides.length > 0) {
        setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000);
        
        // Adicionar eventos aos dots
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
            });
        });
    }
    
    // Menu mobile
    const menuToggle = document.querySelector('.menu-toggle');
    const primaryMenu = document.querySelector('.primary-menu');
    
    if (menuToggle && primaryMenu) {
        menuToggle.addEventListener('click', function() {
            primaryMenu.classList.toggle('active');
            this.classList.toggle('active');
            
            // Alterar ícone
            const icon = this.querySelector('i');
            if (this.classList.contains('active')) {
                icon.className = 'fas fa-times';
            } else {
                icon.className = 'fas fa-bars';
            }
        });
    }
    
    // Fechar menu ao clicar em um link (mobile)
    document.querySelectorAll('.primary-menu a').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                primaryMenu.classList.remove('active');
                menuToggle.classList.remove('active');
                menuToggle.querySelector('i').className = 'fas fa-bars';
            }
        });
    });
    
    // Newsletter form
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            
            // Simular cadastro
            const button = this.querySelector('button');
            const originalText = button.textContent;
            
            button.textContent = 'Cadastrando...';
            button.disabled = true;
            
            setTimeout(() => {
                button.textContent = 'Cadastrado!';
                button.style.backgroundColor = 'var(--success)';
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.disabled = false;
                    button.style.backgroundColor = '';
                    this.reset();
                }, 2000);
            }, 1000);
        });
    }
    
    // Adicionar produtos ao carrinho com AJAX (se WooCommerce estiver ativo)
    document.querySelectorAll('.add_to_cart_button').forEach(button => {
        button.addEventListener('click', function(e) {
            if (this.classList.contains('ajax_add_to_cart')) {
                return; // Deixa o WooCommerce lidar com isso
            }
            
            e.preventDefault();
            
            // Simular adição ao carrinho
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                let count = parseInt(cartCount.textContent) || 0;
                count++;
                cartCount.textContent = count;
                
                // Efeito visual
                cartCount.style.transform = 'scale(1.3)';
                setTimeout(() => {
                    cartCount.style.transform = 'scale(1)';
                }, 300);
            }
            
            // Feedback visual no botão
            const originalText = this.textContent;
            this.textContent = 'Adicionado!';
            this.style.backgroundColor = 'var(--success)';
            
            setTimeout(() => {
                this.textContent = originalText;
                this.style.backgroundColor = '';
            }, 2000);
        });
    });
    
    // Smooth scroll para âncoras
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});