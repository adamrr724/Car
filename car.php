<?php
  class Car
  {
      public $make_model;
      public $price;
      public $miles;

      function __construct($make_model, $car_price, $car_miles)
      {
          $this->model = $make_model;
          $this->price = $car_price;
          $this->miles = $car_miles;
      }

      function worthBuying($max_price)
      {
          return
          $this->price < ($max_price + 100);
      }
  }
  $porsche = new Car("2014 Porsche 911", 114991, 7864);
  $ford = new Car("2011 Ford F450", 55995, 14241);
  $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
  $mercedes = new Car("Mercedes Benx CLS550", 39900, 37979);

  $cars = array($porsche, $ford, $lexus, $mercedes);

  $cars_matching_search = array();
  foreach ($cars as $car) {
      if ($car->worthBuying($_GET["price"])) {
          array_push($cars_matching_search, $car);
      }
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
                echo "<li> $car->model </li>";
                echo "<ul>";
                    echo "<li> $$car->price </li>";
                    echo "<li> Miles: $car->miles </li>";
                echo "</ul>";
            }
        ?>
      </ul>
   </body>
 </html>
