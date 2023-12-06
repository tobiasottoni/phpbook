<?php
include 'conn.php';

$query = " SELECT * FROM contacts";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta character set="UTF-8">
    <meta name="viewport" content="width = device width, initial scale = 1.0">
    <link rel="stylesheet" href="styles.css">
    <title> Contact Book </title>
</head>

<body>

    <h1> Contact Directory </h1>

    <table>
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Phone </th>
            <th> Email </th>
            <th> Actions </th>
        </tr>
        <?php while ($contact = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td> <?php echo $contact['id']; ?> </td>
                <td> <?php echo $contact['name']; ?> </td>
                <td> <?php echo $contact['phone']; ?> </td>
                <td> <?php echo $contact['email']; ?> </td>
                <td>
                    <a href="edit.php?id=<?php echo $contact['id'];?>"> Edit </a>
                        <a href="del.php?id=<?php echo $contact['id'];?>" onclick=" return confirm ('Do you really want to delete this contact?')"> Delete </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="add.php"> Add New Contact </a>

</body>

</html>