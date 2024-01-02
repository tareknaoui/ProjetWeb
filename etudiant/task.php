<?php
// ... (your existing code)

// Establish a database connection (replace with your database credentials)
$host = "localhost";
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
$stmt = $link->prepare("SELECT ID, Prenom, Nom FROM etudiants WHERE AdresseEmail = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($studentID, $prenom, $nom);
$stmt->fetch();
$stmt->close();

// Use the student's ID to fetch tasks from the tachesprojet table
$stmt = $link->prepare("SELECT ID, DescriptionTache, Echeance, EtatTache FROM tachesprojet WHERE ResponsableTacheID = ?");
$stmt->bind_param("i", $studentID);
$stmt->execute();
$stmt->bind_result($taskID, $description, $echeance, $etatTache);





?>
<html>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Tâches</title>
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../Encadreur/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Encadreur/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="dashboardET.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="../Encadreur/assets/images/favicon.ico" />

    <!-- Inclure les fichiers CSS et JavaScript de FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </head>
  <body>

    
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a  class="as"><H1>Logo</H1></a>
        </div>
        <style>
          .as {
            text-decoration: none; /* Remove underline from link */
          }
          .as h1 {
  color: #0d1316; /* Change the text color */
  font-family: 'Arial', sans-serif; /* Change the font */
  font-size: 2.5em; /* Increase the font size */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add a text shadow */
}
        </style>
    
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
        
          <div class="search-field d-none d-md-block">
           

          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../Encadreur/assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                <span class="font-weight-bold mb-2"><?php echo $prenom . ' ' . $nom; ?></span>
                </div>
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
                    <img src="../Encadreur/assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../Encadreur/assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../Encadreur/assets/images/faces/face3.jpg" alt="image" class="profile-pic">
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
                  <img src="../Encadreur/assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?php echo $prenom . ' ' . $nom; ?></span>
                  <span class="text-secondary text-small">Etudiant</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboardEt.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
           
          
            <li class="nav-item">
              <a class="nav-link" href="page-topic-exploration.php">
                <span class="menu-title"> Page Topic Exploration</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
       
            <li class="nav-item">
              <a class="nav-link" href="inbox.php">
                <span class="menu-title">Inbox</span>
                <i class="mdi mdi-email-outline menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="task.php">
                <span class="menu-title">Project Progress</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            
    
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          
          <div class="content-wrapper">
            
            <div class="page-header">
          
              
              
            </div>
            
            <div class="col-lg-12 grid-margin stretch-card">
         
            
                  </p>
                  <?php

                  if ($stmt->num_rows > 0) {
                    echo'              <div class="card table-striped">';
                    echo'<div class="card-body">';
                    echo' <h4 class="card-title">Students:</h4>
                    ';
                    echo '<table class="table table-striped wide-table">';
                    echo '<thead>
                        <tr>
                          <th>Task</th>
                          <th>Dead-line</th>
                          <th>Status</th>
                          <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>';

                    // Loop through the database results and generate table rows
                    while ($stmt->fetch()) {
                      echo "<tr>";
                      echo "<td>$description</td>";
                      echo "<td>$echeance</td>";
                      echo "<td><span class='task-status " . ($etatTache === 'To do' ? 'status-todo' : 'status-inprogress') . "'>$etatTache</span></td>";
                      echo "<td>";
                      echo "<form method='post' action=''>"; // Use an empty action for the same page
                      echo "<input type='hidden' name='taskId' value='$taskID'>";
                      echo "<input type='hidden' name='newEtat' value='" . ($etatTache === 'To do' ? 'In progress' : 'To do') . "'>";
                      echo "<input type='submit' value='Update' class='btn btn-primary'>";
                      echo "</form>";
                      echo "</td>";
                      echo "</tr>";
                    }

                    echo '</tbody></table>';
                  } else {
                    echo '<div class="no-results">No in a project yet.</div>';
                  }
                  $stmt->close();
                  ?>
                </div>
                
              </div>
              
          </div>
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        
          <!-- partial -->
        </div>


</div>
<!-- Include jQuery -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".btn-primary").click(function(e){
    e.preventDefault();
    var taskId = $(this).siblings('input[name="taskId"]').val();
    
    var newEtat = $(this).siblings('input[name="newEtat"]').val();
    $.ajax({
      url: 'update_task.php',
      type: 'post',
      data: {taskId: taskId, newEtat: newEtat},
      success: function(response){
        location.reload(); // Reload the page to see the changes
      }
    });
  });
});
</script>


          
     


              <style>
                /* Style the table */
                .table.table-striped.wide-table {
                  width: 100%; /* Make the table take up the full width of its container */
                }

                /* Style the table headers */
                .table.table-striped.wide-table thead th {
                  background-color: #f8f9fa; /* Light gray background */
                  color: #343a40; /* Dark gray text */
                  padding: 10px; /* Add some padding */
                  text-align: left; /* Align text to the left */
                }

                /* Style the table body */
                .table.table-striped.wide-table tbody td {
                  padding: 10px; /* Add some padding */
                }

                /* Style the task status */
                .task-status {
                  font-weight: bold; /* Make the text bold */
                }

                /* Style the 'To do' status */
                .status-todo {
                  color: red; /* Make the text red */
                }

                /* Style the 'In progress' status */
                .status-inprogress {
                  color: orange; /* Make the text orange */
                }

                /* Style the update button */
                .btn.btn-primary {
                  color: white; /* White text */
                  background-color: #007bff; /* Blue background */
                  border-color: #007bff; /* Blue border */
                }
                .no-results {
    font-size: 2em; /* Make the text larger */
    color: white; /* Change the text color */
    text-align: center; /* Center the text */
    margin-top: 50px; /* Add some space at the top */
    width: 100%; /* Full width */
    display: flex; /* Use flexbox */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    height: 100vh; /* Full viewport height */
  }
     
              </style>
            
              



              
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
    <script src="../Encadreur/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../Encadreur/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../Encadreur/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../Encadreur/assets/js/off-canvas.js"></script>
    <script src="../Encadreur/assets/js/hoverable-collapse.js"></script>
    <script src="../Encadreur/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../Encadreur/assets/js/dashboard.js"></script>
    <script src="../Encadreur/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
</html>