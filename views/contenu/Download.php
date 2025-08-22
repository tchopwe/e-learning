<?php
session_start();

if (!isset($_GET['f'])) {
    die("Fichier non spécifié.");
}

$sessionId = session_id();
$tmpDir = sys_get_temp_dir() . "/decrypted_" . $sessionId;
$fileName = basename($_GET['f']); // sécurité
$filePath = $tmpDir . "/" . $fileName;

if (!file_exists($filePath)) {
    die("Fichier introuvable ou session expirée.");
}

// Déterminer le type MIME
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $filePath);
finfo_close($finfo);

// Vérifier si on force le téléchargement
$download = isset($_GET['mode']) && $_GET['mode'] === 'download';

header("Content-Type: $mime");
if ($download) {
    header("Content-Disposition: attachment; filename=\"" . $fileName . "\"");
} else {
    header("Content-Disposition: inline; filename=\"" . $fileName . "\"");
}
header("Content-Length: " . filesize($filePath));

readfile($filePath);
exit;
