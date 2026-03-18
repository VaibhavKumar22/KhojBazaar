<?php

function is_cloudinary_configured(): bool
{
    return (bool) (
        getenv('CLOUDINARY_CLOUD_NAME') &&
        getenv('CLOUDINARY_API_KEY') &&
        getenv('CLOUDINARY_API_SECRET')
    );
}

/**
 * Uploads a local image file to Cloudinary.
 * Returns ['success' => bool, 'url' => string, 'error' => string]
 */
function upload_image_to_cloudinary(string $localFilePath): array
{
    $cloudName = getenv('CLOUDINARY_CLOUD_NAME') ?: '';
    $apiKey = getenv('CLOUDINARY_API_KEY') ?: '';
    $apiSecret = getenv('CLOUDINARY_API_SECRET') ?: '';

    if ($cloudName === '' || $apiKey === '' || $apiSecret === '') {
        return ['success' => false, 'url' => '', 'error' => 'Cloudinary is not configured'];
    }

    if (!file_exists($localFilePath)) {
        return ['success' => false, 'url' => '', 'error' => 'Upload file not found'];
    }

    $timestamp = time();
    $folder = getenv('CLOUDINARY_UPLOAD_FOLDER') ?: 'khojbazaar';
    $signatureBase = "folder={$folder}&timestamp={$timestamp}{$apiSecret}";
    $signature = sha1($signatureBase);

    $endpoint = "https://api.cloudinary.com/v1_1/{$cloudName}/image/upload";

    $postFields = [
        'file' => new CURLFile($localFilePath),
        'api_key' => $apiKey,
        'timestamp' => $timestamp,
        'folder' => $folder,
        'signature' => $signature,
    ];

    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $response = curl_exec($ch);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false) {
        return ['success' => false, 'url' => '', 'error' => "Cloudinary request failed: {$curlError}"];
    }

    $data = json_decode($response, true);
    if (!is_array($data)) {
        return ['success' => false, 'url' => '', 'error' => 'Invalid Cloudinary response'];
    }

    if (!empty($data['secure_url'])) {
        return ['success' => true, 'url' => $data['secure_url'], 'error' => ''];
    }

    $errorMessage = $data['error']['message'] ?? 'Unknown Cloudinary error';
    return ['success' => false, 'url' => '', 'error' => $errorMessage];
}


