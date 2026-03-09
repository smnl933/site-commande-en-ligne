
<?php
include 'db.php'; 

?>

<?php
session_start(); // Démarre la session

// Supprimer toutes les variables de session
$_SESSION = array();

// Si tu veux supprimer le cookie de session aussi, décommenter les lignes suivantes
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]
    );
}

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion
header("Location: connexion.php");
exit();
?>