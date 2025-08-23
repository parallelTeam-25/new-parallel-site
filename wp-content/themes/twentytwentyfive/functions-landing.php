<?php
/**
 * Landing Page AI Solutions - Functions
 * 
 * File contenente tutte le funzioni e gli hook necessari per il template della landing page
 * Da includere nel file functions.php del tema
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
// Enqueue Scripts e Styles
// ==========================================================================

/**
 * Carica gli script e gli stili per la landing page
 */
function ai_solutions_enqueue_landing_assets() {
    // Verifica se siamo nella landing page
    if (is_page_template('page-landing.php')) {
        
        // CSS della landing page
        wp_enqueue_style(
            'ai-solutions-landing-css',
            get_template_directory_uri() . '/assets/css/landing-page.css',
            array(),
            filemtime(get_template_directory() . '/assets/css/landing-page.css'),
            'all'
        );
        
        // JavaScript della landing page
        wp_enqueue_script(
            'ai-solutions-landing-js',
            get_template_directory_uri() . '/assets/js/landing-page.js',
            array('jquery'),
            filemtime(get_template_directory() . '/assets/js/landing-page.js'),
            true
        );
        
        // Localize script per AJAX
        wp_localize_script('ai-solutions-landing-js', 'ai_solutions_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ai_solutions_nonce'),
            'strings' => array(
                'form_success' => 'Messaggio inviato con successo! Ti ricontatteremo entro 24 ore.',
                'form_error' => 'Si è verificato un errore. Riprova più tardi.',
                'validation_required' => 'Questo campo è obbligatorio',
                'validation_email' => 'Inserisci un indirizzo email valido',
                'validation_phone' => 'Inserisci un numero di telefono valido',
                'validation_min_length' => 'Inserisci almeno {min} caratteri'
            )
        ));
        
        // Preload delle risorse critiche
        add_action('wp_head', 'ai_solutions_preload_critical_resources');
        
        // Inline critical CSS per performance
        add_action('wp_head', 'ai_solutions_inline_critical_css');
    }
}
add_action('wp_enqueue_scripts', 'ai_solutions_enqueue_landing_assets');

/**
 * Preload delle risorse critiche
 */
function ai_solutions_preload_critical_resources() {
    ?>
    <!-- Preload delle risorse critiche per la landing page -->
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/css/landing-page.css" as="style">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/js/landing-page.js" as="script">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <?php
}

/**
 * Inline critical CSS per migliorare le performance
 */
