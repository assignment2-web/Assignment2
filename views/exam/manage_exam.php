<!DOCTYPE html>
<html lang="en">

<head>

    <title>Quan Ly De</title>
    <?php include 'views/layout/libs.php' ?>
</head>

<body>
    <div class=" main-page">
        <?php include 'views/layout/header.php' ?>
        <article>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL ?>">BK Maker</a></li>
                    <li class="breadcrumb-item">Quản lý đề thi</li>
                </ol>
            </div>
            <section class="content-page">
                <div class="container-hot">
                    <div class="row">
                        <?php foreach($this->listExams as $data) { ?>
                        <div class="col-xs-6 col-md-3 col-booksize ">
                            <div class="thumbnail thumbnail-book">

                                <div class="image-logo">
                                    <img height="250" src="data:image;base64,<?php if(empty($data['img'])) echo $data['image_type']; else echo $data['img']; ?>" alt="img1">
                                </div>
                                <div class="caption">
                                    <h1>
                                        <?php echo $data['name'] ?>
                                    </h1>
                                    <p style="padding:10px;">
                                        Ngày tạo : <?php echo $data['date']; ?>
                                    </p>

                                </div>
                                <div class="buy-now">
                                    <ul class="list-inline">
                                        <li>
                                            <a  href="<?php echo URL ?>manage/modify/<?php echo $data['exam_id']; ?>"><i class="fa fa-pencil-square" style="background-color:blue;border-color:blue;" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                          <a  href="<?php echo URL ?>manage/delete/<?php echo $data['exam_id']; ?>"><i class="fa fa-trash" style="background-color:red;border-color:red;" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php }; ?>
                    </div>
                </div>
            </section>


        </article>
        <?php include 'views/layout/footer.php' ?>
    </div>

    <script src="../../js/myscript.js"></script>
</body>

</html>