<?php

if (!function_exists('getFirstName')) {
    function getFirstName($name)
    {
        $parts = explode(' ', $name);
        return $parts[0];
    }
}
if (!function_exists('maskEmail')) {
    function maskEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email; // invalid email, return as is
        }

        [$name, $domain] = explode('@', $email);

        $namePart = substr($name, 0, 2); // show first 2 letters
        $maskedName = $namePart . str_repeat('*', max(0, strlen($name) - 2));

        $domainParts = explode('.', $domain);
        $domainMain = substr($domainParts[0], 0, 2) . str_repeat('*', max(0, strlen($domainParts[0]) - 2));
        $domainEnd = isset($domainParts[1]) ? $domainParts[1] : '';

        return $maskedName . '@' . $domainMain . ($domainEnd ? ".$domainEnd" : '');
    }
}

if (!function_exists('maskPhone')) {
    function maskPhone($phone)
    {
        // Remove non-digit characters
        $digits = preg_replace('/\D/', '', $phone);

        // If it's too short, just return it
        if (strlen($digits) <= 2) {
            return $phone;
        }

        $visibleDigits = 2; 
        $masked = str_repeat('*', strlen($digits) - $visibleDigits) . substr($digits, -$visibleDigits);

        // Optional: format back with dashes/spaces if needed
        return $masked;
    }
}




