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
        <a class="navbar-brand brand-logo" href="../../dashboardEn.html"><img src="../../assets/images/logo.svg"
            alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="../../dashboardEn.html"><img
            src="../../assets/images/logo-mini.svg" alt="logo" /></a>
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
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
              aria-expanded="false">
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
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
              <span class="count-symbol bg-warning"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
              aria-labelledby="messageDropdown">
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
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
              data-bs-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
              aria-labelledby="notificationDropdown">
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
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
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
            <a class="nav-link" href="../../pages/forms/basic_elements.html">
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
              <span class="menu-title">Application Viewing</span>
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
      <!-- partial -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">

            <!-- Table displaying all projects -->
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">


                    <div class="container">
                    <?php
$projectId = $_GET['id'];
echo "$projectId";

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'web';
$port = 3307;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$studentsQuery = "SELECT et.Nom, et.Prenom, p.TitreProjet 
                  FROM etudiants et 
                  JOIN equipesprojet eq ON et.IdEquipe = eq.ID 
                  JOIN projet p ON eq.ProjetID = p.ID
                  WHERE p.ID = ?";
$stmt = $conn->prepare($studentsQuery);
$stmt->bind_param("i", $projectId);
$stmt->execute();
$studentsResult = $stmt->get_result();
?>

<div class="grid-item">
                        <div class="project-members-table-container">
                          <table class="project-members-table" id="membersTable">
                            <thead>
                              <tr>
                                <th>Nom du Membre</th>
                                <th>Rôle</th>
                                <th>Titre du Projet</th>

                              </tr>
                            </thead>
                            <tbody>
                <?php
                // Dynamically add students
                while ($row = $studentsResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Nom'] . "</td>";
                    echo "<td>" . $row['Prenom'] . "</td>";
                    echo "<td>" . $row['TitreProjet'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$conn->close();
?>
                        
                        
  <div class="grid-item">
    <h2>Membres du Projet</h2>
    <div class="project-members">
      <div class="add-member-form">
        <h2>Ajouter un nouveau membre</h2>
        <form id="addMemberForm">
          <label for="memberName">Nom du membre:</label>
          <input type="text" id="memberName" name="memberName" required>
  
          <label for="memberRole">Rôle:</label>
          <input type="text" id="memberRole" name="memberRole" required>
  
          <button type="button" onclick="addMember()">Ajouter le membre</button>
        </form>
      </div>
      <!-- Ajoutez une div pour afficher la table des membres -->
     
    </div>
  </div>
  
  

<!-- ... Votre contenu HTML existant ... -->


<?php
$projectId = $_GET['id'];

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'web';
$port = 3307;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$studentsQuery = "SELECT et.Nom, et.Prenom 
                  FROM etudiants et 
                  JOIN equipesprojet eq ON et.IdEquipe = eq.ID 
                  JOIN projet p ON eq.ProjetID = p.ID
                  WHERE p.ID = ?";
$stmt = $conn->prepare($studentsQuery);
$stmt->bind_param("i", $projectId);
$stmt->execute();
$studentsResult = $stmt->get_result();
?>

<div class="grid-item">
    <div class="add-task-form">
        <h2>Ajouter une nouvelle tâche</h2>
        <form id="addTaskForm" method="POST">
            <label for="taskNumber">Nom de tâche:</label>
            <input type="text" id="taskNumber" name="taskNumber" required>

            <label for="taskStatus">Etat:</label>
            <input type="text" id="taskStatus" name="taskStatus" required>

            <label for="assignedTo">Assigné à:</label>
            <input type="text" id="assignedTo" name="assignedTo" required>

           <!-- <select id="assignedTo" name="assignedTo" required>
    <option value="" selected>Veuillez sélectionner un étudiant</option>
    <?php
   
         

    while ($row = $studentsResult->fetch_assoc()) {
      
        echo "<option value='" . $row['ID'] . "'>" . $row['Nom'] . " " . $row['Prenom'] . "</option>";
        $nom =$row['ID'];
        echo "$nom";

    }
    ?>
</select> -->

            <label for="taskPriority">Priorité:</label>
            <select id="taskPriority" name="taskPriority" required>
                <option value="High">Haute</option>
                <option value="Medium">Moyenne</option>
                <option value="Low">Basse</option>
            </select>

            <button type="submit">Ajouter la tâche</button>
        </form>
        </div>
        <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskNumber = $_POST['taskNumber'];
    $taskStatus = $_POST['taskStatus'];
    $assignedToName = $_POST['assignedTo'];
    $taskPriority = $_POST['taskPriority'];
    echo"$assignedToName";

    // Récupérez l'ID de l'étudiant à partir du nom
    $studentSql = "SELECT ID FROM etudiants WHERE CONCAT(Nom, ' ', Prenom) = ?";
    $studentStmt = $conn->prepare($studentSql);
    $studentStmt->bind_param("s", $assignedToName);
    $studentStmt->execute();
    $studentResult = $studentStmt->get_result();
    $studentRow = $studentResult->fetch_assoc();

    if ($studentRow) {
        $assignedToId = $studentRow['ID'];

        $sql = "INSERT INTO tachesprojet (DescriptionTache, ProjetID, EtatTache, ResponsableTacheID, AutresInformations) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($conn->error) {
            echo "Erreur lors de la préparation de la requête : " . $conn->error;
        }
        $stmt->bind_param("ssiss", $taskNumber, $projectId, $taskStatus, $assignedToId, $taskPriority);
        $stmt->execute();
        if ($stmt->error) {
            echo "Erreur lors de l'insertion : " . $stmt->error;
        } else {
            echo "Tâche ajoutée avec succès";
        }
    } else {
        echo "Aucun étudiant trouvé avec le nom " . $assignedToName;
        echo"$assignedToName";

    }
}
?>
</div>
<?php
$projectId = $_GET['id'];

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'web';
$port = 3307;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tasksQuery = "SELECT t.ID, t.DescriptionTache, t.EtatTache, et.Nom, et.Prenom 
               FROM tachesprojet t 
               JOIN etudiants et ON t.ResponsableTacheID = et.ID 
               WHERE t.ProjetID = ?";
