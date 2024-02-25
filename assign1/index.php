<?php 
            // Connect to localhost, username, password, and name of database
            $connect = mysqli_connect('localhost', 'root', 'root', 'animal_sanctuary');

            // Check for errors
            if (!$connect) {
                die("Connection error: " . mysqli_connect_error());
              }

            $query = 'SELECT animals.*, transfer.new_location 
                        FROM animals
                        LEFT JOIN transfer ON animals.animal_id = transfer.animal_id';
            //$query = 'SELECT * FROM animals';

            // Execute the connection string and query as parameteres
            $result = mysqli_query($connect, $query);

            // Fetch the data and store it in an array
            $animals = [];
            while ($row = mysqli_fetch_assoc($result)){
                $animals[] = $row;
            }
            mysqli_close($connect);
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Sanctuary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .card{
            margin-bottom:2rem;
        }
    </style>
</head>
<body>
    <div class="lc-block text-center mb-3">
        <h1 class="display-5 mt-4 mb-4">
            Animal Sanctuary 
        </h1>
    </div>

    <div class="container mx-auto px-4">
        <div class="row">

                <?php
                foreach($animals as $animal) {
                    echo '
                    <div class="col-lg-4">
                        <div class="card shadow-lg p-3">
                            <img class="card-img-top w-full" src="'.$animal['imageURL'].'">

                            <div class="px-6 py-4">
                                    <h5 class="font-bold text-xl mb-2">'.$animal['name'].'</h5>
                                    <p class="text-gray-700 text-base mb-2">Species: '.$animal['species'].'</p>
                                    <p class="text-gray-700 tex-base mb-2">Weight (lbs): '.$animal['weight (lbs)'].'</p>
                                    <p class="text-gray-700 text-base mb-2">Arrival date: '.$animal['arrival_date'].' </p>';

                                    if ($animal['transfer_date'] === null) {
                                        echo '<p>Transfer date: Not transfered</p>';
                                    } else {
                                        echo '
                                            <p>Transfer date: '.$animal['transfer_date'].'</p>
                                            <p>New location: '.$animal['new_location'].'</p>
                                            ';
                                    }
                            echo '

                            </div>
                        </div>
                    </div>
                ';}
                ?>
        </div>
    </div>
</body>
</html>