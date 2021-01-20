
<div class="login-register-body">

<?php
require_once 'core/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username_login']) && isset($_POST['password_login'])) {
        $username = $_POST['username_login'];
        $password = $_POST['password_login'];
        $hashedPassword = sha1($password);
        $user = new User;
        if($user->login($username,$hashedPassword)){
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            Redirect::redirectTo('index.php');
        } else {
            ?>
        <div class="alert alert-danger">
        <strong>Error!</strong> Error Username or Password.
        </div>
        <?php
        }
    } elseif (isset($_POST['name-register']) && isset($_POST['username-register']) && isset($_POST['register-password'])) {
        $name = $_POST['name-register'];
        $username = $_POST['username-register'];
        $password = $_POST['register-password'];
        $repassword = $_POST['register-re-password'];
        $hashedPassword = sha1($password);
        $user = new User;
        $acc = $user->makeAccount($username,$name,$password,$hashedPassword,$repassword);
        if($acc == 'True'){
            ?>
        <div class="container">
            <div class="alert alert-success" style="margin-top:5px">
            <strong>Success!</strong> Created Your Account with Name <?php echo $username;  ?>
            </div>
        </div>
            <?php
        } else {
            $errors = $acc;
            foreach($errors as $error){
            ?>
            <div class="container">
                <div class="alert alert-danger" style="margin-top:5px">
                <strong>Error!</strong> <?php echo $error; ?>
                </div>
            </div>
            <?php
            }
        }

    }
}


















?>

    <div class="container">
        <div class="text-center">
            <h1 class="login-register-h1">Login & Register <span class="bold"> Sarahah</span> Website</h1>
            <p class="login-register-p">This Website allows you to <span class="bold"> Send Messages and Chat </span> With Other <br> People without they Know ..</p>

        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <form class="login form form-login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-background" style="padding-top:5px;">
                        <i class="fa fa-user pull-right" style="color:#FFF;font-size:50px;margin-right:25px;margin-top:25px;"></i>
                        <h2 class="text-left" style="margin-left:25px;color:white">Login</h2>
                        <p class="text-left" style="margin-left:25px;color:white">Enter Your Username and Password to Login</p>
                        <input type="text" name="username_login" class="username-login" placeholder="Enter Your Username" autocomplete="off"><br>
                        <input type="password" name="password_login" class="password" placeholder="Enter Your Password" autocomplete="off">
                        <br><input type="submit" value="Login" class="login-input"><br>
                    </div>
                </form>
            </div>

            <div class="col-md-6 col-lg-6 col-sm-12">
            <form class="register form form-register" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="form-background" style="padding-top:5px;">
                    <i class="fa fa-user pull-right" style="color:#FFF;font-size:50px;margin-right:25px;margin-top:25px;"></i>
                    <h2 class="text-left" style="margin-left:25px;color:white">Register</h2>
                    <p class="text-left" style="margin-left:25px;color:white">Enter Your Username and Password to Login</p>
                    <input type="text" class="name-register" placeholder="Enter Your Name" autocomplete="off" name="name-register"><br>
                    <input type="text" class="username-register" placeholder="Enter Your Username" autocomplete="off" name="username-register" ><br>
                    <input type="password" class="password password-register"  placeholder="Enter Your Password" autocomplete="off" name="register-password"><br>
                    <input type="password" class="password re-password-register" placeholder="ReEnter Your Password" autocomplete="off" name="register-re-password">
                    <br><input type="submit" value="Register" class="register-input"><br>
                </div>
            </form>
        </div>

        </div>

        <div class="row">
            <div class="boxes">
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="box text-center">
                        <h4>Our <span class="bold">Website </span>is Secure</h1>
                        <p>No one can know who Sends the messages</p>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="box text-center">
                        <h4>Our <span class="bold">Website </span>is Safe</h1>
                        <p>No one can know who Sends the messages</p>
                    </div>
                </div>


                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="box text-center">
                        <h4>Our <span class="bold">Website </span>is New</h1>
                        <p>No one can know who Sends the messages</p>
                    </div>
                </div>


                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="box text-center">
                        <h4>Our <span class="bold">Website </span>is Nice</h1>
                        <p>No one can know who Sends the messages</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>  
</div>







<?php
include 'includes\templates\footer.php';
?>