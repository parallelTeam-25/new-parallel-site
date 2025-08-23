<?php
/**
 * Esempi di Personalizzazione - Landing Page AI Solutions
 * 
 * File con esempi pratici per personalizzare il template
 * 
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since 1.0.0
 */

// Previeni accesso diretto
if (!defined('ABSPATH')) {
    exit;
}

// ==========================================================================
// Personalizzazioni CSS
// ==========================================================================

/**
 * Esempio 1: Cambia i colori del tema
 */
function ai_solutions_custom_colors() {
    add_action('wp_head', function() {
        ?>
        <style>
        /* Personalizza i colori principali */
        :root {
            --primary-color: #2563eb; /* Blu invece di verde */
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
        }
        
        /* Personalizza il background della hero section */
        .hero-section {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        }
        
        /* Personalizza i bottoni */
        .btn-primary {
            background: linear-gradient(45deg, #2563eb, #3b82f6);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(45deg, #1d4ed8, #2563eb);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        }
        </style>
        <?php
    });
}
// add_action('init', 'ai_solutions_custom_colors');

/**
 * Esempio 2: Aggiungi animazioni personalizzate
 */
function ai_solutions_custom_animations() {
    add_action('wp_head', function() {
        ?>
        <style>
        /* Animazione personalizzata per le cards */
        @keyframes slideInFromBottom {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .feature-card,
        .service-card,
        .case-study-card {
            animation: slideInFromBottom 0.8s ease-out;
        }
        
        /* Hover effect personalizzato */
        .feature-card:hover,
        .service-card:hover,
        .case-study-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        /* Animazione per i numeri del processo */
        .step-number {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        </style>
        <?php
    });
}
// add_action('init', 'ai_solutions_custom_animations');

/**
 * Esempio 3: Layout personalizzato per mobile
 */
function ai_solutions_custom_mobile_layout() {
    add_action('wp_head', function() {
        ?>
        <style>
        /* Layout personalizzato per mobile */
        @media (max-width: 767px) {
            .hero-title {
                font-size: 2.5rem;
                line-height: 1.1;
                margin-bottom: 1.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
                line-height: 1.5;
            }
            
            .hero-cta {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
                padding: 1.2rem 2rem;
                font-size: 1.1rem;
            }
            
            /* Cards stack verticalmente su mobile */
            .features-grid,
            .services-grid,
            .case-studies-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            /* Form a colonna singola su mobile */
            .form-row {
                grid-template-columns: 1fr;
            }
        }
        
        /* Tablet layout personalizzato */
        @media (min-width: 768px) and (max-width: 1023px) {
            .container {
                padding: 0 2rem;
            }
            
            .hero-title {
                font-size: 3.5rem;
            }
            
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }
        </style>
        <?php
    });
}
// add_action('init', 'ai_solutions_custom_mobile_layout');

// ==========================================================================
// Personalizzazioni JavaScript
// ==========================================================================

/**
 * Esempio 4: Aggiungi funzionalità JavaScript personalizzate
 */
function ai_solutions_custom_javascript() {
    add_action('wp_footer', function() {
        ?>
        <script>
        // Funzionalità personalizzate per la landing page
        document.addEventListener('DOMContentLoaded', function() {
            
            // Esempio: Contatore animato per i numeri
            function animateCounter(element, target, duration = 2000) {
                let start = 0;
                const increment = target / (duration / 16);
                
                function updateCounter() {
                    start += increment;
                    if (start < target) {
                        element.textContent = Math.floor(start);
                        requestAnimationFrame(updateCounter);
                    } else {
                        element.textContent = target;
                    }
                }
                
                updateCounter();
            }
            
            // Esempio: Parallax effect per la hero section
            function initParallax() {
                const heroSection = document.querySelector('.hero-section');
                if (!heroSection) return;
                
                window.addEventListener('scroll', function() {
                    const scrolled = window.pageYOffset;
                    const rate = scrolled * -0.5;
                    heroSection.style.transform = `translateY(${rate}px)`;
                });
            }
            
            // Esempio: Smooth reveal per le sezioni
            function initSmoothReveal() {
                const sections = document.querySelectorAll('section');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }
                    });
                }, { threshold: 0.1 });
                
                sections.forEach(section => {
                    section.style.opacity = '0';
                    section.style.transform = 'translateY(30px)';
                    section.style.transition = 'all 0.8s ease-out';
                    observer.observe(section);
                });
            }
            
            // Esempio: Form validation personalizzata
            function initCustomValidation() {
                const form = document.getElementById('landing-contact-form');
                if (!form) return;
                
                const inputs = form.querySelectorAll('input, textarea, select');
                
                inputs.forEach(input => {
                    input.addEventListener('blur', function() {
                        validateField(this);
                    });
                    
                    input.addEventListener('input', function() {
                        clearFieldError(this);
                    });
                });
            }
            
            function validateField(field) {
                const value = field.value.trim();
                let isValid = true;
                let errorMessage = '';
                
                // Validazione personalizzata
                switch (field.type) {
                    case 'email':
                        if (!value || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                            isValid = false;
                            errorMessage = 'Inserisci un indirizzo email valido';
                        }
                        break;
                        
                    case 'tel':
                        if (value && !/^[\+]?[0-9\s\-\(\)]{8,20}$/.test(value)) {
                            isValid = false;
                            errorMessage = 'Numero di telefono non valido';
                        }
                        break;
                        
                    case 'textarea':
                        if (field.hasAttribute('required') && value.length < 10) {
                            isValid = false;
                            errorMessage = 'Inserisci almeno 10 caratteri';
                        }
                        break;
                }
                
                if (!isValid) {
                    showFieldError(field, errorMessage);
                }
                
                return isValid;
            }
            
            function showFieldError(field, message) {
                clearFieldError(field);
                
                const errorDiv = document.createElement('div');
                errorDiv.className = 'field-error custom';
                errorDiv.textContent = message;
                errorDiv.style.cssText = `
                    color: #dc2626;
                    font-size: 0.875rem;
                    margin-top: 0.5rem;
                    padding: 0.5rem;
                    background: #fef2f2;
                    border: 1px solid #fecaca;
                    border-radius: 0.375rem;
                    display: block;
                `;
                
                field.parentNode.appendChild(errorDiv);
                field.style.borderColor = '#dc2626';
                field.style.boxShadow = '0 0 0 3px rgba(220, 38, 38, 0.1)';
            }
            
            function clearFieldError(field) {
                const errorDiv = field.parentNode.querySelector('.field-error.custom');
                if (errorDiv) {
                    errorDiv.remove();
                }
                field.style.borderColor = '';
                field.style.boxShadow = '';
            }
            
            // Inizializza le funzionalità personalizzate
            initParallax();
            initSmoothReveal();
            initCustomValidation();
            
            // Esempio: Tracking personalizzato
            function trackCustomEvents() {
                // Track scroll depth
                let maxScroll = 0;
                window.addEventListener('scroll', function() {
                    const scrollPercent = Math.round((window.pageYOffset / (document.body.scrollHeight - window.innerHeight)) * 100);
                    if (scrollPercent > maxScroll) {
                        maxScroll = scrollPercent;
                        
                        // Invia eventi a Google Analytics
                        if (typeof gtag !== 'undefined') {
                            if (maxScroll >= 25) gtag('event', 'scroll_25_percent');
                            if (maxScroll >= 50) gtag('event', 'scroll_50_percent');
                            if (maxScroll >= 75) gtag('event', 'scroll_75_percent');
                            if (maxScroll >= 90) gtag('event', 'scroll_90_percent');
                        }
                    }
                });
                
                // Track time on page
                let startTime = Date.now();
                window.addEventListener('beforeunload', function() {
                    const timeOnPage = Math.round((Date.now() - startTime) / 1000);
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'time_on_page', {
                            value: timeOnPage,
                            custom_parameter: 'landing_page'
                        });
                    }
                });
            }
            
            trackCustomEvents();
        });
        </script>
        <?php
    });
}
// add_action('init', 'ai_solutions_custom_javascript');

