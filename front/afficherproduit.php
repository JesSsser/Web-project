
  <?php
      include_once '..\Controller\ProduitC.php';
      session_start();

      $ProduitC = new ProduitC();

      // Vérifie si le paramètre "search" a été envoyé
      if (isset($_GET['search'])) {
          $search = $_GET['search'];
          // Appel de la fonction de recherche par nom
          $listeProduit = $ProduitC->rechercheproduitsParNom($search);
      } else {
          // Vérification du paramètre "sort" pour trier les produits
          if (isset($_GET['sort']) && $_GET['sort'] == 'asc') {
              $listeProduit = $ProduitC->trieasc();
          } elseif (isset($_GET['sort']) && $_GET['sort'] == 'desc') {
              $listeProduit = $ProduitC->triedesc();
          } else {
              $listeProduit = $ProduitC->afficherproduits();
          }
      }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Store - Products</title>
    <style> /* Reset some default styles */
body, h1, h2, h3, p {
    margin: 0;
    padding: 0;
}

/* Navigation Bar styles */
.navbar {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    border: none; /* Remove border */
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0; /* Remove padding */
}

.navbar-brand {
    font-size: 24px;
    text-decoration: none;
    color: #fff;
}

.nav-menu {
    list-style: none;
    display: flex;
    margin-left: auto; /* Move menu to the right */
}

.nav-menu li {
    margin-right: 20px;
}

.nav-menu a {
    color: #fff;
    text-decoration: none;
}

.user-menu {
    display: flex;
    align-items: center;
    margin-left: 20px; /* Add margin for spacing */
}

.user-menu img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}
}

/* Search Bar styles */
.search-bar {
    background-color: #f8f9fa;
    padding: 20px 0;
}

.search-bar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.search-form input[type="text"] {
    padding: 10px;
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
}

.search-form button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.sort-options a {
    text-decoration: none;
    color: #007bff;
    margin-right: 10px;
}

/* Product Listing styles */
.page-title {
    font-size: 28px;
    margin: 20px 0;
}

.product-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.product {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    transition: transform 0.2s;
}

.product:hover {
    transform: translateY(-5px);
}

.product img {
    max-width: 100%;
    height: auto;
}

.product-name {
    font-size: 24px;
    margin-top: 10px;
}

.product-description {
    margin-top: 10px;
}

.product-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

.product-price {
    font-weight: bold;
    color: #007bff;
    font-size: 18px;
}

.product-link {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
    transition: background-color 0.2s;
}

.product-link:hover {
    background-color: #0056b3;
}

/* Footer styles */
.footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

/* Responsive styles */
@media (max-width: 768px) {
    .nav-menu {
        flex-direction: column;
        align-items: flex-start;
    }

    .nav-menu li {
        margin-bottom: 10px;
        margin-right: 0;
    }

    .search-form input[type="text"] {
        width: 100%;
        margin-right: 0;
    }
}
 </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">E-Commerce Store</a>
        <ul class="nav-menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="afficherproduit.php">Products</a></li>
            <li><a href="afficherposte.php">Posts</a></li>
            <li><a href="affichercomment.php">Comments</a></li>
        </ul>
        <div class="user-menu">
            <a href="profil.php">
                <img src="user-avatar.jpg" alt="User Avatar">
                <?php echo $_SESSION["nom"]; ?>
            </a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>
</nav>

    <!-- Search Bar -->
    <div class="search-bar">
        <div class="container">
            <form method="GET" action="" class="search-form">
                <input type="text" name="search" placeholder="Search by name...">
                <button type="submit">Search</button>
            </form>
            <div class="sort-options">
                <a href="?sort=asc">Sort by Price (Low to High)</a>
                <a href="?sort=desc">Sort by Price (High to Low)</a>
            </div>
        </div>
    </div>

    <!-- Product Listing -->
    <div class="container">
        <h1 class="page-title">Featured Products</h1>
        <div class="product-list">
            <?php
                foreach($listeProduit as $produit) {
            ?>
            <div class="product">
                <img src="images/shop/products/iphone13(3).png" alt="<?php echo $produit['Nom']; ?>">
                <h2 class="product-name"><?php echo $produit['Nom']; ?></h2>
                <p class="product-description"><?php echo $produit['descr']; ?></p>
                <div class="product-details">
                    <span class="product-price">$<?php echo $produit['prix']; ?></span>
                    <a href="affichersingleproduit.php?id_produit=<?php echo $produit['id_produit']; ?>" class="product-link">Details</a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 E-Commerce Store. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>
