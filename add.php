<?php

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = " INSERT INTO contacts (name, phone, email) VALUES (' $name ', ' $phone ', ' $email ')";
    $result= mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error adding contact: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta character set="UTF-8">
    <meta name="viewport" content="width = device width, initial scale = 1.0">
    <link rel="stylesheet" href="styles.css">
    <title> Add Contact</title>
</head>

<body>

    <h1> Add Contact</h1>

    <form action="" method="post">
        <label for="name"> Name:</label>
        <input type="text" id="name" name="name" required>

            <label for="phone"> Phone:</label>
            <input type="tel" id="phone" name="phone">

                <label for="email"> Email:</label>
                <input type="email" id="email" name="email">

                    <input type="submit" value="Add">
    </form>

    <a href="index.php"> Return to Contact List</a>

    <?php if (isset($error)) : ?>
        <p style="color: red;"> <?php echo $error; ?></p>
    <?php endif; ?>

</body>

</html>