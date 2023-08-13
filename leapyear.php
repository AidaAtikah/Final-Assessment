<html>
<?php
         $page_title = 'Leap Year Calculator';
         include ('./includes/header.html');
?>
<head>
         <style type="text/css" media="all">@import "./includes/style.css";</style>
</head>
<body>

<div class="container">
      <form action="leapyear.php" method ="post">
      <p class="text" style="font-size: 2rem; font-weight: 800;"> Leap Year</p>

      <p><b>Enter a Year : </b> <input type="text" name="year" size="20" maxlength="40" /></p>

      <button name="submit" class="button">Submit</button>
</div>
</form>
</body>
</html>

<?php

// Validate year
if ($_POST)
{
    $year = $_POST['year'];

    if (!is_numeric($year)){

         echo'<p><b>Whoops!! The input should be a number. </b></p>';
         return; 
    }

    //check the condition of the leap year 
    if (0 == $year % 4){
         echo "$year is a leap year.";
    }
    else {
         echo"$year is not a leap year.";
    }

}

?>


