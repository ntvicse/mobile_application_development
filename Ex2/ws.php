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
        if (isset($_GET)) {
            if(isset($_GET['lat1']) && isset($_GET['lng1']) &&isset($_GET['lat2'])&&isset($_GET['lng2'])){
              echo "Complete!";
            }
        } else {
            return "Only accepts GET requests";
        }
    //   }
    // }
?>
