<?php

namespace app\core;

class API {
   private $curl;

   public function __construct($url) {
      $this->curl = curl_init($url);
   }
   
   public function APIcall($method, $url, $data) {
      switch ($method) {
          case "POST":
              curl_setopt($this->curl, CURLOPT_POST, 1);
              if ($data)
                  curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
              break;
          case "PUT":
              curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                  curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
              break;
      }
 
      curl_setopt($this->curl, CURLOPT_URL, $url);
      curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
          'APIKEY: RegisteredAPIkey',
          'Content-Type: application/json',
      ));
 
      curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($this->curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      $result = curl_exec($this->curl);
 
      if(!$result) {
          echo('Failed to connect');
      }

      curl_close($this->curl);

      return $result;
  }
}