<script>
//when user wants to log out
function logoutPrompt() {
    var x;
    if (confirm("Are you sure you want to log out?") == true) {
        x = "OK!";
    } else {
        x = "Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}
</script>



<?php

if(isset($_GET['log_out']))
{
$log_out = $_GET['log_out'];

session_destroy();
header("location:index.php");
}

//ob_end_flush();
?>



<footer>
    <div id ="footer" class="pull-right">
        Jofra Safaris Dashboard. By <a target="_blank" href="https://windand.co.ke">Windand Developers</a>
    </div>
    <div class="clearfix"></div>
</footer>