// ==========================================================================
// Personalizzazioni PHP
// ==========================================================================

/**
 * Esempio 5: Aggiungi campi personalizzati al form
 */
function ai_solutions_add_custom_form_fields() {
    add_filter('ai_solutions_form_fields', function($fields) {
        // Aggiungi campo per budget
        $fields['budget'] = array(
            'label' => 'Budget stimato',
            'type' => 'select',
            'required' => false,
            'options' => array(
                '' => 'Seleziona budget',
                'under_10k' => 'Sotto i 10.000€',
                '10k_50k' => '10.000€ - 50.000€',
                '50k_100k' => '50.000€ - 100.000€',
                'over_100k' => 'Oltre 100.000€'
            )
        );
        
        // Aggiungi campo per timeline
        $fields['timeline'] = array(
            'label' => 'Timeline progetto',
            'type' => 'select',
            'required' => false,
            'options' => array(
                '' => 'Seleziona timeline',
                'immediate' => 'Immediato (entro 1 mese)',
                '3_months' => '3 mesi',
                '6_months' => '6 mesi',
                '1_year' => '1 anno'
            )
        );
        
        return $fields;
    });
}
// add_action('init', 'ai_solutions_add_custom_form_fields');

/**
 * Esempio 6: Personalizza i contenuti dinamicamente
 */
