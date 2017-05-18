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
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL ?>">BK Maker</a></li>
                    <li class="breadcrumb-item">Tạo đề thi</li>
                </ol>
            </div>
            <div class="panel panel-default panel-question">
                <div class="panel-heading">
                    <h1>Thông tin đề thi</h1>
                </div>
                <form action="add_subject" name="exam" id="frm-validate" method="POST">
                    <div class="panel-body" id="content">
                        <div class="form-group">
                            <label for="name">Tên đề <sup style="color: red;"> (*) </sup></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập vào tên đề thi">
                        </div>
                        <div class="form-group">
                            <label for="typetest">Thể loại đề</label>
                            <select class="form-control" id="typetest" name="typetest">
                                   <?php foreach($this->data as $data) {?>
                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                                    <?php }; ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="time">Thời gian <sup style="color: red;"> (*) </sup></label>
                            <input type="number" class="form-control" id="time" name="time">

                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <textarea class="form-control" id="note"  name="note"rows="3"></textarea>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="submit" id="submit" class="btn btn-primary btn-style">Hoàn thành</button>
                    </div>
                </form>
            </div>
        </article>
       <?php include 'views/layout/footer.php' ?>
    </div>

    <script>
        CKEDITOR.replace("note");
    </script>
      <script>
        $(function() {
            $("form[name='exam']").validate({
                rules: {
                   
                    name: "required",
                    time: {
                        required: true,
                        min: 15
                   
                    }
                },
           
                messages: {
                    name: "Nhập vào tên đề thi",
                    time: {
                        required: "Vui lòng nhập thời gian thi ",
                        min: "Thời gian làm tối thiểu là 5 phút "
                       
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