function ai_solutions_inline_critical_css() {
    $critical_css = "
    /* Critical CSS per la landing page */
    .hero-section { padding: 6rem 0; text-align: center; }
    .hero-title { font-size: 3rem; color: #0f766e; margin-bottom: 2rem; }
    .hero-subtitle { font-size: 1.25rem; color: #4b5563; margin-bottom: 3rem; }
    .btn { display: inline-flex; align-items: center; padding: 1rem 2rem; font-weight: 600; text-decoration: none; border-radius: 0.75rem; transition: all 0.25s; }
    .btn-primary { background-color: #0f766e; color: #ffffff; }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }
    ";
    
    echo '<style id="ai-solutions-critical-css">' . $critical_css . '</style>';
}

// ==========================================================================
// Customizer Options
// ==========================================================================

/**
 * Aggiunge le opzioni del customizer per la landing page
 */
function ai_solutions_customize_register($wp_customize) {
    
    // Sezione Landing Page
    $wp_customize->add_section('ai_solutions_landing', array(
        'title' => __('Landing Page AI Solutions', 'twentytwentyfive'),
        'priority' => 30,
        'description' => __('Personalizza i contenuti della landing page AI Solutions', 'twentytwentyfive')
    ));
    
    // Hero Section
    $wp_customize->add_setting('ai_solutions_hero_title', array(
        'default' => 'Potenzia la tua azienda con l\'AI, oggi',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('ai_solutions_hero_title', array(
        'label' => __('Titolo Hero', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'Inserisci il titolo principale'
        )
    ));
    
    $wp_customize->add_setting('ai_solutions_hero_subtitle', array(
        'default' => 'Formazione, automazioni, agenti AI e consulenza strategica per trasformare i tuoi processi aziendali e accelerare la crescita',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('ai_solutions_hero_subtitle', array(
        'label' => __('Sottotitolo Hero', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'type' => 'textarea',
        'input_attrs' => array(
            'placeholder' => 'Inserisci il sottotitolo'
        )
    ));
    
    // Colori personalizzabili
    $wp_customize->add_setting('ai_solutions_primary_color', array(
        'default' => '#0f766e',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ai_solutions_primary_color', array(
        'label' => __('Colore Primario', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'description' => __('Colore principale per bottoni e elementi di evidenza', 'twentytwentyfive')
    )));
    
    // Immagine Hero
    $wp_customize->add_setting('ai_solutions_hero_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ai_solutions_hero_image', array(
        'label' => __('Immagine Hero', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'description' => __('Immagine di sfondo per la sezione hero (opzionale)', 'twentytwentyfive')
    )));
    
    // Contatti
    $wp_customize->add_setting('ai_solutions_contact_email', array(
        'default' => 'info@aisolutions.it',
        'sanitize_callback' => 'sanitize_email'
    ));
    
    $wp_customize->add_control('ai_solutions_contact_email', array(
        'label' => __('Email di Contatto', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'type' => 'email'
    ));
    
    $wp_customize->add_setting('ai_solutions_contact_phone', array(
        'default' => '+39 02 1234 5678',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control('ai_solutions_contact_phone', array(
        'label' => __('Telefono di Contatto', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'type' => 'text'
    ));
    
    $wp_customize->add_setting('ai_solutions_contact_address', array(
        'default' => 'Milano, Italia',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control('ai_solutions_contact_address', array(
        'label' => __('Indirizzo', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'type' => 'text'
    ));
    
    // Social Media
    $wp_customize->add_setting('ai_solutions_linkedin_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control('ai_solutions_linkedin_url', array(
        'label' => __('URL LinkedIn', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'type' => 'url'
    ));
    
    // Testimonial
    $wp_customize->add_setting('ai_solutions_testimonial_1', array(
        'default' => '"L\'implementazione dell\'AI ha rivoluzionato i nostri processi. La produttività è aumentata del 40% in soli 3 mesi."',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    
    $wp_customize->add_control('ai_solutions_testimonial_1', array(
        'label' => __('Testimonial 1', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'type' => 'textarea'
    ));
    
    $wp_customize->add_setting('ai_solutions_testimonial_1_author', array(
        'default' => 'Marco Rossi, CEO, TechStart SRL',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control('ai_solutions_testimonial_1_author', array(
        'label' => __('Autore Testimonial 1', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'type' => 'text'
    ));
    
    // Rating medio
    $wp_customize->add_setting('ai_solutions_average_rating', array(
        'default' => '4.9',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control('ai_solutions_average_rating', array(
        'label' => __('Rating Medio', 'twentytwentyfive'),
        'section' => 'ai_solutions_landing',
        'type' => 'text',
        'description' => __('Es: 4.9 (senza /5)', 'twentytwentyfive')
    ));
}
add_action('customize_register', 'ai_solutions_customize_register');

// ==========================================================================
// Custom Fields (ACF Ready)
// ==========================================================================

/**
 * Aggiunge custom fields per la landing page (compatibile con ACF)
 */
function ai_solutions_add_custom_fields() {
    if (function_exists('acf_add_local_field_group')) {
        
        acf_add_local_field_group(array(
            'key' => 'group_ai_solutions_landing',
            'title' => 'Landing Page AI Solutions',
            'fields' => array(
                array(
                    'key' => 'field_hero_section',
                    'label' => 'Sezione Hero',
                    'name' => 'hero_section',
                    'type' => 'group',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_hero_title',
                            'label' => 'Titolo Principale',
                            'name' => 'title',
                            'type' => 'text',
                            'default_value' => 'Potenzia la tua azienda con l\'AI, oggi'
                        ),
                        array(
                            'key' => 'field_hero_subtitle',
                            'label' => 'Sottotitolo',
                            'name' => 'subtitle',
                            'type' => 'textarea',
                            'default_value' => 'Formazione, automazioni, agenti AI e consulenza strategica per trasformare i tuoi processi aziendali e accelerare la crescita'
                        ),
                        array(
                            'key' => 'field_hero_image',
                            'label' => 'Immagine di Sfondo',
                            'name' => 'background_image',
                            'type' => 'image',
                            'return_format' => 'url'
                        )
                    )
                ),
                array(
                    'key' => 'field_services_section',
                    'label' => 'Sezione Servizi',
                    'name' => 'services_section',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_service_title',
                            'label' => 'Titolo Servizio',
                            'name' => 'title',
                            'type' => 'text'
                        ),
                        array(
                            'key' => 'field_service_subtitle',
                            'label' => 'Sottotitolo',
                            'name' => 'subtitle',
                            'type' => 'text'
                        ),
                        array(
                            'key' => 'field_service_description',
                            'label' => 'Descrizione',
                            'name' => 'description',
                            'type' => 'textarea'
                        ),
                        array(
                            'key' => 'field_service_features',
                            'label' => 'Caratteristiche',
                            'name' => 'features',
                            'type' => 'repeater',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_feature_text',
                                    'label' => 'Testo Caratteristica',
                                    'name' => 'text',
                                    'type' => 'text'
                                )
                            )
                        )
                    )
                ),
                array(
                    'key' => 'field_case_studies_section',
                    'label' => 'Sezione Casi Studio',
                    'name' => 'case_studies_section',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_case_title',
                            'label' => 'Titolo Caso Studio',
                            'name' => 'title',
                            'type' => 'text'
                        ),
                        array(
                            'key' => 'field_case_completion_time',
                            'label' => 'Tempo di Completamento',
                            'name' => 'completion_time',
                            'type' => 'text'
                        ),
                        array(
                            'key' => 'field_case_description',
                            'label' => 'Descrizione',
                            'name' => 'description',
                            'type' => 'textarea'
                        ),
                        array(
                            'key' => 'field_case_results',
                            'label' => 'Risultati',
                            'name' => 'results',
                            'type' => 'repeater',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_result_text',
                                    'label' => 'Testo Risultato',
                                    'name' => 'text',
                                    'type' => 'text'
                                )
                            )
                        )
                    )
                ),
                array(
                    'key' => 'field_testimonials_section',
                    'label' => 'Sezione Testimonial',
                    'name' => 'testimonials_section',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_testimonial_quote',
                            'label' => 'Testimonial',
                            'name' => 'quote',
                            'type' => 'textarea'
                        ),
                        array(
                            'key' => 'field_testimonial_author',
                            'label' => 'Autore',
                            'name' => 'author',
                            'type' => 'text'
                        ),
                        array(
                            'key' => 'field_testimonial_role',
                            'label' => 'Ruolo/Azienda',
                            'name' => 'role',
                            'type' => 'text'
                        )
                    )
                )
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-landing.php'
                    )
                )
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => 'Campi personalizzati per la landing page AI Solutions'
        ));
    }
}
add_action('acf/init', 'ai_solutions_add_custom_fields');

// ==========================================================================
// Form Handling e AJAX
// ==========================================================================

/**
 * Gestisce l'invio del form di contatto via AJAX
 */
function ai_solutions_handle_contact_form() {
    // Verifica nonce
    if (!wp_verify_nonce($_POST['nonce'], 'ai_solutions_nonce')) {
        wp_die('Nonce non valido');
    }
    
    // Sanitizza i dati
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $company = sanitize_text_field($_POST['contact_company']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $service = sanitize_text_field($_POST['contact_service']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    
    // Validazione
    if (empty($name) || empty($email) || empty($company) || empty($service) || empty($message)) {
        wp_send_json_error('Tutti i campi obbligatori devono essere compilati');
    }
    
    if (!is_email($email)) {
        wp_send_json_error('Indirizzo email non valido');
    }
    
    // Prepara i dati per l'email
    $subject = 'Nuova richiesta da Landing Page AI Solutions';
    $email_content = "
    Nuova richiesta di contatto dalla landing page:
    
    Nome: {$name}
    Email: {$email}
    Azienda: {$company}
    Telefono: {$phone}
    Servizio di interesse: {$service}
    
    Messaggio:
    {$message}
    
    ---
    Inviato da: " . get_site_url();
    
    // Invia email
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    $admin_email = get_option('admin_email');
    
    $email_sent = wp_mail($admin_email, $subject, $email_content, $headers);
    
    if ($email_sent) {
        // Salva nel database se richiesto
        ai_solutions_save_contact_request($name, $email, $company, $phone, $service, $message);
        
        wp_send_json_success('Messaggio inviato con successo! Ti ricontatteremo entro 24 ore.');
    } else {
        wp_send_json_error('Errore nell\'invio del messaggio. Riprova più tardi.');
    }
}
add_action('wp_ajax_ai_solutions_contact_form', 'ai_solutions_handle_contact_form');
add_action('wp_ajax_nopriv_ai_solutions_contact_form', 'ai_solutions_handle_contact_form');

/**
 * Salva la richiesta di contatto nel database
 */
function ai_solutions_save_contact_request($name, $email, $company, $phone, $service, $message) {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'ai_solutions_contacts';
    
    // Crea la tabella se non esiste
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(100) NOT NULL,
            email varchar(100) NOT NULL,
            company varchar(200) NOT NULL,
            phone varchar(50),
            service varchar(100) NOT NULL,
            message text NOT NULL,
            ip_address varchar(45),
            user_agent text,
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    // Inserisci i dati
    $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'email' => $email,
            'company' => $company,
            'phone' => $phone,
            'service' => $service,
            'message' => $message,
            'ip_address' => ai_solutions_get_client_ip(),
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? ''
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')
    );
}

/**
 * Ottiene l'IP del client
 */
function ai_solutions_get_client_ip() {
    $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    return $ip;
                }
            }
        }
    }
    
    return $_SERVER['REMOTE_ADDR'] ?? '';
}

// ==========================================================================
// SEO e Schema Markup
// ==========================================================================

/**
 * Aggiunge schema markup per i servizi AI
 */
function ai_solutions_add_schema_markup() {
    if (!is_page_template('page-landing.php')) {
        return;
    }
    
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'AI Solutions',
        'description' => 'Formazione, automazioni, agenti AI e consulenza strategica per trasformare i tuoi processi aziendali e accelerare la crescita',
        'url' => get_site_url(),
        'logo' => get_template_directory_uri() . '/assets/images/logo.png',
        'contactPoint' => array(
            '@type' => 'ContactPoint',
            'telephone' => get_theme_mod('ai_solutions_contact_phone', '+39 02 1234 5678'),
            'contactType' => 'customer service',
            'areaServed' => 'IT',
            'availableLanguage' => 'Italian'
        ),
        'address' => array(
            '@type' => 'PostalAddress',
            'addressLocality' => 'Milano',
            'addressCountry' => 'IT'
        ),
        'sameAs' => array(
            get_theme_mod('ai_solutions_linkedin_url', '')
        ),
        'serviceType' => array(
            'AI Training',
            'AI Automation',
            'AI Agents',
            'Process Consulting'
        ),
        'areaServed' => array(
            '@type' => 'Country',
            'name' => 'Italy'
        )
    );
    
    echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
}
add_action('wp_head', 'ai_solutions_add_schema_markup');

/**
 * Aggiunge meta tags Open Graph per la landing page
 */
function ai_solutions_add_open_graph_tags() {
    if (!is_page_template('page-landing.php')) {
        return;
    }
    
    $og_title = get_theme_mod('ai_solutions_hero_title', 'Potenzia la tua azienda con l\'AI, oggi');
    $og_description = get_theme_mod('ai_solutions_hero_subtitle', 'Formazione, automazioni, agenti AI e consulenza strategica per trasformare i tuoi processi aziendali e accelerare la crescita');
    $og_image = get_theme_mod('ai_solutions_hero_image', get_template_directory_uri() . '/assets/images/og-image.jpg');
    
    ?>
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo esc_attr($og_title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($og_description); ?>">
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <meta property="og:locale" content="it_IT">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($og_title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($og_description); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>">
    <?php
}
add_action('wp_head', 'ai_solutions_add_open_graph_tags');

// ==========================================================================
// Performance e Ottimizzazioni
// ==========================================================================

/**
 * Aggiunge preload per le risorse critiche
 */
function ai_solutions_add_resource_hints($hints, $relation_type) {
    if (is_page_template('page-landing.php')) {
        if ($relation_type === 'preconnect') {
            $hints[] = 'https://fonts.googleapis.com';
            $hints[] = 'https://fonts.gstatic.com';
        }
        
        if ($relation_type === 'dns-prefetch') {
            $hints[] = '//www.google-analytics.com';
            $hints[] = '//www.googletagmanager.com';
        }
    }
    
    return $hints;
}
add_filter('wp_resource_hints', 'ai_solutions_add_resource_hints', 10, 2);

/**
 * Ottimizza il caricamento delle immagini
 */
function ai_solutions_optimize_images() {
    if (is_page_template('page-landing.php')) {
        add_filter('wp_get_attachment_image_attributes', 'ai_solutions_add_lazy_loading', 10, 3);
    }
}

function ai_solutions_add_lazy_loading($attr, $attachment, $size) {
    if (!is_admin()) {
        $attr['loading'] = 'lazy';
        $attr['decoding'] = 'async';
    }
    return $attr;
}
add_action('wp', 'ai_solutions_optimize_images');

// ==========================================================================
// Utility Functions
// ==========================================================================

/**
 * Ottiene il valore di un campo personalizzato con fallback
 */
function ai_solutions_get_field($field_name, $fallback = '') {
    // Prova ACF prima
    if (function_exists('get_field')) {
        $value = get_field($field_name);
        if ($value) {
            return $value;
        }
    }
    
    // Fallback al customizer
    $customizer_value = get_theme_mod('ai_solutions_' . $field_name, '');
    if ($customizer_value) {
        return $customizer_value;
    }
    
    // Fallback finale
    return $fallback;
}

/**
 * Formatta un numero di telefono
 */
function ai_solutions_format_phone($phone) {
    $phone = preg_replace('/[^0-9+]/', '', $phone);
    
    if (strpos($phone, '+39') === 0) {
        $phone = substr($phone, 3);
        return '+39 ' . substr($phone, 0, 2) . ' ' . substr($phone, 2, 4) . ' ' . substr($phone, 6);
    }
    
    return $phone;
}

/**
 * Verifica se siamo nella landing page
 */
function ai_solutions_is_landing_page() {
    return is_page_template('page-landing.php');
}

// ==========================================================================
// Admin Functions
// ==========================================================================

/**
 * Aggiunge colonne personalizzate per le richieste di contatto
 */
function ai_solutions_add_contact_columns($columns) {
    $new_columns = array();
    
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        
        if ($key === 'title') {
            $new_columns['contact_email'] = 'Email';
            $new_columns['contact_company'] = 'Azienda';
            $new_columns['contact_service'] = 'Servizio';
            $new_columns['contact_date'] = 'Data';
        }
    }
    
    return $new_columns;
}

/**
 * Popola le colonne personalizzate
 */
function ai_solutions_populate_contact_columns($column, $post_id) {
    if ($column === 'contact_email') {
        $email = get_post_meta($post_id, '_contact_email', true);
        echo esc_html($email);
    }
    
    if ($column === 'contact_company') {
        $company = get_post_meta($post_id, '_contact_company', true);
        echo esc_html($company);
    }
    
    if ($column === 'contact_service') {
        $service = get_post_meta($post_id, '_contact_service', true);
        echo esc_html($service);
    }
    
    if ($column === 'contact_date') {
        $date = get_post_meta($post_id, '_contact_date', true);
        echo esc_html($date);
    }
}

// Aggiungi le colonne solo se siamo nell'admin
if (is_admin()) {
    add_filter('manage_posts_columns', 'ai_solutions_add_contact_columns');
    add_action('manage_posts_custom_column', 'ai_solutions_populate_contact_columns', 10, 2);
}

// ==========================================================================
// Hooks di Attivazione/Disattivazione
// ==========================================================================

/**
 * Attiva le funzionalità della landing page
 */
function ai_solutions_activate() {
    // Crea la tabella per i contatti
    ai_solutions_create_contacts_table();
    
    // Flush rewrite rules
    flush_rewrite_rules();
}

/**
 * Disattiva le funzionalità della landing page
 */
function ai_solutions_deactivate() {
    // Flush rewrite rules
    flush_rewrite_rules();
}

/**
 * Crea la tabella per i contatti
 */
function ai_solutions_create_contacts_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'ai_solutions_contacts';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        company varchar(200) NOT NULL,
        phone varchar(50),
        service varchar(100) NOT NULL,
        message text NOT NULL,
        ip_address varchar(45),
        user_agent text,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Registra gli hook di attivazione/disattivazione
register_activation_hook(__FILE__, 'ai_solutions_activate');
register_deactivation_hook(__FILE__, 'ai_solutions_deactivate');

// ==========================================================================
// Debug e Logging (solo in modalità debug)
// ==========================================================================

if (WP_DEBUG) {
    /**
     * Log delle funzioni per debug
     */
    function ai_solutions_log($message, $type = 'info') {
        if (WP_DEBUG_LOG) {
            $timestamp = current_time('Y-m-d H:i:s');
            $log_entry = "[{$timestamp}] [AI Solutions] [{$type}] {$message}" . PHP_EOL;
            error_log($log_entry, 3, WP_CONTENT_DIR . '/debug.log');
        }
    }
    
    /**
     * Debug delle variabili
     */
    function ai_solutions_debug($var, $label = '') {
        if (WP_DEBUG) {
            echo '<pre style="background: #f1f1f1; padding: 10px; margin: 10px; border: 1px solid #ddd;">';
            if ($label) {
                echo '<strong>' . esc_html($label) . ':</strong><br>';
            }
            var_dump($var);
            echo '</pre>';
        }
    }
}
