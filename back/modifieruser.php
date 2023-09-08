<?php
    include_once '..\Model\User.php';
    include_once '..\Controller\UserC.php';

    $error = "";

    // create offre
    $user = null;

 $a=$_GET["id_user"];
 

    // create an instance of the controller
    $UserC = new UserC();
    if (
        isset($_POST["nom"]) &&
		isset($_POST["prenom"]) &&
        isset($_POST["date_nais"]) &&
        isset($_POST["adresse"]) &&
		isset($_POST["email"]) &&
        isset($_POST["password"]) &&
        isset($_POST["num_tel"])
    ) if (
        isset($_POST["nom"]) &&
		isset($_POST["prenom"]) &&
        isset($_POST["date_nais"]) &&
        isset($_POST["adresse"]) &&
		isset($_POST["email"]) &&
        isset($_POST["password"]) &&
        isset($_POST["num_tel"])
    ){		

            $userer = new User(
               $_POST["nom"],		
                $_POST["prenom"] ,
                $_POST["date_nais"],
                $_POST["email"],
                $_POST["adresse"],
                $_POST["password"],
                $_POST["num_tel"] 
              );
         
            $UserC->modifieruser($userer, $a);
            header("Location:afficheruser.php");
        }
        else
            $error = "Missing information";

    
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Modifier Utilisateur</title>
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
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_GET["id_user"])){
				$user = $UserC->recupereruser($_GET["id_user"]);
				
		?>




<div class="container">
        <form action="" method="POST">
            <h2>Modifier Utilisateur</h2>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $user['nom']; ?>"
                    maxlength="20">
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom:</label>
                <input type="text" class="form-control" name="prenom" id="prenom"
                    value="<?php echo $user['prenom']; ?>" maxlength="20">
            </div>

            <div class="mb-3">
                <label for="date_nais" class="form-label">Date de naissance:</label>
                <input type="date" class="form-control" name="date_nais" id="date_nais"
                    value="<?php echo $user['date_nais']; ?>" maxlength="20">
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse:</label>
                <input type="text" class="form-control" name="adresse" id="adresse"
                    value="<?php echo $user['adresse']; ?>" maxlength="20">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>"
                    maxlength="20">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="text" class="form-control" name="password" id="password"
                    value="<?php echo $user['password']; ?>" maxlength="20">
            </div>

            <div class="mb-3">
                <label for="num_tel" class="form-label">Numéro de téléphone:</label>
                <input type="text" class="form-control" name="num_tel" id="num_tel"
                    value="<?php echo $user['num_tel']; ?>" maxlength="20">
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Modifier">
                <input type="reset" class="btn btn-secondary" value="Annuler">
            </div>
        </form>
    </div>

        
    
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