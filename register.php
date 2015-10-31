<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include 'widgets/common.php'; ?>
</head>
<body class="register-page">
<div class="container">
    <?php include 'widgets/topbar.php'; ?>

    <div class="row">
        <div class="col-sm-6 register-page-register-form">
           <h2>Register</h2>
            <?php
            if (isset($_SESSION['registerError'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?php
                echo $_SESSION['registerError'];
                unset($_SESSION['registerError']);
                ?>
            </div>
            <?php } ?>
            <form class="form-horizontal" role="form" method="POST" action="api/register.php">
                <div class="form-group">
                    <label for="fullname" class="col-xs-3 control-label">Full Name</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" name="fullname" id="fullname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-xs-3 control-label">Email</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-xs-3 control-label">Password</label>
                    <div class="col-xs-6">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword" class="col-xs-3 control-label">Confirm Password</label>
                    <div class="col-xs-6">
                        <input type="password" class="form-control" id="confirmPassword">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-info">Register</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-sm-6">
            <h2>Login</h2>
            <?php
            if (isset($_SESSION['loginError'])){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['loginError'];
                    unset($_SESSION['loginError']);
                    ?>
                </div>
            <?php } ?>
            <form class="form-horizontal" role="form" method="POST" action="api/login.php">
                <div class="form-group">
                    <label for="email" class="col-xs-3 control-label">Email</label>
                    <div class="col-xs-6">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-xs-3 control-label">Password</label>
                    <div class="col-xs-6">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-sm-6">
                        <a href="">Forgot Password?</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>