<?php

if(isset($_POST["submit"])) {
  
$formdata = array(
    'Name'=> $_POST["name"],
    'Age'=> $_POST["age"],
    'Designation'=>$_POST["gender"],
    'Skill'=> $_POST["lan"]
  );

  $existingdata = file_get_contents('data.json');
     $tempJSONdata = json_decode($existingdata);
     $tempJSONdata[] =$formdata;
     $jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);
     
     if(file_put_contents("data.json", $jsondata)) {
          echo "Data successfully saved <br>";
      }
     else 
          echo "no data saved";

   $data = file_get_contents("data.json");
   $mydata = json_decode($data);

   echo "<h2>Your Input:</h2>";
   
    }
   ?>