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
                <li class="breadcrumb-item"><a href="<?php echo URL; ?>/admin/manager_user">Quản lí thành viên</a></li>
                <li class="breadcrumb-item">Quyền truy cập</li>
            </ol>
        </div>
        <?php 
            $data = $this->data;
        ?>
        <form action="<?php echo URL; ?>admin/role" method="post">
            <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" id="username" placeholder="Tên đăng nhập" readonly>

            </div>
            <div class="form-group">
                <label for="userwork">Quyền truy cập</label>
                <select class="form-control" id="role" name="role">
                                   <?php if($data['role'] == 0) { ?>
                                    <option value="1">Admin</option>
                                    <option value="0" selected>Read</option>
                                    <?php } else { ?>
                                        <option value="1">Admin</option>
                                    <option value="0">Read</option>
                                    <?php }; ?>
                                </select>
            </div>
            <div class="form-group">
                <button type="submit" id="submit" class="btn btn-primary btn-style">Lưu</button>
            </div>
        </form>

    </div>
    <script>
        CKEDITOR.replace("note");
    </script>
</body>

</html>