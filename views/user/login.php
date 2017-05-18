<!DOCTYPE html>
<html lang="en">

<head>

    <title>Tao de</title>
    <?php include 'views/layout/libs.php' ?>
</head>

<body>
    <div class=" main-page  main-page-margin">
       <?php include 'views/layout/header.php' ?>

  
        <article>
            <div class="col-md-4">
            </div>
            <form action="login_user" name="login" id="frm-validate" method="POST">
                <div class="form-group col-md-4 login-form ">
                 <?php include 'views/notify/notify_header.php' ?>
                    <h3>Đăng nhập</h3>
                    <div class="input-group">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Swift.ios">
                        <input type="password" id="userpwd" name="userpwd" class="form-control" placeholder="*********">
                    </div>
                    <div class="button-group">
                        <button id="user-login" type="submit">Đăng nhập</button>
                        <button id="remember" type="button">Quên mật khẩu ?</button>
                        <button id="signin" type="button">Đăng kí</button>
                    </div>
                </div>
            </form>
            

        </article>

  <?php include 'views/layout/footer.php' ?>
    </div>
    <script>
        $('#remember').click(function() {
            location.href = "<?php echo URL ?>login/forget_pass";
        });
        $('#signin').click(function() {
            location.href = "<?php echo URL ?>login/signin";
        });

    </script>
    <script>
        $(function() {
            $("form[name='login']").validate({
                rules: {
                   
                    username: "required",
                    userpwd: {
                        required: true,
                        minlength: 5
                    }
                },
           
                messages: {
                    username: "Nhập vào tên đăng nhập ",
                    userpwd: {
                        required: "Vui lòng nhập mật khẩu của bạn ",
                        minlength: "Mật khẩu phải có độ dài ít nhất 5 kí tự "
                    }
                },
                highlight: function(element) {
                    $(element).addClass('error')
                },
                unhighlight: function(element) {
                    $(element).removeClass('error')
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>
