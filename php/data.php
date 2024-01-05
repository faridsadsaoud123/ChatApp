<?php
    
    while($row = mysqli_fetch_assoc($sql)){
        // ($row=['status'] == "Inactif") ? $inactif="inactif": $inactif="";
        $output.='<a href="#" data-userid="'. $row['unique_id'] .'">
        <div class="content">
            <img src="'.$row['img'].'" alt="">
            <div class="details">
                <span>'.$row['nom'].' '.$row['prenom'].'</span>
                <p class="txt">Text message</p>
            </div>
        </div>
        <div class="status-dot"><i class="fas fa-circle"></i></div>
    </a>';
    }
?>