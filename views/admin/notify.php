<!DOCTYPE html>
<html lang="en">

<head>

    <title>Tao de</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo URL ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo URL ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo URL ?>assets/plugin/ckeditor/ckeditor.js"></script>
    <link href="<?php echo URL ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo URL ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo URL ?>assets/css/taode.css" rel="stylesheet">
</head>

<body>
        <article>
            <div class="col-md-offset-2 col-md-8">
                <?php if($this->type == SUCCESS_CODE) { ?>
                <div class="alert alert-success">
                    <strong>Thành công !</strong>
                    <?php echo $this->message ?>
                </div>
                <?php }elseif($this->type == INFO_CODE) { ?>
                <div class="alert alert-info">
                    <strong>Thông báo !</strong>
                    <?php echo $this->message ?>
                </div>
                <?php }elseif ($this->type == WARNING_CODE) { ?>
                <div class="alert alert-warning">
                    <strong>Cảnh báo !</strong>
                    <?php echo $this->message ?>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger">
                    <strong>Lỗi !</strong>
                    <?php echo $this->message ?>
                </div>
                <?php }; ?>
            </div>
            
            <div class="col-md-offset-4 col-md-4 text-center">
                <a href="<?php echo URL ?>/admin/manager_user"  style="text-decoration:none;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Quay trở lại </a>
            </div>
        </article>


</body>

</html>