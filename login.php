<!-- PHP File Required / Include Here -->
<?php
session_start();
if(isset($_SESSION['userLogin']))
    header("Location: index.php");
?>

<!-- HTML DOCUMENT STARTS HERE -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PHP Practice</title>
        <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>

    <body>
        <!-- A Simple Basic Login Form -->
        <!-- Login Form -->
        <div>
            <div class="container-fluid">
                <div class="row no-gutter">
                    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                    <div class="col-md-8 col-lg-6">
                        <div class="login d-flex align-items-center py-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9 col-lg-8 mx-auto">
                                        <h3 class="login-heading mb-4">Welcome To Demo Login</h3>
                                        <form id="login-form">
                                            <div class="form-label-group">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Email address" required autofocus>
                                                <label for="inputEmail">Email address</label>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="password" id="password" name="password"
                                                    class="form-control" placeholder="Password" required>
                                                <label for="inputPassword">Password</label>
                                            </div>

                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Remember
                                                    Password</label>
                                            </div>
                                            <button
                                                class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                                type="submit" id="login">Sign in</button>
                                            <div class="text-center">
                                                <a class="small" href="#">Forgot password?</a></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="./assets/js/vendor/jquery-3.4.1.min.js"></script>
        <script src="./assets/js/vendor/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script type="text/javascript">
        $(() => {
            $("#login").click(function(e) {
                var valid = this.form.checkValidity();
                if (valid) {
                    var email = $("#email").val();
                    var password = $("#password").val();
                    e.preventDefault(e);

                    $.ajax({
                        type: 'POST',
                        url: 'login_Process.php',
                        data: {
                            email: email,
                            password: password,
                        },
                        success: function(data) {
                            if ($.trim(data) === '1') {
                                Swal.fire({
                                    'title': 'Successful',
                                    'text': data,
                                    'type': 'success',
                                    onClose: () => {
                                        $('#regForm').trigger("reset");
                                        setTimeout(
                                            "window.location.href = 'index.php'",
                                            2000);
                                    }
                                });
                            } else {
                                Swal.fire({
                                    'title': 'ERROR',
                                    'text': data,
                                    'type': 'error',

                                });
                            }
                        },
                        error: function(e) {
                            Swal.fire({
                                'title': 'Error',
                                'text': 'There were errors while Login',
                                'type': 'error'
                            })
                        }
                    });

                } else {}

            });
        });
        </script>
    </body>

</html>
