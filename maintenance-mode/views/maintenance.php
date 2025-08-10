<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title><?php esc_html_e( 'Údržba', 'maintenance-mode' ); ?></title>
    <link rel="stylesheet" href="<?php echo plugins_url('assets/style.css', __FILE__); ?>">
</head>
<body>
    <div class="maintenance-container">
        <h1><?php esc_html_e( 'Prebieha údržba...', 'maintenance-mode' ); ?></h1>
        <p><?php esc_html_e( 'Ospravedlňujeme sa za nepríjemnosti, ale naša stránka je momentálne nedostupná.', 'maintenance-mode' ); ?></p>
        <p><?php _e( 'Odhadovaný čas návratu: <strong>1 hodina</strong>.', 'maintenance-mode' ); ?></p>
        <p><?php _e( 'Pre viac informácií nás kontaktujte na: <a href="mailto:info@example.com">info@example.com</a> alebo na telefónnom čísle: <strong>+421 123 456 789</strong>.', 'maintenance-mode' ); ?></p>
    </div>
</body>
</html>
