<?php
require_once '../vendor/autoload.php';

// Setup Twig loader and environment
$loader = new \Twig\Loader\FilesystemLoader('../src/templates');
$twig = new \Twig\Environment($loader);

// Get the current path from the URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Initialize default data to pass to templates
$data = [
    'layout_mode' => 'grid', // Default layout_mode
];

// Check the path and adjust template and data accordingly
switch ($path) {
    case '/landing':
        $template = 'landing.twig';
        // Optionally, set layout_mode based on query parameters or other conditions
        break;
    case '/landing-list':
        $template = 'landing.twig';
        $data['layout_mode'] = 'list'; // Override layout_mode for landing-list
        break;
    case '/general-content':
        $template = 'general-content.twig';
        break;
    case '/general-content-split-hero':
        $template = 'general-content-split-hero.twig';
        break;
    case '/general-content-no-hero':
        $template = 'general-content-no-hero.twig';
        break;
    default:
        $template = 'index.twig';
        break;
}

// Render the template with the data
echo $twig->render($template, $data);
