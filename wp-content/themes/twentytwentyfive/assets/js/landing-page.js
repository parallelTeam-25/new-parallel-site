/**
 * Landing Page AI Solutions - JavaScript
 * 
 * Template personalizzato per la landing page "AI Solutions - Automazioni e Formazione AI per la tua Azienda"
 * 
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since 1.0.0
 */

(function() {
    'use strict';

    // ==========================================================================
    // Configurazione e variabili globali
    // ==========================================================================
    const config = {
        scrollOffset: 80, // Offset per lo scroll smooth
        animationThreshold: 0.1, // Soglia per le animazioni
        formTimeout: 5000, // Timeout per i messaggi del form
        mobileBreakpoint: 768,
        tabletBreakpoint: 1024
    };

    // ==========================================================================
    // Utility Functions
    // ==========================================================================
    
    /**
     * Debounce function per ottimizzare le performance
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Throttle function per limitare la frequenza di esecuzione
     */
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    /**
     * Verifica se un elemento è visibile nel viewport
     */
    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    /**
     * Verifica se un elemento è parzialmente visibile
     */
    function isElementPartiallyVisible(el) {
        const rect = el.getBoundingClientRect();
        const windowHeight = window.innerHeight || document.documentElement.clientHeight;
        
        return (
            rect.top < windowHeight &&
            rect.bottom > 0
        );
    }

    /**
     * Formatta un numero di telefono
     */
    function formatPhoneNumber(phone) {
        const cleaned = phone.replace(/\D/g, '');
        const match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
        if (match) {
            return '(' + match[1] + ') ' + match[2] + '-' + match[3];
        }
        return phone;
    }

    /**
     * Valida email
     */
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // ==========================================================================
    // Smooth Scroll
    // ==========================================================================
    
    /**
     * Inizializza lo smooth scroll per i link interni
     */
    function initSmoothScroll() {
        const internalLinks = document.querySelectorAll('a[href^="#"]');
        
        internalLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    const targetPosition = targetElement.offsetTop - config.scrollOffset;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Aggiorna l'URL senza ricaricare la pagina
                    if (history.pushState) {
                        history.pushState(null, null, targetId);
                    }
                }
            });
        });
    }

    // ==========================================================================
    // Animazioni e Intersection Observer
    // ==========================================================================
    
    /**
     * Inizializza le animazioni con Intersection Observer
     */
    function initAnimations() {
        const animatedElements = document.querySelectorAll(
            '.feature-card, .service-card, .case-study-card, .testimonial-card, .benefit-card, .process-step'
        );
        
        if (!animatedElements.length) return;
        
        const animationObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    animationObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: config.animationThreshold,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedElements.forEach(el => {
            animationObserver.observe(el);
        });
    }

    /**
     * Aggiunge animazioni al scroll
     */
    function initScrollAnimations() {
        const scrollElements = document.querySelectorAll('.hero-title, .hero-subtitle, .hero-cta, .hero-partners');
        
        scrollElements.forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                el.style.transition = 'all 0.8s ease-out';
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, index * 200);
        });
    }

    // ==========================================================================
    // Form Handling
    // ==========================================================================
    
    /**
     * Inizializza la gestione del form di contatto
     */
    function initContactForm() {
        const form = document.getElementById('landing-contact-form');
        if (!form) return;
        
        // Validazione in tempo reale
        initFormValidation(form);
        
        // Gestione submit
        form.addEventListener('submit', handleFormSubmit);
        
        // Formattazione telefono
        const phoneInput = form.querySelector('#contact-phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function() {
                this.value = formatPhoneNumber(this.value);
            });
        }
    }

    /**
     * Inizializza la validazione del form
     */
    function initFormValidation(form) {
        const inputs = form.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            // Validazione in tempo reale
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                clearFieldError(this);
            });
        });
    }

    /**
     * Valida un singolo campo
     */
    function validateField(field) {
        const value = field.value.trim();
        let isValid = true;
        let errorMessage = '';
        
        // Rimuovi errori precedenti
        clearFieldError(field);
        
        // Validazione per tipo di campo
        switch (field.type) {
            case 'email':
                if (!value || !isValidEmail(value)) {
                    isValid = false;
                    errorMessage = 'Inserisci un indirizzo email valido';
                }
                break;
                
            case 'text':
            case 'tel':
                if (field.hasAttribute('required') && !value) {
                    isValid = false;
                    errorMessage = 'Questo campo è obbligatorio';
                }
                break;
                
            case 'select-one':
                if (field.hasAttribute('required') && !value) {
                    isValid = false;
                    errorMessage = 'Seleziona un\'opzione';
                }
                break;
                
            case 'textarea':
                if (field.hasAttribute('required') && !value) {
                    isValid = false;
                    errorMessage = 'Questo campo è obbligatorio';
                } else if (value.length < 10) {
                    isValid = false;
                    errorMessage = 'Inserisci almeno 10 caratteri';
                }
                break;
        }
        
        // Mostra errore se necessario
        if (!isValid) {
            showFieldError(field, errorMessage);
        }
        
        return isValid;
    }

    /**
     * Mostra errore per un campo
     */
    function showFieldError(field, message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error';
        errorDiv.textContent = message;
        errorDiv.style.cssText = `
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
        `;
        
        field.parentNode.appendChild(errorDiv);
        field.classList.add('error');
        field.style.borderColor = '#dc2626';
    }

    /**
     * Rimuove errore da un campo
     */
    function clearFieldError(field) {
        const errorDiv = field.parentNode.querySelector('.field-error');
        if (errorDiv) {
            errorDiv.remove();
        }
        field.classList.remove('error');
        field.style.borderColor = '';
    }

    /**
     * Gestisce il submit del form
     */
    function handleFormSubmit(e) {
        e.preventDefault();
        
        const form = e.target;
        const submitButton = form.querySelector('button[type="submit"]');
        const formMessage = document.getElementById('form-message');
        
        // Validazione completa
        const inputs = form.querySelectorAll('input, select, textarea');
        let isFormValid = true;
        
        inputs.forEach(input => {
            if (!validateField(input)) {
                isFormValid = false;
            }
        });
        
        if (!isFormValid) {
            showFormMessage('Correggi gli errori nel form', 'error');
            return;
        }
        
        // Disabilita il pulsante durante l'invio
        submitButton.disabled = true;
        submitButton.textContent = 'Invio in corso...';
        
        // Simula invio (sostituire con AJAX reale)
        setTimeout(() => {
            // Qui andrebbe la logica AJAX per l'invio
            showFormMessage('Messaggio inviato con successo! Ti ricontatteremo entro 24 ore.', 'success');
            form.reset();
            
            // Riabilita il pulsante
            submitButton.disabled = false;
            submitButton.textContent = 'Invia richiesta';
            
            // Nascondi messaggio dopo un po'
            setTimeout(() => {
                hideFormMessage();
            }, config.formTimeout);
            
        }, 1500);
    }

    /**
     * Mostra messaggio del form
     */
    function showFormMessage(message, type) {
        const formMessage = document.getElementById('form-message');
        if (!formMessage) return;
        
        formMessage.textContent = message;
        formMessage.className = `form-message ${type}`;
        formMessage.style.display = 'block';
        
        // Scroll al messaggio
        formMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    /**
     * Nasconde messaggio del form
     */
    function hideFormMessage() {
        const formMessage = document.getElementById('form-message');
        if (formMessage) {
            formMessage.style.display = 'none';
        }
    }

    // ==========================================================================
    // Navigation e Header
    // ==========================================================================
    
    /**
     * Inizializza la navigazione sticky
     */
    function initStickyNavigation() {
        const header = document.querySelector('header');
        if (!header) return;
        
        let lastScrollTop = 0;
        const scrollThreshold = 100;
        
        const handleScroll = throttle(() => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > scrollThreshold) {
                if (scrollTop > lastScrollTop) {
                    // Scroll verso il basso
                    header.classList.add('header-hidden');
                } else {
                    // Scroll verso l'alto
                    header.classList.remove('header-hidden');
                }
                header.classList.add('header-sticky');
            } else {
                header.classList.remove('header-sticky', 'header-hidden');
            }
            
            lastScrollTop = scrollTop;
        }, 100);
        
        window.addEventListener('scroll', handleScroll);
    }

    /**
     * Inizializza il menu mobile
     */
    function initMobileMenu() {
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        if (!mobileMenuToggle || !mobileMenu) return;
        
        mobileMenuToggle.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.contains('open');
            
            if (isOpen) {
                mobileMenu.classList.remove('open');
                this.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            } else {
                mobileMenu.classList.add('open');
                this.setAttribute('aria-expanded', 'true');
                document.body.style.overflow = 'hidden';
            }
        });
        
        // Chiudi menu al click su link
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            });
        });
    }

    // ==========================================================================
    // Performance e Ottimizzazioni
    // ==========================================================================
    
    /**
     * Inizializza lazy loading per le immagini
     */
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            const lazyImages = document.querySelectorAll('img[data-src]');
            lazyImages.forEach(img => imageObserver.observe(img));
        }
    }

    /**
     * Inizializza il preload delle risorse critiche
     */
    function initResourcePreloading() {
        // Preload dei font critici
        const fontLink = document.createElement('link');
        fontLink.rel = 'preload';
        fontLink.href = 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap';
        fontLink.as = 'style';
        document.head.appendChild(fontLink);
        
        // Preload delle immagini critiche
        const criticalImages = document.querySelectorAll('img[data-preload]');
        criticalImages.forEach(img => {
            const preloadLink = document.createElement('link');
            preloadLink.rel = 'preload';
            preloadLink.href = img.src;
            preloadLink.as = 'image';
            document.head.appendChild(preloadLink);
        });
    }

    // ==========================================================================
    // Event Listeners e Inizializzazione
    // ==========================================================================
    
    /**
     * Inizializza tutti i componenti quando il DOM è pronto
     */
    function init() {
        // Inizializzazioni base
        initSmoothScroll();
        initAnimations();
        initScrollAnimations();
        initContactForm();
        
        // Inizializzazioni condizionali
        if (window.innerWidth > config.mobileBreakpoint) {
            initStickyNavigation();
        }
        
        initMobileMenu();
        initLazyLoading();
        initResourcePreloading();
        
        // Event listeners per il resize
        window.addEventListener('resize', debounce(() => {
            if (window.innerWidth > config.mobileBreakpoint) {
                initStickyNavigation();
            }
        }, 250));
        
        // Event listener per il scroll
        window.addEventListener('scroll', throttle(() => {
            // Aggiorna indicatori di scroll se presenti
            updateScrollIndicators();
        }, 100));
        
        // Event listener per il focus management
        document.addEventListener('keydown', handleKeyboardNavigation);
    }

    /**
     * Aggiorna indicatori di scroll
     */
    function updateScrollIndicators() {
        const sections = document.querySelectorAll('section[id]');
        const scrollPosition = window.pageYOffset;
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - config.scrollOffset;
            const sectionHeight = section.offsetHeight;
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                // Aggiorna URL senza ricaricare la pagina
                const sectionId = section.getAttribute('id');
                if (history.replaceState) {
                    history.replaceState(null, null, `#${sectionId}`);
                }
            }
        });
    }

    /**
     * Gestisce la navigazione da tastiera
     */
    function handleKeyboardNavigation(e) {
        // ESC per chiudere menu mobile
        if (e.key === 'Escape') {
            const mobileMenu = document.querySelector('.mobile-menu.open');
            if (mobileMenu) {
                mobileMenu.classList.remove('open');
                document.body.style.overflow = '';
            }
        }
        
        // Tab per gestire focus
        if (e.key === 'Tab') {
            const focusableElements = document.querySelectorAll(
                'a, button, input, select, textarea, [tabindex]:not([tabindex="-1"])'
            );
            
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];
            
            if (e.shiftKey && document.activeElement === firstElement) {
                e.preventDefault();
                lastElement.focus();
            } else if (!e.shiftKey && document.activeElement === lastElement) {
                e.preventDefault();
                firstElement.focus();
            }
        }
    }

    // ==========================================================================
    // Analytics e Tracking
    // ==========================================================================
    
    /**
     * Inizializza il tracking degli eventi
     */
    function initEventTracking() {
        // Tracking dei click sui CTA
        const ctaButtons = document.querySelectorAll('.btn-primary, .btn-secondary');
        ctaButtons.forEach(button => {
            button.addEventListener('click', function() {
                trackEvent('CTA Click', {
                    button_text: this.textContent.trim(),
                    button_location: this.closest('section')?.id || 'unknown',
                    button_type: this.classList.contains('btn-primary') ? 'primary' : 'secondary'
                });
            });
        });
        
        // Tracking del form
        const contactForm = document.getElementById('landing-contact-form');
        if (contactForm) {
            contactForm.addEventListener('submit', function() {
                trackEvent('Form Submission', {
                    form_type: 'contact',
                    form_location: 'landing_page'
                });
            });
        }
        
        // Tracking dello scroll delle sezioni
        const sections = document.querySelectorAll('section[id]');
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    trackEvent('Section View', {
                        section_name: entry.target.id,
                        section_title: entry.target.querySelector('h2')?.textContent || 'Unknown'
                    });
                }
            });
        }, { threshold: 0.5 });
        
        sections.forEach(section => sectionObserver.observe(section));
    }

    /**
     * Traccia un evento (placeholder per Google Analytics)
     */
    function trackEvent(eventName, parameters) {
        // Se Google Analytics è disponibile
        if (typeof gtag !== 'undefined') {
            gtag('event', eventName, parameters);
        }
        
        // Se Google Tag Manager è disponibile
        if (typeof dataLayer !== 'undefined') {
            dataLayer.push({
                event: eventName,
                ...parameters
            });
        }
        
        // Console log per debug
        console.log('Event tracked:', eventName, parameters);
    }

    // ==========================================================================
    // Inizializzazione e Export
    // ==========================================================================
    
    // Inizializza quando il DOM è pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
    // Inizializza tracking se richiesto
    if (typeof window !== 'undefined' && window.location.hostname !== 'localhost') {
        initEventTracking();
    }
    
    // Export per uso esterno se necessario
    if (typeof window !== 'undefined') {
        window.LandingPageAI = {
            init,
            trackEvent,
            validateField,
            showFormMessage,
            hideFormMessage
        };
    }

})();
