<?php
    include_once '..\Controller\ProduitC.php';
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
                <form method="GET" action=""  class="d-none d-md-flex ms-4">
                      <input type="text" name="search" placeholder="Rechercher par nom...">
                      <button type="submit">Rechercher</button>
                 </form>
                 
                <div class="navbar-nav align-items-center ms-auto">
               
                <a href="?sort=asc">Trier par prix croissant</a>
                 <br>  <a href="?sort=desc">Trier par prix décroissant</a> 
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
		
			<button><a href="ajouterproduit.php">Ajouter un produit</a></button>
		<center><h1>Liste des produit</h1></center>
		<div class="row">
                           
								<div class="col-md-11">
                                  
								 
		<div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
			<tr>
				<th>id_produit </th>
                <th>nom</th>
				<th>descr</th>                			
                <th>code_categ</th>
                <th>prix</th>
                <th>qte_stock</th>
                <th>date_ajout</th>

				<th>Modifier</th>
				<th>Supprimer</th>
                <th>afficher</th>
                
			</tr>
			<?php
				foreach($listeProduit as $produit){
			?>
			<tr>
				<td><?php echo $produit['id_produit']; ?></td>
				<td><?php echo $produit['Nom']; ?></td>
				<td><?php echo $produit['descr']; ?></td>
                <td><?php echo $produit['code_categ']; ?></td>
                <td><?php echo $produit['prix']; ?></td>
                <td><?php echo $produit['qte_stock']; ?></td>
                <td><?php echo $produit['date']; ?></td>
				
				<td>
                <a href="modifierproduit.php?id_produit=<?php echo $produit['id_produit']; ?>">modifier</a>

				</td>
				<td>
					<a href="supprimerproduit.php?id_produit=<?php echo $produit['id_produit']; ?>">Supprimer</a>
				</td>

                <td>
                <a href="affichersingleproduit.php?id_produit=<?php echo $produit['id_produit']; ?>">afficher</a>

				</td>
               
			</tr>
			<?php
				}
			?>
		</table>
			</div>
		</div>
	      <!-- Footer End -->
		  </div>
        <!-- Content End -->

		</div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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