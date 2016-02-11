<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    session_start();
    if (empty($_SESSION['cars_list'])) {
        $_SESSION['cars_list'] = array();
    }

    $app = new Silex\Application();

    // $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array (
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app){
      return $app['twig']->render('car_form.html.twig');
    });

    $app->post("/show", function() use ($app) {
        $car = new Car($_POST['model'], $_POST['price'], $_POST['image'], $_POST['miles']);
        $car->save();
        return $app['twig']->render('car_dealership.html.twig', array('cars' => Car::getAll()));
    });

    $app->get("/list", function() use ($app) {
        return $app['twig']->render('car_dealership.html.twig', array('cars' => Car::getAll()));
    });

    $app->get("car_search", function() use ($app) {
        $cars = Car::getAll();
        $cars_matching_search = array();
        foreach ($cars as $car) {
           if ($car->worthBuying($_GET["price"]) && $car->maxMileage($_GET["mileage"])) {
               array_push($cars_matching_search, $car);
           }
       }
       return $app['twig']->render('car_search.html.twig', array('cars' => $cars_matching_search));
   });

    $app->post("/clear", function() use ($app){
        Car::reset();
        return $app['twig']->render('car_dealership.html.twig', array('cars' => Car::getAll()));
    });


    return $app;


 ?>
