<?php
/**
 * Template Name: Landing AI Solutions Simple
 * Template Post Type: page
 * 
 * Template semplificato per la landing page AI Solutions
 * 
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since 1.0.0
 */

// Verifica che il template sia attivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Carica l'header di WordPress
get_header(); 

// Debug: verifica che il template sia caricato
if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
    echo '<!-- Template Landing AI Solutions Simple caricato correttamente -->';
}
?>

<div id="landing-page-container" class="landing-page-container">
    
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 80px 20px; text-align: center;">
        <div class="container" style="max-width: 1200px; margin: 0 auto;">
            <h1 style="font-size: 48px; font-weight: 700; margin-bottom: 24px;">
                Potenzia la tua azienda con l'AI, oggi
            </h1>
            <p style="font-size: 20px; margin-bottom: 40px; max-width: 800px; margin-left: auto; margin-right: auto;">
                Formazione, automazioni, agenti AI e consulenza strategica per trasformare i tuoi processi aziendali e accelerare la crescita
            </p>
            <div style="margin-bottom: 40px;">
                <a href="#contact" style="background: white; color: #667eea; padding: 16px 32px; text-decoration: none; border-radius: 8px; font-weight: 600; display: inline-block; margin: 0 10px;">
                    Prenota una chiamata gratuita
                </a>
                <a href="#case-studies" style="border: 2px solid white; color: white; padding: 16px 32px; text-decoration: none; border-radius: 8px; font-weight: 600; display: inline-block; margin: 0 10px;">
                    Scopri i nostri casi studio
                </a>
            </div>
            <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
                <span style="background: white; color: #667eea; padding: 8px 16px; border-radius: 20px; font-size: 14px;">Microsoft Partner</span>
                <span style="background: white; color: #667eea; padding: 8px 16px; border-radius: 20px; font-size: 14px;">AWS Certified</span>
                <span style="background: white; color: #667eea; padding: 8px 16px; border-radius: 20px; font-size: 14px;">Google Cloud Partner</span>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section style="background: white; padding: 80px 20px;">
        <div class="container" style="max-width: 1200px; margin: 0 auto;">
            <h2 style="text-align: center; font-size: 36px; font-weight: 600; margin-bottom: 24px; color: #333;">
                Perché scegliere noi
            </h2>
            <p style="text-align: center; font-size: 18px; margin-bottom: 60px; max-width: 800px; margin-left: auto; margin-right: auto; color: #666;">
                Specializzati nell'implementazione di soluzioni AI per aziende di ogni dimensione, 
                ci impegniamo a fornire risultati misurabili e un supporto continuo.
            </p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px;">
                <div style="background: #f8f9fa; padding: 32px 24px; border-radius: 12px; text-align: center;">
                    <h3 style="font-size: 24px; font-weight: 600; margin-bottom: 16px; color: #333;">Esperienza Consolidata</h3>
                    <p style="color: #666;">Oltre 5 anni di esperienza nell'implementazione di soluzioni AI per aziende di diversi settori.</p>
                </div>
                <div style="background: #f8f9fa; padding: 32px 24px; border-radius: 12px; text-align: center;">
                    <h3 style="font-size: 24px; font-weight: 600; margin-bottom: 16px; color: #333;">Approccio Personalizzato</h3>
                    <p style="color: #666;">Ogni soluzione è progettata su misura per le specifiche esigenze della tua azienda.</p>
                </div>
                <div style="background: #f8f9fa; padding: 32px 24px; border-radius: 12px; text-align: center;">
                    <h3 style="font-size: 24px; font-weight: 600; margin-bottom: 16px; color: #333;">Focus sui Risultati</h3>
                    <p style="color: #666;">Ci concentriamo su metriche concrete e ROI misurabile per ogni progetto.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact" style="background: #f8f9fa; padding: 80px 20px;">
        <div class="container" style="max-width: 800px; margin: 0 auto;">
            <h2 style="text-align: center; font-size: 36px; font-weight: 600; margin-bottom: 40px; color: #333;">
                Contattaci per una consulenza gratuita
            </h2>
            <form method="post" action="" style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <?php wp_nonce_field('landing_contact_form', 'landing_nonce'); ?>
                <div style="margin-bottom: 24px;">
                    <label for="nome" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Nome e Cognome *</label>
                    <input type="text" id="nome" name="nome" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>
                <div style="margin-bottom: 24px;">
                    <label for="email" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Email *</label>
                    <input type="email" id="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>
                <div style="margin-bottom: 24px;">
                    <label for="azienda" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Azienda</label>
                    <input type="text" id="azienda" name="azienda" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>
                <div style="margin-bottom: 24px;">
                    <label for="messaggio" style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Messaggio *</label>
                    <textarea id="messaggio" name="messaggio" rows="5" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; resize: vertical;"></textarea>
                </div>
                <button type="submit" style="background: #667eea; color: white; padding: 16px 32px; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; width: 100%;">
                    Invia Richiesta
                </button>
            </form>
        </div>
    </section>

</div>

<style>
/* Stili inline per garantire il funzionamento */
.landing-page-container {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    line-height: 1.6;
}

.landing-page-container h1, 
.landing-page-container h2, 
.landing-page-container h3 {
    margin: 0;
    line-height: 1.2;
}

.landing-page-container p {
    margin: 0 0 1em 0;
}

.landing-page-container a {
    transition: all 0.3s ease;
}

.landing-page-container a:hover {
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .landing-page-container h1 {
        font-size: 32px !important;
    }
    
    .landing-page-container h2 {
        font-size: 28px !important;
    }
    
    .landing-page-container .hero-section,
    .landing-page-container section {
        padding: 40px 20px !important;
    }
}
</style>

<?php get_footer(); ?>
