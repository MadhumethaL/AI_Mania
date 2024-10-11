<?php
// Initialize variables
$title_error = "";
$description_error = "";  // Add an error variable for description
$p_name_error = "";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Connect to MySQL
    $con = mysqli_connect("localhost", "root", "Madhu2412", "event_website", 3307);
    if (!$con) {
        die("Connection failed!" . mysqli_connect_error());
    }

    // Retrieve form data
    $title = isset($_POST['title']) ? $_POST['title'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : ""; // Handle the description input
    $date = isset($_POST['date']) ? $_POST['date'] : "";

    // Validate form data
    if (empty($title)) {
        $title_error = "Enter title";
    }

    if (empty($description)) {
        $description_error = "Enter description";  // Validate description field
    }

    if (empty($date)) {
        $p_name_error = "Enter date name";
    }

    // If no validation errors, insert into database
    if (empty($title_error) && empty($description_error) && empty($p_name_error)) {
        $sql = "INSERT INTO date_details (title, description, date_name) VALUES ('$title', '$description', '$date')";
        if (mysqli_query($con, $sql)) {
            // Success: Redirect to prdescription form resubmission
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit; // Ensure that script execution stops after redirection
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    // Close MySQL connection
    mysqli_close($con);
}


// Fetch data from the database to display in the table
$con = mysqli_connect("localhost", "root", "Madhu2412", "event_website", 3307);
if (!$con) {
    die("Connection failed!" . mysqli_connect_error());
}

$sql = "SELECT * FROM events";
$result = $con->query($sql);
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events and descriptions</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
    <div class="dash d-flex">
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
                <h3>Events and descriptions</h3>
                <a class="btn btn-primary" href="./dates2.php">Add</a>
            </div>
            <hr>
            <form method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-4 col-lg-3">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>">
            <span class="error text-danger"><?php echo $title_error; ?></span>
        </div>
        <div class="form-group col-md-4 col-lg-3">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?>">
            <span class="error text-danger"><?php echo $description_error; ?></span>
        </div>
        <div class="form-group col-md-4 col-lg-3">
            <label for="date">Date:</label>
            <input type="text" class="form-control" id="date" name="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : ''; ?>">
            <span class="error text-danger"><?php echo $p_name_error; ?></span>
        </div>
        <div class="form-group col-md-4 col-lg-2">
            <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
        </div>
    </div>
</form>

            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["event_name"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo $row["event_date"]; ?></td>
                    </tr>
                <?php } 
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
