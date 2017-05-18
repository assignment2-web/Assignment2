<!DOCTYPE html>
<html lang="en">

<head>

    <title>Tao de</title>
    <?php include 'views/layout/libs.php' ?>
</head>

<body>
    <div class=" main-page main-page-margin" >
     <?php include 'views/layout/header.php' ?>
        <article>
            <div class="col-md-4">
                        </div>
                <form action="<?php echo URL ?>user/add" id="frm-validate" name="signin" method="POST">
                       <div class="form-group col-md-4 login-form signup-form">
                        <?php include 'views/notify/notify_header.php' ?>
                         <h3>Đăng Kí</h3>
                        <div class="input-group">
        
                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nguyễn Văn A">
                            
                                <input type="text" class="form-control" name="username" id="username"  placeholder="Tên đăng nhập">
                        
                                <input type="password" class="form-control" name="userpwd" id="userpwd" placeholder="Mật khẩu">

                                <input type="password" class="form-control" id="userrepwd" placeholder="Nhập lại mật khẩu">

                                <input type="email" class="form-control" name="useremail" id="useremail" placeholder="nhat@gmail.com">
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary btn-style">Đăng kí ngay</button>
                    </div>
                </form>
            
        </article>
        <?php include 'views/layout/footer.php' ?>
    </div>

    <script>
        CKEDITOR.replace("note");
    </script>
    <script>
        $(function() {
            $("form[name='signin']").validate({
                rules: {
                    fullname: "required",
                    username: "required",
                    useremail: {
                        required: true,
                        email: true
                    },
                    userpwd: {
                        required: true,
                        minlength: 5
                    },
                    userrepwd: {
                        require: true,
                        minlength: 5,
                        equalTo: "#userpwd"
                    }
                },
           
                messages: {
                    fullname: "Nhập vào đầy đủ Họ và Tên ",
                    username: "Nhập vào tên đăng nhập ",
                    useremail: "Nhập địa chỉ Email hợp lệ ",
                    userpwd: {
                        required: "Vui lòng nhập mật khẩu của bạn ",
                        minlength: "Mật khẩu phải có độ dài ít nhất 5 kí tự "
                    },
                    userrepwd: {
                        require: "Vui lòng nhập mật khẩu xác nhận của bạn ",
                        equalTo: "Mật khẩu xác nhận không trùng khớp, vui lòng nhập lại"
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