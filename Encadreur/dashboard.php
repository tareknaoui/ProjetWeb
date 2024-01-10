
<?php
  $host = "localhost:3307";
  $user = "root";
  $password = "";
  $database = "projetweb";

  $link = new mysqli($host, $user, $password, $database);

  // Check the connection
  if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }

  // Récupérer le prénom et le nom de l'utilisateur connecté
  session_start();
  $email = $_SESSION['email'];

  $stmt = $link->prepare("SELECT ID, Prenom, Nom FROM encadreurs WHERE AdresseEmail = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($id, $prenom, $nom);
  $stmt->fetch();
  $stmt->close();

  // Get the projects associated with this supervisor
  $stmt = $link->prepare("SELECT * FROM projet WHERE EncadreurID = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $resultProjects = $stmt->get_result();
  $stmt->close();


  
  $stmt = $link->prepare("
    SELECT p.TitreProjet, GROUP_CONCAT(CONCAT(e.Nom, ' ', e.Prenom) SEPARATOR '<br>') as Students
    FROM etudiants e
    INNER JOIN equipesprojet ep ON e.IdEquipe = ep.ID
    INNER JOIN projet p ON ep.ProjetID = p.ID
    WHERE p.EncadreurID = ?
    GROUP BY p.TitreProjet
  ");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $resultTeamMembers = $stmt->get_result();
  $stmt->close();

  $stmt = $link->prepare("
    SELECT p.TitreProjet, CONCAT(e.Nom, ' ', e.Prenom) as Student, t.DescriptionTache, t.Echeance, t.EtatTache
    FROM tachesprojet t
    INNER JOIN etudiants e ON t.ResponsableTacheID = e.ID
    INNER JOIN equipesprojet ep ON e.IdEquipe = ep.ID
    INNER JOIN projet p ON ep.ProjetID = p.ID
    WHERE p.EncadreurID = ? AND t.EtatTache = 'in progress'
  ");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $resultTasks = $stmt->get_result();
  $stmt->close();


  $stmt = $link->prepare("
  SELECT n.id, n.sender, n.message, n.created_at
  FROM notification n
  WHERE n.encadreur_id = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultNotifications = $stmt->get_result();
$stmt->close();
  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=sbibWu1cEZGNxTB-dGnr4gyXx7a4E7v_GkbGl7QS3kdAUG_sTGxAwBKhlwVcGmf5ggdikUaKHEBQkpxY1rUBf8vawGvRN7qK-vaM0spgbtiY6oDBmRbSKd-yU5rmghX5_DYbFBj2lVg-CiBoR3MG6yi3WOwe6qDAb0ho0wRVp9hA50UShN-5GBUcWhfrsS7sSIjlZSy3OV0NPjwMvqe1ClZSPo4VlN91X6mJhfUS42GYibbAL-egZFVxfWQHdRVp8j5gU1uWjMuJ62iyFX-bf2MInIqD6Ql633Y8Cx8GbJAuQBi_RVCqhAIn3z7jT4vIxkbzr9OEFNHqUy32bpo29QOKrtAsF2T0gLHpInEmM0_tQRiUGcsVvh2nxNOqEOYmVD7V5mR1kkZSTPyNskqOZzHeS-RdFkmTrqH3tHrfzB5Z40y9sQk5W-DZfiZ9YYrxeLIDgoENlScJHM1z1ugzTkfajpaBhXrjVlntcmRIZUtA5Zm496xtFGfMXt1lKh1sPoZHVluhxn7HuxQRna4yfPyvX1LwG-cLafO34WsPNiM4YiMsslL2Q6oMHgQNJ6-yDNyW9hbtBX-x2p6559GXsRXMMs2aeuKM5vGeHrle6t_cux8v3nwPgm2E2VTIjr9HcBUtYVa08-AqkqgLmIG-H3kt3DBCa3IX7-oNdBtZmRyTTppYbaYRfiElucbUohvldFAxhsqg8Q-BlxaCdZwWR6WajXNCICUyLIHPmToKW7bfM3b46rxjis2Iqau5d411k0VxXYuvHDdULk0ePIZrplLACT4l7ZZXNN6qpA7UNYHyVTt-IlGpYcCedD1dWu_pfdUIlE9bLP9C_X_HXfL77FKmu5gZWJGtDSkvH5DRlIT7Vin6kt8RC04S2cHixtY__JnS_5KKZ7hd9l-vIoG93mCZL5KL_mAzeBXwtA9RxKE6bX7YiZkKr4f7y1ThbWMmwPFDINWIQEOl84Q6AnyKgFL6Qvz0r3OLw_qx8xTywGqqkoqi0gHhixzHft7wbRUQ30ex7fQ2D-RB4o1jcBLfSYrROTsig7HDcppck4WJCwcBG9ek68fbzJ4obfYLWf4t4DdQLDsUrEbc3lbjrqgdUXFqGV7UOlDHcCyzOiampUpz3GGyvrubeO3dyUSz_sFS1jU462ppTr8AgVubtDBlwTkWkS1r1o6E7O2oKXN54vmEvkbh_Ld9KQFKXHzpRaHPhcV18kIJgkn8GJ8Vrz12MV7LNoSEo7Zqcx0aaynMJYyKxs7FjF5QLUbgxtMrHMdcsv_ugR267UmWUHxcV19v142gYpgSujNbgg6SUNe-R5lh3rhuB4Zp6j-FYxwE0PDWEn-vX6slJLtRTYDaHXUJtB2U_hrndPIGd9InFAT-fcsHiyvcmjns_naJxBbcCYYG6yK0AjewY_YK6jLCTkt6DhcT26LwZAeo8qRsRKqyesTO7huOkACQ8TL6Zl18naHmLH0IQ-nJQghddx9opaoCIGnYvNdRVcsE7nRK2Q4uoqv4sA5Ad5n2hCKbpcd7r_3eZ-xBrRopdSF7zJmJsxawWWmzKaSp_ne_arBRHw2fwYULOtrjoflfOvOdLEKX_pnJiYfpkTwj-Zd1FOUHiAO9HJMUW73U4Oahxljd4PWrnSoraupmvYtbMjeYlCXtCE-K-e38EAQe-fTm3AfETmnFYQ" nonce="768982e7231b74bda400457e326a4fb1" charset="UTF-8"></script></head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="dashboard.php"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php echo $nom . ' ' . $prenom; ?></p>                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                 <a class="dropdown-item" href=""> 
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../Impact/index.html">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $nom . ' ' . $prenom; ?></span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Encadreur/pages/forms/AllProject.php">
                <span class="menu-title">Project Viewing Page</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Encadreur/pages/forms/inboxEncadreur.php">
                <span class="menu-title">inbox</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            

            
            

            <li class="nav-item">
              <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">Topic Proposal Page</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/tables/basic-table.php">
                <span class="menu-title">Candidate Viewing</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Projects</h6>
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
                
              </span>
            </li>
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> DashboardS
                
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
              
            </div>
         

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List of Topics</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Project Title </th>
                          <th> Description </th>
                          <th> State </th>
                          <th> Creation Date </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if ($resultProjects->num_rows > 0) {
                            // Loop through the database results and generate table rows
                            while ($project = $resultProjects->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $project['TitreProjet'] . "</td>";
                                echo "<td>" . $project['DescriptionProjet'] . "</td>";
                                echo "<td>" . $project['EtatProjet'] . "</td>";
                                echo "<td>" . $project['DateCreation'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo '<tr><td colspan="5">No projects found.</td></tr>';
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Notifications</h4>
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th> Notification Text </th>
                              <th> Date </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                   if ($resultNotifications->num_rows > 0) {
                    while ($row = $resultNotifications->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row['message'] . "</td>";
                      echo "<td>" . $row['created_at'] . "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo '<tr><td colspan="4">No notifications found.</td></tr>';
                  }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">In progress</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                      <tr>
                        <th>Project in progress</th>
                        <th></th>
                        <th></th>
                    
                      </tr>
                    </thead>
                    <tbody>
                        <?php
       if ($resultTeamMembers->num_rows > 0) {
        while ($row = $resultTeamMembers->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['TitreProjet'] . ":</td>";
          echo "<td>" . $row['Students'] . "</td>";
          echo "<td> </td>";
          echo "</tr>";
        }
      } else {
        echo "<tr>";
        echo "<td>Vous n'êtes pas dans un projet</td>";
        echo "<td> </td>";
        echo "<td> </td>";
        echo "</tr>";
      } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">In progress</h4>
                  <table id="usernamesTable" class="table">
                  <thead>
  <tr>
    <th>Project Title</th>
    <th>Student Name</th>
    <th>Task Description</th>
    <th>Due Date</th>
    <th>Task Status</th>
  </tr>
</thead>
                    <tbody>
                    <?php
  if ($resultTasks->num_rows > 0) {
    while ($row = $resultTasks->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['TitreProjet'] . "</td>";
      echo "<td>" . $row['Student'] . "</td>";
      echo "<td>" . $row['DescriptionTache'] . "</td>";
      echo "<td>" . $row['Echeance'] . "</td>";
      echo "<td>" . $row['EtatTache'] . "</td>";
      echo "</tr>";
    }
  } else {
    echo '<tr><td colspan="5">No tasks found.</td></tr>';
  }
?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
        
        <!-- partial -->
        
        
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>