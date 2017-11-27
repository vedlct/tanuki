<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Tanuki</title>

    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />

    <!-- icons -->
    <link href="<?php echo base_url() ?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <!-- bootstrap -->
    <link href="<?php echo base_url() ?>public/js/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/css/login.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>public/img/favicon.ico" />
</head>
<body>
<div class="form-title">
    <h1>tanuki</h1>
</div>
<!-- Login Form-->
<div class="login-form text-center">
    <div class="toggle"><i class="fa fa-user-plus"></i>
    </div>
    <div class="form formLogin">
        <h2>Login to your account</h2>
        <form action="<?php echo base_url()?>login/check_user" method="post">
            <input type="email" name="email" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <div class="remember text-left">
                <div class="checkbox checkbox-primary">
                    <input id="checkbox2" type="checkbox" checked>
                    <label for="checkbox2">
                        Remember me
                    </label>
                </div>
            </div>
            <button type="submit">Login</button>
            <div class="forgetPassword"><a href="javascript:void(0)">Forgot your password?</a>
            </div>
        </form>
    </div>
    <div class="form formRegister">
        <h2>Create an account</h2>
        <form>
            <input type="text" placeholder="Username" />
            <input type="password" placeholder="Password" />
            <input type="email" placeholder="Email Address" />
            <input type="text" placeholder="Full Name" />
            <input type="tel" placeholder="Phone Number" />
            <button>Register</button>
        </form>
    </div>
    <div class="form formReset">
        <h2>Reset your password?</h2>
        <form>
            <input type="email" placeholder="Email Address" />
            <button>Send Verification Email</button>
        </form>
    </div>
</div>
<!-- start js include path -->
<script src="<?php echo base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>public/js/login.js"></script>
<script src="<?php echo base_url() ?>public/js/pages.js" type="text/javascript"></script>
<!-- end js include path -->
</body>


</html>