<!DOCTYPE html>
<html lang="en">

<head>

    <title>Tao de</title>
    <?php include 'views/layout/libs.php' ?>
</head>

<body>
    <div class=" main-page">
     <?php include 'views/layout/header.php' ?>
        <article>

            <div class="panel panel-default panel-list">
                <div class="panel-heading ">
                    <h1>Đăng kí thành viên</h1>
                </div>
                <form action="<?php echo URL ?>user/add" id="frm-validate" name="signin" method="POST">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="fullname">Họ và tên<sup style="color: red;"> (*) </sup></label>
                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nguyễn Văn A">
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập<sup style="color: red;"> (*) </sup></label>
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Tên đăng nhập">
                            
                        </div>
                        <div class="form-group">
                            <label for="userpwd">Mật khẩu<sup style="color: red;"> (*) </sup></label>
                            <input type="password" class="form-control" name="userpwd" id="userpwd" placeholder="Mật khẩu">

                        </div>
                        <div class="form-group">
                            <label for="userrepwd">Xác nhận lại mật khẩu<sup style="color: red;"> (*) </sup></label>
                            <input type="password" class="form-control" id="userrepwd" placeholder="Nhập lại mật khẩu">

                        </div>
                        <div class="form-group">
                            <label for="useremail">Địa chỉ email<sup style="color: red;"> (*) </sup></label>
                            <input type="email" class="form-control" name="useremail" id="useremail" placeholder="nhat@gmail.com">

                        </div>
                        <div class="form-group">
                            <label for="userwork">Nghề nghiệp</label>
                            <select class="form-control" id="userwork" name="userwork">
                                    <option value="0">Giáo viên</option>
                                    <option value="1">Học sinh</option>
                                    <option value="2">Sinh viên</option>
                                    <option value="3">Khác ...</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="note">Giới thiệu vài nét về bản thân</label>
                            <textarea class="form-control" name="note" id="note" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="submit" id="submit" class="btn btn-primary btn-style">Đăng kí ngay</button>
                    </div>
                </form>
            </div>
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