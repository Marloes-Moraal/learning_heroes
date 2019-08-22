<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learning Heroes</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav>
    <ul class="border-gray-400 background-grey w-screen py-20 m-0 sm:m-2 float-none sm:w-3/12 md:float-left ">
        <li class="background-blue inline-block cursor-pointer list-none text-white text-sm text-center my-2 mx-10 py-2 px-24 w-10/12 rounded-sm">Home</li>
        <li class="background-blue inline-block cursor-pointer list-none text-white text-sm text-center my-2 mx-10 py-2 px-24 w-10/12 rounded-sm">About</li>
        <li class="background-blue inline-block cursor-pointer list-none text-white text-sm text-center my-2 mx-10 py-2 px-24 w-10/12 rounded-sm">Blog</li>
        <li class="background-blue inline-block cursor-pointer list-none text-white text-sm text-center my-2 mx-10 py-2 px-24 w-10/12 rounded-sm">Contact</li>
    </ul>
</nav>


<table class="border-collapse float-left border-gray-400 py-4 px-4 m-10">
    <tr class="bg-teal-500 border-grey border">
        <th class="py-2 px-12 text-center">
            Cookies
        </th>
        <th class="py-2 px-12 text-center">
            Weight
        </th>
        <th class="py-2 px-12 text-center">
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
                    echo "<tr class='border border-gray'><td class='py-2 text-center'>" . $row["Name"] . "</td><td class='py-2 text-center'>" . $row["Weight"] . " </td><td class='py-2 text-center'>" . $row["Calories"] . "</td></tr>";
                }
                echo "</table>";
                } else {
                    echo "0 results";
                }

            $conn->close();

        ?>
</body>
</html>