<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learning Heroes</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <script src="tailwind.config.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="border-gray-400 background-grey w-full py-20 m-0 sm:m-2 sm:w1/12 md:w-6/12 lg:w-3/12 float-left">
    <ul>
        <li class="background-blue inline-block cursor-pointer list-none text-white text-sm text-center my-2 mx-10 py-2 px-24 w-10/12 rounded-sm">Home</li>
        <li class="background-blue inline-block cursor-pointer list-none text-white text-sm text-center my-2 mx-10 py-2 px-24 w-10/12 rounded-sm">About</li>
        <li class="background-blue inline-block cursor-pointer list-none text-white text-sm text-center my-2 mx-10 py-2 px-24 w-10/12 rounded-sm">Blog</li>
        <li class="background-blue inline-block cursor-pointer list-none text-white text-sm text-center my-2 mx-10 py-2 px-24 w-10/12 rounded-sm">Contact</li>
    </ul>
</div>

<table class="border-collapse float-left border-gray-400 w-8/12 py-4 px-4 my-10 sm:m-10">
    <tr class="bg-teal-500 border-grey border">
        <th class="py-2 px-12 w-1/12 text-center">
            Cookies
        </th>
        <th class="py-2 px-12 w-1/12 text-center">
            Weight
        </th>
        <th class="py-2 px-12 w-1/12 text-center">
            Calories (100g)
        </th>
        <th class="py-2 px-12 w-6/12 text-center">
            Ingredients
        </th>
    </tr>
        <?php

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "learning_heroes";

            // Create connection
                 $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
                 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }

                $sql = "SELECT * FROM cookies";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $gramCookie = $row['calories'] / $row['weight'];
                        $caloriesPerhundredGram = $gramCookie * 100;
                        $cookieId = $row['id'];
                        $sql = "select * from cookie_ingredients left join ingredients on cookie_ingredients.ingredient_id = ingredients.id where cookie_ingredients.cookie_id = $cookieId order by name ASC";
                        $resultIngredienst = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
                        $ingredients = [];
                            foreach($resultIngredienst as $ingredient) {
                                $ingredients[] = $ingredient['name'];
                            }
        ?>
                        <tr class='border border-gray'>
                            <td class='py-2 text-center'>
                                <?= $row["name"]; ?>
                            </td>
                            <td class='py-2 text-center'>
                                <?= $row["weight"]; ?>
                            </td>
                            <td class='py-2 text-center'>
                                <?= number_format($caloriesPerhundredGram, 0); ?>
                            </td>
                            <td>
                                <?php
                                echo implode(', ', $ingredients);
                                ?>
                            </td>
                        </tr>
        <?php
                    }
                    echo "</table>";

                } else {
                    echo "0 results";
                }

          $conn->close();

        ?>
</body>
</html>