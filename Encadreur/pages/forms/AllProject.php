<html>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../dashboardEn.html"><img src="../../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="../../dashboardEn.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
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
                  <img src="../../assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">David Greymaax</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
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
                    <img src="../../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
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
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">David Grey. H</span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../dashboard.html">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="../../pages/forms/AllProject.html">
                <span class="menu-title">Project Viewing Page</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="../../pages/charts/chartjs.html">
                <span class="menu-title">Topic Proposal Page</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/basic-table.html">
                <span class="menu-title">Condidate Viewing</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Projects</h6>
                </div>
                
              </span>
            </li>
          </ul>
        </nav>
       <!-- partial -->
       <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
           
            <!-- Table displaying all projects -->
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">My Projects</h4>
                   
                    <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>Project Name</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Created On</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                          $servername = "localhost";
                          $username = 'root';
                         $port = 3307; // Port modifié à 3307
                         $password = '';
                         $database = 'web';

// Créer la connexion
                          $conn = new mysqli($servername, $username, $password, $database, $port);                  
                              // Check the connection
                              if ($conn->connect_error) {
                                  die("Connection failed: " . $conn->connect_error);
                              }
                  
                              // Run the query
                              $sql = "SELECT * from projet";
                              $result = $conn->query($sql);
                  
                              // Loop through the results
                              if ($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc()) {
                                      echo "<tr>";
                                      echo "<td><a href='project1.php?id=" . $row["ID"] . "'>" . $row["TitreProjet"] . "</a></td>";
                                      echo "<td>" . $row["DescriptionProjet"] . "</td>";
                                      echo "</tr>";
                                  }
                              } else {
                                  echo "0 results";
                              }
                  
                              $conn->close();
                              ?>
                          </tbody>
                      </table>
                  </div>
                  <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a Project</button>
                  <div id="responseMessage"></div>

  
                      <div class="modal" id="addProjectModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Add a Project</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- Formulaire pour ajouter un sujet -->
                              <form id="addProjectForm">
                                <div class="mb-3">
                                  <label for="topicTitle" class="form-label">Projet Title</label>
                                  <input type="text" class="form-control" id="ProjectTitle" required>
                                </div>
                                <div class="mb-3">
                                  <label for="ProjectDescription" class="form-label"> Description</label>
                                  <textarea class="form-control" id="ProjectDescription" rows="3" required></textarea>
                                </div>
                                <button type="button" id="submitForm" class="btn btn-gradient-primary">Add Project</button>
                              </form>
                            </div>
                            </div>
                          </div>
                        </div>
                      
                      <button class="btn btn-danger mb-2" id="deleteProjectBtn">Supprimer un Projet</button>

                      <!-- Bouton "Add Project" en bas du tableau -->
                      
                  </div>
                    
                   
                                          
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </div>
         </div>
        </div>
       
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script>
      
      $(document).ready(function() {
        $("#submitForm").on("click", function() {
          // Get form data
          var ProjectTitle = $("#ProjectTitle").val();
          var ProjectDescription = $("#ProjectDescription").val();
    
          // Create a data object to send to the server
          var formData = {
            title: ProjectTitle,
            description: ProjectDescription
          };
    
          // Use Ajax to send data to the PHP backend
          $.ajax({
            type: "POST",
            url: "AddProject.php", // Replace with the actual path to your PHP script
            data: formData,
            success: function(response) {
              // Update a specific element with the response message
              $("#responseMessage").html(response);
            },
            error: function(error) {
              // Handle errors if the request fails
              console.log(error);
            }
          });
        });
      });

    </script>
    <script>
      // Attend que le document soit prêt
      $(document).ready(function() {
        // Gère le clic sur le bouton "+ Add a Project"
        $('button.btn-gradient-primary').click(function() {
          // Affiche la fenêtre modale pour ajouter un sujet
          $('#addProjectModal').modal('show');
        });

        // Gère la soumission du formulaire
        $('#addProjectForm').submit(function(event) {
          // Empêche le comportement par défaut du formulaire (rechargement de la page)
          event.preventDefault();

          // Récupère les valeurs du formulaire
          var ProjectTitle = $('#ProjectTitle').val();
          var ProjectDescription = $('#ProjectDescription').val();

          // Effectuez toute validation nécessaire ici

          // Ajoute le nouveau sujet au tableau
          addProjectToTable(ProjectTitle, ProjectDescription);

          // Réinitialise le formulaire
          $('#addProjectForm')[0].reset();

          // Ferme la fenêtre modale
          $('#addProjectModal').modal('hide');
        });

        // Fonction pour ajouter un nouveau sujet au tableau
        function addProjectToTable(title, description) {
          // Récupère le corps du tableau
          var tableBody = $('.table tbody');

          // Crée une nouvelle ligne de tableau
          var newRow = tableBody.append('<tr></tr>').children('tr:last');

          // Ajoute les cellules avec les détails du sujet
          newRow.append('<td>' + title + '</td>');
          newRow.append('<td>' + description + '</td>');
          newRow.append('<td><label class="badge badge-gradient-success">New</label></td>');
          newRow.append('<td>Now</td>');
          newRow.append('<td>None yet</td>');

          // Vous pouvez également effectuer des actions supplémentaires, telles que la mise à jour du serveur avec le nouveau sujet
        }
      });
    </script>--!>
    
    <!-- End custom js for this page -->
  </body>
</html>
</html>