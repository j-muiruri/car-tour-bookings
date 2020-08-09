<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

              <h1>Login Form</h1>
              <?php
if (isset($_POST['enter']))
{
$server = mysqli_connect("localhost","root","") or die('Failed to connect');
$db = mysqli_select_db($server, "jofra_safaris") or die('Failed to database connect');
  

//variables defined & set to empty
$email = $password = "";

    //validating function

    //validating function


$email = $_POST["email"];
$password=md5($_POST['password']);


$res= mysqli_query($server, "SELECT * FROM users WHERE email='$email' AND password='$password'") or 
die("error");
//check rows returned
$count=mysqli_num_rows($res);

if($count<1)
{

echo' <div class="alert alert-block alert-error">';
echo' <button type="button" class="close" data-dismiss="alert">×</button>';
echo" <strong>Failed to log in.</strong>Wrong email or password.<br/>"; 
echo"   </div>";
}
else
{


$_SESSION['eliud']=array();
$_SESSION['eliud']['0']=$email;
$_SESSION['eliud']['1']=date('r');




header("location:index.php");
}


}
?>
            <form method="POST">
              <div>
                <input type="text" name="email" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" name="enter" value="Log in" class="btn btn-primary submit">
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
                <div>
                  <h1><i class="fa fa-paw"></i>Jofra Safaris Dashboard</h1>
                  <p>2020 All Rights Reserved. Log in to continue</p>
                </div>
              </div>
            </form>
          </section>
        </div>


      </div>
    </div>
  </body>
</html>