function ai_solutions_customize_content() {
    add_filter('the_content', function($content) {
        if (is_page_template('page-landing.php')) {
            // Aggiungi contenuto personalizzato
            $custom_content = '<div class="custom-content-section">';
            $custom_content .= '<h2>Contenuto Personalizzato</h2>';
            $custom_content .= '<p>Questo è un esempio di contenuto aggiunto dinamicamente.</p>';
            $custom_content .= '</div>';
            
            // Inserisci dopo la prima sezione
            $content = str_replace('</section>', '</section>' . $custom_content, $content, 1);
        }
        
        return $content;
    });
}
// add_action('init', 'ai_solutions_customize_content');

/**
 * Esempio 7: Aggiungi meta box personalizzati
 */
function ai_solutions_add_custom_meta_boxes() {
    add_action('add_meta_boxes', function() {
        add_meta_box(
            'ai_solutions_custom_fields',
            'Campi Personalizzati AI Solutions',
            'ai_solutions_custom_meta_box_callback',
            'page',
            'normal',
            'high'
        );
    });
}

function ai_solutions_custom_meta_box_callback($post) {
    // Aggiungi nonce per sicurezza
    wp_nonce_field('ai_solutions_custom_meta_box', 'ai_solutions_custom_meta_box_nonce');
    
    // Ottieni i valori salvati
    $custom_title = get_post_meta($post->ID, '_ai_solutions_custom_title', true);
    $custom_description = get_post_meta($post->ID, '_ai_solutions_custom_description', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="ai_solutions_custom_title">Titolo Personalizzato</label>
            </th>
            <td>
                <input type="text" id="ai_solutions_custom_title" name="ai_solutions_custom_title" 
                       value="<?php echo esc_attr($custom_title); ?>" class="regular-text" />
                <p class="description">Titolo personalizzato per la landing page</p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="ai_solutions_custom_description">Descrizione Personalizzata</label>
            </th>
            <td>
                <textarea id="ai_solutions_custom_description" name="ai_solutions_custom_description" 
                          rows="4" class="large-text"><?php echo esc_textarea($custom_description); ?></textarea>
                <p class="description">Descrizione personalizzata per la landing page</p>
            </td>
        </tr>
    </table>
    <?php
}

function ai_solutions_save_custom_meta_box($post_id) {
    // Verifica nonce
    if (!isset($_POST['ai_solutions_custom_meta_box_nonce']) || 
        !wp_verify_nonce($_POST['ai_solutions_custom_meta_box_nonce'], 'ai_solutions_custom_meta_box')) {
        return;
    }
    
    // Verifica permessi
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Salva i campi personalizzati
    if (isset($_POST['ai_solutions_custom_title'])) {
        update_post_meta($post_id, '_ai_solutions_custom_title', 
                        sanitize_text_field($_POST['ai_solutions_custom_title']));
    }
    
    if (isset($_POST['ai_solutions_custom_description'])) {
        update_post_meta($post_id, '_ai_solutions_custom_description', 
                        sanitize_textarea_field($_POST['ai_solutions_custom_description']));
    }
}
add_action('save_post', 'ai_solutions_save_custom_meta_box');

// ==========================================================================
// Personalizzazioni per Performance
// ==========================================================================

/**
 * Esempio 8: Ottimizzazioni per performance
 */
function ai_solutions_performance_optimizations() {
    // Preload delle risorse critiche
    add_action('wp_head', function() {
        ?>
        <!-- Preload risorse critiche -->
        <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/css/landing-page.css" as="style">
        <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/js/landing-page.js" as="script">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <?php
    });
    
    // Defer JavaScript non critico
    add_filter('script_loader_tag', function($tag, $handle) {
        if ($handle === 'ai-solutions-landing-js') {
            return str_replace('<script ', '<script defer ', $tag);
        }
        return $tag;
    }, 10, 2);
    
    // Ottimizza il caricamento delle immagini
    add_filter('wp_get_attachment_image_attributes', function($attr, $attachment) {
        if (!is_admin()) {
            $attr['loading'] = 'lazy';
            $attr['decoding'] = 'async';
        }
        return $attr;
    }, 10, 2);
}
// add_action('init', 'ai_solutions_performance_optimizations');

// ==========================================================================
// Personalizzazioni per SEO
// ==========================================================================

/**
 * Esempio 9: Ottimizzazioni SEO personalizzate
 */
function ai_solutions_seo_optimizations() {
    // Aggiungi meta tags personalizzati
    add_action('wp_head', function() {
        if (is_page_template('page-landing.php')) {
            ?>
            <!-- Meta tags personalizzati per SEO -->
            <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
            <meta name="author" content="AI Solutions">
            <meta name="keywords" content="AI, intelligenza artificiale, automazione, formazione, consulenza, business">
            <meta name="geo.region" content="IT">
            <meta name="geo.placename" content="Milano">
            <meta name="geo.position" content="45.4642;9.1900">
            <meta name="ICBM" content="45.4642, 9.1900">
            
            <!-- Schema markup personalizzato -->
            <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "Organization",
                "name": "AI Solutions",
                "url": "<?php echo get_site_url(); ?>",
                "logo": "<?php echo get_template_directory_uri(); ?>/assets/images/logo.png",
                "description": "Formazione, automazioni, agenti AI e consulenza strategica per trasformare i tuoi processi aziendali",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "Via Example 123",
                    "addressLocality": "Milano",
                    "postalCode": "20100",
                    "addressCountry": "IT"
                },
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "+39 02 1234 5678",
                    "contactType": "customer service",
                    "areaServed": "IT",
                    "availableLanguage": "Italian"
                },
                "sameAs": [
                    "https://linkedin.com/company/ai-solutions",
                    "https://twitter.com/aisolutions"
                ]
            }
            </script>
            <?php
        }
    });
    
    // Aggiungi breadcrumbs personalizzati
    add_action('wp_head', function() {
        if (is_page_template('page-landing.php')) {
            ?>
            <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "Home",
                        "item": "<?php echo get_site_url(); ?>"
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "AI Solutions",
                        "item": "<?php echo get_permalink(); ?>"
                    }
                ]
            }
            </script>
            <?php
        }
    });
}
// add_action('init', 'ai_solutions_seo_optimizations');

