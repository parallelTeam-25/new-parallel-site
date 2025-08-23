<?php
/**
 * Configurazione Form di Contatto - Landing Page AI Solutions
 * 
 * File di configurazione per personalizzare il form di contatto
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
// Configurazione Form di Contatto
// ==========================================================================

/**
 * Configurazione campi del form
 */
function ai_solutions_get_form_config() {
    return array(
        'fields' => array(
            'contact_name' => array(
                'label' => 'Nome completo *',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Inserisci il tuo nome completo',
                'validation' => array(
                    'min_length' => 2,
                    'max_length' => 100
                )
            ),
            'contact_email' => array(
                'label' => 'Email aziendale *',
                'type' => 'email',
                'required' => true,
                'placeholder' => 'nome@azienda.it',
                'validation' => array(
                    'email_format' => true
                )
            ),
            'contact_company' => array(
                'label' => 'Azienda *',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Nome della tua azienda',
                'validation' => array(
                    'min_length' => 2,
                    'max_length' => 200
                )
            ),
            'contact_phone' => array(
                'label' => 'Telefono',
                'type' => 'tel',
                'required' => false,
                'placeholder' => '+39 02 1234 5678',
                'validation' => array(
                    'phone_format' => true
                )
            ),
            'contact_service' => array(
                'label' => 'Servizio di interesse *',
                'type' => 'select',
                'required' => true,
                'options' => array(
                    '' => 'Seleziona un servizio',
                    'formazione' => 'Formazione AI',
                    'automazioni' => 'Automazioni AI',
                    'agenti' => 'Agenti AI',
                    'consulenza' => 'Consulenza Processi',
                    'altro' => 'Altro'
                )
            ),
            'contact_message' => array(
                'label' => 'Descrivi la tua esigenza *',
                'type' => 'textarea',
                'required' => true,
                'placeholder' => 'Raccontaci brevemente cosa vorresti migliorare nella tua azienda con l\'AI...',
                'rows' => 4,
                'validation' => array(
                    'min_length' => 10,
                    'max_length' => 1000
                )
            ),
            'contact_privacy' => array(
                'label' => 'Accetto la Privacy Policy e i Termini di Servizio *',
                'type' => 'checkbox',
                'required' => true,
                'text' => 'Accetto la <a href="/privacy-policy" target="_blank">Privacy Policy</a> e i <a href="/termini-servizio" target="_blank">Termini di Servizio</a> *'
            )
        ),
        'submit_button' => array(
            'text' => 'Invia richiesta',
            'loading_text' => 'Invio in corso...',
            'success_text' => 'Messaggio inviato!',
            'error_text' => 'Errore nell\'invio'
        ),
        'messages' => array(
            'success' => 'Messaggio inviato con successo! Ti ricontatteremo entro 24 ore.',
            'error' => 'Si è verificato un errore. Riprova più tardi.',
            'validation' => array(
                'required' => 'Questo campo è obbligatorio',
                'email' => 'Inserisci un indirizzo email valido',
                'phone' => 'Inserisci un numero di telefono valido',
                'min_length' => 'Inserisci almeno {min} caratteri',
                'max_length' => 'Non superare i {max} caratteri'
            )
        ),
        'email' => array(
            'subject' => 'Nuova richiesta da Landing Page AI Solutions',
            'from_name' => 'AI Solutions Landing Page',
            'from_email' => 'noreply@' . parse_url(get_site_url(), PHP_URL_HOST),
            'admin_email' => get_option('admin_email'),
            'cc_emails' => array(), // Array di email per copia conoscenza
            'bcc_emails' => array() // Array di email per copia nascosta
        ),
        'antispam' => array(
            'honeypot' => true, // Campo nascosto per bot
            'time_check' => true, // Verifica tempo di compilazione
            'min_time' => 5, // Tempo minimo in secondi
            'max_time' => 3600, // Tempo massimo in secondi (1 ora)
            'ip_rate_limit' => true, // Limite rate per IP
            'max_submissions_per_hour' => 5 // Massimo 5 invii per ora per IP
        ),
        'redirect' => array(
            'success_url' => '', // URL di redirect dopo successo (vuoto = nessun redirect)
            'error_url' => '', // URL di redirect dopo errore (vuoto = nessun redirect)
            'delay' => 3 // Secondi di attesa prima del redirect
        )
    );
}

/**
 * Configurazione validazione personalizzata
 */
