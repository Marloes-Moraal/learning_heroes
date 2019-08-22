<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learning Heroes</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav>
    <ul>
        <li>Home</li>
        <li>About</li>
        <li>Blog</li>
        <li>Contact</li>
    </ul>
</nav>


<table class="border-collapse float-left border-gray-400 py-4 px-4 ">
    <tr>
        <th class="py-2 px-12 text-center">
            Cookies
        </th>
        <th>
            Weight
        </th>
        <th>
            Calories
        </th>
    </tr>
        <?php

            $servername = "localhost";
            $username = "moraal";
            $password = "password";
            $dbname = "Cookies";

            // Create connection
                 $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
                 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }

                $sql = "SELECT Name, Weight, Calories FROM Cookies";
                $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Weight"] . " </td><td>" . $row["Calories"] . "</td></tr>";
                }
                echo "</table>";
                } else {
                    echo "0 results";
                }

            $conn->close();

        ?>
</body>
</html>