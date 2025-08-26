<?php
/**
 * Landing Page AI Solutions - File Standalone
 * Replica fedele di https://preview--business-ai-launch.lovable.app/
 * 
 * File completamente autonomo - nessuna dipendenza WordPress
 * Posizionato nella root della cartella WordPress
 */

// Impostazioni PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Gestione form di contatto
$form_message = '';
if ($_POST && isset($_POST['contact_submit'])) {
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $azienda = htmlspecialchars($_POST['azienda'] ?? '');
    $servizio = htmlspecialchars($_POST['servizio'] ?? '');
    $budget = htmlspecialchars($_POST['budget'] ?? '');
    $messaggio = htmlspecialchars($_POST['messaggio'] ?? '');
    
    if ($nome && $email && $servizio && $messaggio) {
        $form_message = '<div class="success-message">Grazie! Ti ricontatteremo entro 24 ore.</div>';
        
        // Qui puoi aggiungere l'invio email o salvataggio database
        // mail('info@example.com', 'Nuova richiesta landing', "Nome: $nome\nEmail: $email\nAzienda: $azienda\nServizio: $servizio\nBudget: $budget\nMessaggio: $messaggio");
    } else {
        $form_message = '<div class="error-message">Compila tutti i campi obbligatori.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Solutions - Automazioni e Formazione AI per la tua Azienda</title>
    <meta name="description" content="Formazione, automazioni, agenti AI e consulenza strategica per trasformare i tuoi processi aziendali e accelerare la crescita">
    
    <!-- Open Graph -->
    <meta property="og:title" content="AI Solutions - Automazioni e Formazione AI per la tua Azienda">
    <meta property="og:description" content="Formazione, automazioni, agenti AI e consulenza strategica per trasformare i tuoi processi aziendali">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🤖</text></svg>">
    
    <style>
    /* Reset e base */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        line-height: 1.6;
        color: #333;
        overflow-x: hidden;
    }
    
    /* Variabili CSS */
    :root {
        --primary-color: #10b981;
        --secondary-color: #059669;
        --accent-color: #34d399;
        --text-dark: #111827;
        --text-light: #6b7280;
        --white: #ffffff;
        --gray-50: #fafafa;
        --gray-100: #f9fafb;
        --gray-200: #f3f4f6;
        --gray-300: #e5e7eb;
        --gray-800: #1f2937;
        --black: #000000;
        --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        --gradient-accent: linear-gradient(135deg, var(--accent-color) 0%, var(--primary-color) 100%);
        --gradient-dark: linear-gradient(135deg, var(--black) 0%, var(--gray-800) 100%);
    }
    
    /* Utility classes */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .btn {
        display: inline-block;
        padding: 18px 36px;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 15px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
        text-align: center;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        position: relative;
        overflow: hidden;
    }
    
    .btn-primary {
        background: var(--gradient-primary);
        color: var(--white);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
    }
    
    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .btn-primary:hover::before {
        left: 100%;
    }
    
    .btn-secondary {
        background: transparent;
        color: var(--white);
        border: 2px solid var(--primary-color);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.2);
    }
    
    .btn-secondary:hover {
        background: var(--primary-color);
        color: var(--white);
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
    }
    
    .btn-outline {
        background: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.1);
    }
    
    .btn-outline:hover {
        background: var(--primary-color);
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    }
    
    .btn-large {
        padding: 22px 44px;
        font-size: 16px;
    }
    
    .btn-full {
        width: 100%;
    }
    
    /* Header e navigazione */
    .header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.95);
        backdrop-filter: blur(20px);
        z-index: 1000;
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(16, 185, 129, 0.2);
    }
    
    .header.scrolled {
        background: rgba(0, 0, 0, 0.98);
        border-bottom: 1px solid var(--primary-color);
        box-shadow: var(--shadow-xl);
    }
    
    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 0;
    }
    
    .logo {
        font-size: 28px;
        font-weight: 800;
        color: var(--primary-color);
        text-decoration: none;
        letter-spacing: -0.5px;
    }
    
    .nav-menu {
        display: flex;
        list-style: none;
        gap: 40px;
    }
    
    .nav-menu a {
        color: var(--white);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
        padding: 8px 0;
    }
    
    .nav-menu a:hover {
        color: var(--primary-color);
    }
    
    .nav-menu a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary-color);
        transition: width 0.3s ease;
    }
    
    .nav-menu a:hover::after {
        width: 100%;
    }
    
    .mobile-menu-toggle {
        display: none;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: var(--text-dark);
    }
    
    /* Hero Section */
    .hero-section {
        background: var(--gradient-dark);
        color: var(--white);
        padding: 140px 0 100px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 80%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.05) 0%, transparent 50%);
        opacity: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
    }
    
    .hero-text {
        text-align: left;
    }
    
    .hero-title {
        font-size: 56px;
        font-weight: 800;
        margin-bottom: 32px;
        line-height: 1.1;
        animation: fadeInUp 1s ease-out;
        letter-spacing: -1px;
    }
    
    .hero-subtitle {
        font-size: 22px;
        margin-bottom: 48px;
        opacity: 0.9;
        animation: fadeInUp 1s ease-out 0.2s both;
        line-height: 1.6;
        color: var(--gray-200);
    }
    
    .hero-cta {
        margin-bottom: 48px;
        animation: fadeInUp 1s ease-out 0.4s both;
    }
    
    .hero-cta .btn {
        margin: 0 20px 20px 0;
        display: inline-block;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-size: 14px;
    }
    
    /* Trust Badge */
    .trust-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.3);
        border-radius: 25px;
        padding: 8px 16px;
        margin-bottom: 24px;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }
    
    .trust-badge:hover {
        background: rgba(16, 185, 129, 0.2);
        border-color: var(--primary-color);
        transform: translateY(-2px);
    }
    
    .badge-icon {
        font-size: 16px;
    }
    
    .badge-text {
        font-size: 14px;
        font-weight: 600;
        color: var(--primary-color);
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }
    

    
    /* Hero Credibility Bar */
    .hero-credibility {
        margin: 32px 0;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    
    .credibility-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 16px;
        background: rgba(16, 185, 129, 0.05);
        border: 1px solid rgba(16, 185, 129, 0.1);
        border-radius: 12px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    
    .credibility-item:hover {
        background: rgba(16, 185, 129, 0.1);
        border-color: var(--primary-color);
        transform: translateX(8px);
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.15);
    }
    
    .credibility-icon {
        font-size: 16px;
        color: var(--primary-color);
        font-weight: bold;
        flex-shrink: 0;
        width: 20px;
        text-align: center;
    }
    
    .credibility-text {
        font-size: 14px;
        color: var(--white);
        font-weight: 500;
        line-height: 1.4;
        letter-spacing: 0.3px;
    }
    
    /* Metodo Section */
    .metodo-section {
        background: var(--gradient-dark);
        color: var(--white);
        padding: 100px 0;
        position: relative;
    }
    
    .metodo-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--gradient-primary);
    }
    
    .metodo-steps {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        margin-top: 80px;
    }
    
    .metodo-step {
        background: rgba(16, 185, 129, 0.05);
        border: 1px solid rgba(16, 185, 129, 0.1);
        border-radius: 20px;
        padding: 32px 20px;
        text-align: center;
        transition: all 0.4s ease;
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
    }
    
    .metodo-step::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }
    
    .metodo-step:hover::before {
        transform: scaleX(1);
    }
    
    .metodo-step:hover {
        background: rgba(16, 185, 129, 0.1);
        border-color: var(--primary-color);
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.2);
    }
    
    .step-number {
        width: 60px;
        height: 60px;
        background: var(--gradient-primary);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 800;
        margin: 0 auto 24px;
        position: relative;
        z-index: 2;
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
    }
    
    .step-icon {
        font-size: 48px;
        margin-bottom: 24px;
        filter: drop-shadow(0 4px 8px rgba(16, 185, 129, 0.2));
    }
    
    .step-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 16px;
        color: var(--primary-color);
        letter-spacing: -0.5px;
        line-height: 1.3;
    }
    
    .step-duration {
        font-size: 16px;
        color: var(--primary-color);
        font-weight: 600;
        display: block;
        margin-top: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .step-description {
        color: var(--gray-200);
        line-height: 1.6;
        font-size: 16px;
        margin: 0;
        opacity: 0.9;
    }
    
    .hero-visual {
        position: relative;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .hero-image {
        position: relative;
        width: 100%;
        height: 100%;
    }
    
    .floating-card {
        position: absolute;
        background: rgba(16, 185, 129, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(16, 185, 129, 0.2);
        border-radius: 20px;
        padding: 24px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        animation: float 8s ease-in-out infinite;
        transition: all 0.3s ease;
    }
    
    .floating-card:hover {
        transform: translateY(-10px) scale(1.02);
        border-color: var(--primary-color);
        box-shadow: 0 30px 60px rgba(16, 185, 129, 0.2);
    }
    
    .floating-card.card-1 {
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }
    
    .floating-card.card-2 {
        top: 35%;
        right: 5%;
        animation-delay: 3s;
    }
    
    .floating-card.card-3 {
        bottom: 35%;
        left: 10%;
        animation-delay: 6s;
    }
    
    .floating-card.card-4 {
        bottom: 10%;
        right: 15%;
        animation-delay: 9s;
    }
    
    .card-icon {
        font-size: 36px;
        width: 56px;
        height: 56px;
        background: var(--gradient-primary);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
    }
    
    .card-content h4 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 6px;
        color: var(--white);
        letter-spacing: 0.5px;
    }
    
    .card-content p {
        font-size: 14px;
        opacity: 0.8;
        margin: 0;
        color: var(--gray-200);
        font-weight: 500;
    }
    
    /* Animazioni */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .nav-menu {
            display: none;
        }
        
        .mobile-menu-toggle {
            display: block;
            color: var(--white);
        }
        
        .hero-content {
            grid-template-columns: 1fr;
            gap: 60px;
            text-align: center;
        }
        
        .hero-text {
            text-align: center;
        }
        
        .hero-title {
            font-size: 40px;
        }
        
        .hero-subtitle {
            font-size: 18px;
        }
        
        .hero-cta .btn {
            display: block;
            margin: 15px auto;
            max-width: 320px;
        }
        

        
        .hero-credibility {
            margin: 24px 0;
            gap: 12px;
        }
        
        .credibility-item {
            padding: 10px 14px;
        }
        
        .credibility-text {
            font-size: 14px;
        }
        
        .hero-visual {
            height: 400px;
        }
        
        .floating-card {
            position: relative;
            top: auto;
            left: auto;
            right: auto;
            bottom: auto;
            margin: 15px;
            animation: none;
            transform: none;
        }
        
        .floating-card.card-1,
        .floating-card.card-2,
        .floating-card.card-3,
        .floating-card.card-4 {
            margin: 15px;
            width: calc(100% - 30px);
        }
        
        .process-steps {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        
        .process-connector {
            display: none;
        }
        
        .results-grid {
            grid-template-columns: 1fr;
        }
        
        .mission-content {
            flex-direction: column;
            text-align: center;
        }
        
        .mission-text {
            text-align: center;
        }
        
        .mission-stats {
            justify-content: center;
        }
        
        .mission-visual {
            margin-top: 50px;
        }
        
        .contact-content {
            grid-template-columns: 1fr;
            gap: 50px;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .services-grid {
            grid-template-columns: 1fr;
            max-width: 100%;
            gap: 40px;
        }
        
        .case-studies-grid,
        .testimonials-grid {
            grid-template-columns: 1fr;
        }
        
        .benefits-grid {
            grid-template-columns: 1fr;
        }
        
        .footer-content {
            grid-template-columns: 1fr;
            text-align: center;
        }
        
        .section-title {
            font-size: 32px;
        }
        
                .hero-section {
            padding: 120px 0 80px;
        }
        
        .metodo-section {
            padding: 80px 0;
        }
        
        .metodo-steps {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 60px;
        }
        
        .metodo-step {
            padding: 28px 16px;
        }

        .why-us-section,
        .mission-section,
        .process-section,
        .services-section,
        .case-studies-section,
        .testimonials-section,
        .final-cta-section,
        .contact-section {
            padding: 80px 0;
        }
        
        .features-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
        
        .feature-card {
            padding: 36px 28px;
        }
        
        .service-card {
            padding: 32px 24px;
        }
        
        .case-study-card {
            padding: 32px 24px;
        }
    }
    
    @media (max-width: 480px) {
        .container {
            padding: 0 20px;
        }
        
        .hero-title {
            font-size: 32px;
        }
        
        .hero-subtitle {
            font-size: 16px;
        }
        
        .btn {
            padding: 16px 28px;
            font-size: 14px;
        }
        
        .btn-large {
            padding: 18px 36px;
            font-size: 15px;
        }
        
        .section-title {
            font-size: 28px;
        }
        
        .feature-card,
        .service-card,
        .case-study-card {
            padding: 28px 20px;
        }
        
        .contact-form {
            padding: 32px 24px;
        }
    }
    
    /* Tablet responsive per le floating cards */
    @media (max-width: 1024px) and (min-width: 769px) {
        .floating-card.card-1 {
            top: 8%;
            left: 3%;
        }
        
        .floating-card.card-2 {
            top: 30%;
            right: 3%;
        }
        
        .floating-card.card-3 {
            bottom: 30%;
            left: 8%;
        }
        
        .floating-card.card-4 {
            bottom: 8%;
            right: 12%;
        }
    }
    
    /* Sezioni principali */
    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .section-title {
        font-size: 36px;
        font-weight: 600;
        margin-bottom: 24px;
        color: var(--text-dark);
    }
    
    .section-intro {
        font-size: 18px;
        max-width: 800px;
        margin: 0 auto;
        color: var(--text-light);
    }
    
    .section-subtitle {
        font-size: 20px;
        color: var(--text-light);
        margin-bottom: 40px;
    }
    
    /* Why Us Section */
    .why-us-section {
        background: var(--white);
        padding: 100px 0;
        position: relative;
    }
    
    .why-us-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--gradient-primary);
    }
    
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
    }
    
    .feature-card {
        background: var(--white);
        padding: 48px 36px;
        border-radius: 24px;
        text-align: center;
        transition: all 0.4s ease;
        border: 1px solid var(--gray-200);
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
    }
    
    .feature-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px rgba(16, 185, 129, 0.15);
        border-color: var(--primary-color);
    }
    
    .feature-icon {
        font-size: 72px;
        margin-bottom: 32px;
        animation: float 4s ease-in-out infinite;
        display: inline-block;
        filter: drop-shadow(0 8px 16px rgba(16, 185, 129, 0.2));
    }
    
    .feature-card h3 {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text-dark);
        letter-spacing: -0.5px;
    }
    
    .feature-card p {
        color: var(--text-light);
        margin-bottom: 32px;
        line-height: 1.7;
        font-size: 16px;
    }
    
    .feature-stats {
        display: flex;
        justify-content: space-around;
        margin-top: 28px;
        flex-wrap: wrap;
        gap: 24px;
    }
    
    .stat {
        text-align: center;
        flex: 1;
        min-width: 100px;
    }
    
    .stat-number {
        font-size: 32px;
        font-weight: 800;
        color: var(--primary-color);
        display: block;
        margin-bottom: 8px;
        letter-spacing: -1px;
    }
    
    .stat-label {
        font-size: 14px;
        color: var(--text-light);
        opacity: 0.9;
        line-height: 1.4;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Mission Section */
    .mission-section {
        background: var(--gradient-dark);
        color: var(--white);
        padding: 100px 0;
        text-align: center;
        position: relative;
    }
    
    .mission-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 30% 70%, rgba(16, 185, 129, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 70% 30%, rgba(16, 185, 129, 0.05) 0%, transparent 50%);
        opacity: 1;
    }
    
    .mission-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 60px;
        position: relative;
        z-index: 2;
    }

    .mission-text {
        flex: 1;
        text-align: left;
    }

    .mission-text h2 {
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 28px;
        color: var(--white);
        letter-spacing: -1px;
        line-height: 1.2;
    }

    .mission-text p {
        font-size: 22px;
        max-width: 800px;
        margin: 0;
        opacity: 0.9;
        color: var(--gray-200);
        line-height: 1.6;
        margin-bottom: 40px;
    }

    .mission-stats {
        display: flex;
        justify-content: space-around;
        margin-top: 48px;
        flex-wrap: wrap;
        gap: 32px;
    }

    .mission-stat {
        text-align: center;
        flex: 1;
        min-width: 140px;
        padding: 24px;
        background: rgba(16, 185, 129, 0.1);
        border-radius: 20px;
        border: 1px solid rgba(16, 185, 129, 0.2);
        backdrop-filter: blur(10px);
    }

    .mission-stat-number {
        font-size: 36px;
        font-weight: 800;
        color: var(--primary-color);
        display: block;
        margin-bottom: 8px;
        letter-spacing: -1px;
    }

    .mission-stat-label {
        font-size: 14px;
        color: var(--white);
        opacity: 0.9;
        line-height: 1.4;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .mission-visual {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mission-icon {
        font-size: 140px;
        color: var(--primary-color);
        filter: drop-shadow(0 20px 40px rgba(16, 185, 129, 0.3));
        animation: float 6s ease-in-out infinite;
    }
    
    /* Process Section */
    .process-section {
        background: var(--white);
        padding: 100px 0;
        position: relative;
    }
    
    .process-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--gradient-primary);
    }
    
    .process-steps {
        display: grid;
        grid-template-columns: 1fr auto 1fr auto 1fr;
        gap: 30px;
        margin-top: 80px;
        align-items: start;
    }
    
    .process-step {
        text-align: center;
        position: relative;
        background: var(--white);
        padding: 40px 32px;
        border-radius: 20px;
        border: 1px solid var(--gray-200);
        transition: all 0.4s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .process-step:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.15);
        border-color: var(--primary-color);
    }
    
    .step-number {
        width: 72px;
        height: 72px;
        background: var(--gradient-primary);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: 800;
        margin: 0 auto 32px;
        position: relative;
        z-index: 2;
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    }
    
    .process-step h3 {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text-dark);
        letter-spacing: -0.5px;
    }
    
    .process-step p {
        color: var(--text-light);
        margin-bottom: 24px;
        line-height: 1.7;
        font-size: 16px;
    }
    
    .step-details {
        background: var(--gray-100);
        padding: 24px;
        border-radius: 16px;
        margin-top: 24px;
        text-align: left;
        font-size: 14px;
        color: var(--text-dark);
        border: 1px solid var(--gray-200);
    }
    
    .step-details ul {
        list-style: none;
        padding-left: 24px;
        margin: 0;
    }
    
    .step-details li {
        margin-bottom: 12px;
        position: relative;
        line-height: 1.5;
        font-weight: 500;
    }
    
    .step-details li::before {
        content: '✓';
        position: absolute;
        left: -20px;
        color: var(--primary-color);
        font-weight: bold;
        font-size: 16px;
    }
    
    .process-connector {
        width: 3px;
        height: 100px;
        background: var(--gradient-primary);
        margin: 50px auto 0;
        position: relative;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }
    
    .process-connector::before {
        content: '→';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: var(--primary-color);
        font-size: 24px;
        background: var(--white);
        padding: 8px;
        border-radius: 50%;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
    }
    
    /* Services Section */
    .services-section {
        background: var(--gray-100);
        padding: 100px 0;
        position: relative;
    }
    
    .services-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--gradient-primary);
    }
    
    .services-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 60px;
        margin-bottom: 80px;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .service-card {
        background: var(--white);
        padding: 40px 32px;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.4s ease;
        position: relative;
        border: 1px solid var(--gray-200);
        overflow: hidden;
    }
    
    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }
    
    .service-card:hover::before {
        transform: scaleX(1);
    }
    
    .service-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px rgba(16, 185, 129, 0.15);
        border-color: var(--primary-color);
    }
    
    .service-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--gradient-primary);
        color: var(--white);
        padding: 10px 16px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        display: inline-block;
        z-index: 1;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        letter-spacing: 0.5px;
    }
    
    .service-icon {
        font-size: 56px;
        margin-bottom: 28px;
        text-align: center;
        filter: drop-shadow(0 8px 16px rgba(16, 185, 129, 0.2));
    }
    
    .service-card h3 {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 16px;
        color: var(--text-dark);
        letter-spacing: -0.5px;
    }
    
    .service-subtitle {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 24px;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .service-price {
        display: flex;
        align-items: baseline;
        gap: 8px;
        margin-bottom: 24px;
        color: var(--primary-color);
        font-weight: 800;
        justify-content: center;
    }
    
    .price-amount {
        font-size: 40px;
        letter-spacing: -1px;
    }
    
    .price-period {
        font-size: 16px;
        opacity: 0.8;
        font-weight: 600;
    }
    
    .service-features {
        list-style: none;
        margin-bottom: 24px;
    }
    
    .service-features li {
        padding: 8px 0;
        color: var(--text-light);
        position: relative;
        padding-left: 20px;
    }
    
    .service-features li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary-color);
        font-weight: bold;
    }
    
    .services-cta {
        text-align: center;
    }
    
    /* Case Studies Section */
    .case-studies-section {
        background: var(--white);
        padding: 100px 0;
        position: relative;
    }
    
    .case-studies-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--gradient-primary);
    }
    
    .case-studies-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
        gap: 40px;
        margin-bottom: 80px;
    }
    
    .case-study-card {
        background: var(--gray-100);
        padding: 40px 32px;
        border-radius: 20px;
        transition: all 0.4s ease;
        border: 1px solid var(--gray-200);
        position: relative;
        overflow: hidden;
    }
    
    .case-study-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }
    
    .case-study-card:hover::before {
        transform: scaleX(1);
    }
    
    .case-study-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.15);
        border-color: var(--primary-color);
    }
    
    .case-study-card h3 {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 16px;
        color: var(--text-dark);
        letter-spacing: -0.5px;
    }
    
    .completion-time {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 20px;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .case-description {
        margin-bottom: 24px;
        color: var(--text-light);
        line-height: 1.7;
        font-size: 16px;
    }
    
    .case-results h4 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text-dark);
        text-align: center;
        letter-spacing: -0.5px;
    }
    
    .results-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 20px;
        margin-bottom: 32px;
    }
    
    .result-item {
        text-align: center;
        padding: 20px;
        background: var(--white);
        border-radius: 16px;
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
    }
    
    .result-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.15);
        border-color: var(--primary-color);
    }
    
    .result-number {
        display: block;
        font-size: 28px;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 10px;
        letter-spacing: -1px;
    }
    
    .result-label {
        font-size: 13px;
        color: var(--text-light);
        line-height: 1.4;
        display: block;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Testimonials Section */
    .testimonials-section {
        background: var(--gray-100);
        padding: 80px 0;
    }
    
    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 32px;
        margin-bottom: 40px;
    }
    
    .testimonial-card {
        background: var(--white);
        padding: 32px 24px;
        border-radius: 12px;
        box-shadow: var(--shadow-sm);
        text-align: center;
    }
    
    .testimonial-rating {
        margin-bottom: 20px;
    }
    
    .star {
        color: #fbbf24;
        font-size: 20px;
    }
    
    .testimonial-quote p {
        font-style: italic;
        margin-bottom: 20px;
        color: var(--text-light);
        line-height: 1.6;
    }
    
    .testimonial-author strong {
        display: block;
        color: var(--text-dark);
        margin-bottom: 4px;
    }
    
    .testimonial-author span {
        color: var(--text-light);
        font-size: 14px;
    }
    
    .overall-rating {
        text-align: center;
        font-size: 18px;
        color: var(--text-dark);
    }
    
    .overall-rating .star {
        font-size: 24px;
        margin-right: 8px;
    }
    
    /* Final CTA Section */
    .final-cta-section {
        background: var(--gradient-dark);
        color: var(--white);
        padding: 100px 0;
        text-align: center;
        position: relative;
    }
    
    .final-cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 25% 75%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 75% 25%, rgba(16, 185, 129, 0.08) 0%, transparent 50%);
        opacity: 1;
    }
    
    .final-cta-section .section-title,
    .final-cta-section .section-intro {
        color: var(--white);
        position: relative;
        z-index: 2;
    }
    
    .final-cta-button {
        margin-bottom: 80px;
        position: relative;
        z-index: 2;
    }
    
    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 40px;
        position: relative;
        z-index: 2;
    }
    
    .benefit-card {
        text-align: center;
        padding: 40px 32px;
        background: rgba(16, 185, 129, 0.1);
        border-radius: 20px;
        border: 1px solid rgba(16, 185, 129, 0.2);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }
    
    .benefit-card:hover {
        transform: translateY(-8px);
        background: rgba(16, 185, 129, 0.15);
        border-color: var(--primary-color);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.2);
    }
    
    .benefit-icon {
        font-size: 56px;
        margin-bottom: 24px;
        filter: drop-shadow(0 8px 16px rgba(16, 185, 129, 0.3));
    }
    
    .benefit-card h3 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
        letter-spacing: -0.5px;
    }
    
    .benefit-card p {
        opacity: 0.9;
        line-height: 1.7;
        color: var(--gray-200);
        font-size: 16px;
    }
    
    /* Contact Section */
    .contact-section {
        background: var(--white);
        padding: 100px 0;
        position: relative;
    }
    
    .contact-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--gradient-primary);
    }
    
    .contact-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        margin-top: 60px;
        position: relative;
        z-index: 2;
    }
    
    .contact-info h3 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text-dark);
        letter-spacing: -0.5px;
    }
    
    .contact-info p {
        color: var(--text-light);
        margin-bottom: 40px;
        line-height: 1.7;
        font-size: 16px;
    }
    
    .contact-details {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .contact-item {
        display: flex;
        align-items: center;
        gap: 16px;
        color: var(--text-dark);
        padding: 20px;
        background: var(--gray-100);
        border-radius: 16px;
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
    }
    
    .contact-item:hover {
        background: rgba(16, 185, 129, 0.05);
        border-color: var(--primary-color);
        transform: translateX(8px);
    }
    
    .contact-icon {
        font-size: 24px;
        color: var(--primary-color);
    }
    
    .contact-form {
        background: var(--gray-100);
        padding: 40px;
        border-radius: 20px;
        border: 1px solid var(--gray-200);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin-bottom: 24px;
    }
    
    .form-group {
        margin-bottom: 24px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: var(--text-dark);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 16px;
        border: 2px solid var(--gray-300);
        border-radius: 12px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: var(--white);
        font-family: inherit;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        cursor: pointer;
    }
    
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        transform: translateY(-2px);
    }
    
    /* Stile personalizzato per le select */
    .form-group select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%2310b981' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 20px;
        padding-right: 48px;
        position: relative;
        color: var(--text-dark);
        font-weight: 500;
    }
    
    .form-group select:hover {
        border-color: var(--primary-color);
        background-color: var(--gray-50);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);
    }
    
    .form-group select option {
        background: var(--white);
        color: var(--text-dark);
        padding: 12px;
        font-size: 16px;
        font-weight: 500;
    }
    
    .form-group select option:hover {
        background: var(--primary-color);
        color: var(--white);
    }
    
    .form-group select option:checked {
        background: var(--primary-color);
        color: var(--white);
        font-weight: 600;
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }
    
    /* Footer */
    .footer {
        background: var(--gradient-dark);
        color: var(--white);
        padding: 80px 0 30px;
        position: relative;
    }
    
    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--gradient-primary);
    }
    
    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 50px;
        margin-bottom: 60px;
        position: relative;
        z-index: 2;
    }
    
    .footer-section h3,
    .footer-section h4 {
        margin-bottom: 24px;
        color: var(--white);
        font-weight: 700;
        letter-spacing: -0.5px;
    }
    
    .footer-section h3 {
        font-size: 28px;
        color: var(--primary-color);
    }
    
    .footer-section h4 {
        font-size: 20px;
        color: var(--white);
    }
    
    .footer-section p {
        color: var(--gray-200);
        line-height: 1.7;
        margin-bottom: 20px;
        font-size: 16px;
    }
    
    .footer-section ul {
        list-style: none;
    }
    
    .footer-section ul li {
        margin-bottom: 12px;
    }
    
    .footer-section ul li a {
        color: var(--gray-200);
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
        position: relative;
        padding-left: 0;
    }
    
    .footer-section ul li a::before {
        content: '→';
        position: absolute;
        left: -20px;
        color: var(--primary-color);
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .footer-section ul li a:hover {
        color: var(--primary-color);
        padding-left: 20px;
    }
    
    .footer-section ul li a:hover::before {
        opacity: 1;
    }
    
    .social-links {
        display: flex;
        gap: 20px;
        margin-top: 24px;
    }
    
    .social-links a {
        font-size: 28px;
        transition: all 0.3s ease;
        color: var(--gray-200);
        padding: 12px;
        border-radius: 12px;
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.2);
    }
    
    .social-links a:hover {
        transform: translateY(-4px) scale(1.1);
        color: var(--primary-color);
        background: rgba(16, 185, 129, 0.2);
        border-color: var(--primary-color);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    }
    
    .footer-bottom {
        border-top: 1px solid rgba(16, 185, 129, 0.2);
        padding-top: 30px;
        text-align: center;
        color: var(--gray-200);
        position: relative;
        z-index: 2;
    }
    
    /* Message styles */
    .success-message {
        background: rgba(16, 185, 129, 0.1);
        color: var(--primary-color);
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 32px;
        text-align: center;
        border: 1px solid rgba(16, 185, 129, 0.3);
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.1);
    }
    
    .error-message {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 32px;
        text-align: center;
        border: 1px solid rgba(239, 68, 68, 0.3);
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.1);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .contact-content {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .services-grid {
            grid-template-columns: 1fr;
            max-width: 100%;
            gap: 40px;
        }
        
        .case-studies-grid,
        .testimonials-grid {
            grid-template-columns: 1fr;
        }
        
        .process-steps {
            grid-template-columns: 1fr;
        }
        
        .benefits-grid {
            grid-template-columns: 1fr;
        }
        
        .footer-content {
            grid-template-columns: 1fr;
            text-align: center;
        }
        
        .section-title {
            font-size: 28px;
        }
        
        .hero-section {
            padding: 100px 0 60px;
        }

        .mission-content {
            flex-direction: column;
            text-align: center;
        }

        .mission-text {
            text-align: center;
        }

        .mission-stats {
            justify-content: center;
        }

        .mission-visual {
            margin-top: 40px;
        }
    }
    
    @media (max-width: 480px) {
        .container {
            padding: 0 16px;
        }
        
        .hero-title {
            font-size: 28px;
        }
        
        .hero-subtitle {
            font-size: 16px;
        }
        
        .metodo-section {
            padding: 60px 0;
        }
        
        .metodo-steps {
            grid-template-columns: 1fr;
            gap: 20px;
            margin-top: 50px;
        }
        
        .metodo-step {
            padding: 24px 16px;
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
        
        .step-icon {
            font-size: 40px;
        }
        
        .step-title {
            font-size: 18px;
        }
        
        .step-description {
            font-size: 15px;
        }
        

        
        .hero-credibility {
            margin: 20px 0;
            gap: 10px;
        }
        
        .credibility-item {
            padding: 8px 12px;
        }
        
        .credibility-text {
            font-size: 13px;
        }
        
        .btn {
            padding: 14px 24px;
            font-size: 14px;
        }
        
        .btn-large {
            padding: 16px 32px;
            font-size: 16px;
        }
    }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <div class="nav-container">
                <a href="#" class="logo">🤖 AI Solutions</a>
                <nav>
                    <ul class="nav-menu">
                        <li><a href="#why-us">Perché Noi</a></li>
                        <li><a href="#services">Servizi</a></li>
                        <li><a href="#case-studies">Casi Studio</a></li>
                        <li><a href="#testimonials">Testimonial</a></li>
                        <li><a href="#contact">Contatti</a></li>
                    </ul>
                </nav>
                <button class="mobile-menu-toggle" id="mobile-menu-toggle">☰</button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section" id="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                                        
                    <!-- Headline Principale -->
                    <h1 class="hero-title">
                        Quante ore al giorno i tuoi dipendenti perdono in attività ripetitive?
                    </h1>
                    
                    <!-- Sottotitolo Esplicativo -->
                    <p class="hero-subtitle">
                        Analizziamo insieme i processi che rubano tempo ai tuoi dipendenti e li trasformiamo in automazioni intelligenti. 
                        <strong>Un progetto alla volta, con formazione completa per renderti autonomo.</strong>
                    </p>
                    
                    <!-- Barra Credibilità -->
                    <div class="hero-credibility">
                        <div class="credibility-item">
                            <span class="credibility-icon">✓</span>
                            <span class="credibility-text">Metodologia step-by-step collaudata</span>
                        </div>
                        <div class="credibility-item">
                            <span class="credibility-icon">✓</span>
                            <span class="credibility-text">Automazioni su misura per PMI italiane</span>
                        </div>
                        <div class="credibility-item">
                            <span class="credibility-icon">✓</span>
                            <span class="credibility-text">Dal manuale all'automatico: un progetto alla volta</span>
                        </div>
                    </div>
                    
                    <!-- CTA Principale -->
                    <div class="hero-cta">
                        <a href="#contact" class="btn btn-primary">
                            🎯 Scopri quanto puoi risparmiare - Analisi gratuita 30min
                        </a>
                        <a href="#case-studies" class="btn btn-secondary">📊 Guarda i nostri casi studio</a>
                    </div>
                </div>
                
                <div class="hero-visual">
                    <div class="hero-image">
                        <!-- Benefits Cards fluttuanti -->
                        <div class="floating-card card-1">
                            <div class="card-icon">⏰</div>
                            <div class="card-content">
                                <h4>Risparmio Tempo & Denaro</h4>
                                <p>Media 6 ore/giorno recuperate</p>
                            </div>
                        </div>
                        <div class="floating-card card-2">
                            <div class="card-icon">😊</div>
                            <div class="card-content">
                                <h4>Team Più Soddisfatto</h4>
                                <p>Focus su attività strategiche</p>
                            </div>
                        </div>
                        <div class="floating-card card-3">
                            <div class="card-icon">✅</div>
                            <div class="card-content">
                                <h4>Zero Errori Umani</h4>
                                <p>Processi sempre perfetti</p>
                            </div>
                        </div>
                        <div class="floating-card card-4">
                            <div class="card-icon">📈</div>
                            <div class="card-content">
                                <h4>Crescita Aziendale</h4>
                                <p>+40% produttività media</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Metodo Section -->
    <section class="metodo-section" id="metodo">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Dal manuale all'automatico in 4 step</h2>
                <p class="section-intro">
                    Il nostro processo trasparente per trasformare i tuoi processi ripetitivi
                </p>
            </div>
            
            <div class="metodo-steps">
                <div class="metodo-step">
                    <div class="step-number">1</div>
                    <div class="step-icon">📞</div>
                    <div class="step-content">
                        <h3 class="step-title">CALL ESPLORATIVA <span class="step-duration">(30min - GRATUITA)</span></h3>
                        <p class="step-description">Capiamo la tua azienda e identifichiamo le prime 3 opportunità di automazione</p>
                    </div>
                </div>
                
                <div class="metodo-step">
                    <div class="step-number">2</div>
                    <div class="step-icon">🔍</div>
                    <div class="step-content">
                        <h3 class="step-title">AUDIT APPROFONDITO <span class="step-duration">(2-3 ore)</span></h3>
                        <p class="step-description">Analizziamo insieme tutti i processi automatizzabili e definiamo le priorità</p>
                    </div>
                </div>
                
                <div class="metodo-step">
                    <div class="step-number">3</div>
                    <div class="step-icon">⚙️</div>
                    <div class="step-content">
                        <h3 class="step-title">SVILUPPO + TEST</h3>
                        <p class="step-description">Creiamo l'automazione su misura e la testiamo insieme al tuo team</p>
                    </div>
                </div>
                
                <div class="metodo-step">
                    <div class="step-number">4</div>
                    <div class="step-icon">🎓</div>
                    <div class="step-content">
                        <h3 class="step-title">FORMAZIONE + GO-LIVE + ASSISTENZA</h3>
                        <p class="step-description">Ti rendiamo completamente autonomo con supporto continuo quando serve</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="why-us-section" id="why-us">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Perché scegliere noi</h2>
                <p class="section-intro">
                    Specializzati nell'implementazione di soluzioni AI per aziende di ogni dimensione, 
                    ci impegniamo a fornire risultati misurabili e un supporto continuo.
                </p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3>Esperienza Consolidata</h3>
                    <p>Oltre 5 anni di esperienza nell'implementazione di soluzioni AI per aziende di diversi settori.</p>
                    <div class="feature-stats">
                        <div class="stat">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Progetti completati</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">95%</span>
                            <span class="stat-label">Soddisfazione clienti</span>
                        </div>
                    </div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Approccio Personalizzato</h3>
                    <p>Ogni soluzione è progettata su misura per le specifiche esigenze della tua azienda.</p>
                    <div class="feature-stats">
                        <div class="stat">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Soluzioni custom</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">24h</span>
                            <span class="stat-label">Supporto dedicato</span>
                        </div>
                    </div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Focus sui Risultati</h3>
                    <p>Ci concentriamo su metriche concrete e ROI misurabile per ogni progetto.</p>
                    <div class="feature-stats">
                        <div class="stat">
                            <span class="stat-number">+40%</span>
                            <span class="stat-label">Efficienza media</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">6 mesi</span>
                            <span class="stat-label">ROI medio</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section" id="mission">
        <div class="container">
            <div class="mission-content">
                <div class="mission-text">
                    <h2>La nostra missione</h2>
                    <p>
                        Democratizzare l'accesso alle tecnologie AI per le aziende italiane, 
                        fornendo soluzioni pratiche e accessibili che generino valore immediato 
                        e sostenibile nel tempo.
                    </p>
                    <div class="mission-stats">
                        <div class="mission-stat">
                            <span class="mission-stat-number">200+</span>
                            <span class="mission-stat-label">Aziende servite</span>
                        </div>
                        <div class="mission-stat">
                            <span class="mission-stat-number">15+</span>
                            <span class="mission-stat-label">Settori coperti</span>
                        </div>
                        <div class="mission-stat">
                            <span class="mission-stat-number">€2M+</span>
                            <span class="mission-stat-label">Valore generato</span>
                        </div>
                    </div>
                </div>
                <div class="mission-visual">
                    <div class="mission-icon">🚀</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section" id="process">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Come lavoriamo insieme</h2>
                <p class="section-subtitle">Il nostro processo di trasformazione in 3 fasi</p>
            </div>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3>Analisi</h3>
                    <p>Valutiamo i tuoi processi attuali e identifichiamo le opportunità di miglioramento con l'AI.</p>
                    <div class="step-details">
                        <ul>
                            <li>Audit dei processi esistenti</li>
                            <li>Identificazione delle inefficienze</li>
                            <li>Definizione degli obiettivi</li>
                        </ul>
                    </div>
                </div>
                <div class="process-connector"></div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3>Implementazione</h3>
                    <p>Sviluppiamo e implementiamo le soluzioni AI personalizzate per la tua azienda.</p>
                    <div class="step-details">
                        <ul>
                            <li>Sviluppo soluzioni custom</li>
                            <li>Integrazione con sistemi esistenti</li>
                            <li>Test e validazione</li>
                        </ul>
                    </div>
                </div>
                <div class="process-connector"></div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3>Supporto</h3>
                    <p>Ti accompagniamo nel percorso di adozione con formazione e supporto continuo.</p>
                    <div class="step-details">
                        <ul>
                            <li>Formazione del team</li>
                            <li>Monitoraggio performance</li>
                            <li>Ottimizzazioni continue</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">I nostri servizi</h2>
                <p class="section-intro">
                    Trasformiamo la tua azienda con soluzioni AI su misura: 
                    dalle automazioni intelligenti alla formazione avanzata del team.
                </p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">⚡</div>
                    <h3>Automazioni AI Custom</h3>
                    <p class="service-subtitle">FLUSSI INTELLIGENTI PER PROCESSI AZIENDALI</p>
                    <ul class="service-features">
                        <li>Creazione flussi di lavoro intelligenti con AI</li>
                        <li>Agenti AI personalizzati per processi specifici</li>
                        <li>Automazione completa documenti e report</li>
                        <li>Integrazione seamless con sistemi esistenti</li>
                    </ul>
                    <a href="#contact" class="btn btn-outline">Scopri di più</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">🎓</div>
                    <h3>Formazione AI Aziendale</h3>
                    <p class="service-subtitle">WORKSHOP E CORSI PER TEAM E PRIVATI</p>
                    <ul class="service-features">
                        <li>Masterclass su ChatGPT e AI generative</li>
                        <li>Formazione pratica per team aziendali</li>
                        <li>Certificazioni riconosciute a livello nazionale</li>
                        <li>Supporto continuo post-formazione</li>
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

    <!-- Case Studies Section -->
    <section class="case-studies-section" id="case-studies">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Casi di successo</h2>
                <p class="section-intro">
                    Scopri come abbiamo trasformato i processi dei nostri clienti 
                    con soluzioni AI innovative e personalizzate.
                </p>
            </div>
            <div class="case-studies-grid">
                <div class="case-study-card">
                    <h3>Azienda d'Assistenza IT</h3>
                    <p class="completion-time">Completato in 3 mesi</p>
                    <p class="case-description">
                        Gestione delle scadenze con gestionale custom e automazione invii continua 
                        per ottimizzare i processi di assistenza tecnica.
                    </p>
                    <div class="case-results">
                        <h4>Risultati</h4>
                        <div class="results-grid">
                            <div class="result-item">
                                <span class="result-number">-65%</span>
                                <span class="result-label">Costo per acquisizione</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">+40%</span>
                                <span class="result-label">Tasso di conversione</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">+300%</span>
                                <span class="result-label">Documenti generati</span>
                            </div>
                        </div>
                    </div>
                    <a href="#contact" class="btn btn-outline">Scopri di più</a>
                </div>
                
                <div class="case-study-card">
                    <h3>Concessionaria</h3>
                    <p class="completion-time">Completato in 2 mesi</p>
                    <p class="case-description">
                        Ricerca sui portali automobilistici delle migliori offerte d'acquisto 
                        per la rivendita con automazione intelligente.
                    </p>
                    <div class="case-results">
                        <h4>Risultati</h4>
                        <div class="results-grid">
                            <div class="result-item">
                                <span class="result-number">-80%</span>
                                <span class="result-label">Tempo per documenti</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">+150%</span>
                                <span class="result-label">Produttività team</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">+200%</span>
                                <span class="result-label">Contratti analizzati</span>
                            </div>
                        </div>
                    </div>
                    <a href="#contact" class="btn btn-outline">Scopri di più</a>
                </div>
                
                <div class="case-study-card">
                    <h3>Agenzia Web</h3>
                    <p class="completion-time">Completato in 4 mesi</p>
                    <p class="case-description">
                        Automazione per invio mensile di report con messaggio custom 
                        creato dall'AI per i clienti.
                    </p>
                    <div class="case-results">
                        <h4>Risultati</h4>
                        <div class="results-grid">
                            <div class="result-item">
                                <span class="result-number">-45%</span>
                                <span class="result-label">Tempo per report</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">+60%</span>
                                <span class="result-label">Soddisfazione clienti</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">+180%</span>
                                <span class="result-label">Report generati</span>
                            </div>
                        </div>
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

    <!-- Testimonials Section -->
    <section class="testimonials-section" id="testimonials">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Cosa dicono i nostri clienti</h2>
                <p class="section-intro">
                    I risultati parlano da soli. I nostri clienti testimoniano 
                    miglioramenti concreti e soddisfazione garantita.
                </p>
            </div>
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

    <!-- Final CTA Section -->
    <section class="final-cta-section" id="final-cta">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Inizia la tua trasformazione AI oggi</h2>
                <p class="section-intro">
                    Prenota una consulenza gratuita di 30 minuti e scopri come l'AI 
                    può trasformare la tua azienda.
                </p>
            </div>
            <div class="final-cta-button">
                <a href="#contact" class="btn btn-primary btn-large">
                    Prenota la tua consulenza gratuita
                </a>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">⏰</div>
                    <h3>30 minuti di valore</h3>
                    <p>Consulenza mirata e personalizzata per identificare le opportunità specifiche per la tua azienda.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">👨‍💼</div>
                    <h3>Esperti dedicati</h3>
                    <p>Incontro con i nostri specialisti AI con esperienza specifica nel tuo settore.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">📋</div>
                    <h3>Piano d'azione</h3>
                    <p>Riceverai un piano personalizzato con step concreti per iniziare la tua trasformazione AI.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section" id="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Contattaci per una consulenza gratuita</h2>
                <p class="section-intro">
                    Compila il form e ti ricontatteremo entro 24 ore per programmare la tua consulenza gratuita.
                </p>
            </div>
            
            <?php if ($form_message): ?>
                <?php echo $form_message; ?>
            <?php endif; ?>
            
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Parlaci della tua azienda</h3>
                    <p>Ti aiuteremo a identificare le migliori opportunità di implementazione AI per i tuoi processi.</p>
                    
                    <div class="contact-details">
                        <div class="contact-item">
                            <span class="contact-icon">📧</span>
                            <span>info@aisolutions.it</span>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📞</span>
                            <span>+39 02 1234 5678</span>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📍</span>
                            <span>Milano, Italia</span>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form">
                    <form method="post" action="">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome">Nome completo *</label>
                                <input type="text" id="nome" name="nome" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email aziendale *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                        
                                                 <div class="form-row">
                             <div class="form-group">
                                 <label for="azienda">Azienda *</label>
                                 <input type="text" id="azienda" name="azienda" required>
                             </div>
                             <div class="form-group">
                                 <label for="telefono">Telefono</label>
                                 <input type="tel" id="telefono" name="telefono">
                             </div>
                         </div>
                         
                         <div class="form-row">
                             <div class="form-group">
                                 <label for="servizio">Servizio di interesse *</label>
                                 <select id="servizio" name="servizio" required>
                                     <option value="">Seleziona un servizio</option>
                                     <option value="automazione-processi">Automazione di processi</option>
                                     <option value="formazione">Formazione</option>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="budget">Budget stimato</label>
                                 <select id="budget" name="budget">
                                     <option value="">Seleziona budget</option>
                                     <option value="1k-5k">€1.000 - €5.000</option>
                                     <option value="5k-15k">€5.000 - €15.000</option>
                                     <option value="15k-50k">€15.000 - €50.000</option>
                                     <option value="50k+">€50.000+</option>
                                     <option value="da-definire">Da definire</option>
                                 </select>
                             </div>
                         </div>
                        
                        <div class="form-group">
                            <label for="messaggio">Descrivi la tua esigenza *</label>
                            <textarea id="messaggio" name="messaggio" rows="4" required 
                                      placeholder="Raccontaci brevemente cosa vorresti migliorare nella tua azienda con l'AI..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="contact_submit" class="btn btn-primary btn-large btn-full">
                                Invia richiesta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer */
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>AI Solutions</h3>
                    <p>Trasformiamo le aziende italiane con soluzioni AI innovative e personalizzate.</p>
                    <div class="social-links">
                        <a href="#" aria-label="LinkedIn">🔗</a>
                        <a href="#" aria-label="Twitter">🐦</a>
                        <a href="#" aria-label="Facebook">📘</a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Servizi</h4>
                    <ul>
                        <li><a href="#services">Formazione AI</a></li>
                        <li><a href="#services">Automazioni</a></li>
                        <li><a href="#services">Agenti AI</a></li>
                        <li><a href="#services">Consulenza</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Azienda</h4>
                    <ul>
                        <li><a href="#why-us">Chi siamo</a></li>
                        <li><a href="#case-studies">Casi studio</a></li>
                        <li><a href="#testimonials">Testimonial</a></li>
                        <li><a href="#contact">Contatti</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contatti</h4>
                    <p>📧 info@aisolutions.it</p>
                    <p>📞 +39 02 1234 5678</p>
                    <p>📍 Milano, Italia</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 AI Solutions. Tutti i diritti riservati.</p>
            </div>
        </div>
    </footer>



    <script>
    // Smooth scrolling per i link interni
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

    // Header sticky con effetto scroll
    window.addEventListener('scroll', function() {
        const header = document.getElementById('header');
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileMenuToggle && navMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }

    // Intersection Observer per animazioni
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Osserva tutti gli elementi che devono essere animati
    document.querySelectorAll('.feature-card, .service-card, .case-study-card, .testimonial-card, .process-step').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    // Form validation
    const contactForm = document.querySelector('.contact-form form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#e53e3e';
                } else {
                    field.style.borderColor = '';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Compila tutti i campi obbligatori');
            }
        });
    }

    // Hover effects per le card
    document.querySelectorAll('.feature-card, .service-card, .case-study-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Lazy loading per le immagini (se presenti)
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

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // Analytics tracking (esempio)
    function trackEvent(category, action, label) {
        if (typeof gtag !== 'undefined') {
            gtag('event', action, {
                'event_category': category,
                'event_label': label
            });
        }
    }

    // Track CTA clicks
    document.querySelectorAll('.btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const text = this.textContent.trim();
            trackEvent('CTA', 'click', text);
        });
    });

    // Track form submissions
    if (contactForm) {
        contactForm.addEventListener('submit', function() {
            trackEvent('Form', 'submit', 'Contact Form');
        });
    }

    // Performance optimization
    document.addEventListener('DOMContentLoaded', function() {
        // Preload critical resources
        const criticalLinks = [
            // Aggiungi qui i link critici se necessario
        ];
        
        criticalLinks.forEach(href => {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.href = href;
            link.as = 'style';
            document.head.appendChild(link);
        });
    });
    </script>
</body>
</html>
