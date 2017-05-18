<!DOCTYPE html>
<html lang="en">

<head>

    <title>Chi tiet de</title>
   <?php include 'views/layout/libs.php' ?>
</head>

<body>
    <div class=" main-page main-page-margin">
          <?php include 'views/layout/header.php' ?>
        <article>
            <div class="panel panel-default panel-question">
                <div class="panel-heading panel-detail">
                    <h1><?php echo $this->data['exam']['name']; ?></h1>
                    <p>Ngày tạo : <?php echo $this->data['exam']['date'] ;?></p>
                    <p>Môn : <?php echo $this->data['exam']['name_type'] ;?></p>
                     <p>Thời gian : <?php echo $this->data['exam']['time'] ;?> phút</p>
                </div>
                <div class="panel-body preview-question">
                    <?php foreach($this->data['data'] as $row ) { ?>
                    <section >
                        <h4><strong><?php echo $row['question']['name'] ?>.</strong> <?php echo $row['question']['content'] ?>
                        </h4>
                        <table>
                            <?php $alpha = 65; ?>
                            <?php foreach($row['answer'] as $answer) { ?>
                            <tr>
                                <td>
                                    (<?php echo chr($alpha + 256); ?>) 
                                </td>
                                <td>
                                    <?php echo $answer['content']; ?>
                                </td>
                            </tr>
                            
                            <?php $alpha++; }; ?>

                        </table>
                    </section>
                    <?php }; ?>
                </div>
                <div class="panel-footer complete-question">
                    <a href="<?php echo URL ?>" id="fab" data-toggle="tooltip"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Quay trở về trang chủ </a>
                </div>
            </div>
        </article>
       <?php include 'views/layout/footer.php' ?>
    </div>

    <script src="../../js/myscript.js"></script>
</body>

</html>