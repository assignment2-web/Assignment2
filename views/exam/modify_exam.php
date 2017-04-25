<!DOCTYPE html>
<html lang="en">

<head>

    <title>Chi tiet de</title>
   <?php include 'views/layout/libs.php' ?>
</head>

<body>
    <div class=" main-page">
        <?php include 'views/layout/header.php' ?>
        <article>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../index.html">BK Maker</a></li>
                    <li class="breadcrumb-item"><a href="create_test.html">Tạo đề thi</a></li>
                    <li class="breadcrumb-item">Chi tiết</li>
                </ol>
            </div>
            <?php include 'views/notify/notify_header.php' ?>
            <div class="panel panel-default panel-question">
                <form action="<?php echo URL ?>exam/update_question" method="post" name="exam_detail" id="frm-validate">
                    <input type="hidden" value="<?php echo $this->exam_id?>" name="exam_fk">
                    <input type="hidden" value="<?php echo $this->current_index?>" name="index">
                    <div class="panel-body">
                        <div class="fixed-action">
                            <a id="fab" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil fab"> </span></a>
                            <ul id="fab-toggle" class="hidden">
                                <li><a id="add-question"><span class="glyphicon glyphicon-plus add-question">  </span></a></li>
                                <li><a id="remove-question"><span class="glyphicon glyphicon-remove remove-question">  </span></a></li>
                                <li><a href="<?php echo URL ?>exam/complete_exam/<?php echo $this->data?>" id="done-question"><span class="glyphicon glyphicon-ok done-question">  </span></a></li>
                            </ul>
                        </div>
                        <div id="content">
                            <div class="question-header text-center">
                                <h1><?php echo $this->data['question']['name']; ?>
                                </h1>
                                <p>
                                    <span>Câu hỏi phải có ít nhất 2 đáp án</span>
                                </p>
                            </div>

                            <div class="form-horizontal" id="form-question">

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Nội dung câu hỏi ? <sup style="color: red;"> (*) </sup> </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->data['question']['content']; ?>" placeholder="Nội dung câu hỏi ?">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="point">Điểm <sup style="color: red;"> (*) </sup> </label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="point" value="<?php echo $this->data['question']['point']; ?>" style="width: 100px;" id="point" value="1">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <h2 class="col-sm-4 col-sm-offset-2  text-left">Đáp án đúng</h2>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="correct-question"> Đáp án đúng </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="correctquestion" value="<?php echo $this->data['answer']['correct']['content']; ?>" id="correct-question">
                                    </div>
                                </div>
                                <?php $i = 1 ?>
                                 <input type="hidden" value="<?php echo count($this->data['answer']['incorrect']); ?>" id="size-answer" />
                                <?php foreach($this->data['answer']['incorrect'] as $data ) {?>
                                    <hr>
                                    <div class="form-group">
                                        <h2 class=" col-sm-4 col-sm-offset-2 text-left">Đáp án sai <?php echo $i; ?></h2>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="incorrect-question"> Đáp án sai <?php echo $i; ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="incorrectquestion[]" id="incorrect-question" value="<?php echo $data['content']; ?>" required>
                                        </div>
                                    </div>
                                <?php }; ?>

                            </div>
                            <div class="form-horizontal">
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="note"> Ghi chú</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="note" id="note"></textarea>
                                    </div>
                                    <script>
                                        CKEDITOR.replace("note");
                                    </script>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="panel-footer clearfix">
                        <button type="submit" id="submit" class="btn btn-primary btn-style pull-right"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Thêm câu hỏi</button>
                    </div>
                </form>
            </div>
        </article>
     <?php include 'views/layout/footer.php' ?>
    </div>

    <script src="<?php echo URL ; ?>assets/js/taode.js"></script>
    <script>
        $(function() {
            $("form[name='exam_detail']").validate({
                rules: {

                    name: "required",
                    point: {
                        required: true,
                        min: 1

                    },
                    correctquestion: "required",

                },

                messages: {
                    name: "Nhập nội dung câu hỏi ? ",
                    point: {

                        min: "Phải ít nhất 1 điểm ."

                    },
                    correctquestion: "Câu trả lời đúng phải có nội dung",

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