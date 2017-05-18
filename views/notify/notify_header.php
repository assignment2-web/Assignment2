<div class="row">
    <div class="col-md-12" id="message">
    </div>
</div>

<script>
    $(document).ready(function() {
        <?php if(count($this->response) != 0) { ?>
            <?php foreach($this->response as $data) { ?>
            create_message(<?php echo $data['code']; ?>, "<?php echo $data['message']; ?>");
            $('.alert').fadeIn(3000);
            <?php };?>
             $('.alert').fadeOut(5000); // 5 seconds x 1000 milisec = 5000 milisec
        <?php }; ?>
    });

    function create_message(type, message){
        newdiv = document.createElement( "div" );
    
        switch (type) {
            case <?php echo SUCCESS_CODE; ?> :
                newdiv.className = "alert alert-success text-left";
                text = "<strong>Thành công ! </strong>";
                break;
            case <?php echo INFO_CODE; ?> :
                newdiv.className = "alert alert-info text-left";
                 text = "<strong>Thông báo ! </strong>";
                break;
            case <?php echo WARNING_CODE; ?> :
                newdiv.className = "alert alert-warning text-left";
                 text = "<strong>Cảnh báo ! </strong>";
                break;
            case <?php echo ERROR_CODE; ?> :
                newdiv.className = "alert alert-danger text-left";
                 text = "<strong>Lỗi ! </strong>";
                break;
        
            default:
                break;
        }
        text += message;
        newdiv.innerHTML = text;
        $("#message").append(newdiv);
    }
</script>