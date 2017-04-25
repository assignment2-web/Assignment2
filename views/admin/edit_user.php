<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chi tiet de</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo URL ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo URL ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo URL ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo URL ?>assets/plugin/ckeditor/ckeditor.js"></script>
    <link href="<?php echo URL ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo URL ?>assets/css/admin.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item"><a href="<?php echo URL; ?>admin/manager_user">Quản lí thành viên</a></li>
                <li class="breadcrumb-item">Chỉnh sửa</li>
            </ol>
        </div>
        <?php 
            $data = $this->data;
        ?>
        <form action="<?php echo URL; ?>admin/edit" method="post" id="frm-validate" name="edit-user">
           <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>" >
            <div class="form-group">
                <label for="fullname">Họ và tên<sup style="color: red;"> (*) </sup></label>
                <input type="text" class="form-control" name="fullname" value="<?php echo $data['fullname']; ?>" id="fullname" placeholder="Nguyễn Văn A">
            </div>
            <div class="form-group">
                <label for="username">Tên đăng nhập<sup style="color: red;"> (*) </sup></label>
                <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" id="username" placeholder="Tên đăng nhập">

            </div>
            <div class="form-group">
                <label for="useremail">Địa chỉ email<sup style="color: red;"> (*) </sup></label>
                <input type="email" class="form-control" name="useremail" value="<?php echo $data['email']; ?>" id="useremail" placeholder="nhat@gmail.com">

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
                <textarea class="form-control" name="note" value="<?php echo $data['note'] ?>" id="note" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" id="submit" class="btn btn-primary btn-style">Lưu</button>
            </div>
        </form>

    </div>
    <script>
        CKEDITOR.replace("note");
    </script>
    <script>
        $(function() {
            $("form[name='edit-user']").validate({
                rules: {
                    fullname: "required",
                    username: "required",
                    useremail: {
                        required: true,
                        email: true
                    }
                },
           
                messages: {
                    fullname: "Nhập vào đầy đủ Họ và Tên ",
                    username: "Nhập vào tên đăng nhập ",
                    useremail: "Nhập địa chỉ Email hợp lệ "
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