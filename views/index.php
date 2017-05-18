<?php echo DB_NAME ;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang chu</title>
    <?php include 'views/layout/libs.php' ?>
</head>

<body>
    <div class="main-page">
        <?php include 'views/layout/header.php' ?>
        <div class=" full-width header-index">
            <div class="home-page-top-board" style="background-image: url('<?php echo URL ?>assets/images/hp_desktop_header.jpg')">
                <div class="hero-top-content text-center">
                    <h2 class="col-md-12" style="font-size: 42px;">Khám phá. Chia sẻ. Tạo đề. Miễn phí</h2>
                    <h4 style="font-size: 21px;">BKMaker - Cung cấp công cụ tạo đề một cách dễ dàng hơn bao giờ hết, miễn phí và ngày càng lớn mạnh
                    </h4>
                </div>
            </div>
            <div class="content-page">
                 <div class="container-hot">
                <h1>
                    <span>
                        Đề thi mới nhất
                    </span>
                </h1>
                <div class="row">
                   <?php foreach($this->data as $data) { ?>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-booksize ">
                        <div class="thumbnail thumbnail-book">

                            <div class="image-logo">
                                <img src="data:image;base64,<?php if(empty($data['img'])) echo $data['image_type']; else echo $data['img']; ?>" alt="img1">
                            </div>
                            <div class="caption">
                                <h1><?php echo $data['name'] ?></h1>
                                <p><?php echo $data['description'] ?>
                                </p>
                                <p>Người tạo : <?php echo $data['username'] ?>

                                </p>
                                <p><span style="background-color:transparent; color:#3D4752">Lượt xem :  <span class="badge"><?php echo $data['view'] ?></span></span>
                                    <span style="background-color:transparent;color:#3D4752">Lượt tải :  <span class="badge"><?php echo $data['download'] ?></span></span></p>
                            </div>
                            <div class="buy-now">
                                <ul class="list-inline">
                                    <li>
                                        <a title="Xem ngay !" href="<?php echo URL ?>guest/visit/<?php echo $data['exam_id']; ?>"><i class="fa fa-eye" style="background-color:#23B5AF; border-color:#23B5AF" aria-hidden="true"></i></a>
                                    </li>
                                    <?php if(Session::get('loggedIn')){ ?>
                                    <li>
                                        <a title="Tải về !" href="<?php echo URL ?>exam/download/<?php echo $data['exam_id']; ?>"><i style="background-color:#1C2331; border-color:#1C2331"  class="fa fa-download" aria-hidden="true"></i></a>
                                    </li>
                                    <?php } else { ?>
                                      <li>
                                          <a title="Tải về !" href="<?php echo URL ?>login/index"><i style="background-color:#1C2331; border-color:#1C2331"  class="fa fa-download" aria-hidden="true"></i></a>
                                      </li>
                                      <?php }; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php }; ?>
                </div>
            </div>
                <div class="container-hot">
                <h1>
                    <span>
                        Đề thi được xem nhiều nhất
                    </span>
                </h1>
                <div class="row">
                   <?php foreach($this->most as $data) { ?>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-booksize ">
                        <div class="thumbnail thumbnail-book">

                            <div class="image-logo">
                                <img src="data:image;base64,<?php if(empty($data['img'])) echo $data['image_type']; else echo $data['img']; ?>" alt="img1">
                            </div>
                            <div class="caption">
                                <h1><?php echo $data['name'] ?></h1>
                                <p><?php echo $data['description'] ?>
                                </p>
                                <p>Người tạo : <?php echo $data['username'] ?>

                                </p>
                               <p><span style="background-color:transparent; color:#3D4752">Lượt xem :  <span class="badge"><?php echo $data['view'] ?></span></span>
                                    <span style="background-color:transparent;color:#3D4752">Lượt tải :  <span class="badge"><?php echo $data['download'] ?></span></span></p>

                            </div>
                            <div class="buy-now">
                                <ul class="list-inline">
                                    <li>
                                        <a href="<?php echo URL ?>guest/visit/<?php echo $data['exam_id']; ?>"><i class="fa fa-eye" style="background-color:#23B5AF; border-color:#23B5AF" aria-hidden="true"></i></a>
                                    </li>
                                    <?php if(Session::get('loggedIn')){ ?>
                                    <li>
                                        <a title="Tải về !" href="<?php echo URL ?>exam/download/<?php echo $data['exam_id']; ?>"><i style="background-color:#1C2331; border-color:#1C2331"  class="fa fa-download" aria-hidden="true"></i></a>
                                    </li>
                                    <?php } else { ?>
                                      <li>
                                          <a title="Tải về !" href="<?php echo URL ?>login/index"><i style="background-color:#1C2331; border-color:#1C2331"  class="fa fa-download" aria-hidden="true"></i></a>
                                      </li>
                                      <?php }; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php }; ?>
                </div>
            </div>
            </div>
        </div>
        <?php include 'views/layout/footer.php' ?>
    </div>

</body>

</html>
