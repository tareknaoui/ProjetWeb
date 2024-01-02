  <?php
  // Establish a database connection (replace with your database credentials)
  $host = "localhost:3307";
  $user = "root";
  $password = "";
  $database = "web";

  $link = new mysqli($host, $user, $password, $database);

  // Check the connection
  if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }

  // Récupérer le prénom et le nom de l'utilisateur connecté
  session_start();
  $email = $_SESSION['email'];

  $stmt = $link->prepare("SELECT Prenom, Nom FROM etudiants WHERE AdresseEmail = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($prenom, $nom);
  $stmt->fetch();
  $stmt->close();

  // Fetch student id
  $stmtStudentId = $link->prepare("SELECT ID FROM etudiants WHERE AdresseEmail = ?");
  $stmtStudentId->bind_param("s", $email);
  $stmtStudentId->execute();
  $resultStudentId = $stmtStudentId->get_result();
  $studentData = $resultStudentId->fetch_assoc();
  $studentId = isset($studentData['ID']) ? $studentData['ID'] : null;
  $stmtStudentId->close();

  // Fetch project id
  $stmtProjectId = $link->prepare("SELECT p.ID 
          FROM etudiants et 
          JOIN equipesprojet eq ON et.IdEquipe = eq.ID 
          JOIN projet p ON eq.ProjetID = p.ID
          WHERE et.AdresseEmail = ?");
  $stmtProjectId->bind_param("s", $email);
  $stmtProjectId->execute();
  $resultProjectId = $stmtProjectId->get_result();
  $projectData = $resultProjectId->fetch_assoc();
  $projectId = isset($projectData['ID']) ? $projectData['ID'] : null;
  $stmtProjectId->close();

  // Fetch team members
  $stmtTeamMembers = $link->prepare("SELECT et.ID, et.Nom, et.Prenom 
  FROM etudiants et 
  JOIN equipesprojet eq ON et.IdEquipe = eq.ID 
  WHERE eq.ID = (SELECT IdEquipe FROM etudiants WHERE AdresseEmail = ?)");
$stmtTeamMembers->bind_param("s", $email);
$stmtTeamMembers->execute();
$resultTeamMembers = $stmtTeamMembers->get_result();
$stmtTeamMembers->close();

  // Retrieve data from the 'sujet' table, including encadreur's first name
  $sql = "SELECT e.Prenom AS EncadreurFirstName, s.description, s.theme, s.encadreur_fichier_pdf 
      FROM sujet s
      INNER JOIN encadreurs e ON s.encadreur_id = e.ID";
  $result = $link->query($sql);

  // Fetch notifications
  $stmtNotifications = $link->prepare("SELECT id, message, created_at FROM notification WHERE etudiant_id = ?");
  $stmtNotifications->bind_param("i", $studentId);
  $stmtNotifications->execute();
  $resultNotifications = $stmtNotifications->get_result();
  $stmtNotifications->close();

  // Fetch tasks
  $stmtTasks = $link->prepare("SELECT * FROM tachesprojet WHERE ResponsableTacheID = (SELECT ID FROM etudiants WHERE AdresseEmail = ?)");
  $stmtTasks->bind_param("s", $email);
  $stmtTasks->execute();
  $resultTasks = $stmtTasks->get_result();
  $stmtTasks->close();
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link rel="stylesheet" href="../Encadreur/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../Encadreur/assets/images/favicon.ico" />
    <link href="../etudiant/calandrier/fullcalendar-6.1.9/fullcalendar-6.1.9/packages/core" rel='stylesheet' />
    <link href='/chemin-vers-fullcalendar/daygrid/main.css' rel='stylesheet' />
    <script src='/chemin-vers-fullcalendar/core/main.js'></script>
    <script src='/chemin-vers-fullcalendar/daygrid/main.js'></script>
  </head>
  <body>
    
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              
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
           
          
          </ul>
        </nav>
        <!-- partial -->
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
                          <th> Supervisor First Name </th>
                          <th> Description </th>
                          <th> Theme </th>
                          <th> PDF </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                          // Loop through the database results and generate table rows
                          while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['EncadreurFirstName'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['theme'] . "</td>";
                            echo "<td><a href='" . $row['encadreur_fichier_pdf'] . "' target='_blank' class='btn btn-primary'>Open PDF</a></td>";
                            echo "</tr>";
                          }
                        } else {
                          echo '<tr><td colspan="4">No topics found.</td></tr>';
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
                              <th> Notification ID </th>
                              <th> Notification Text </th>
                              <th> Date </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                           if ($resultNotifications->num_rows > 0) {
                            // Loop through the database results and generate table rows
                            while ($row = $resultNotifications->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>" . (isset($row['id']) ? $row['id'] : '') . "</td>";
                              echo "<td>" . (isset($row['message']) ? $row['message'] : '') . "</td>";
                              echo "<td>" . (isset($row['created_at']) ? $row['created_at'] : '') . "</td>";
                              echo "</tr>";
                            }
                          } else {
                            echo '<tr><td colspan="3">No notifications found.</td></tr>';
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
            <h4 class="card-title">My Tasks</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> Task ID </th>
                            <th> Description </th>
                            <th> Due Date </th>
                            <th> Status </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultTasks->num_rows > 0) {
                            // Loop through the database results and generate table rows
                            while ($row = $resultTasks->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['DescriptionTache'] . "</td>";
                                echo "<td>" . $row['Echeance'] . "</td>";
                                echo "<td>" . $row['EtatTache'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo '<tr><td colspan="4">No tasks found.</td></tr>';
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
                  <h4 class="card-title">Usernames</h4>
                  <table id="usernamesTable" class="table">
                    <thead>
                      <tr>
                        <th>Student Usernames</th>
                        <th></th>
                        <th></th>
                    
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($etudiant = $resultTeamMembers->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $etudiant['Nom'] . " " . $etudiant['Prenom'] . "</td>";
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
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
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
    <script src="../Encadreur/assets/js/chart.js"></script>
    <script src="../Encadreur/assets/js/registrationChart.js"></script>
    <script>
    var studentCountElement = document.getElementById('studentCount');
    var supervisorCountElement = document.getElementById('supervisorCount');

    if (studentCountElement && supervisorCountElement) {
        var studentCount = parseInt(studentCountElement.textContent, 10);
        var supervisorCount = parseInt(supervisorCountElement.textContent, 10);

        if (!isNaN(studentCount) && !isNaN(supervisorCount)) {
            var ctx = document.getElementById('registrationChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Students', 'Supervisors'],
                    datasets: [{
                        data: [studentCount, supervisorCount],
                        backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                        borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true
                }
            });
        } else {
            console.error('Invalid count values');
        }
    } else {
        console.error('Count elements not found');
    }
    // JavaScript
var ctx = document.getElementById('connectionsChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
        datasets: [{
            label: 'Connections',
            data: [], // Replace with actual data
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true
    }
});
$(document).on('click', '.delete-btn', function() {
  var id = $(this).data('id');
  $.ajax({
    url: 'delete.php',
    type: 'POST',
    data: { id: id },
    success: function(response) {
      console.log(response); // Log the server response
      if (response.includes('success')) {
        location.reload(); // Reload the page to update the table
      } else {
        console.error('Failed to delete record');
      }
    }
  });
});
    </script>
    <!-- End custom js for this page -->
  </body>
</html>