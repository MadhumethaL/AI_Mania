<?php include 'php/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Office Bearers</title>
</head>
<body>
    <header>
        <h1>Office Bearers</h1>
    </header>
    <section>
        <?php
        $sql = "SELECT * FROM office_bearers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='bearer'>";
                echo "<img src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>";
                echo "<h2>" . $row['name'] . "</h2>";
                echo "<p>Position: " . $row['position'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No office bearers found.";
        }
        ?>
    </section>
</body>
</html>
