<?php
  class Car
  {
      private $make_model;
      private $price;
      private $image;
      private $miles;

      function __construct($make_model, $car_price, $car_image, $car_miles)
      {
          $this->model = $make_model;
          $this->price = $car_price;
          $this->image = $car_image;
          $this->miles = $car_miles;
      }

      function worthBuying($max_price)
      {
          return $this->price < ($max_price + 100);
      }

      function maxMileage($max_mileage)
      {
          return $this->miles <= ($max_mileage);
      }

      function getModel()
      {
          return $this->model;
      }

      function getPrice()
      {
          return $this->price;
      }

      function getImage()
      {
          return $this->image;
      }

      function getMiles()
      {
          return $this->miles;
      }
  }
  $porsche = new Car("2014 Porsche 911", 114991, "img/porsche.jpg", 7864);
  $ford = new Car("2011 Ford F450", 55995, "img/ford.jpg", 14241);
  $lexus = new Car("2013 Lexus RX 350", 44700, "img/lexus.jpg", 20000);
  $mercedes = new Car("Mercedes Benx CLS550", 39900, "img/mercedes.jpg", 37979);

  $cars = array($porsche, $ford, $lexus, $mercedes);

  $cars_matching_search = array();
  foreach ($cars as $car) {
      if (($car->worthBuying($_GET["price"])) && ($car->maxMileage($_GET["miles"]))) {
          array_push($cars_matching_search, $car);
      }


  }
  $is_empty = "";
  if (empty($cars_matching_search)) {
      $is_empty = "NO RESULTS FOUND ";
  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>CARS</title>
   </head>
   <body>
      <h1>MORE CARS</h1>
      <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                $c_model = $car->getModel();
                $c_price = $car->getPrice();
                $c_image = $car->getImage();
                $c_miles = $car->getMiles();

                echo "<li> $c_model </li>";
                echo "<ul>";
                    echo "<img src='$c_image'>";
                    echo "<li> $$c_price </li>";
                    echo "<li> Miles: $c_miles </li>";
                echo "</ul>";
            }
            echo "<h1> $is_empty </h1>";
        ?>
      </ul>
   </body>
 </html>
