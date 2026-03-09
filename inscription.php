<?php
include 'db.php';  // on inclus la bdd 


if(isset($_POST['valider'])){  //   si le  bouton valider existe alors on validera la suite 
    if(!empty($_POST['nom']) &&  // si la case nom n'est pas vide && verifie plusieurs condition en meme temps
       !empty($_POST['prenom']) &&  // on verifie si le prenom  est pas vide 
       !empty($_POST['email']) &&  // on verifie si l'email  est pas vide
       !empty($_POST['motdepasse']) && 
       !empty($_POST['age']) && 
       !empty($_POST['sexe']) && 
       !empty($_POST['role'])){

        $nom = htmlspecialchars($_POST['nom']); // on recupere les info de connexion du nom securise 
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $age = $_POST['age'];
        $mdp = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT); // la on recupere les info de connexion du mdp hasher
        $sexe = $_POST['sexe']; // c'est plutot on stocke les donnes de sexe
        $role = $_POST['role'];

        $insertUser = $pdo->prepare('    
            INSERT INTO site(nom, prenom, adresse_mail, motdepasse, sexe, role, age) 
            VALUES(?, ?, ?, ?, ?, ?, ?)
        '); // On prépare une requête SQL prête à être envoyée, qui utilisera la connexion $pdo pour communiquer avec la base de données
        // et  on ajoute une ligne a ma table site
        $insertUser->execute([  // on execute une requete preparer telle nom , prenom etc
            $nom, 
            $prenom, 
            $email, 
            $mdp, 
            $sexe, 
            $role, 
            $age
        ]); 

        header('Location: connexion.php'); // renvoie a la page connexion
    } else {
        $errorMsg = "Veuillez compléter tous les champs."; // sinon il doit completer les champs
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    <form class="container" method="POST">
        <?php if(isset($errorMsg)){ echo '<p style="color:red;">'.$errorMsg.'</p>'; } ?>

        <div class="cadre">
            <label>Nom</label>
            <input type="text" name="nom" required>
        </div>

        <div class="cadre">
            <label>Prénom</label>
            <input type="text" name="prenom" required>
        </div>

        <div class="cadre">
            <label>Email :</label>
            <input type="email" name="email" required>
        </div>

        <div class="cadre">
            <label>Âge :</label>
            <input type="number" name="age" required>
        </div>

        <div class="cadre">
            <label>Adresse :</label>
            <input type="name" name="Adresse" required>
        </div>

        <div class="cadre">
            <label>Mot de passe</label>
            <input type="password" name="motdepasse" required>
        </div>

        <div class="cadre">
            <label>Sexe :</label>
            <select name="sexe" required>
                <option value="">-- Sélectionnez --</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
                <option value="Autre">Autre</option>
            </select>
        </div>

        <div class="cadre">
            <label>Rôle :</label>
            <select name="role" required>
                <option value="">-- Sélectionnez --</option>
                <option value="Client">Client</option>
                <option value="Livreur">Livreur</option>
                <option value="Restaurateur">Restaurateur</option>
            </select>
        </div>

        <button type="submit" name="valider">S'inscrire</button>
        <a href="connexion.php"><p>Se Connecter</p></a>
    </form>
</body>
</html>