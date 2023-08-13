<html>
<?php
         $page_title = 'Dentist Appointment';
         include ('./includes/header.html');
?>
<head>
         <style type="text/css" media="all">@import "./includes/style.css";</style>
</head>
<body>

<div class ="container">
<form action = "" method="post">
    <p class="text" style="font-size: 2rem; font-weight: 800;"> Dentist Appointment </p>
    
    <p>Name: <input type="text" name="name" size="15" maxlength="20" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /></p>
    <p>Email: <input type="text" name="email" size="15" maxlength="20" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
    <p>Mobile Phone: <input type="text" name="mobilehp" size="15" maxlength="20" value="<?php if (isset($_POST['mobilehp'])) echo $_POST['mobilehp']; ?>" /></p>
    <p>Appointment Date: <input type="date" name="appdate" size="15" maxlength="20" value="<?php if (isset($_POST['appdate'])) echo $_POST['appdate']; ?>" /></p>
    
    <p>Time Slot: <select name="timeslot">
	<option value=""> </option>
	<?php 
	$arr_groups = array("Slot 1: 10:00 AM", "Slot 2: 11:00 AM", "Slot 3: 12:00 PM", "Slot 4: 2:00 PM", "Slot 5: 3:00 PM", "Slot 6: 4:00 PM");
	   foreach ($arr_groups as $value){
       if(isset($_REQUEST['timeslot']) && $_REQUEST['timeslot'] == $value) { // creating sticky
            echo "<option value=\"$value\" selected>$value</option>";
        }else{
            echo "<option value=\"$value\">$value</option>";
        }    
       }
	?>   
    </select></p>
    
    <p><b>Services: </b>
    <p><input type="checkbox" name= "service" value="Scalling and Polishing"/>Scalling and Polishing<br />
    <input type="checkbox" name= "service" value="Crown and Caps"/>Crown and Caps<br />
    <input type="checkbox" name= "service" value="Fillings and Repairs "/>Fillings and Repairs <br />
    <input type="checkbox" name= "service" value="Braces"/>Braces<br />
   
    <button name="submit" class="button"> Submit</button>
</form>
    </div>


<?php
    //check for form submission:
    if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
        $errors = array(); //initialize an error array

        //check for a name
        if (empty($_POST['name'])){
            $errors[] = 'Whoops! Please enter your name!';
        } else {
            $name = trim($_POST['name']);
        }

        //check for email
        if (empty($_POST['email'])){
            $errors[] = 'Whoops! Please enter your email!';
        } else {
            $email = trim($_POST['email']);
        }

        //check for a mobile handphone
        if (empty($_POST['mobilehp'])){
            $errors[] = 'Whoops! Please enter your mobile phone';
        } else {
            $mobilehp = trim($_POST['mobilehp']);
        }

        //check for an appointment date
        if (empty($_POST['appdate'])){
            $errors[] = 'Whoops! Please enter appointment date';
        } else {
            $appdate = trim($_POST['appdate']);
        }

        //check for the time slot
        if (empty($_POST['timeslot'])){
            $errors[] = 'Whoops! Please choose your time slot! ';
        } else {
            $timeslot = trim($_POST['timeslot']);
        }

        //check for a service
        if (empty($_POST['service'])){
            $errors[] = 'Whoops! Please choose your services! ';
        } else {
            $service = $_POST['service'];
        }


        if (empty($errors)) { //if everything is inserted
            //register user in the database
            require ('./mysqli_connect.php') ; //connect to the database

            //make the query
            $q1 = "INSERT INTO patient (name, tel_no, email ) VALUES ('$name', '$mobilehp','$email' )" ;
            $r1 = mysqli_query($dbc, $q1); //run the query
            
            $q2 = "INSERT INTO appointment (appoint_date, appoint_time) VALUES ('$appdate', '$timeslot')";
            $r2 = mysqli_query($dbc, $q2);

            $q3 = "INSERT INTO dentalserv (dental_serv) VALUES ('$service')";
            $r3 = mysqli_query($dbc, $q3);
            
            if ($r1 && $r2 && $r3){ //if it ran ok
                //Print message
                echo '<h1>Thank You !</h1>
                <p><h2>You are succesfully make the appointment </h2>.</p>'; 
                echo "Thank you for your appointment
                <br /><br />Below are your appointment details:
                    <br /><b>Name:</b>$name
                    <br /><b>Email:</b>$email
                    <br /><b>Mobile Phone:</b>$mobilehp
                    <br /><b>Appointment Date:</b>$appdate
                    <br /><b>Appointment Time:</b>$timeslot
                    <br /><b>Services:</b>$service 
                    ";

            } else { //if it did not run OK
                //Public Message
                echo '<h1>System Error</h1>
                <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>' ;
                
                //debugging message
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q1 .'<br /><br />Query: ' . $q2 . '<br /><br />Query: ' . $q3 .'</p>' ;
            } // end of if $r1 and $r2 and $r3

            mysqli_close($dbc); //close the database connection

            //include the footer and quit the script:
            include ('includes/footer.html');
            exit();
        } else { // Report the errors.
	
            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br />';
            foreach ($errors as $msg) { // Print each error.
                echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';
            
        } // End of if (empty($errors)) IF.
        
    }
?>