// ==========================================================================
// Personalizzazioni per Analytics
// ==========================================================================

/**
 * Esempio 10: Tracking personalizzato per analytics
 */
function ai_solutions_custom_analytics() {
    add_action('wp_footer', function() {
        if (is_page_template('page-landing.php')) {
            ?>
            <script>
            // Tracking personalizzato per la landing page
            document.addEventListener('DOMContentLoaded', function() {
                
                // Track scroll depth
                let maxScroll = 0;
                window.addEventListener('scroll', function() {
                    const scrollPercent = Math.round((window.pageYOffset / (document.body.scrollHeight - window.innerHeight)) * 100);
                    if (scrollPercent > maxScroll) {
                        maxScroll = scrollPercent;
                        
                        // Google Analytics 4
                        if (typeof gtag !== 'undefined') {
                            if (maxScroll >= 25) gtag('event', 'scroll_depth', { value: 25 });
                            if (maxScroll >= 50) gtag('event', 'scroll_depth', { value: 50 });
                            if (maxScroll >= 75) gtag('event', 'scroll_depth', { value: 75 });
                            if (maxScroll >= 90) gtag('event', 'scroll_depth', { value: 90 });
                        }
                        
                        // Google Tag Manager
                        if (typeof dataLayer !== 'undefined') {
                            dataLayer.push({
                                event: 'scroll_depth',
                                scroll_percentage: maxScroll
                            });
                        }
                    }
                });
                
                // Track form interactions
                const form = document.getElementById('landing-contact-form');
                if (form) {
                    const inputs = form.querySelectorAll('input, textarea, select');
                    
                    inputs.forEach(input => {
                        input.addEventListener('focus', function() {
                            if (typeof gtag !== 'undefined') {
                                gtag('event', 'form_field_focus', {
                                    field_name: this.name,
                                    field_type: this.type
                                });
                            }
                        });
                        
                        input.addEventListener('blur', function() {
                            if (typeof gtag !== 'undefined') {
                                gtag('event', 'form_field_blur', {
                                    field_name: this.name,
                                    field_type: this.type
                                });
                            }
                        });
                    });
                }
                
                // Track CTA clicks
                const ctaButtons = document.querySelectorAll('.btn-primary, .btn-secondary');
                ctaButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const buttonText = this.textContent.trim();
                        const buttonLocation = this.closest('section')?.id || 'unknown';
                        
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'cta_click', {
                                button_text: buttonText,
                                button_location: buttonLocation,
                                button_type: this.classList.contains('btn-primary') ? 'primary' : 'secondary'
                            });
                        }
                        
                        if (typeof dataLayer !== 'undefined') {
                            dataLayer.push({
                                event: 'cta_click',
                                button_text: buttonText,
                                button_location: buttonLocation,
                                button_type: this.classList.contains('btn-primary') ? 'primary' : 'secondary'
                            });
                        }
                    });
                });
                
                // Track time on page
                let startTime = Date.now();
                window.addEventListener('beforeunload', function() {
                    const timeOnPage = Math.round((Date.now() - startTime) / 1000);
                    
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'time_on_page', {
                            value: timeOnPage,
                            custom_parameter: 'landing_page'
                        });
                    }
                    
                    if (typeof dataLayer !== 'undefined') {
                        dataLayer.push({
                            event: 'time_on_page',
                            time_seconds: timeOnPage,
                            page_type: 'landing_page'
                        });
                    }
                });
            });
            </script>
            <?php
        }
    });
}
// add_action('init', 'ai_solutions_custom_analytics');

