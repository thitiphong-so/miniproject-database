<?php
 session_start();
 include('server.php');
 $errors = array();
 $Topic_ID = $_GET['Topic_ID'];
 $Comment_ID = $_GET['Comment_ID'];
           
    if (isset($_GET['Comment_ID'])){
            
            $sql ="DELETE FROM comments WHERE Comment_ID ='$Comment_ID'";
            mysqli_query($conn, $sql);
         ?>
        <script type="text/javascript">
            window.location="view.php?Topic_ID=<?php echo $Topic_ID ?>";
       </script> 
        
        
<?php
}?>