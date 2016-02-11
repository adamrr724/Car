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
          return $this->miles < $max_mileage;
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

      function save()
      {
          array_push($_SESSION['cars_list'], $this);
      }

      static function getAll()
      {
          return $_SESSION['cars_list'];
      }

      static function reset()
      {
          $_SESSION['cars_list'] = array();
      }
  }
?>
