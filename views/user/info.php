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
            <div class="content-page user-bar">
                <div class="col-md-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a data-toggle="tab" href="#userinfo">Thông tin người dùng</a></li>
                        <li><a data-toggle="tab" href="#chang-pwd">Đổi mật khẩu</a></li>

                    </ul>
                </div>
                <div class="col-md-10">
                    <div class="panel panel-default user-panel">
                        <div class="panel-body">
                        <?php include 'views/notify/notify_header.php' ?>
                            <div class="tab-content">
                                <div id="userinfo" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img id="avatar" src="<?php echo URL ; ?>/assets/images/avatar.jpg" alt="avatar" width="95" height="100">
                                           
                                        </div>
                                    <form action="<?php echo URL ;?>/user/edit" method="post">
                                        <div class="col-md-10">
                                            <div class="col-md-5">
                                                <input type="text" id="user-fullname" name="fullname" class="user-fullname" value="<?php echo $this->data['fullname']; ?>" readonly>
                                            </div>
                                            <div class="col-md-5">
                                                <button type="button" id="edit-fullname"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="full-info">
                                    
                                         <input name="id" type="hidden" value="<?php echo $this->data['user_id']; ?>">
                                        <table>
                                            <tr>
                                                <td>
                                                    <label for="user-name">Tên đăng nhập :</label>
                                                </td>
                                                <td>
                                                    <input id="user-name" name="username" type="text" value="<?php echo $this->data['username']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="user-email">Địa chỉ email :</label>
                                                </td>
                                                <td>
                                                    <input id="user-email" name="email" type="email" value="<?php echo $this->data['email']; ?>">
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <input id="submit" type="submit" class="btn btn-primary btn-nhat" value="Lưu">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    </form>
                                </div>
                                <div id="chang-pwd" class="tab-pane fade">
                                <form name="change_pass" id="frm-validate" action="<?php echo URL ;?>user/change_pass" method="post">
                                <input name="id" type="hidden" value="<?php echo $this->data['user_id']; ?>">
                                    <table>
                                        <tr>
                                            <td>
                                                <label for="olduserpwd">Nhập mật khẩu :</label>
                                            </td>
                                            <td>
                                                <input id="olduserpwd" name="olduserpwd" type="password" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="newuserpwd">Mật khẩu mới :</label>
                                            </td>
                                            <td>
                                                <input id="newuserpwd" name="newuserpwd" type="password"  required >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="reuserpwd">Nhập lại mật khẩu mới :</label>
                                            </td>
                                            <td>
                                                <input id="reuserpwd" name="reuserpwd" type="password"  required>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <input id="submit-repwd" type="submit" class="btn btn-primary btn-nhat" value="Lưu">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix visible-lg"></div>

            </div>
        </article>

        <?php include 'views/layout/footer.php' ?>
    </div>
    <script src="<?php echo URL ;?>assets/js/script.js">
    </script>
     <script>
        $(function() {
            $("form[name='change_pass']").validate({
                rules: {
                   
                    olduserpwd: {
                        required: true,
                        minlength: 5
                    },
                    newuserpwd: {
                        required: true,
                        minlength: 5
                    },
                    reuserpwd: {
                        require: true,
                        minlength: 5,
                        equalTo: "#newuserpwd"
                    }
                },
           
                messages: {
                    olduserpwd: {
                        required: "Nhập vào mật khẩu cũ",
                        minlength: "Mật khẩu ít nhất 5 kí tự"
                    },
                    newuserpwd: {
                        required: "Nhập vào mật khẩu mới",
                        minlength: "Mật khẩu ít nhất 5 kí tự"
                    },
                    reuserpwd: {
                        require: "Nhập lại mật khẩu mới",
                        minlength: "Mật khẩu ít nhất 5 kí tự",
                        equalTo: "Mật khẩu nhập lại phải trùng nhau"
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