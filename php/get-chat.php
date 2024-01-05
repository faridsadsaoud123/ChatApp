<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn,$_POST['message']);
        $output="";
        $sql = "SELECT * FROM message WHERE (outgoing_id = {$outgoing_id} AND incoming_id = {$incoming_id}) 
        OR (outgoing_id={$incoming_id} AND incoming_id={$outgoing_id}) ORDER BY msg_id DESC";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_id']===$outgoing_id){
                    $output.='
                    <div class="chat outgoing">
                        <div class="details">
                            <p>'.$row['message'].'</p>
                        </div>
                    </div>';
                }else{
                    $output.='
                    <div class="chat incoming">
                        <div class="details">
                            <p>'.$row['message'].'</p>
                        </div>
                    </div>';
                }
            }
            echo $output;
        }   
    }else{
        header("../login.php");
    }
?>