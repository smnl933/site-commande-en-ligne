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
<style>
 
 .pizza-scroll-container {
    display: grid;
    grid-template-columns: repeat(5, 1fr); /* 5 colonnes de même largeur */
    gap: 25px;
    padding: 10px 0;
}


       /* Style des cartes de pizza */
    .encadre {
        min-width: 200px;
        border: 2px solid #ddd;
        border-radius: 20px;
        padding: 60px;
        text-align: center;
        background: white;
        box-shadow: 9 9px 9px rgba(0, 0, 0, 0.1);
    }

</style>
    
</head>
<body>

<nav class="navbar">  
    <ul>
       <li><a href="accueil.php">ACCUEIL</a></li>
       <li><a href="menu.php">MENU</a></li>
       <li><a href="panier.php">PANIER</a></li>
       <li><a href="deconnexion.php">DECONNECTER</a></li>
 
    </ul>

    
</nav>    

<main>
    <div class="pizza-section">
        <div class="pizza-pricing">
            <label>
                MARGHERITA – 8.99 €<br>
                AUTRE PIZZA – 10.99 €<br>
            </label>
        </div>

        <!-- Conteneur de défilement horizontal pour les pizzas -->
        <div class="pizza-scroll-container">
            <!-- Cartes de pizza -->
            <div class="encadre">
                <img src="margherita.png" alt="Margherita" style="width:120px; height:100px;">
                <h3>Margherita</h3>
                <p>Base Tomate</p>
                <p>Olives, mozzarella.</p>
                <form method="POST" action="panier.php">
                <input type="hidden" name="pizza" value="Margherita">
                <button type="submit" name="add">Ajouter au panier</button>
                </form>
            </div>

            <div class="encadre">
                <img src="orientale.png" alt="L'orientale" style="width:120px; height:auto;">
                <h3>L'orientale</h3>
                <p>Base Tomate</p>
                <p>Mozzarella, merguez, poivrons, olives</p>
                <form method="POST" action="panier.php">
                <input type="hidden" name="pizza" value="orientale">
                <button type="submit" name="add">Ajouter au panier</button>
                </form>
            </div>

            <div class="encadre">
                <img src="reine.png" alt="La reine" style="width:120px; height:auto;">
                <h3>La reine</h3>
                <p>Base Tomate</p>
                <p>Mozzarella, jambon, champignons, olives</p>
                <form method="POST" action="panier.php">
                <input type="hidden" name="pizza" value="reine">
                <button type="submit" name="add">Ajouter au panier</button>
                </form>
            </div>

            <div class="encadre">
                <img src="4fromage.png" alt="4Fromages" style="width:120px; height:auto;">
                <h3>4 Fromages</h3>
                <p>Base Tomate</p>
                <p>Mozzarella, chèvre, reblochon, bleu.</p>
                <form method="POST" action="panier.php">
                <input type="hidden" name="pizza" value="4Fromages">
                <button type="submit" name="add">Ajouter au panier</button>
                </form>
            </div>

        <div class="pizza-scroll-container">
            <div class="encadre">
                <img src="kebabpizza.png" alt="Kebab" style="width:120px; height:auto;">
                <h3>Kebab</h3>
                <p>Base Tomate</p>
                <p>Mozzarella, kebab, poivrons, oignons.</p>
                <form method="POST" action="panier.php">
                <input type="hidden" name="pizza" value="kebab">
                <button type="submit" name="add">Ajouter au panier</button>
                </form>
            </div>

            <div class="encadre">
                <img src="family.png" alt="Family" style="width:120px; height:auto;">
                <h3>Family</h3>
                <p>Base Tomate</p>
                <p>Mozzarella, poulet, viande hachée, merguez, chorizo.</p>
                <form method="POST" action="panier.php">
                <input type="hidden" name="pizza" value="family">
                <button type="submit" name="add">Ajouter au panier</button>
                </form>
            </div>

            <div class="encadre">
                <img src="compionna.png" alt="Compionna" style="width:120px; height:auto;">
                <h3>Compionna</h3>
                <p>Base Tomate</p>
                <p>Mozzarella, oignons, viande hachée, olives, oeufs.</p>
                <form method="POST" action="panier.php">
                <input type="hidden" name="pizza" value="Compionna">
                <button type="submit" name="add">Ajouter au panier</button>
                </form>
                
            </div>

            

            <div class="encadre">
                <img src="vegetarienne.png" alt="Vegetarienne" style="width:120px; height:auto;">
                <h3>Vegetarienne</h3>
                <p>Base Tomate</p>
                <p>Mozzarella, poivrons, tomates fraiches, pdt, champignons.</p>
                <form method="POST" action="panier.php">
                <input type="hidden" name="pizza" value="Vegetarienne">
                <button type="submit" name="add">Ajouter au panier</button>
                </form>
            </div>
        </div>
    </div>
</main>




<footer>
    <div class="footer">
        <p>© 2026 eats at Siman - Tous droits réservés.</p>
    </div>
</footer> 




</body>
</html>


