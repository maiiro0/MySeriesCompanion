<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function csrfToken(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrfChamp(): string
{
    return '<input type="hidden" name="csrf" value="' . htmlspecialchars(csrfToken()) . '">';
}

function csrfValide(): bool
{
    return isset($_POST['csrf'], $_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $_POST['csrf']);
}