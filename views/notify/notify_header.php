<section>
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
        <?php } elseif($this->type == ERROR_CODE) { ?>
        <div class="alert alert-danger">
            <strong>Lỗi !</strong>
            <?php echo $this->message ?>
        </div>
        <?php }; ?>
    </div>
</section>