$stmt = $conn->prepare($tasksQuery);
$stmt->bind_param("i", $projectId);
$stmt->execute();
$tasksResult = $stmt->get_result();
?>

<div class="grid-item">
    <h2>Progression du Projet</h2>
    <table class="project-progress-table">
        <thead>
            <tr>
                <th>ID de tâche</th>
                <th>Description de tâche</th>
                <th>État de tâche</th>
                <th>Assigné à</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $tasksResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['DescriptionTache'] . "</td>";
                echo "<td>" . $row['EtatTache'] . "</td>";
                echo "<td>" . $row['Nom'] . " " . $row['Prenom'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>



              </div>
              <style>
                /* Style pour la table des membres du projet */
                .project-members-table-container {
                  max-width: 600px;
                  margin: 20px auto;
                }
              
                .project-members-table {
                  width: 100%;
                  border-collapse: collapse;
                  margin-top: 15px;
                }
              
                .project-members-table th,
                .project-members-table td {
                  padding: 12px;
                  text-align: left;
                  border-bottom: 1px solid #ddd;
                }
              
                .project-members-table th {
                  background-color: #f2f2f2;
                }
              
                .project-members-table tbody tr:hover {
                  background-color: #f5f5f5;
                }
              
                /* Style pour le formulaire d'ajout de membre */
                .add-member-form {
                  max-width: 400px;
                  margin: 20px auto;
                  padding: 20px;
                  background-color: #f8f9fa;
                  border: 1px solid #dcdfe6;
                  border-radius: 5px;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }
              
                .add-member-form h2 {
                  font-size: 1.5rem;
                  color: #333;
                  margin-bottom: 20px;
                }
              
                .add-member-form label {
                  display: block;
                  margin-bottom: 8px;
                  font-weight: bold;
                }
              
                .add-member-form input {
                  width: 100%;
                  padding: 10px;
                  margin-bottom: 15px;
                  box-sizing: border-box;
                  border: 1px solid #ced4da;
                  border-radius: 4px;
                  background-color: #fff;
                  color: #495057;
                }
              
                .add-member-form button {
                  background-color: #007bff;
                  color: #fff;
                  padding: 10px 15px;
                  border: none;
                  border-radius: 4px;
                  cursor: pointer;
                }
              
                .add-member-form button:hover {
                  background-color: #0056b3;
                }
              </style>
              

              <style>
                .add-task-form {
                  max-width: 400px;
                  margin: 20px auto;
                  padding: 20px;
                  background-color: #f8f9fa;
                  border: 1px solid #dcdfe6;
                  border-radius: 5px;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                .add-task-form h2 {
                  font-size: 1.5rem;
                  color: #333;
                  margin-bottom: 20px;
                }

                .add-task-form label {
                  display: block;
                  margin-bottom: 8px;
                  font-weight: bold;
                }

                .add-task-form input,
                .add-task-form select {
                  width: 100%;
                  padding: 10px;
                  margin-bottom: 15px;
                  box-sizing: border-box;
                  border: 1px solid #ced4da;
                  border-radius: 4px;
                  background-color: #fff;
                  color: #495057;
                }

                .add-task-form button {
                  background-color: #007bff;
                  color: #fff;
                  padding: 10px 15px;
                  border: none;
                  border-radius: 4px;
                  cursor: pointer;
                }

                .add-task-form button:hover {
                  background-color: #0056b3;
                }
              </style>


              <style>
                /* Styles pour la grille */
                .project-grid {
                  display: grid;
                  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                  gap: 20px;
                }

                .test {
                  display: flex;
                }

                .grid-item {
                  padding: 20px;
                  border: 1px solid #ccc;
                  border-radius: 5px;
                  background-color: #fff;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                /* Styles spécifiques aux éléments de grille */
                .grid-item h2 {
                  font-size: 1.5rem;
                  color: #333;
                }

                .project-members ul {
                  list-style-type: none;
                  padding: 0;
                }

                .project-members li {
                  margin: 5px 0;
                  font-weight: bold;
                }

                .project-progress-table {
                  width: 100%;
                  border-collapse: collapse;
                }

                .project-progress-table th,
                .project-progress-table td {
                  padding: 10px;
                  text-align: left;
                  border-bottom: 1px solid #ccc;
                }
              </style>

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->

            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
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
        <script src="../../assets/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="../../assets/js/chart.js"></script>
        <script src="../../assets/js/todolist.js"></script>
        <script>
          // JavaScript function to add a task to the project progression table
          function addTask() {
            // Get input values
            var taskNumber = document.getElementById("taskNumber").value;
            var taskStatus = document.getElementById("taskStatus").value;
            var assignedTo = document.getElementById("assignedTo").value;
            var taskPriority = document.getElementById("taskPriority").value;
      
            // Find the project progression table
            var projectTable = document.querySelector(".project-progress-table tbody");
      
            // Create a new table row
            var newRow = document.createElement("tr");
      
            // Populate the row with task information
            newRow.innerHTML = `
              <td>${taskNumber}</td>
              <td>${taskStatus}</td>
              <td>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
              </td>
              <td>${taskPriority}</td>
              <td>${assignedTo}</td>
            `;
      
            // Append the new row to the table
            projectTable.appendChild(newRow);
      
            // Reset form inputs
            document.getElementById("taskNumber").value = "";
            document.getElementById("taskStatus").value = "";
            document.getElementById("assignedTo").value = "";
            document.getElementById("taskPriority").value = "High";
            
          }
        </script>
        <script>
          // JavaScript function to add a member to the project members table
          function addMember() {
            // Get input values
            var memberName = document.getElementById("memberName").value;
            var memberRole = document.getElementById("memberRole").value;
        
            // Find the project members table
            var membersTable = document.getElementById("membersTable").getElementsByTagName('tbody')[0];
        
            // Create a new table row
            var newRow = document.createElement("tr");
        
            // Populate the row with member information
            newRow.innerHTML = `
              <td>${memberName}</td>
              <td>${memberRole}</td>
            `;
        
            // Append the new row to the table
            membersTable.appendChild(newRow);
        
            // Reset form inputs
            document.getElementById("memberName").value = "";
            document.getElementById("memberRole").value = "";
          }
        </script>
        <!-- End custom js for this page -->
</body>

</html>