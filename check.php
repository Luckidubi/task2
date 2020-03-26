<?php

session_start();

function clean_input($data) { // cleans the form input to avoid script injection
  $data = trim($data); 
  $data = stripslashes($data); 
  $data = htmlspecialchars($data); 
  return $data;
}

        
    $message = ''; // For storing error message
 
    
        if (isset($_POST['submit'])){
        // check if all form data are submited, else output error message
        if(isset($_POST['fname']) && isset($_POST['lname'])  && isset($_POST['email']) && isset($_POST['msg'])) {
        // if form fields are empty, outputs message, else, gets their data
        if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['msg'])) {
         
          echo '**All fields are required**';
        
        }
        else {
           $fname = clean_input(strtolower($_POST["fname"]));
           
            $lname = clean_input($_POST["lname"]);
	            $email = clean_input(strtolower($_POST["email"]));
           $msg = clean_input($_POST["msg"]);
        // gets and adds form data into an array
        $data = array(
          'firstname'=> $fname,
          'lastname'=> $lname,
          'email'=> $email,
          'msg'=> $msg,
          
          
        );

       
       
    

        // path and name of the file
        $user_file = $fname.'.json';

        $arr_data = array();        // to store all form data

        // check if the file exists
        if(file_exists($user_file)) {
          // gets json-data from file
          $jsondata = file_get_contents($user_file);

          // converts json string into array
          $arr_data = json_decode($jsondata, true);

          foreach ($arr_data as $user_data) { // loop through the existing data 
              if($user_data['email'] === $email) { // check if user with the same name and email already exists
       
                echo 'This Username and Email already exist';
                
                return;
              }
          }
        }

        // appends the array with new form data
        $arr_data[] = $data;

        // encodes the array into a string in JSON format (JSON_PRETTY_PRINT - uses whitespace in json-string, for human readable)
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

        // saves the json string in "user.json" 
        // outputs error message if data cannot be saved
        if(file_put_contents($fname.'.json', $jsondata)) {
          
         echo 'Thank you '.strtoupper($fname).', Message sent Successfully!';
         
     
      
        
       }
        else echo "<script> alert('Data not saved!') </script>";
      }           
    } else {
     
     echo '**Form fields are empty**';
  
   }
  }


