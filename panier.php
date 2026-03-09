<?php
include 'db.php'; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
    <title>eats at Siman</title>
</head>
<body>



<nav class="navbar">  
    <ul>
   <li><a href="accueil.php">ACCUEIL</a></li>
       <li><a href="menu.php">MENU</a></li>
        <li><a href="deconnexion.php">DECONNECTER</a></li>
   </ul> 
</nav> 

<?php
session_start();

// Liste des pizzas et prix
$pizzas = array(
    "Margherita" => 8.99,
    "orientale" => 10.99,
    "reine" => 10.99,
    "4Fromages" => 10.99,
    "kebab" => 10.99,
    "family" => 10.99,
    "Compionna" => 10.99,
    "Vegetarienne" => 10.99
);

// Initialisation du panier
if(!isset($_SESSION['panier'])) { //Si le panier n’existe pas dans la session
    $_SESSION['panier'] = [];  // cree un tableau vide pour stocker les pizza
    $_SESSION['qty'] = [];  // tableau pour stocker la quantité de chaque pizza
    $_SESSION['amounts'] = []; // tableau pour stocker le prix total par pizza (prix * quantité)
}

// ---------------------------
// AJOUT d'une pizza
if(isset($_POST['add']) && isset($_POST['pizza'])) { // on verifie si le bouton add est clique et en envoye et qu'il existe
    $pizza = $_POST['pizza']; // on  recupere le nom de la pizza envoye
    if(isset($_SESSION['panier'][$pizza])){ // on verifie si la pizza est dans le panier
        $_SESSION['qty'][$pizza] += 1; // on augmente de +1 la quantite de pizza
    } else {
        $_SESSION['panier'][$pizza] = $pizza; // on ajoute dans la pizza dans le panier
        $_SESSION['qty'][$pizza] = 1;  // on augmente de 1
    }
    $_SESSION['amounts'][$pizza] = $_SESSION['qty'][$pizza] * $pizzas[$pizza]; // la on calcul la quantite de la pizza et prix au total
}

// ---------------------------
// SUPPRESSION d'une pizza
if(isset($_POST['delete']) && isset($_POST['pizza'])){  //si le bouton retirer a ete clique et si une pizza a ete envoye on execute le code de suppression
    $pizza = $_POST['pizza'];
    if(isset($_SESSION['panier'][$pizza])){  // on verifie si le panier existe et quil stocke les info du panier
        $_SESSION['qty'][$pizza] -= 1;  // on diminue la quantite de 1
        if($_SESSION['qty'][$pizza] <= 0){
            unset($_SESSION['panier'][$pizza]); // on enleve une pizza du panier
            unset($_SESSION['qty'][$pizza]); // on enleve la quantite
            unset($_SESSION['amounts'][$pizza]); // on enleve le montants 
        } else {
            $_SESSION['amounts'][$pizza] = $_SESSION['qty'][$pizza] * $pizzas[$pizza]; // on va multiplier la quantite de la pizza  X son prix
        }
    }
}

// ---------------------------
// Vider tout le panier
if(isset($_POST['reset'])){ // si on clique sur le bouton reset
    $_SESSION['panier'] = []; // sa reset le panier
    $_SESSION['qty'] = []; // quantite
    $_SESSION['amounts'] = []; //montant
}

?>

<h2>Mon Panier</h2>

<?php if(!empty($_SESSION['panier'])): ?>  <!-- affiche letableau du panier -->
<table border="1" cellpadding="5">   <!-- affiche le tableau  -->
<tr>
    <th>Pizza</th>
    <th>Quantité</th>
    <th>Prix</th>
    <th>Action</th>
</tr>
<?php 
$total = 0;
foreach($_SESSION['panier'] as $pizza): // Pour chaque pizza dans le panier, on met cette pizza dans $pizza et on répète le code qui suit jusqu’à endforeach;.
    $qty = $_SESSION['qty'][$pizza]; // on recuperer la quantite pizza
    $amount = $_SESSION['amounts'][$pizza]; // on va recupere le montants de la pizza 
    $total += $amount;  // ajoute au total general
?>
<tr>
    <td><?php echo $pizza; ?></td>  <!-- on affiche la pizza-->
    <td><?php echo $qty; ?></td>  <!-- on affiche la quantite -->
    <td><?php echo number_format($amount,2); ?> €</td>  <!-- on affiche le montant  avec le nombre format ex:10.99-->
    <td>
        <form method="POST" style="display:inline">
            <input type="hidden" name="pizza" value="<?php echo $pizza; ?>">  <!-- hidden champs invisible envoye la pizza sans l'affche -->
            <button type="submit" name="delete">Retirer</button>      <!-- Bouton pour supp un article -->
        </form>
    </td>
</tr>
<?php endforeach; ?> 
<tr>
    <td colspan="2"><strong>Total :</strong></td>
    <td colspan="2"><strong><?php echo number_format($total,2); ?> €</strong></td>
</tr>
</table>

<br>
<form method="POST">
    <button type="submit" name="reset">Vider le panier</button>
</form>

<?php else: ?>
<p>Panier vide</p>
<?php endif; ?> <!-- ferme la condition  !empty($_SESSION['panier']) -->

<br>
<a href="menu.php">Retour au menu</a>



<footer>
    <div class="footer">
        <p>© 2026 eats at Siman- Tous droits réservés.</p>
    </div>
</footer> 
    
</body>
</html>