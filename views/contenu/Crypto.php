<?php

/**
 * Déchiffre un fichier chiffré et crée une version temporaire
 * valable seulement pour la session en cours.
 */
function decryptFileToTemp(string $encryptedPath, string $groupKey): string {
    if (!file_exists($encryptedPath)) {
        throw new RuntimeException("Fichier introuvable : $encryptedPath");
    }

    $blob = file_get_contents($encryptedPath);
    if ($blob === false) {
        throw new RuntimeException("Impossible de lire le fichier : $encryptedPath");
    }

    // Vérifier le préfixe
    $prefix = substr($blob, 0, 5);
    if ($prefix !== "ENCv1") {
        throw new RuntimeException("Format de fichier invalide ou non supporté.");
    }

    $cipher = "aes-256-cbc";
    $ivLen  = openssl_cipher_iv_length($cipher);

    $iv         = substr($blob, 5, $ivLen);
    $ciphertext = substr($blob, 5 + $ivLen);

    $plaintext = openssl_decrypt(
        $ciphertext,
        $cipher,
        $groupKey,
        OPENSSL_RAW_DATA,
        $iv
    );

    if ($plaintext === false) {
        throw new RuntimeException("Échec du déchiffrement OpenSSL.");
    }

    // Créer un fichier temporaire unique basé sur l’ID de session
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $sessionId = session_id();

    $tmpDir = sys_get_temp_dir() . "/decrypted_" . $sessionId;
    if (!is_dir($tmpDir)) {
        mkdir($tmpDir, 0700, true);
    }

    // Nom unique pour ce fichier
    $tmpFile = tempnam($tmpDir, "dec_");

    // Écrire le contenu déchiffré
    file_put_contents($tmpFile, $plaintext);

    // Retourner le chemin temporaire
    return $tmpFile;
}

?>