function ai_solutions_get_validation_rules() {
    return array(
        'phone' => array(
            'pattern' => '/^[\+]?[0-9\s\-\(\)]{8,20}$/',
            'message' => 'Inserisci un numero di telefono valido'
        ),
        'company' => array(
            'pattern' => '/^[a-zA-Z0-9\s\-\.&]{2,200}$/',
            'message' => 'Nome azienda non valido'
        ),
        'message' => array(
            'pattern' => '/^[a-zA-Z0-9\s\-\.\,\!\?\:\;\(\)]{10,1000}$/',
            'message' => 'Il messaggio contiene caratteri non validi'
        )
    );
}

/**
 * Configurazione campi aggiuntivi (opzionali)
 */
function ai_solutions_get_extra_fields() {
    return array(
        'company_size' => array(
            'label' => 'Dimensione azienda',
            'type' => 'select',
            'required' => false,
            'options' => array(
                '' => 'Seleziona dimensione',
                '1-10' => '1-10 dipendenti',
                '11-50' => '11-50 dipendenti',
                '51-200' => '51-200 dipendenti',
                '201-1000' => '201-1000 dipendenti',
                '1000+' => 'Oltre 1000 dipendenti'
            )
        ),
        'industry' => array(
            'label' => 'Settore',
            'type' => 'select',
            'required' => false,
            'options' => array(
                '' => 'Seleziona settore',
                'technology' => 'Tecnologia',
                'finance' => 'Finanza',
                'healthcare' => 'Sanità',
                'retail' => 'Retail',
                'manufacturing' => 'Manifatturiero',
                'consulting' => 'Consulenza',
                'other' => 'Altro'
            )
        ),
        'budget' => array(
            'label' => 'Budget stimato',
            'type' => 'select',
            'required' => false,
            'options' => array(
                '' => 'Seleziona budget',
                'under_10k' => 'Sotto i 10.000€',
                '10k_50k' => '10.000€ - 50.000€',
                '50k_100k' => '50.000€ - 100.000€',
                '100k_500k' => '100.000€ - 500.000€',
                'over_500k' => 'Oltre 500.000€'
            )
        ),
        'timeline' => array(
            'label' => 'Timeline progetto',
            'type' => 'select',
            'required' => false,
            'options' => array(
                '' => 'Seleziona timeline',
                'immediate' => 'Immediato (entro 1 mese)',
                '3_months' => '3 mesi',
                '6_months' => '6 mesi',
                '1_year' => '1 anno',
                'flexible' => 'Flessibile'
            )
        )
    );
}

/**
 * Configurazione integrazioni esterne
 */
function ai_solutions_get_integrations() {
    return array(
        'crm' => array(
            'enabled' => false,
            'type' => 'hubspot', // hubspot, salesforce, pipedrive, custom
            'api_key' => '',
            'list_id' => '',
            'endpoint' => ''
        ),
        'email_marketing' => array(
            'enabled' => false,
            'type' => 'mailchimp', // mailchimp, convertkit, activecampaign
            'api_key' => '',
            'list_id' => '',
            'tags' => array('landing-page', 'ai-solutions')
        ),
        'slack' => array(
            'enabled' => false,
            'webhook_url' => '',
            'channel' => '#leads',
            'username' => 'AI Solutions Bot'
        ),
        'zapier' => array(
            'enabled' => false,
            'webhook_url' => ''
        )
    );
}

/**
 * Configurazione personalizzazione visuale
 */
function ai_solutions_get_form_styling() {
    return array(
        'theme' => 'default', // default, modern, minimal, corporate
        'colors' => array(
            'primary' => '#0f766e',
            'secondary' => '#14b8a6',
            'success' => '#10b981',
            'error' => '#ef4444',
            'warning' => '#f59e0b',
            'text' => '#374151',
            'border' => '#e5e7eb',
            'background' => '#ffffff'
        ),
        'layout' => array(
            'columns' => 2, // 1 o 2 colonne per i campi
            'spacing' => 'comfortable', // compact, comfortable, spacious
            'border_radius' => 'rounded', // none, rounded, pill
            'shadows' => true
        ),
        'animations' => array(
            'enabled' => true,
            'type' => 'fade', // fade, slide, bounce
            'duration' => 300,
            'easing' => 'ease-in-out'
        )
    );
}

// ==========================================================================
// Funzioni di Utilità
// ==========================================================================

/**
 * Ottiene la configurazione completa del form
 */
function ai_solutions_get_complete_form_config() {
    $config = ai_solutions_get_form_config();
    
    // Aggiungi campi extra se abilitati
    if (get_theme_mod('ai_solutions_extra_fields', false)) {
        $config['extra_fields'] = ai_solutions_get_extra_fields();
    }
    
    // Aggiungi integrazioni
    $config['integrations'] = ai_solutions_get_integrations();
    
    // Aggiungi styling
    $config['styling'] = ai_solutions_get_form_styling();
    
    // Aggiungi validazione
    $config['validation'] = ai_solutions_get_validation_rules();
    
    return $config;
}

