<?php
session_start();
require_once('connexion.php'); // Connexion à la BDD

if (isset($_POST['login'])) {
    // Récupération et sécurisation des champs
    $email = htmlspecialchars($_POST['email'] ?? '');
    $mot_de_passe = htmlspecialchars($_POST['Mot_de_Passe'] ?? '');
    $role = htmlspecialchars($_POST['Role'] ?? '');

    if (!empty($email) && !empty($mot_de_passe) && !empty($role)) {

        // Préparation de la requête
        $stmt = $dam->prepare("SELECT * FROM utilisateur WHERE email  = ? AND type_utilisateur = ?");
        $stmt->execute([$email, $role]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();

            // Comparaison du mot de passe : si stocké en clair
            if ($mot_de_passe == $user['mot_de_passe']) {
                $_SESSION['user'] = [
                    'id' => $user['id_utilisateur'],
                    'email' => $user['email'],
                    'role' => $user['type_utilisateur']
                ];

                // Redirection selon le rôle
                if ($user['type_utilisateur'] === 'admin') {
                    header("Location: ../admindashboard.php");
                    exit;
                } elseif ($user['type_utilisateur'] === 'etudiant') {
                    header("Location: ../userdashboard.php");
                    exit;
                }  elseif ($user['type_utilisateur'] === 'enseignant') {
                    header("Location: ../teacherdashboard.php");
                    exit;
                }else {
                    echo "❌ Rôle non reconnu.";
                }

            } else {
                echo "❌ Mot de passe incorrect.";
            }

        } else {
            echo "❌ Aucun utilisateur trouvé avec ce rôle ou cette adresse.";
        }

    } else {
        echo "❌ Veuillez remplir tous les champs.";
    }
}
?>
