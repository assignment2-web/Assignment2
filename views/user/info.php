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
                            <div class="tab-content">
                                <div id="userinfo" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img id="avatar" src="<?php echo URL ; ?>/assets/images/avatar.jpg" alt="avatar" width="95" height="100">
                                           
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-5">
                                                <input type="text" id="user-fullname" class="user-fullname" value="<?php echo $this->data['fullname']; ?>" readonly>
                                            </div>
                                            <div class="col-md-5">
                                                <button id="edit-fullname"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="full-info">
                                        <table>
                                            <tr>
                                                <td>
                                                    <label for="user-name">Tên đăng nhập :</label>
                                                </td>
                                                <td>
                                                    <input id="user-name" type="text" value="<?php echo $this->data['username']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="user-email">Địa chỉ email :</label>
                                                </td>
                                                <td>
                                                    <input id="user-email" type="email" value="<?php echo $this->data['email']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="user-des">Giới thiệu bản thân :</label>
                                                </td>
                                                <td>
                                                    <textarea ><?php echo $this->data['description']; ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <input id="submit" type="submit" class="btn btn-primary btn-nhat" value="Lưu">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div id="chang-pwd" class="tab-pane fade">
                                    <table>
                                        <tr>
                                            <td>
                                                <label for="user-pwd">Nhập mật khẩu :</label>
                                            </td>
                                            <td>
                                                <input id="user-pwd" type="password" placeholder="Nhập mật khẩu">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="user-renew-pwd">Mật khẩu mới :</label>
                                            </td>
                                            <td>
                                                <input id="user-renew-pwd" type="password" placeholder="Mật khẩu mới">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="user-renew-repwd">Nhập lại mật khẩu mới :</label>
                                            </td>
                                            <td>
                                                <input id="user-renew-repwd" type="password" placeholder="Nhập lại mật khẩu mới">
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <input id="submit-repwd" type="submit" class="btn btn-primary btn-nhat" value="Lưu">
                                            </td>
                                        </tr>
                                    </table>
                                </div>

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
</body>

</html>