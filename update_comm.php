<?php
 session_start();
 include('server.php');
 $errors = array();
 $Topic_ID = $_GET['Topic_ID'];
 $Comment_ID = $_GET['Comment_ID'];
 if (isset($_POST['updatecomments'])){
    // echo "addtopic pass 1";
    $Comment_detail = mysqli_real_escape_string($conn, $_POST['Comment_detail']);
    // echo "error pass2";
    $sqlupdate ="UPDATE comments SET Comment_detail='$Comment_detail' WHERE Comment_ID=$Comment_ID;";
    mysqli_query($conn, $sqlupdate);
    ?>
    <script type="text/javascript">
    window.location="view.php?Topic_ID=<?php echo $Topic_ID ?>";
</script> 
<?php
}?>   