<?php
// Database configuration
$servername = "localhost"; // Your server name
$username = "root";        // Your database username
$password = "Madhu2412";            // Your database password
$dbname = "event-website"; // Your database name

// Create connection
$con = mysqli_connect("localhost", "root", "Madhu2412", "event_website",3307);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch scores
$sql = "SELECT participant_name, score, created_at FROM scores ORDER BY score DESC";
$result = $con->query($sql);

$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>
    <title>Event Website</title>
</head>
<body>
    <div class="container-fluid bg_nav_1">
      <div class="row">
        <div class="col-lg-3 pt-lg-3 pb-lg-3 pt-3 pb-3">
          <a href="#default" class="text-decoration-none text-white font-weight-bold"><span class="bee_text_size"> CSEA Fests</span></a>
        </div>
        <div class="col-lg-3 pt-lg-4 pb-lg-3 pr-0">
          <i class="bg-warning icon_size bi bi-send-fill mr-2 d-none d-lg-inline-flex"></i><span class="d-none d-lg-inline-flex text-light header_text"> aimania@gmail.com</span>
        </div>
        <div class="col-lg-3 pt-lg-4 pb-lg-3 pr-0 pl-0">
          <i class="d-none d-lg-inline-flex bg-warning icon_size bi bi-telephone mr-2"></i>
        <span class="d-none d-lg-inline-flex text-white header_text">Call Us: 7010516569</span>
        </div>
        
      </div>
    </div>
    
    <nav class="text-center p-3 bg_nav_2 navbar navbar-expand-lg navbar-light header_text">
      <a class="navbar-brand" href="#" title="logo"></a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse nav_links navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-white" href="./index.php"
              >Home<span class="sr-only"></span></a
            >
          </li>
          <li class="px-2 nav-item">
            <a class="nav-link text-white" href="./about.php">About</a>
          </li>
          <li class="px-2 nav-item">
            <a class="nav-link text-white" href="./php/announcements.php">Announcements</a>
          </li>
          <li class="px-2 nav-item">
            <a class="nav-link text-white" href="./php/winners.php">Winners</a>
          </li>
          <li class="px-2 nav-item">
            <a class="nav-link text-white" href="./scoreboard.php">Scoreboard</a>
          </li>
          <li class="px-2 nav-item">
            <a class="nav-link text-white" href="./gallery.php">Photo Gallery</a>
          </li>
          <li class="px-2 nav-item">
            <a class="nav-link text-white" href="#team">Office Bearers</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Scoreboard</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Participant Name</th>
                    <th>Score</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $rank = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$rank}</td>
                                <td>{$row['participant_name']}</td>
                                <td>{$row['score']}</td>
                                <td>{$row['created_at']}</td>
                              </tr>";
                        $rank++;
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No scores available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="py-3 mt-5">
    <p class="text-center text-body-secondary">Copyright ©2024 TechFest. All rights reserved</p>
  </footer>
</body>
</html>