/**
 * Verifica se un campo è abilitato
 */
function ai_solutions_is_field_enabled($field_name) {
    $config = ai_solutions_get_form_config();
    return isset($config['fields'][$field_name]);
}

/**
 * Ottiene le opzioni per un campo select
 */
function ai_solutions_get_field_options($field_name) {
    $config = ai_solutions_get_form_config();
    
    if (isset($config['fields'][$field_name]['options'])) {
        return $config['fields'][$field_name]['options'];
    }
    
    // Controlla campi extra
    if (isset($config['extra_fields'][$field_name]['options'])) {
        return $config['extra_fields'][$field_name]['options'];
    }
    
    return array();
}

/**
 * Ottiene il valore di default per un campo
 */
function ai_solutions_get_field_default($field_name) {
    $config = ai_solutions_get_form_config();
    
    if (isset($config['fields'][$field_name]['default'])) {
        return $config['fields'][$field_name]['default'];
    }
    
    return '';
}

/**
 * Verifica se le integrazioni sono abilitate
 */
function ai_solutions_is_integration_enabled($integration_name) {
    $integrations = ai_solutions_get_integrations();
    return isset($integrations[$integration_name]['enabled']) && $integrations[$integration_name]['enabled'];
}

// ==========================================================================
// Hook per Personalizzazione
// ==========================================================================

/**
 * Filtro per personalizzare la configurazione del form
 */
add_filter('ai_solutions_form_config', 'ai_solutions_get_complete_form_config');

/**
 * Filtro per personalizzare i messaggi di validazione
 */
add_filter('ai_solutions_validation_messages', function($messages) {
    // Personalizza i messaggi qui
    $messages['custom'] = 'Messaggio personalizzato per validazione custom';
    return $messages;
});

/**
 * Filtro per personalizzare i campi del form
 */
add_filter('ai_solutions_form_fields', function($fields) {
    // Aggiungi o modifica campi qui
    return $fields;
});

/**
 * Filtro per personalizzare l'email di notifica
 */
add_filter('ai_solutions_email_content', function($content, $form_data) {
    // Personalizza il contenuto dell'email qui
    return $content;
}, 10, 2);

// ==========================================================================
// Esempi di Utilizzo
// ==========================================================================

/**
 * Esempio: Aggiungi un campo personalizzato
 */
function ai_solutions_add_custom_field_example() {
    add_filter('ai_solutions_form_fields', function($fields) {
        $fields['custom_field'] = array(
            'label' => 'Campo Personalizzato',
            'type' => 'text',
            'required' => false,
            'placeholder' => 'Inserisci valore personalizzato'
        );
        return $fields;
    });
}
// add_action('init', 'ai_solutions_add_custom_field_example');

/**
 * Esempio: Personalizza la validazione
 */
function ai_solutions_custom_validation_example() {
    add_filter('ai_solutions_validation_rules', function($rules) {
        $rules['custom_rule'] = array(
            'pattern' => '/^[A-Z]{2}[0-9]{3}$/',
            'message' => 'Il campo deve seguire il formato: 2 lettere maiuscole + 3 numeri'
        );
        return $rules;
    });
}
// add_action('init', 'ai_solutions_custom_validation_example');

/**
 * Esempio: Integrazione con CRM esterno
 */
function ai_solutions_crm_integration_example($form_data) {
    if (ai_solutions_is_integration_enabled('crm')) {
        // Logica per inviare dati al CRM
        $crm_data = array(
            'first_name' => $form_data['contact_name'],
            'email' => $form_data['contact_email'],
            'company' => $form_data['contact_company'],
            'phone' => $form_data['contact_phone'],
            'message' => $form_data['contact_message']
        );
        
        // Invia al CRM (implementa la logica specifica)
        // ai_solutions_send_to_crm($crm_data);
    }
}
// add_action('ai_solutions_form_submitted', 'ai_solutions_crm_integration_example');

// ==========================================================================
// Configurazione per Sviluppo
// ==========================================================================

if (WP_DEBUG) {
    /**
     * Debug: Mostra la configurazione del form
     */
    function ai_solutions_debug_form_config() {
        if (current_user_can('manage_options')) {
            echo '<div style="background: #f1f1f1; padding: 20px; margin: 20px; border: 1px solid #ddd;">';
            echo '<h3>Debug: Configurazione Form AI Solutions</h3>';
            echo '<pre>' . print_r(ai_solutions_get_complete_form_config(), true) . '</pre>';
            echo '</div>';
        }
    }
    // add_action('wp_footer', 'ai_solutions_debug_form_config');
}
