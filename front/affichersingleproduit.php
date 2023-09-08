

<?php
session_start();

if(isset($_SESSION["id_user"])) {
}else{
  session_destroy();
	header('Location: signin.php');

    
}
?>
<?php
	include '../Controller/produitC.php';
	$produitC=new produitC();

	
  
        $produit = $produitC->recupererproduit($_GET['id_produit']);
        ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Commerce Store - Product Details</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Reset some default styles */
        body, h1, h2, h3, p {
            margin: 0;
            padding: 0;
        }

        /* Header styles */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            text-decoration: none;
            color: #fff;
        }

        .nav-menu {
            list-style: none;
            display: flex;
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
        }

        .user-menu img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 5px; /* Add a small space between username and profile */
        }

        /* Style user menu items */
        .user-menu a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
        }

        /* Product Details styles */
        .product-details {
            padding: 20px;
            box-shadow: none;
            margin: 0 auto; /* Center the product details */
            max-width: 600px; /* Limit the width for better readability */
        }

        .product-image img {
            max-width: 100%;
            height: auto;
        }

        .product-info h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        .product-price {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }

        .product-description {
            margin-bottom: 20px;
            color: #555;
        }

        .availability span {
            color: #155724;
            font-weight: bold;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        /* Back to Top Button styles */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            font-size: 24px;
            padding: 10px 20px;
            border-radius: 50%;
            cursor: pointer;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="container">
                <a href="index.html" class="logo">E-Commerce Store</a>
                <ul class="nav-menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="afficherproduit.php">Products</a></li>
                    <li><a href="afficherposte.php">Posts</a></li>
                    <li><a href="affichercomment.php">Comments</a></li>
                </ul>
                <div class="user-menu">
                    <span><?php echo $_SESSION["nom"]; ?></span>
                    <a href="profil.php">Profile</a>
                    <a href="logout.php">Log Out</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Product Details Section -->
    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-image">
                        <?php $imageUrl = "images/shop/products/iphone13(3).png"; ?>
                        <img src="<?php echo $imageUrl; ?>" alt="<?php echo $produit['Nom']; ?>">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-info">
                        <h1><?php echo $produit['Nom']; ?></h1>
                        <p class="product-price"><?php echo $produit['prix']; ?> DT</p>
                        <p class="product-description"><?php echo $produit['descr']; ?></p>
                        <p><strong>Reference:</strong> <?php echo $produit['id_produit']; ?></p>
                        <p class="availability"><strong>Availability:</strong> <span>In stock</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2023 E-Commerce Store. All rights reserved.</p>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>

</html>
