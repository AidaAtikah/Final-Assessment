<html>
<?php
         $page_title = 'Find Biggest Number';
         include ('./includes/header.html');
?>
<head>
         <style type="text/css" media="all">@import "./includes/style.css";</style>
</head>
<body>

<div class="container">
      <form action="biggest_num.php" method ="post">
      <p class="text" style="font-size: 2rem; font-weight: 800;"> Biggest Number </p>
      
      <p><b>Enter First Number:</b> <input type="text" name="num1" size="20" maxlength="40" value="<?php if(isset($_POST['num1']))echo$_POST['num1'];?>"></p>
      <p><b>Enter Second Number:</b> <input type="text" name="num2" size="20" maxlength="40" value="<?php if(isset($_POST['num2']))echo$_POST['num2'];?>"/></p>
      <p><b>Enter Third Number:</b> <input type="text" name="num3" size="20" maxlength="40" value="<?php if(isset($_POST['num3']))echo$_POST['num3'];?>"/></p>
      <button name="submit" class="button">Submit</button>
</div>
</form>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

//validate first number
if (!empty($_POST['num1'])){
       $num1 = $_POST['num1'];
} else {
        $num1= NULL;
		echo '<p><b>Whoops! Please enter your first number! </b></p>';
}

//validate second number
if (!empty($_POST['num2'])){
       $num2 = $_POST['num2'];
} else {
        $num2 = NULL;
		echo '<p><b> Whoops! Please enter your second number! </b></p>';
}

//validate third number
if (!empty($_POST['num3'])){
       $num3 = $_POST['num3'];
} else {
        $num3= NULL;
		echo '<p><b> Whoops! Please enter your third number! </b></p>';
}

// If everything is okay, print the message.
echo "<p>The number is $num1 $num2 $num3</br></p>"; 

if ($num1 > $num2 && $num1 > $num3) 
{
	echo "<p><b>The Biggest Number is $num1</b></p>";
}
else if ($num2 > $num1 && $num2 > $num3)
{
	echo "<p><b>The Biggest Number is $num2</b></p>";
}
else{
	echo "<p><b>The Biggest Number is $num3</b></p>";
}

}

?>