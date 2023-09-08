<?php
    include_once '..\Model\Produit.php';
    include_once '..\Controller\ProduitC.php';

    $error = "";

    // create produit
    $produit = null;

    $id_produit = $_GET["id_produit"];

    // create an instance of the controller
    $produitC = new ProduitC();
    
    if (
        isset($_POST["Nom"]) &&
        isset($_POST["descr"]) &&
        isset($_POST["code_categ"]) &&
        isset($_POST["prix"]) &&
        isset($_POST["qte_stock"])    ){
        $produit = new Produit(
            $_POST["Nom"],
            $_POST["descr"],
            $_POST["code_categ"],
            $_POST["prix"],
            $_POST["qte_stock"]        );

        $produitC->modifierproduit($produit, $id_produit);
        header("Location:afficherproduit.php");
    }
    else {
        $error = "aaa";
    }
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* Style for the form container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Style for input fields to improve clarity */
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px; /* Increase input text size for better readability */
            color: #333; /* Change input text color to dark gray */
            background-color: #f5f5f5; /* Add a light gray background to input fields for contrast */
        }

        /* Optional: Style for input fields on focus (when clicked) */
        input[type="text"]:focus,
        input[type="date"]:focus {
            border-color: #007bff; /* Change border color on focus to blue */
        }

        /* Style for form labels */
        label {
            font-weight: bold;
        }

        /* Style for submit and reset buttons */
        input[type="submit"],
        input[type="reset"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0056b3;
        }

        /* Style for error messages */
        .error-message {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


         <!-- Sidebar Start -->
         <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Khemiri Motez</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                <a href="dash.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="afficheruser.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Gestion User</a>
                    <a href="afficherproduit.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Gestion Produit</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item active">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               
                 
                <div class="navbar-nav align-items-center ms-auto">
               
                
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="profil.php" class="dropdown-item">My Profile</a>
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <button><a href="afficherproduit.php">Retour à la liste des produits</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_GET["id_produit"])){
				$produit = $produitC->recupererproduit($_GET["id_produit"]);
		?>
        
        <form action="" method="POST">
            <table align="center">
            <br><br><br><br><br>
				<tr>
                    <td>
                    <label for="Nom">Nom: </label>
                    </td>
                    <td><input type="text" name="Nom" id="Nom" value="<?php echo $produit['Nom']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                    <label for="descr">Description:
                        </label>
                    </td>
                    <td><input type="text" name="descr" id="descr" value="<?php echo $produit['descr']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                    <label for="code_categ">Code de catégorie:
                        </label>
                    </td>
                    <td><input type="text" name="code_categ" id="code_categ" value="<?php echo $produit['code_categ']; ?>" maxlength="50"></td>
                </tr>
                <tr>
                    <td>
                    <label for="prix">Prix:
                        </label>
                    </td>
                    <td><input type="text" name="prix" id="prix" value="<?php echo $produit['prix']; ?>" maxlength="50"></td>
                </tr>
                <tr>
                    <td>
                    <label for="qte_stock">Quantité en stock:
                        </label>
                    </td>
                    <td><input type="text" name="qte_stock" id="qte_stock" value="<?php echo $produit['qte_stock']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>