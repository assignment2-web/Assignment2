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
                <a href="<?php echo URL ?>"  style="text-decoration:none;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Quay trở lại Trang chủ</a>
            </div>
            
            
            

        </article>


      <?php include 'views/layout/footer.php' ?>
    </div>

</body>

</html>