<html>
<?php
         $page_title = 'Temperature Converter';
         include ('./includes/header.html');
?>
<head>
         <style type="text/css" media="all">@import "./includes/style.css";</style>
</head>
<body>

<div class="container">
      <form action="temp_converter.php" method ="post">
      <p class="text" style="font-size: 2rem; font-weight: 800;"> Temperature Converter </p>
      
      <p><b>Choose temperature:</p>
      <input type="radio" name="temp" id="Farenheit" value="Farenheit" <?php if(isset($temp) && $temp  == 'Fahrenheit' ) echo 'checked="checked"';?> />Fahrenheit</p>
      <input type="radio" name="temp" id="Celcius" value="Celcius" <?php if(isset($temp) && $temp  == 'Celsius' ) echo 'checked="checked"';?> />Celsius</p>

      <p><b></b> <input type="text" name="input" size="20" maxlength="40" /></p>
      <button name="submit" class="button"> Convert </button>
</div>
</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //validate temperature
    if(!empty($_POST['temp'])){
        $temp = $_POST['temp'];
    } else {
        $temp = NULL;
        echo '<p><b>Whoops! Please choose temperature type !</b></p>';
    }

    if (!empty($_POST['input'])){
        $input = $_POST['input'];
    } else {
        $input = NULL;
        echo '<p><b>Whoops! Please enter your input value !</b></p>';
    }

    //if everything is okay
    if ($temp == 'Fahrenheit'){
      $ftoc = (9/5) * $input +32;
      echo "$input Fahrenheit is similar to $ftoc Calsius";
    }else {
       $ctof = (5/9) * $input - 32;
       echo "$input Celsius is similar to $ctof Fahrenheit";
    } 
}
?>