<?php

function removeFirstPlusCharacter($phone_number) {
    if (substr($phone_number, 0, 1) == "+") {
      return substr($phone_number, 1);
    } else {
      return $phone_number;
    }
  }
function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}


// temporary function to connect to db
   
