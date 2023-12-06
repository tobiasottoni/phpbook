<?php
include 'conn.php' ;

if ( isset ( $_GET [ 'id' ])) {
    $id = $_GET [ 'id' ];

    // Check if the contact exists
    $verifyQuery = " SELECT * FROM contacts WHERE id = $id " ;
    $verificarResult = mysqli_query ( $conn , $verificarQuery );

    if ( mysqli_num_rows ( $verificarResult ) > 0 ) {
        // Delete the contact
        $deleteQuery = " DELETE FROM contacts WHERE id = $id " ;
        $excluirResult = mysqli_query ( $conexao , $excluirQuery );

        if ( $excludeResult ) {
            header ( "Location: index.php" );
            exit ();
} else {
            $error = "Error deleting contact: " . mysqli_error ( $connection );
}
} else {
        $error = "Contact not found." ;
}
} else {
    $error = "Contact ID not provided." ;
}
?>
