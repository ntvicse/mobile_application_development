<?php
  // abstract class WS
  // {
  //   protected $method = '';

  //   public function __construct($request) {
  //       header("Access-Control-Allow-Origin: *");
  //       header("Access-Control-Allow-Methods: *");
  //      // header("Content-Type: application/json");
  //       $this->method = $_SERVER['REQUEST_METHOD'];
  //   }
  //   private function _requestStatus($code) {
  //       $status = array(  
  //           200 => 'OK',
  //           404 => 'Not Found',   
  //           405 => 'Method Not Allowed',
  //           500 => 'Internal Server Error',
  //       ); 
  //       return ($status[$code])?$status[$code]:$status[500]; 
  //   }
  // }

  // class MyAPI extends WS
  //   {
  //     public function __construct($request, $origin) {
  //       parent::__construct($request);
  //     }
  //     public function call() {
        // function deg2rad($deg) {
        //    return ($deg * $pi / 180);
        // }
        function distanceEarth($lat1d, $lon1d, $lat2d, $lon2d){
          $lat1r = deg2rad($lat1d);
          $lon1r = deg2rad($lon1d);
          $lat2r = deg2rad($lat2d);
          $lon2r = deg2rad($lon2d);
          $u = sin(($lat2r - $lat1r)/2);
          $v = sin(($lon2r - $lon1r)/2);
          return 2.0 * 6371 * asin(sqrt($u * $u + cos($lat1r) * cos($lat2r) * $v * $v));
        }
        if (isset($_GET)) {
            if(isset($_GET['lat1']) && isset($_GET['lng1']) &&isset($_GET['lat2'])&&isset($_GET['lng2'])){
              echo distanceEarth($_GET['lat1'], $_GET['lng1'], $_GET['lat2'], $_GET['lng2']);
            }
        } else {
            return "Only accepts GET requests";
        }
    //   }
    // }
?>
