<?php
    
    while($row = mysqli_fetch_assoc($sql)){
        $output.='<a href="chat.php?user_id='.$row['unique_id'].'">
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