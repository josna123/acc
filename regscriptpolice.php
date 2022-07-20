<?php

require_once('db_conn.php'); 
$db= $conn; // update with your database connection
// by default, error messages are empty
$register=$valid=$nameErr=$addressErr=$contactErr=$passErr=$cpassErr='';
 // by default,set input values are empty
 $set_name=$set_address=$set_contactnumber='';

extract($_POST);
if(isset($_POST['submit']))
{
  

   //input fields are Validated with regular expression
   $validName="/^[a-zA-Z ]*$/";
   $validContact="/^[0-9]{10}$/";
   $uppercasePassword = "/(?=.*?[A-Z])/";
   $lowercasePassword = "/(?=.*?[a-z])/";
   $digitPassword = "/(?=.*?[0-9])/";
   $spacesPassword = "/^$|\s+/";
   $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
   $minEightPassword = "/.{8,}/";

 //  First Name Validation
if(empty($name)){
   $nameErr="Station Name is Required"; 
}
else if (!preg_match($validName,$name)) {
   $nameErr="Digits are not allowed";
}else{
   $nameErr=true;
}

// Address Validation
if(empty($address)){
   $addressErr="Address is required"; 
}
else if (!preg_match($validName,$address)) {
   $addressErr="Digit are not allowed";
}
else{
   $addressErr=true;
}

//Contact Validation
if(empty($contact_number)){
  $contactErr="Contact Number is Required"; 
}
else if (!preg_match($validContact,$contact_number)) {
  $contactErr="Invalid Contact";
}
else{
  $contactErr=true;
}
    
// password validation 
if(empty($password)){
  $passErr="Password is Required"; 
} 
elseif (!preg_match($uppercasePassword,$password) || !preg_match($lowercasePassword,$password) || !preg_match($digitPassword,$password) || !preg_match($symbolPassword,$password) || !preg_match($minEightPassword,$password) || preg_match($spacesPassword,$password)) {
  $passErr="Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
}
else{
   $passErr=true;
}

// form validation for confirm password
if($cpassword!=$password){
   $cpassErr="Confirm Password doesnot Matched";
}
else{
   $cpassErr=true;
}

// check all fields are valid or not
if($nameErr==1 && $addressErr==1 && $contactErr==1 && $passErr==1 && $cpassErr==1)
{

   
    $name =legal_input($name);
    $address  =legal_input($address);
    $contact_number     =legal_input($contact_number);
    $password  =legal_input(md5($password));
   
    // check unique email
    $checkContact=unique_contact_number($contact_number);
    if($checkContact)
    {
      $register=$contact_number." is already exist";
    }else{

       // Insert data
      $register=register($name,$password,$address,$contact_number);

    }




}else{

     // set input values is empty until input field is invalid
    $set_name=$name;
    $set_address= $address;
    $set_contactnumber= $contact_number;
}
// check all fields are vakid or not
}


// convert illegal input value to ligal value formate
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}

function unique_contact_number($contact_number){
  
  global $db;
  $sql = "SELECT contact_number FROM police_list WHERE contact_number='".$contact_number."'";
  $check = $db->query($sql);

 if ($check->num_rows > 0) {
   return true;
 }else{
   return false;
 }
}

// function to insert user data into database table
function register($name,$password,$address,$contact_number){

   global $db;
   $sql="INSERT INTO police_list(station_name,password,address,contact_number) VALUES(?,?,?,?)";
   $query=$db->prepare($sql);
   $query->bind_param('ssss',$name,$password,$address,$contact_number);
   $exec= $query->execute();
    if($exec==true)
    {
     return "You are registered successfully";
    }
    else
    {
      return "Error: " . $sql . "<br>" .$db->error;
    }
}
?>