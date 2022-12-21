<?php
$isParking = true;
$filteredData = [];
$hotels = [

    [
        'index' => '1',
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'index' => '2',
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'index' => '3',
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'index' => '4',
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'index' => '5',
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
// if ($isParking) {
//     echo "si";
// } else {
//     echo "no";
// };
$hasFilters = isset($_GET["name"]) || isset($_GET["vote"]);

if ($hasFilters) {

    //$filteredParking = filter_var($_GET["parking"]);
    foreach ($hotels as $hotel) {
        $Push = true;


        if (isset($_GET["name"]) && !str_contains(strtolower($hotel["name"]), strtolower($_GET["name"]))) {
            $Push = false;

        }
        if (isset($_GET["vote"]) && $hotel["vote"] < $_GET["vote"]) {
            $Push = false;
          }

        // if ($hotel["parking"] === $isParking ) {
        //     $Push = false;
        // }


        if ($Push) {
            $filteredData[] = $hotel;
        }
    }
} else {
    $filteredData = $hotels;

}




// var_dump($hotels)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP HOTELS</title>

    <!-- Third party libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3 text-white"> PHP HOTELS</h1>
        <form action="" method="get">
            <div class="row justify-content-center ">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label text-white "><strong> Hotel's Name </strong> </label>
                        <input type="text" class="form-control bg-info text-white border-0" name="name" value="<?php echo $_GET["name"] ?? '' ?>">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                            name="parking" value="<?php echo $_GET["parking"] ?? '' ?>">
                        <label class="form-check-label" for="flexRadioDefault1">
                            <strong> Includes Parking (statico non funziona) </strong></label>

                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label text-white"> <strong> vote (min) </strong></label>
                        <input type="number" class="form-control bg-info text-white border-0" name="vote"
                            value="<?php echo $_GET["vote"] ?? '' ?>">
                    </div>
                </div>


            </div>
            <div class="text-center">

                <a class="btn btn-secondary" href="hotel.php">Delete</a>
                <button class="btn btn-success" type="submit">Search</button>
            </div>
        </form>




        <table class="table table-dark table-striped-column mt-5 ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($filteredData as $hotel) {


                ?>
                <tr>
                    <th scope="row"><?php echo $hotel["index"] ?></th>
                    <td><?php echo $hotel["name"] ?></td>
                    <td><?php echo $hotel["description"] ?></td>
                    <td><?php echo $hotel["parking"] ?></td>
                    <td><?php echo $hotel["vote"] ?></td>
                    <td><?php echo $hotel["distance_to_center"] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>