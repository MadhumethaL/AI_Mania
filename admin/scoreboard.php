<?php
// Database configuration
$servername = "localhost"; // Your server name
$username = "root";        // Your database username
$password = "Madhu2412";            // Your database password
$dbname = "event_website"; // Your database name

// Create connection
$con = mysqli_connect("localhost", "root", "Madhu2412", "event_website",3307);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
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
    <title>Projects</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
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
</head>
<body>
    <div class="dash d-flex ">
        <div class="left p-4 bg_left">
            <span>CSEA</span>
            <ul class="mt-4">
                <li class="mb-3"><a class="link" href="#">Dashboard</a></li>             
                <li class="mb-3"><a class="link" href="./announcements1.php">Announcements</a></li>
                <li class="mb-3"><a class="link" href="./scoreboard.php">Scoreboard</a></li>            
                <li><a class="link" href="./index.php">Logout</a></li>
            </ul>
        </div>
        
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
    </div>

</body>
</html>
