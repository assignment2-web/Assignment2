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
                <li class="breadcrumb-item"><a href="<?php echo URL; ?>admin/category_exam">Phân loại đề</a></li>
                <li class="breadcrumb-item">Chỉnh sửa</li>
            </ol>
        </div>
        <?php 
            $data = $this->data;
        ?>
        <form action="<?php echo URL; ?>admin/edited_type" method="post" id="frm-validate" name="edit-type" enctype="multipart/form-data">
           <input type="hidden" name="id" value="<?php echo $data['id']; ?>" >
            <div class="form-group">
                <label for="name">Tên <sup style="color: red;"> (*) </sup></label>
                <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" id="fullname" placeholder="Nguyễn Văn A">
            </div>
            <div class="form-group">
                <label for="username">Ảnh bìa<sup style="color: red;"> (*) </sup></label>
                <input type="file"  id="image" name="image" value="<?php echo $data['img']; ?>" />

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
            $("form[name='edit-type']").validate({
                rules: {
                    name: "required",
                    image: {
                        required: true, 
                        extension: "png|jpg|bmg"
                    }
                },
           
                messages: {
                     name: "Nhập vào tên loại đề ",
                     image: {
                        required: "Chọn ảnh bìa", 
                        extension: "Chọn đúng định dạng ảnh"
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