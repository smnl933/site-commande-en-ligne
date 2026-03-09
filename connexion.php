
<?php
session_start();
include 'db.php';

if(isset($_POST['valider'])){  // on verifie si le bouton valider existe et il a etait clique
    
//c'est un bouton d'action qui te dit que si tu clique sur valider c'est valider
    if(!empty($_POST['email']) && !empty($_POST['motdepasse'])){

        $email = htmlspecialchars($_POST['email']); // on recupere l'email envoye par le formulaire et on securise avant de l'utiliser
        $mdp_saisi = $_POST['motdepasse']; // on recupere le mdp saisi par l'user et on l stock dans une variable pour pouvoir verifie avc la bdd

        $checkUser = $pdo->prepare('SELECT * FROM site WHERE adresse_mail = ?'); // on prepare la requete securise pour recherche dans la table site et on stock cette requete  dans checkuser
        $checkUser->execute([$email]); // on va executer la requete deja prepare au dessus avec le mail

        if($checkUser->rowCount() > 0){ // si  l'uilisateur existe rowcount alors on recupere ses informations avec fetch  et on les stock dans userinfo
            $userInfo = $checkUser->fetch();  

            if(password_verify($mdp_saisi, $userInfo['motdepasse'])){  // si le mdp saisie par l'utilisateur est verifie sa marche
                $_SESSION['auth'] = true;   // l'utilisateur est connecte
                $_SESSION['id'] = $userInfo['id'];// on stocke l'id
                $_SESSION['nom'] = $userInfo['nom']; // on stocke le nom et etc
                $_SESSION['prenom'] = $userInfo['prenom'];

                header('Location: accueil.php');  //renvoie a la page connexion
                exit(); // ca arrete le script
            } else {
                $errorMsg = "Mot de passe incorrect.";
            }
        } else {
            $errorMsg = "Aucun utilisateur trouvé avec cet email.";
        }
    } else {
        $errorMsg = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <form class="container" method="POST">
        <h2>Connexion</h2>
        <?php if(isset($errorMsg)){ echo '<p style="color:red;">'.$errorMsg.'</p>'; } ?>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="motdepasse" required>
        </div>

        <button type="submit" name="valider">Se connecter</button>
        <a href="inscription.php"><p>Pas encore inscrit ? Créer un compte</p></a>
    </form>
</body>
</html>