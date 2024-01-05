<?php
    include_once "config.php";
    
    $output = "";
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id LIKE '%{$userid}%'");

    if ($sql) {
        // Utilisez mysqli_num_rows pour vérifier si des résultats existent
        if (mysqli_num_rows($sql) > 0) {
            // Utilisez mysqli_fetch_assoc pour récupérer chaque ligne de résultat
            while ($row = mysqli_fetch_assoc($sql)) {
                $output = $row['prenom'] . ' ' . $row['nom'];
            }
        } else {
            echo "Aucun utilisateur trouvé.";
        }
    } else {
        echo "Erreur dans la requête : " . mysqli_error($conn);
    }

    echo $output;
?>
