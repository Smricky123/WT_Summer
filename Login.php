<html>
    <head>
        <title>Ric-Series</title>
    </head>

    <body>
        <h1>Registration</h1>

<?php
$nameErr = $ageErr = $genderErr = $lanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $c = 0;

  if(empty($_POST["name"]))  {
      $nameErr = "Please enter a full name";
      $c++;
  }

  if (empty($_POST["age"])) {
      $ageErr = "Please enter your age";
      $c++;
  } 

  if (empty($_POST["gender"])) {
      $genderErr = "Please enter your gender";
      $c++;
  } 

  if (empty($_POST["lan"])) {
      $lanErr = "Please make a VIP area selection";
      $c++;
  } else {
      $lan = test_input($_POST["lan"]);
  }

  if($c == 0) {
    header("Location:Admin.php");
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
  }  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST["submit"]))
{ 
  echo $ageErr;
  echo "</br>";
  echo $nameErr;
  echo "</br>";
  echo $genderErr;
  echo "</br>";
  echo $lanErr;
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action= "">  
  Name: <input type="text" name="name">
  <span class="error">*</span>
  <br><br>
  Age: <input type="text" name="age"> 
  <span class="error">*</span>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female" checked>Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">*</span>
  <br><br>
  Language skill : 
  JAVA<input type="checkbox" name="lan" value="PHP" checked />
  C#<input type="checkbox" name="lan" value="C#"/>
  <span class="error">*</span>
  <br><br>
  <input type="submit" name="submit" value="Login">  
</form>

    </body>   
</html>