// ==========================================================================
// Istruzioni per l'uso
// ==========================================================================

/**
 * NOTA IMPORTANTE:
 * 
 * Per utilizzare queste personalizzazioni:
 * 
 * 1. Rimuovi i commenti // dalle righe che vuoi attivare
 * 2. Personalizza i valori secondo le tue esigenze
 * 3. Testa sempre in ambiente di sviluppo prima
 * 4. Monitora le performance dopo le modifiche
 * 
 * Esempi di attivazione:
 * 
 * // Cambia i colori
 * add_action('init', 'ai_solutions_custom_colors');
 * 
 * // Aggiungi animazioni personalizzate
 * add_action('init', 'ai_solutions_custom_animations');
 * 
 * // Personalizza il layout mobile
 * add_action('init', 'ai_solutions_custom_mobile_layout');
 * 
 * // Aggiungi JavaScript personalizzato
 * add_action('init', 'ai_solutions_custom_javascript');
 * 
 * // Aggiungi campi personalizzati al form
 * add_action('init', 'ai_solutions_add_custom_form_fields');
 * 
 * // Personalizza i contenuti
 * add_action('init', 'ai_solutions_customize_content');
 * 
 * // Ottimizzazioni performance
 * add_action('init', 'ai_solutions_performance_optimizations');
 * 
 * // Ottimizzazioni SEO
 * add_action('init', 'ai_solutions_seo_optimizations');
 * 
 * // Tracking analytics personalizzato
 * add_action('init', 'ai_solutions_custom_analytics');
 */
