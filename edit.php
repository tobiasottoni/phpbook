<?php

include 'conn.php' ;

if ( $_SERVER [ "REQUEST_METHOD" ] == "POST" ) {
    $id = $_POST [ 'id' ];
    $name = $_POST [ 'name' ];
    $phone = $_POST [ 'phone' ];
    $email = $_POST [ 'email' ];

    $query = " UPDATE contacts SET name = ' $name ', phone = ' $phone ', email = ' $email ' WHERE id = $id " ;
    $result = mysqli_query ( $conn , $query );

    if ( $result ) {
        header ( "Location: index.php" );
        exit ();
} else {
        $error = "Error editing contact: " . mysqli_error ( $conn );
}
} elseif ( isset ( $_GET [ 'id' ])) {
    $id = $_GET [ 'id' ];
    $query = " SELECT * FROM contacts WHERE id = $id " ;
    $result = mysqli_query ( $conn , $query );
    $contact = mysqli_fetch_assoc ( $result );
}
?>

<!DOCTYPE HTML>
<html lang = "en">
<head> 
    <meta character set = "UTF-8">
    <meta name = "viewport" content = "width = device width, initial scale = 1.0">
    <link rel = "stylesheet" href = "styles.css">
    <title> Edit Contact </title>
</head>
<body>

<h1> Edit Contact </h1>

<form action = "" method = "post">
    <input type = "hidden" name = "id" value = " <?php echo $contact [ 'id' ]; ?> ">
    
    <label for = "name"> Name: </label>
    <input type = "text" id = "name" name = "name" value = " <?php echo $contact [ 'name' ]; ?> " mandatory>

    <label for = "phone"> Phone: </label>
    <input type = "tel" id = "phone" name = "phone" value = " <?php echo $contact [ 'phone' ]; ?> ">

    <label for = "email"> Email: </label>
    <input type = "email" id = "email" name = "email" value = " <?php echo $contact [ 'email' ]; ?> ">

    <input type = "submit" value = "Save Changes">
</form>

<a href = "index.php"> Return to Contact List </a>
