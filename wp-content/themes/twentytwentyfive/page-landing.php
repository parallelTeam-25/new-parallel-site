<?php
/**
 * Template Name: Landing AI Solutions
 * Template Post Type: page
 * 
 * Template personalizzato per la landing page "AI Solutions - Automazioni e Formazione AI per la tua Azienda"
 * 
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since 1.0.0
 */

// Verifica che il template sia attivo
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Carica l'header di WordPress
get_header(); 

// Debug: verifica che il template sia caricato
if ( WP_DEBUG ) {
    echo '<!-- Template Landing AI Solutions caricato correttamente -->';
}
?>

<main id="main" class="landing-page-main">
    
    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Potenzia la tua azienda con l'AI, oggi
                </h1>
                <p class="hero-subtitle">
                    Formazione, automazioni, agenti AI e consulenza strategica per trasformare i tuoi processi aziendali e accelerare la crescita
                </p>
                <div class="hero-cta">
                    <a href="#contact" class="btn btn-primary">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        Prenota una chiamata gratuita
                    </a>
                    <a href="#case-studies" class="btn btn-secondary">Scopri i nostri casi studio</a>
                </div>
                <div class="hero-partners">
                    <span class="partner-badge">Microsoft Partner</span>
                    <span class="partner-badge">AWS Certified</span>
                    <span class="partner-badge">Google Cloud Partner</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Perché scegliere noi Section -->
    <section id="why-us" class="why-us-section">
        <div class="container">
            <h2 class="section-title">Perché scegliere noi</h2>
            <p class="section-intro">
                Specializzati nell'implementazione di soluzioni AI per aziende di ogni dimensione, 
                ci impegniamo a fornire risultati misurabili e un supporto continuo.
            </p>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <h3>Esperienza Consolidata</h3>
                    <p>Oltre 5 anni di esperienza nell'implementazione di soluzioni AI per aziende di diversi settori.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3>Approccio Personalizzato</h3>
                    <p>Ogni soluzione è progettata su misura per le specifiche esigenze della tua azienda.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="6"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                        </svg>
                    </div>
                    <h3>Focus sui Risultati</h3>
                    <p>Ci concentriamo su metriche concrete e ROI misurabile per ogni progetto.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- La nostra missione Section -->
    <section id="mission" class="mission-section">
        <div class="container">
            <div class="mission-content">
                <h2>La nostra missione</h2>
                <p>
                    Democratizzare l'accesso alle tecnologie AI per le aziende italiane, 
                    fornendo soluzioni pratiche e accessibili che generino valore immediato 
                    e sostenibile nel tempo.
                </p>
            </div>
        </div>
    </section>

    <!-- Come lavoriamo insieme Section -->
    <section id="process" class="process-section">
        <div class="container">
            <h2 class="section-title">Come lavoriamo insieme</h2>
            <p class="section-subtitle">Il nostro processo di trasformazione in 3 fasi</p>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3>Analisi</h3>
                    <p>Valutiamo i tuoi processi attuali e identifichiamo le opportunità di miglioramento con l'AI.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3>Implementazione</h3>
                    <p>Sviluppiamo e implementiamo le soluzioni AI personalizzate per la tua azienda.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3>Supporto</h3>
                    <p>Ti accompagniamo nel percorso di adozione con formazione e supporto continuo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- I nostri servizi Section -->
    <section id="services" class="services-section">
        <div class="container">
            <h2 class="section-title">I nostri servizi</h2>
            <p class="section-intro">
                Offriamo un approccio completo all'implementazione dell'AI, 
                dalla formazione del personale all'automazione dei processi.
            </p>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                    </div>
                    <h3>Formazione AI</h3>
                    <p class="service-subtitle">Workshop e corsi personalizzati</p>
                    <ul class="service-features">
                        <li>Formazione su ChatGPT e AI generative</li>
                        <li>Workshop pratici per team</li>
                        <li>Certificazioni riconosciute</li>
                        <li>Supporto post-formazione</li>
                    </ul>
                    <a href="#contact" class="btn btn-outline">Scopri di più</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                    </div>
                    <h3>Automazioni AI</h3>
                    <p class="service-subtitle">Processi intelligenti e automatizzati</p>
                    <ul class="service-features">
                        <li>Automazione documenti e report</li>
                        <li>Chatbot per customer service</li>
                        <li>Analisi dati automatizzate</li>
                        <li>Integrazione con sistemi esistenti</li>
                    </ul>
                    <a href="#contact" class="btn btn-outline">Scopri di più</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <circle cx="12" cy="16" r="1"></circle>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <h3>Agenti AI</h3>
                    <p class="service-subtitle">Assistenti intelligenti personalizzati</p>
                    <ul class="service-features">
                        <li>Agenti per analisi dati</li>
                        <li>Assistenti per decisioni</li>
                        <li>Bot per processi specifici</li>
                        <li>Integrazione multi-piattaforma</li>
                    </ul>
                    <a href="#contact" class="btn btn-outline">Scopri di più</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="14"></line>
                        </svg>
                    </div>
                    <h3>Consulenza Processi</h3>
                    <p class="service-subtitle">Ottimizzazione strategica dei processi</p>
                    <ul class="service-features">
                        <li>Audit dei processi aziendali</li>
                        <li>Roadmap di trasformazione</li>
                        <li>KPI e metriche di successo</li>
                        <li>Supporto all'implementazione</li>
                    </ul>
                    <a href="#contact" class="btn btn-outline">Scopri di più</a>
                </div>
            </div>
            <div class="services-cta">
                <a href="#contact" class="btn btn-primary btn-large">
                    Richiedi una consulenza personalizzata
                </a>
            </div>
        </div>
    </section>

    <!-- Casi di successo Section -->
    <section id="case-studies" class="case-studies-section">
        <div class="container">
            <h2 class="section-title">Casi di successo</h2>
            <p class="section-intro">
                Scopri come abbiamo trasformato i processi dei nostri clienti 
                con soluzioni AI innovative e personalizzate.
            </p>
            <div class="case-studies-grid">
                <div class="case-study-card">
                    <h3>E-commerce Fashion</h3>
                    <p class="completion-time">Completato in 3 mesi</p>
                    <p class="case-description">
                        Automazione del customer service e ottimizzazione delle campagne marketing 
                        con AI per un brand di moda online.
                    </p>
                    <div class="case-results">
                        <h4>Risultati</h4>
                        <ul>
                            <li>-65% Costo per acquisizione</li>
                            <li>+40% Tasso di conversione</li>
                            <li>+300% Documenti generati</li>
                        </ul>
                    </div>
                    <a href="#contact" class="btn btn-outline">Scopri di più</a>
                </div>
                
                <div class="case-study-card">
                    <h3>Studio Legale</h3>
                    <p class="completion-time">Completato in 2 mesi</p>
                    <p class="case-description">
                        Implementazione di agenti AI per la generazione automatica di documenti 
                        legali e analisi di contratti.
                    </p>
                    <div class="case-results">
                        <h4>Risultati</h4>
                        <ul>
                            <li>-80% Tempo per documenti</li>
                            <li>+150% Produttività team</li>
                            <li>+200% Contratti analizzati</li>
                        </ul>
                    </div>
                    <a href="#contact" class="btn btn-outline">Scopri di più</a>
                </div>
                
                <div class="case-study-card">
                    <h3>Azienda Manifatturiera</h3>
                    <p class="completion-time">Completato in 4 mesi</p>
                    <p class="case-description">
                        Automazione dei processi di controllo qualità e ottimizzazione 
                        della supply chain con soluzioni AI avanzate.
                    </p>
                    <div class="case-results">
                        <h4>Risultati</h4>
                        <ul>
                            <li>-45% Difetti di produzione</li>
                            <li>+60% Efficienza operativa</li>
                            <li>+180% Previsioni accurate</li>
                        </ul>
                    </div>
                    <a href="#contact" class="btn btn-outline">Scopri di più</a>
                </div>
            </div>
            <div class="case-studies-cta">
                <a href="#contact" class="btn btn-primary btn-large">
                    Inizia la tua trasformazione
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimonials" class="testimonials-section">
        <div class="container">
            <h2 class="section-title">Cosa dicono i nostri clienti</h2>
            <p class="section-intro">
                I risultati parlano da soli. I nostri clienti testimoniano 
                miglioramenti concreti e soddisfazione garantita.
            </p>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <div class="testimonial-quote">
                        <svg class="quote-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <p>
                            "L'implementazione dell'AI ha rivoluzionato i nostri processi. 
                            La produttività è aumentata del 40% in soli 3 mesi."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <strong>Marco Rossi</strong>
                        <span>CEO, TechStart SRL</span>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <div class="testimonial-quote">
                        <svg class="quote-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <p>
                            "Il team di AI Solutions ha trasformato la nostra visione dell'AI 
                            in realtà concrete e misurabili."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <strong>Laura Bianchi</strong>
                        <span>CTO, Innovazione Spa</span>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <div class="testimonial-quote">
                        <svg class="quote-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <p>
                            "Eccellente supporto e risultati che hanno superato le aspettative. 
                            Consigliatissimo per chi vuole innovare."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <strong>Giuseppe Verdi</strong>
                        <span>Direttore Operativo, Manifattura Italia</span>
                    </div>
                </div>
            </div>
            <div class="overall-rating">
                <span class="star">★</span>
                <span>4.9/5 rating medio dei nostri clienti</span>
            </div>
        </div>
    </section>

    <!-- CTA Finale Section -->
    <section id="final-cta" class="final-cta-section">
        <div class="container">
            <h2 class="section-title">Inizia la tua trasformazione AI oggi</h2>
            <p class="section-intro">
                Prenota una consulenza gratuita di 30 minuti e scopri come l'AI 
                può trasformare la tua azienda.
            </p>
            <div class="final-cta-button">
                <a href="#contact" class="btn btn-primary btn-large">
                    Prenota la tua consulenza gratuita
                </a>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12,6 12,12 16,14"></polyline>
                        </svg>
                    </div>
                    <h3>30 minuti di valore</h3>
                    <p>Consulenza mirata e personalizzata per identificare le opportunità specifiche per la tua azienda.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3>Esperti dedicati</h3>
                    <p>Incontro con i nostri specialisti AI con esperienza specifica nel tuo settore.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14,2 14,8 20,8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10,9 9,9 8,9"></polyline>
                        </svg>
                    </div>
                    <h3>Piano d'azione</h3>
                    <p>Riceverai un piano personalizzato con step concreti per iniziare la tua trasformazione AI.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="section-title">Contattaci per una consulenza gratuita</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Parlaci della tua azienda</h3>
                    <p>Compila il form e ti ricontatteremo entro 24 ore per programmare la tua consulenza gratuita.</p>
                    
                    <div class="contact-details">
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="4,6 12,13 20,6"></polyline>
                            </svg>
                            <span>info@aisolutions.it</span>
                        </div>
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.63A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <span>+39 02 1234 5678</span>
                        </div>
                        <div class="contact-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>Milano, Italia</span>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form">
                    <form id="landing-contact-form" method="post" action="">
                        <?php wp_nonce_field('landing_contact_form', 'landing_contact_nonce'); ?>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact-name">Nome completo *</label>
                                <input type="text" id="contact-name" name="contact_name" required>
                            </div>
                            <div class="form-group">
                                <label for="contact-email">Email aziendale *</label>
                                <input type="email" id="contact-email" name="contact_email" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact-company">Azienda *</label>
                                <input type="text" id="contact-company" name="contact_company" required>
                            </div>
                            <div class="form-group">
                                <label for="contact-phone">Telefono</label>
                                <input type="tel" id="contact-phone" name="contact_phone">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-service">Servizio di interesse *</label>
                            <select id="contact-service" name="contact_service" required>
                                <option value="">Seleziona un servizio</option>
                                <option value="formazione">Formazione AI</option>
                                <option value="automazioni">Automazioni AI</option>
                                <option value="agenti">Agenti AI</option>
                                <option value="consulenza">Consulenza Processi</option>
                                <option value="altro">Altro</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-message">Descrivi la tua esigenza *</label>
                            <textarea id="contact-message" name="contact_message" rows="4" required 
                                      placeholder="Raccontaci brevemente cosa vorresti migliorare nella tua azienda con l'AI..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="contact_privacy" required>
                                <span class="checkmark"></span>
                                Accetto la <a href="/privacy-policy" target="_blank">Privacy Policy</a> e i <a href="/termini-servizio" target="_blank">Termini di Servizio</a> *
                            </label>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-large btn-full">
                                Invia richiesta
                            </button>
                        </div>
                        
                        <div id="form-message" class="form-message"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
