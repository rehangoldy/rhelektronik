<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kasir Fashion Kimberly</title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/nklogoremove.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <style>
        body {
            font-family: Roboto;
            color: #4d4d4d;
            background: #556B2F;
        }

        .jumbotron {
            background: rgba(100%, 100%, 100%, 0.1);
            color: #555;
        }

        .jumbotron label {
            color: #fff;
        }

        .login {
            width: 100px;
            height: 100px;
        }

        .btn-warning {
            background: #A9A9A9;
            border-color: #A9A9A9;
        }

        .btn-warning:hover {
            background: #A9A9A9;
            border-color: #A9A9A9;
        }

        .error-message {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center mt-5 mb-3">
                <img src="<?= base_url('assets/img/nklogoremove.png'); ?>" class="login" />
                <h3 class="text-white mt-2">Aplikasi Kasir - Fashion Kimberly</h3>

                <?php 

                use LDAP\Result;
                if (isset($_POST['submit'])) {
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = md5($_POST['passowrd']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $select = " SELECT * FROM pelanggan WHERE email = '$email' && passwordd = '$password' ";
                    $result = mysqli_query($conn, $select);
                if(mysqli_num_rows($result) > 0){
                    $error;
                } else {
                    $insert = "INSERT INTO pelanggan(username,password,email)VALUES ('$username','$password','$email')";
                    mysqli_query($conn, $insert);
                    ('location:indexlayout.php');
                    }
                }
                ?>

                <?php
                if ($this->session->flashdata('alert')) {
                    echo '<div class="col-md-4 offset-md-4 mt-2"><div class="alert alert-danger" role="alert">
                    ' . $this->session->flashdata('alert') . '
                  </div></div>';
                }
                ?>

            </div>


            <label for="username">Username</label>
            <input type="text" placeholder="Email or Phone" name="username" required>

            <label for="email">Email</label>
            <input type="text" placeholder="Email or Phone" name="email" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password" required>
            <button name="submit">Submit</button>



            <div class="col-md-4 col-sm-12 offset-md-4">
                <div class="jumbotron py-3 pt-4">
                    <?= form_open(); ?>

                    <div class="form-group">
                        <label for="username"><i class="fa fa-user"></i> Username</label>
                        <input type="text" class="form-control form-control-sm <?= (form_error('username')) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Username" autocomplete="off" value="<?= set_value('username'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('username', '<p class="error-message">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="fa fa-lock"></i> Password</label>
                        <input type="password" class="form-control form-control-sm <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" autocomplete="off" name="password">
                        <div class="invalid-feedback">
                            <?= form_error('password', '<p class="error-message">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group float-right">
                        <button type="submit" name="submit" value="submit" class="btn btn-warning text-white btn-sm">Sign In <i class="fa fa-sign-in"></i></button>
                    </div>

                    <div class="clearfix"></div>
                    <?= form_close(); ?>
                </div>
                <p class="text-white text-center">Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved
                </p>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>
