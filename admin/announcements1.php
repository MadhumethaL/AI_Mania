<?php
$con = mysqli_connect("localhost", "root", "Madhu2412", "event_website", 3307);
if (!$con) {
    die("Connection failed!" . mysqli_connect_error());
}

// Fetch event data
$sql_events = "SELECT * FROM events"; // Assuming you have an events table
$result_events = $con->query($sql_events);

mysqli_close($con);
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
        <div class="right p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Announcements</h3>
                <a class="btn btn-primary" href="./announcements2.php">Add</a>
            </div>
            <hr>

            <h4 class="mb-3">Upcoming Events</h4>
            <div class="row">
                <?php if ($result_events->num_rows > 0): ?>
                    <?php while ($event = $result_events->fetch_assoc()): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $event['event_name']; ?></h5>
                                    <p class="card-text"><?php echo $event['description']; ?></p>
                                    <p class="text-muted">Date: <?php echo $event['event_date']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            No upcoming events found.
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
