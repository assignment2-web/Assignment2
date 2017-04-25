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

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <i class="fa fa-user-secret" aria-hidden="true"></i> &nbsp;Xin chào Admin
                </a>
            </div>

            <ul class="nav navbar-nav navbar-right">
               <li><a  data-toggle="tab" href="#menu1"><i class="fa fa-book" aria-hidden="true"></i>&nbsp; Đề đang chờ duyệt <span  class="badge" style="background-color:red;"><?php echo $this->data['size']; ?></span></a></li>
                <li><a href="<?php echo URL ?>"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Quay lại trang chủ</a></li>
                <li><a href="<?php echo URL ?>/admin/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Đăng xuất</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="tab" href="#home">Quản lí thành viên</a></li>
                <li><a data-toggle="tab" href="#menu1">Quản lí đề thi</a></li>
                <li><a data-toggle="tab" href="#menu2">Phân loại đề</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" src="<?php echo URL ?>/admin/manager_user"></iframe>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                             <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" src="<?php echo URL ?>/admin/manage_exam"></iframe>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                              <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" src="<?php echo URL ?>/admin/category_exam"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>