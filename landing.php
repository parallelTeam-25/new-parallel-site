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
    $processo_principale = htmlspecialchars($_POST['processo_principale'] ?? '');
    $messaggio = htmlspecialchars($_POST['messaggio'] ?? '');
    
    if ($nome && $email && $servizio && $messaggio) {
        // Preparazione email
        $to = 'info.parallel.ai@gmail.com';
        $subject = 'Nuova richiesta da Landing Page - ' . $azienda;
        
        $email_body = "Nuova richiesta di contatto dalla landing page:\n\n";
        $email_body .= "Nome: $nome\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Azienda: $azienda\n";
        $email_body .= "Servizio di interesse: $servizio\n";
        $email_body .= "Budget stimato: $budget\n";
        $email_body .= "Processo principale: $processo_principale\n";
        $email_body .= "Messaggio: $messaggio\n\n";
        $email_body .= "Data invio: " . date('d/m/Y H:i:s') . "\n";
        
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        // Invio email
        if (mail($to, $subject, $email_body, $headers)) {
            $form_message = '<div class="success-message">✅ Messaggio inviato correttamente! Ti ricontatteremo entro 24 ore.</div>';
        } else {
            $form_message = '<div class="error-message">❌ Errore nell\'invio del messaggio. Riprova più tardi.</div>';
        }
    } else {
        $form_message = '<div class="error-message">⚠️ Compila tutti i campi obbligatori.</div>';
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
    <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect x='35' y='20' width='6' height='60' rx='3' fill='%2310b981'/><rect x='55' y='20' width='6' height='60' rx='3' fill='%2310b981' opacity='0.8'/></svg>">
    
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 180 180'><rect x='63' y='36' width='10' height='108' rx='5' fill='%2310b981'/><rect x='99' y='36' width='10' height='108' rx='5' fill='%2310b981' opacity='0.8'/></svg>">
    
    <!-- Favicon 32x32 -->
    <link rel="icon" type="image/svg+xml" sizes="32x32" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect x='11' y='6' width='2' height='20' rx='1' fill='%2310b981'/><rect x='17' y='6' width='2' height='20' rx='1' fill='%2310b981' opacity='0.8'/></svg>">
    
    <!-- Favicon 16x16 -->
    <link rel="icon" type="image/svg+xml" sizes="16x16" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><rect x='5' y='3' width='1' height='10' rx='0.5' fill='%2310b981'/><rect x='8' y='3' width='1' height='10' rx='0.5' fill='%2310b981' opacity='0.8'/></svg>">
    
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
        display: flex;
        align-items: center;
        height: 100%;
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
        color: var(--white);
    }
    
    /* Menu mobile attivo */
    .nav-menu.active {
        display: flex;
        flex-direction: column;
        position: fixed;
        top: 0;
        right: 0;
        width: 280px;
        height: 100vh;
        background: rgba(0, 0, 0, 0.98);
        backdrop-filter: blur(20px);
        padding: 80px 30px 30px 30px;
        border-left: 2px solid var(--primary-color);
        box-shadow: -10px 0 30px rgba(0, 0, 0, 0.5);
        z-index: 999;
        transform: translateX(0);
        transition: transform 0.3s ease;
    }
    
    .nav-menu {
        transform: translateX(100%);
        transition: transform 0.3s ease;
    }
    
    .nav-menu.active li {
        margin: 20px 0;
        text-align: left;
    }
    
    .nav-menu.active a {
        font-size: 18px;
        padding: 12px 0;
        display: block;
        color: var(--white);
        text-decoration: none;
        border-bottom: 1px solid rgba(16, 185, 129, 0.2);
        transition: all 0.3s ease;
    }
    
    .nav-menu.active a:hover {
        color: var(--primary-color);
        border-bottom-color: var(--primary-color);
        padding-left: 10px;
    }
    
    .nav-menu.active a:last-child {
        border-bottom: none;
    }
    
    /* Overlay per menu mobile */
    .nav-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 998;
    }
    
    .nav-overlay.active {
        display: block;
    }
    
    /* New Hero Section */
    .new-hero-section {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        color: var(--white);
        padding: 180px 0 120px;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    
    /* Rimuovo le ombre animate che si muovono */
    
    /* Linee parallele decorative - Versione migliorata */
    .new-hero-section .parallel-line-1 {
        position: absolute;
        top: 0;
        left: 12%;
        width: 3px;
        height: 200px;
        background: linear-gradient(180deg, transparent, rgba(16, 185, 129, 0.8), rgba(16, 185, 129, 1), rgba(16, 185, 129, 0.8), transparent);
        animation: slideLineVertical 6s ease-in-out infinite;
        z-index: 10;
        border-radius: 2px;
        box-shadow: 0 0 20px rgba(16, 185, 129, 0.3);
    }
    
    .new-hero-section .parallel-line-2 {
        position: absolute;
        top: 0;
        left: 14%;
        width: 2px;
        height: 150px;
        background: linear-gradient(180deg, transparent, rgba(16, 185, 129, 0.6), rgba(16, 185, 129, 0.8), rgba(16, 185, 129, 0.6), transparent);
        animation: slideLineVertical 8s ease-in-out infinite 2s;
        z-index: 10;
        border-radius: 1px;
        box-shadow: 0 0 15px rgba(16, 185, 129, 0.2);
    }
    
    .new-hero-section .parallel-line-3 {
        position: absolute;
        top: 0;
        right: 12%;
        width: 3px;
        height: 200px;
        background: linear-gradient(180deg, transparent, rgba(16, 185, 129, 0.8), rgba(16, 185, 129, 1), rgba(16, 185, 129, 0.8), transparent);
        animation: slideLineVertical 7s ease-in-out infinite 1s;
        z-index: 10;
        border-radius: 2px;
        box-shadow: 0 0 20px rgba(16, 185, 129, 0.3);
    }
    
    .new-hero-section .parallel-line-4 {
        position: absolute;
        top: 0;
        right: 14%;
        width: 2px;
        height: 150px;
        background: linear-gradient(180deg, transparent, rgba(16, 185, 129, 0.6), rgba(16, 185, 129, 0.8), rgba(16, 185, 129, 0.6), transparent);
        animation: slideLineVertical 9s ease-in-out infinite 3s;
        z-index: 10;
        border-radius: 1px;
        box-shadow: 0 0 15px rgba(16, 185, 129, 0.2);
    }
    

    
    @keyframes slideLineVertical {
        0% { 
            transform: translateY(-100px); 
            opacity: 0; 
        }
        20% { 
            transform: translateY(20px); 
            opacity: 0.8; 
        }
        80% { 
            transform: translateY(calc(100vh - 220px)); 
            opacity: 0.8; 
        }
        100% { 
            transform: translateY(calc(100vh + 100px)); 
            opacity: 0; 
        }
    }
    
    .new-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .new-hero-title {
        font-size: 64px;
        font-weight: 900;
        margin-bottom: 32px;
        line-height: 1.1;
        animation: fadeInUp 1s ease-out;
        letter-spacing: -2px;
        background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .new-hero-title .ai-partner {
        background: linear-gradient(135deg, #00d4aa 0%, #10b981 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
    }
    
    .new-hero-subtitle {
        font-size: 24px;
        margin-bottom: 48px;
        opacity: 0.95;
        animation: fadeInUp 1s ease-out 0.3s both;
        line-height: 1.7;
        color: var(--gray-200);
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .new-hero-cta {
        animation: fadeInUp 1s ease-out 0.6s both;
    }
    
    .new-hero-cta .btn {
        background: linear-gradient(135deg, #00d4aa 0%, #10b981 100%);
        border: none;
        color: white;
        padding: 18px 36px;
        font-size: 18px;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .new-hero-cta .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.4);
        background: linear-gradient(135deg, #10b981 0%, #00d4aa 100%);
    }
    
    @keyframes parallelLinesVertical {
        0%, 100% { 
            transform: translateY(-100%) scaleY(1);
            opacity: 0.3;
        }
        25% { 
            transform: translateY(0%) scaleY(1.2);
            opacity: 0.6;
        }
        50% { 
            transform: translateY(100%) scaleY(1);
            opacity: 0.3;
        }
        75% { 
            transform: translateY(0%) scaleY(0.8);
            opacity: 0.8;
        }
    }
    
    /* Hero Section */
    .hero-section {
        background: var(--gradient-dark);
        color: var(--white);
        padding: 140px 0 100px;
        position: relative;
        overflow: hidden;
        display: none; /* HIDDEN: Hero section originale nascosta */
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
        background: rgba(16, 185, 129, 0.25);
        border-color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.2);
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
        background: rgba(16, 185, 129, 0.15);
        border-color: var(--primary-color);
        transform: translateX(8px);
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.25);
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
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        color: var(--white);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }
    
    .metodo-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 15% 85%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 85% 15%, rgba(16, 185, 129, 0.08) 0%, transparent 50%),
            linear-gradient(135deg, transparent 0%, rgba(16, 185, 129, 0.05) 50%, transparent 100%);
        opacity: 1;
        z-index: 1;
    }
    
    .metodo-section .container {
        position: relative;
        z-index: 2;
    }
    
    .metodo-section .section-title,
    .metodo-section .section-intro {
        color: var(--white);
    }
    
    .metodo-steps {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        margin-top: 80px;
    }
    
    .metodo-step {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(16, 185, 129, 0.2);
        border-radius: 20px;
        padding: 32px 20px;
        text-align: center;
        transition: all 0.4s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        color: var(--white);
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
        background: rgba(255, 255, 255, 0.2);
        border-color: var(--primary-color);
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.3);
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
        color: var(--white);
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
        opacity: 1;
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
        box-shadow: 0 30px 60px rgba(16, 185, 129, 0.3);
        background: rgba(16, 185, 129, 0.1);
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
        .nav-container {
            position: relative;
        }
        
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
        
        .new-hero-section {
            padding: 140px 0 100px;
            min-height: 80vh;
        }
        
        .new-hero-title {
            font-size: 48px;
            letter-spacing: -1px;
        }
        
        .new-hero-subtitle {
            font-size: 20px;
            margin-bottom: 40px;
        }
        
        .new-hero-cta .btn {
            padding: 16px 32px;
            font-size: 16px;
        }
        
        /* Nascondi le linee decorative su mobile */
        .new-hero-section .parallel-line-1,
        .new-hero-section .parallel-line-2,
        .new-hero-section .parallel-line-3,
        .new-hero-section .parallel-line-4 {
            display: none;
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

        .services-section,
        .differentiators-section,
        .case-studies-section,
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
        
        .new-hero-section {
            padding: 120px 0 80px;
            min-height: 70vh;
        }
        
        .new-hero-title {
            font-size: 36px;
            letter-spacing: -0.5px;
        }
        
        .new-hero-subtitle {
            font-size: 18px;
            margin-bottom: 32px;
        }
        
        .new-hero-cta .btn {
            padding: 14px 28px;
            font-size: 14px;
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
        box-shadow: 0 25px 50px rgba(16, 185, 129, 0.25);
        border-color: var(--primary-color);
        background: var(--white);
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
        margin-top: auto;
        padding-top: 20px;
    }
    
    .service-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    .service-features {
        flex-grow: 1;
    }
    
    /* Case Studies Section */
    .case-studies-section {
        background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #475569 100%);
        color: var(--white);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }
    
    .case-studies-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 80%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.08) 0%, transparent 50%),
            linear-gradient(45deg, transparent 0%, rgba(16, 185, 129, 0.05) 50%, transparent 100%);
        opacity: 1;
        z-index: 1;
    }
    
    .case-studies-section .container {
        position: relative;
        z-index: 2;
    }
    
    .case-studies-section .section-title,
    .case-studies-section .section-intro {
        color: var(--white);
    }
    
    .case-studies-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
        gap: 40px;
        margin-bottom: 80px;
    }
    
    .case-study-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 40px 32px;
        border-radius: 20px;
        transition: all 0.4s ease;
        border: 1px solid rgba(16, 185, 129, 0.2);
        position: relative;
        overflow: hidden;
        color: var(--white);
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
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.3);
        border-color: var(--primary-color);
        background: rgba(255, 255, 255, 0.15);
    }
    
    .case-study-card h3 {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 16px;
        color: var(--white);
        letter-spacing: -0.5px;
    }
    
    .project-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(16, 185, 129, 0.15);
        color: var(--primary-color);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        display: inline-block;
        z-index: 1;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
        letter-spacing: 0.5px;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }
    
    /* Responsive per il badge su mobile */
    @media (max-width: 768px) {
        .project-badge {
            position: relative;
            top: auto;
            right: auto;
            display: inline-block;
            margin-bottom: 16px;
            align-self: flex-start;
        }
        
        .case-study-card {
            display: flex;
            flex-direction: column;
        }
    }
    
    .project-subtitle {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 20px;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .case-description {
        margin-bottom: 24px;
        color: var(--gray-200);
        line-height: 1.7;
        font-size: 16px;
    }
    
    .case-results h4 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--white);
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
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        border: 1px solid rgba(16, 185, 129, 0.2);
        transition: all 0.3s ease;
    }
    
    .result-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        border-color: var(--primary-color);
        background: rgba(255, 255, 255, 0.2);
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
        color: var(--gray-200);
        line-height: 1.4;
        display: block;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Services Section */
    .services-section {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 30%, #e2e8f0 70%, #f1f5f9 100%);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }
    
    .services-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 80%, rgba(16, 185, 129, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.05) 0%, transparent 50%),
            linear-gradient(45deg, transparent 0%, rgba(16, 185, 129, 0.02) 50%, transparent 100%);
        opacity: 1;
        z-index: 1;
    }
    
    .services-section .container {
        position: relative;
        z-index: 2;
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
        box-shadow: 0 25px 50px rgba(16, 185, 129, 0.25);
        border-color: var(--primary-color);
        background: var(--white);
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
    
    .service-features {
        list-style: none;
        margin-bottom: 24px;
    }
    
    .service-features li {
        position: relative;
        padding-left: 24px;
        margin-bottom: 12px;
        color: var(--text-light);
        line-height: 1.6;
    }
    
    .service-features li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--primary-color);
        font-weight: bold;
        font-size: 16px;
    }
    
    .services-cta {
        text-align: center;
        margin-top: auto;
        padding-top: 20px;
    }
    
    .service-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    .service-features {
        flex-grow: 1;
    }
    
    /* Responsive design for services */
    @media (max-width: 768px) {
        .services-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        
        .service-card {
            padding: 32px 24px;
        }
        
        .service-icon {
            font-size: 48px;
        }
        
        .service-card h3 {
            font-size: 22px;
        }
    }
    

    
    /* Differentiators Section */
    .differentiators-section {
        background: var(--gradient-dark);
        color: var(--white);
        padding: 100px 0;
        position: relative;
    }
    
    .differentiators-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--gradient-primary);
    }
    
    .differentiators-section .section-title,
    .differentiators-section .section-intro {
        color: var(--white);
        position: relative;
        z-index: 2;
    }
    
    .differentiators-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        margin-top: 80px;
        position: relative;
        z-index: 2;
    }
    
    .differentiator-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(16, 185, 129, 0.2);
        border-radius: 20px;
        padding: 40px 32px;
        text-align: center;
        transition: all 0.4s ease;
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
    }
    
    .differentiator-card::before {
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
    
    .differentiator-card:hover::before {
        transform: scaleX(1);
    }
    
    .differentiator-card:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: var(--primary-color);
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.2);
    }
    
    .differentiator-icon {
        font-size: 56px;
        margin-bottom: 24px;
        filter: drop-shadow(0 8px 16px rgba(16, 185, 129, 0.3));
    }
    
    .differentiator-card h3 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 12px;
        color: var(--white);
        letter-spacing: -0.5px;
        line-height: 1.3;
    }
    
    .differentiator-subtitle {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 20px;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .differentiator-description {
        color: var(--gray-200);
        line-height: 1.6;
        font-size: 15px;
        margin: 0;
        opacity: 0.9;
    }
    
    /* Responsive design for differentiators */
    @media (max-width: 1024px) {
        .differentiators-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }
    }
    
    @media (max-width: 768px) {
        .differentiators-grid {
            grid-template-columns: 1fr;
            gap: 24px;
            margin-top: 60px;
        }
        
        .differentiator-card {
            padding: 32px 24px;
        }
        
        .differentiator-icon {
            font-size: 48px;
        }
        
        .differentiator-card h3 {
            font-size: 18px;
        }
        
        .differentiator-description {
            font-size: 14px;
        }
    }
    
    /* FAQ Section */
    .faq-section {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 30%, #e2e8f0 70%, #f1f5f9 100%);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }
    
    .faq-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 25% 75%, rgba(16, 185, 129, 0.06) 0%, transparent 50%),
            radial-gradient(circle at 75% 25%, rgba(16, 185, 129, 0.04) 0%, transparent 50%),
            linear-gradient(-45deg, transparent 0%, rgba(16, 185, 129, 0.02) 50%, transparent 100%);
        opacity: 1;
        z-index: 1;
    }
    
    .faq-section .container {
        position: relative;
        z-index: 2;
    }
    
    .faq-container {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .faq-item {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 16px;
        margin-bottom: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
    }
    
    .faq-item:hover {
        border-color: var(--primary-color);
        box-shadow: var(--shadow-md);
    }
    
    .faq-item.active {
        border-color: var(--primary-color);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.15);
    }
    
    .faq-question {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 24px 32px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: var(--white);
        user-select: none;
        position: relative;
        border: none;
        border-radius: 16px 16px 0 0;
    }
    
    .faq-question:hover {
        background: rgba(16, 185, 129, 0.1);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.15);
    }
    
    .faq-question h3 {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-dark);
        margin: 0;
        line-height: 1.4;
        flex: 1;
        padding-right: 20px;
    }
    
    .faq-toggle {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary-color);
        transition: all 0.3s ease;
        min-width: 24px;
        text-align: center;
        line-height: 1;
    }
    
    .faq-item.active .faq-toggle {
        transform: rotate(45deg) !important;
        color: var(--secondary-color);
    }
    
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: all 0.4s ease;
        background: var(--white);
        opacity: 0;
        transform: translateY(-10px);
        padding: 0;
        margin: 0;
    }
    
    .faq-item.active .faq-answer {
        max-height: 300px;
        opacity: 1;
        transform: translateY(0);
        padding: 24px 32px;
        margin: 0;
    }
    
    .faq-answer p {
        padding: 0;
        margin: 0;
        color: var(--text-light);
        line-height: 1.6;
        font-size: 16px;
    }
    
    /* Responsive design for FAQ */
    @media (max-width: 768px) {
        .faq-question {
            padding: 20px 24px;
        }
        
        .faq-question h3 {
            font-size: 16px;
        }
        
        .faq-answer p {
            padding: 0 24px 20px 24px;
            font-size: 15px;
        }
        
        .faq-toggle {
            font-size: 20px;
        }
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
    
    /* CTA Benefits List */
    .cta-benefits-list {
        max-width: 600px;
        margin: 0 auto 60px auto;
        position: relative;
        z-index: 2;
    }
    
    .cta-benefit-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        font-size: 18px;
        color: var(--white);
        text-align: left;
    }
    
    .cta-benefit-item:last-child {
        margin-bottom: 0;
    }
    
    .cta-check-icon {
        color: var(--primary-color);
        font-weight: bold;
        margin-right: 16px;
        font-size: 20px;
        min-width: 24px;
        filter: drop-shadow(0 2px 4px rgba(16, 185, 129, 0.3));
    }
    
    .cta-benefit-item span:last-child {
        line-height: 1.4;
        font-weight: 500;
    }
    
    /* Responsive design for CTA benefits */
    @media (max-width: 768px) {
        .cta-benefits-list {
            margin-bottom: 40px;
        }
        
        .cta-benefit-item {
            font-size: 16px;
            margin-bottom: 16px;
        }
        
        .cta-check-icon {
            font-size: 18px;
            margin-right: 12px;
        }
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
        background: rgba(16, 185, 129, 0.2);
        border-color: var(--primary-color);
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.3);
    }
    
    .benefit-icon {
        font-size: 36px;
        margin-bottom: 20px;
        filter: drop-shadow(0 4px 8px rgba(16, 185, 129, 0.2));
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
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        color: var(--white);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }
    
    .contact-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 30% 70%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 70% 30%, rgba(16, 185, 129, 0.08) 0%, transparent 50%),
            linear-gradient(45deg, transparent 0%, rgba(16, 185, 129, 0.05) 50%, transparent 100%);
        opacity: 1;
        z-index: 1;
    }
    
    .contact-section .container {
        position: relative;
        z-index: 2;
    }
    
    .contact-section .section-title,
    .contact-section .section-intro {
        color: var(--white);
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
        color: var(--white);
        letter-spacing: -0.5px;
    }
    
    .contact-info p {
        color: var(--gray-200);
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
        color: var(--white);
        padding: 20px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        border: 1px solid rgba(16, 185, 129, 0.2);
        transition: all 0.3s ease;
    }
    
    .contact-item:hover {
        background: rgba(16, 185, 129, 0.15);
        border-color: var(--primary-color);
        transform: translateX(8px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.2);
    }
    
    .contact-icon {
        font-size: 24px;
        color: var(--primary-color);
    }
    
    .contact-form {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 40px;
        border-radius: 20px;
        border: 1px solid rgba(16, 185, 129, 0.2);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
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
        color: var(--white);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 16px;
        border: 2px solid rgba(16, 185, 129, 0.3);
        border-radius: 12px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
        color: var(--text-dark);
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
        align-items: start;
    }
    
    .footer-section h3,
    .footer-section h4 {
        margin-bottom: 24px;
        color: var(--white);
        font-weight: 700;
        letter-spacing: -0.5px;
    }
    
    /* Allineamento generale per tutte le sezioni del footer */
    .footer-section {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
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
    
    /* Allineamento specifico per la prima sezione del footer */
    .footer-section:first-child {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }
    
    .footer-section:first-child .logo {
        margin-bottom: 20px;
        display: block;
    }
    
    .footer-section:first-child h3 {
        margin-bottom: 16px;
        line-height: 1.2;
    }
    
    .footer-section:first-child p {
        margin-bottom: 0;
        line-height: 1.6;
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
    

    
    .footer-bottom {
        border-top: 1px solid rgba(16, 185, 129, 0.2);
        padding-top: 30px;
        text-align: center;
        color: var(--gray-200);
        position: relative;
        z-index: 2;
    }
    
    .contact-info-horizontal {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 20px;
    }
    
    .contact-info-horizontal span {
        display: block;
        color: var(--gray-200);
        font-size: 14px;
        line-height: 1.4;
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
        
        /* Ottimizzazioni per case study su mobile */
        .case-study-card {
            padding: 24px 20px;
        }
        
        .case-study-card h3 {
            font-size: 22px;
            margin-top: 8px;
        }
        
        .process-steps {
            grid-template-columns: 1fr;
        }
        
        .benefits-grid {
            grid-template-columns: 1fr;
        }
        
        .footer-content {
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            text-align: left;
        }
        
        .footer-section:first-child {
            grid-column: 1 / -1;
            text-align: center;
        }
        
        .footer-section:nth-child(2),
        .footer-section:nth-child(3) {
            text-align: left;
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
        
        .footer-content {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .footer-section:first-child {
            grid-column: 1;
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
                <a href="#" class="logo">
                    <img src="..\wp-content\uploads\2025\08\Logo BiancoTagliato Parallel.png" alt="Logo" style="width: 150px; height: 46px;">
                </a>
                <nav>
                    <ul class="nav-menu">
                        <li><a href="#metodo">Come lavoriamo</a></li>
                        <li><a href="#services">Servizi</a></li>
                        <li><a href="#case-studies">Casi Studio</a></li>
                        <li><a href="#contact">Contatti</a></li>
                    </ul>
                </nav>
                <button class="mobile-menu-toggle" id="mobile-menu-toggle">☰</button>
            </div>
        </div>
        <!-- Overlay per menu mobile -->
        <div class="nav-overlay" id="nav-overlay"></div>
    </header>

    <!-- New Hero Section -->
    <section class="new-hero-section" id="new-hero">
        <!-- Linee parallele decorative -->
        <div class="parallel-line-1"></div>
        <div class="parallel-line-2"></div>
        <div class="parallel-line-3"></div>
        <div class="parallel-line-4"></div>
        
        <div class="container">
            <div class="new-hero-content">
                <h1 class="new-hero-title">
                    Il futuro della tua azienda corre in <span class="ai-partner">parallelo</span> con l'AI
                </h1>
                <p class="new-hero-subtitle">
                    Costruiamo soluzioni su misura che affiancano il tuo team, ottimizzano i flussi e liberano energie per ciò che conta davvero.
                </p>
                <div class="new-hero-cta">
                    <a href="https://calendly.com/info-parallel-ai/30min" target="_blank" class="btn">Prenota consulenza gratuita</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================== -->

    </section>


    <!-- Metodo Section -->
    <section class="metodo-section" id="metodo" >
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" style="text-align: center;">Come lavoriamo</h2>
                <p class="section-intro">
                    Dal manuale all'automatico in 4 step: il nostro processo trasparente per trasformare i tuoi processi ripetitivi
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









    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title" style="text-align: center;">Come possiamo aiutarti</h2>
                <p class="section-intro">
                    Soluzioni su misura per trasformare i tuoi processi
                </p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">⚙️</div>
                    <h3 style="text-align: center;">SOLUZIONI CUSTOM</h3>
                    <p style="text-align: center;" class="service-subtitle">Sviluppiamo Agenti AI custom e automazioni AI personalizzate</p>
                    <ul style="text-align: center;" class="service-features">
                        <li>Risparmia tempo e denaro</li>
                        <li>Riduci l'errore umano</li>
                        <li>Aumenta la produttività del team</li>
                        <li>Elimina i processi ripetitivi</li>
                        <li>Aumenta le vendite con operatori h24</li>
                    </ul>
                    <div class="services-cta">
                        <a href="https://calendly.com/info-parallel-ai/30min" target="_blank" class="btn btn-primary">Prenota call</a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">📚</div>
                    <h3 style="text-align: center;">FORMAZIONE AZIENDALE</h3>
                    <p  style="text-align: center;"class="service-subtitle">Potenzia il tuo team con formazione AI personalizzata e percorsi mirati</p>
                    <ul style="text-align: center;" class="service-features">
                        <li>Corsi personalizzati per il tuo team</li>
                        <li>Casi d'uso specifici per il tuo settore</li>
                        <li>Formazione sempre aggiornata</li>
                        <li>Rimani sempre aggiornato</li>
                    </ul>
                    <div class="services-cta">
                        <a href="https://calendly.com/info-parallel-ai/30min" target="_blank" class="btn btn-primary">Prenota call</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Case Studies Section -->
    <section class="case-studies-section" id="case-studies">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Automazioni che stiamo sviluppando</h2>
                <p class="section-intro">
                    Scopri le automazioni su cui stiamo lavorando e come possono trasformare anche i tuoi processi.
                </p>
            </div>
            <div class="case-studies-grid">
                <div class="case-study-card">
                    <div class="project-badge">In sviluppo</div>
                    <h3>Scadenziario Intelligente </h3>
                    <p class="project-subtitle">MAI PIÙ LICENZE DIMENTICATE O CLIENTI PERSI</p>
                    <p class="case-description">
                    Centralizza tutte le scadenze software e licenze in un unico tool. Il sistema invia automaticamente email personalizzate ai clienti prima di ogni scadenza.
                    <div class="case-results">
                        <h4>Benefici attesi</h4>
                        <div class="results-grid">
                            <div class="result-item">
                                <span class="result-number">-2h</span>
                                <span class="result-label">Controlli manuali</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">100%</span>
                                <span class="result-label">Scadenze coperte</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">AUTO</span>
                                <span class="result-label">Email Personalizzate</span>
                            </div>
                        </div>
                    </div>
                    <a href="https://calendly.com/info-parallel-ai/30min" target="_blank" class="btn btn-outline">Scopri di più</a>
                </div>
                
                <div class="case-study-card">
                    <div class="project-badge">In sviluppo</div>
                    <h3>Ricerca Auto Automatica </h3>
                    <p class="project-subtitle">Basta perdere tempo su portali di auto diversi</p>
                    <p class="case-description">
                    Scrivi su Telegram che auto cerchi e ricevi automaticamente le migliori opportunità qualità-prezzo da tutti i portali di vendita con un alalisi di mercato annessa.
                    </p>
                    <div class="case-results">
                        <h4>Benefici attesi</h4>
                        <div class="results-grid">
                            <div class="result-item">
                                <span class="result-number">-6h</span>
                                <span class="result-label">Ricerca manuale</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">+300%</span>
                                <span class="result-label">Opportunità trovate</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">Veloce</span>
                                <span class="result-label">Chatta con l'AI</span>
                            </div>
                        </div>
                    </div>
                                        <a href="https://calendly.com/info-parallel-ai/30min" target="_blank" class="btn btn-outline">Scopri di più</a>
                </div>

                <div class="case-study-card">
                    <div class="project-badge">In sviluppo</div>
                    <h3>Report Clienti One-Click</h3>
                    <p class="project-subtitle">Da 4 ore a 10 minuti per report cliente</p>
                    <p class="case-description">
                    Sistema automatico che monitora le performance dei siti clienti e genera report personalizzati con commenti AI specifici per ogni progetto.
                    </p>
                    <div class="case-results">
                        <h4>Benefici attesi</h4>
                        <div class="results-grid">
                            <div class="result-item">
                                <span class="result-number">1-click</span>
                                <span class="result-label">Report Completo</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">-95%</span>
                                <span class="result-label">Tempo Risparmiato</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">Auto</span>
                                <span class="result-label">Commenti Personalizzati</span>
                            </div>
                        </div>
                    </div>
                    <a href="https://calendly.com/info-parallel-ai/30min" target="_blank" class="btn btn-outline">Scopri di più</a>
                </div>

                <div class="case-study-card">
                    <div class="project-badge">In sviluppo</div>
                    <h3>Scontrini Aziendali Smart</h3>
                    <p class="project-subtitle">Dalla foto dello scontrino a registro spese completo</p>
                    <p class="case-description">
                    Ogni dipendente carica gli scontrini via Telegram. Il sistema estrae automaticamente importi, categorie e dettagli per la contabilità aziendale.
                    </p>
                    <div class="case-results">
                        <h4>Benefici attesi</h4>
                        <div class="results-grid">
                            <div class="result-item">
                                <span class="result-number">-2h</span>
                                <span class="result-label">Lavoro contabile</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">ZERO</span>
                                <span class="result-label">Scontrini persi</span>
                            </div>
                            <div class="result-item">
                                <span class="result-number">ZERO</span>
                                <span class="result-label">ERRORI INSERIMENTO</span>
                            </div>
                        </div>
                    </div>
                    <a href="https://calendly.com/info-parallel-ai/30min" target="_blank" class="btn btn-outline">Scopri di più</a>
                </div>
            </div>
            <div class="case-studies-cta" style="text-align: center;">
                <a href="https://calendly.com/info-parallel-ai/30min" target="_blank" class="btn btn-primary btn-large">
                    Inizia la tua trasformazione
                </a>
            </div>
        </div>
    </section>



    <!-- Final CTA Section -->
    <section class="final-cta-section" id="final-cta">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Inizia la tua trasformazione digitale</h2>
                <p class="section-intro">
                    Prenota la tua consulenza gratuita di 30 minuti. Analizziamo insieme i tuoi processi e ti mostriamo concretamente cosa puoi automatizzare.
                </p>
            </div>
            
            <div class="cta-benefits-list">
                <div class="cta-benefit-item">
                    <span class="cta-check-icon">✓</span>
                    <span>Identifichi 2-3 processi automatizzabili subito</span>
                </div>
                <div class="cta-benefit-item">
                    <span class="cta-check-icon">✓</span>
                    <span>Ricevi stima tempi e costi personalizzata</span>
                </div>
                <div class="cta-benefit-item">
                    <span class="cta-check-icon">✓</span>
                    <span>Ottieni roadmap dettagliata (anche se non lavori con noi)</span>
                </div>
                <div class="cta-benefit-item">
                    <span class="cta-check-icon">✓</span>
                    <span>Zero impegno, massima trasparenza</span>
                </div>
            </div>
            
            <div class="final-cta-button">
                <a href="https://calendly.com/info-parallel-ai/30min" target="_blank" class="btn btn-primary btn-large">
                    PRENOTA CONSULENZA GRATUITA
                </a>
            </div>
            
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">⏱️</div>
                    <h3>30 minuti di valore</h3>
                    <p>Consulenza mirata e personalizzata per identificare le opportunità specifiche per la tua azienda.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">👨‍💻</div>
                    <h3>Esperti dedicati</h3>
                    <p>Incontro con i nostri specialisti AI con esperienza specifica nel tuo settore.</p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">📊</div>
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
                            <span>info.parallel.ai@gmail.com
                            </span>
                        </div>

                        <div class="contact-item">
                            <span class="contact-icon">📍</span>
                            <span>Cuneo, Italia</span>
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
                             <label for="servizio">Servizio di interesse *</label>
                             <select id="servizio" name="servizio" required>
                                 <option value="">Seleziona un servizio</option>
                                 <option value="automazione-processi">Automazione di processi</option>
                                 <option value="formazione">Formazione</option>
                             </select>
                         </div>
                        
                        <div class="form-group">
                            <label for="processo-principale">Descrivi in 2 righe il principale processo che ti fa perdere tempo</label>
                            <textarea id="processo-principale" name="processo_principale" rows="2" 
                                      placeholder="Es: Controllo manuale delle scadenze ogni mattina, ricerca di informazioni su diversi software..."></textarea>
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

    <!-- FAQ Section -->
    <section class="faq-section" id="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Domande frequenti</h2>
                <p class="section-intro">
                    Tutto quello che devi sapere prima di iniziare
                </p>
            </div>
            <div class="faq-container">
                <div class="faq-item" data-faq="1">
                    <div class="faq-question">
                        <h3>Non ho esperienza con automazioni o AI: posso iniziare lo stesso?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Certo. Parallel è pensato anche per chi parte da zero: analizziamo i tuoi processi, individuiamo quelli più adatti e ti accompagniamo passo dopo passo fino ai primi risultati.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-faq="2">
                    <div class="faq-question">
                        <h3>E se so già quali processi voglio automatizzare o migliorare?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Perfetto! Possiamo partire subito dalle tue esigenze specifiche, sviluppando soluzioni mirate e riducendo tempi e costi di implementazione.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-faq="3">
                    <div class="faq-question">
                        <h3>Lavorate solo con PMI?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>No. Parallel collabora sia con PMI (5-50 dipendenti) che con grandi aziende. Le nostre soluzioni sono scalabili e adattabili a realtà di dimensioni diverse.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-faq="4">
                    <div class="faq-question">
                        <h3>Quanto tempo serve per vedere i risultati?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>In media 2-6 settimane per progetto, in base alla complessità. I benefici, come risparmio di tempo ed efficienza operativa, sono evidenti già dal go-live.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-faq="5">
                    <div class="faq-question">
                        <h3>Cosa succede dopo l'implementazione?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Non ti lasciamo solo. Offriamo assistenza continua, monitoraggio e formazione, così il tuo team diventa autonomo e sicuro nell'utilizzo delle nuove soluzioni.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-faq="6">
                    <div class="faq-question">
                        <h3>Posso partire con una sola automazione?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Sì, ed è il nostro approccio consigliato: cominciamo da un progetto ad alto impatto, misuriamo i risultati e poi estendiamo gradualmente.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-faq="7">
                    <div class="faq-question">
                        <h3>Come funziona la call gratuita?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>La call gratuita di 30 minuti serve a conoscerci, capire i tuoi processi e valutare insieme dove l'automazione può avere più impatto. È senza impegno, ma con spunti subito concreti.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-faq="8">
                    <div class="faq-question">
                        <h3>Cos'è l'Audit e a cosa serve?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>L'Audit è un'analisi approfondita dei tuoi processi aziendali: individuiamo inefficienze, calcoliamo il potenziale risparmio e tracciamo una roadmap di automazioni. Ha un costo fisso, ma viene scalato dal progetto se decidi di procedere.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-faq="9">
                    <div class="faq-question">
                        <h3>Offrite anche formazione su AI senza implementazioni?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Sì. Parallel può fornire percorsi di formazione su AI e automazione anche senza realizzare progetti tecnici. Dalla strategia d'impresa all'uso pratico degli strumenti, aiutiamo il tuo team a capire e sfruttare al meglio le potenzialità dell'intelligenza artificiale.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-faq="10">
                    <div class="faq-question">
                        <h3>Come faccio a essere sicuro che l'investimento convenga davvero?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Durante la consulenza e nell'Audit calcoliamo insieme il ROI (ritorno sull'investimento). Procedi solo se i numeri ti convincono: nessuna promessa generica, solo dati concreti.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-faq="11">
                    <div class="faq-question">
                        <h3>Parallel sostituisce le persone con l'AI?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>No. Parallel non elimina posti di lavoro: automatizza i compiti ripetitivi e a basso valore, così che le persone possano concentrarsi su attività strategiche e creative.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <a href="#" class="logo">
                        <img src="..\wp-content\uploads\2025\08\Logo BiancoTagliato Parallel.png" alt="Logo Parallel" style="width: 150px; height: 46px; margin-bottom: 20px;">
                    </a>
                    <h3>Trasformiamo il futuro della tua azienda con l'AI</h3>
                    <p>Soluzioni innovative e personalizzate per ottimizzare i tuoi processi e accelerare la crescita.</p>
                </div>
                <div class="footer-section">
                    <h4>Navigazione</h4>
                    <ul>
                        <li><a href="#metodo">Come lavoriamo</a></li>
                        <li><a href="#services">Servizi</a></li>
                        <li><a href="#case-studies">Casi Studio</a></li>
                        <li><a href="#contact">Contatti</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contatti</h4>
                    <div class="contact-info-horizontal">
                        <span>📧 info.parallel.ai@gmail.com</span>
                        <span>📍 Cuneo, Italia</span>
                        <span>🏢 P.IVA: 04034440042</span>
                    </div>
                    <p style="margin-top: 20px; font-size: 14px; opacity: 0.8;">
                        Partner ufficiale di <a href="https://www.sguanginformatica.com" target="_blank" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">SguangInformatica</a>
                    </p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Parallel AI. Tutti i diritti riservati.</p>
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
    const navOverlay = document.getElementById('nav-overlay');
    
    function closeMobileMenu() {
        navMenu.classList.remove('active');
        navOverlay.classList.remove('active');
    }
    
    if (mobileMenuToggle && navMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            navOverlay.classList.toggle('active');
        });
        
        // Chiudi menu quando si clicca sull'overlay
        if (navOverlay) {
            navOverlay.addEventListener('click', closeMobileMenu);
        }
        
        // Chiudi menu quando si clicca su una voce del menu
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', closeMobileMenu);
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
    document.querySelectorAll('.service-card, .case-study-card, .differentiator-card').forEach(el => {
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
                    field.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.1)';
                } else {
                    field.style.borderColor = '';
                    field.style.boxShadow = '';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('⚠️ Compila tutti i campi obbligatori per continuare');
            }
        });
    }

    // Hover effects per le card
    document.querySelectorAll('.service-card, .case-study-card, .differentiator-card').forEach(card => {
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

    // FAQ Accordion functionality - VERSIONE CORRETTA
    function initFAQ() {
        console.log('🚀 Inizializzazione FAQ...');
        
        const faqItems = document.querySelectorAll('.faq-item');
        console.log('📋 FAQ items trovati:', faqItems.length);
        
        if (faqItems.length === 0) {
            console.error('❌ Nessuna FAQ trovata!');
            return;
        }
        
        faqItems.forEach((item, index) => {
            const question = item.querySelector('.faq-question');
            const toggle = item.querySelector('.faq-toggle');
            const answer = item.querySelector('.faq-answer');
            
            if (!question || !toggle || !answer) {
                console.error(`❌ Elementi mancanti per FAQ ${index + 1}:`, { question: !!question, toggle: !!toggle, answer: !!answer });
                return;
            }
            
            console.log(`✅ FAQ ${index + 1} configurata correttamente`);
            
            // Funzione per gestire il click
            const handleClick = function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                console.log(`🖱️ FAQ ${index + 1} cliccata`);
                
                const isActive = item.classList.contains('active');
                
                // Chiudi tutte le altre FAQ
                faqItems.forEach((otherItem, otherIndex) => {
                    if (otherIndex !== index) {
                        otherItem.classList.remove('active');
                        const otherToggle = otherItem.querySelector('.faq-toggle');
                        if (otherToggle) {
                            otherToggle.textContent = '+';
                        }
                    }
                });
                
                // Toggle FAQ corrente
                if (isActive) {
                    item.classList.remove('active');
                    toggle.textContent = '+';
                    console.log(`🔽 FAQ ${index + 1} chiusa`);
                } else {
                    item.classList.add('active');
                    toggle.textContent = '−';
                    console.log(`🔼 FAQ ${index + 1} aperta`);
                }
            };
            
            // Event listeners
            question.addEventListener('click', handleClick);
            toggle.addEventListener('click', handleClick);
            
            // Stili interattivi
            question.style.cursor = 'pointer';
            toggle.style.cursor = 'pointer';
            
            // Debug info
            console.log(`🎯 FAQ ${index + 1} ready:`, {
                question: question.textContent.trim().substring(0, 30) + '...',
                toggleText: toggle.textContent,
                hasActiveClass: item.classList.contains('active')
            });
        });
        
        console.log('✅ Tutte le FAQ sono state inizializzate!');
    }
    
    // Inizializza FAQ quando il DOM è pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFAQ);
    } else {
        initFAQ();
    }
    
    // Backup: riprova dopo un breve delay
    setTimeout(initFAQ, 1000);
    
    // Inizializza FAQ anche quando la pagina è completamente caricata
    window.addEventListener('load', initFAQ);
    </script>
</body>
</html>

