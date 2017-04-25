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
            <section id="search">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="dropname"> 
                    
                    <?php if($this->data['filter'] == -1) { ?>
                 <?php echo 'Tất cả'; ?>
            <?php } else { ?>
                <?php foreach($this->data['option'] as $data) { ?>
                    <?php if($data['id'] == $this->data['filter']) { ?>
                        <?php echo $data['name']; ?>
                        
                    <? break; }; ?>
                <?php }; ?>
            <?php } ; ?>
                    
                    </span> <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="addFilter(-1, 'Tất cả');">Tất cả</a></li>
                        <?php foreach($this->data['option'] as $data) { ?>
                        <li>
                            <a href="#" onclick="addFilter(<?php echo $data['id']; ?>, '<?php echo $data['name']; ?>');">
                                <?php echo $data['name']; ?>
                            </a>
                        </li>
                        <?php }; ?>

                    </ul>
                </div>

                <form id="frm-search" action="<?php echo URL ; ?>guest/search_form" method="post">
                    <input type="hidden" name="filter" value="-1" id="filter">
                    <input id="search-input" name="keyword" class="form-control input-lg" placeholder="Tìm kiếm " autocomplete="off" spellcheck="false" value="<?php echo $this->data['key']; ?>" autocorrect="off" tabindex="1">

                </form>
            </section>
            <div class="content-page search-bar">

                <div class="col-md-3">
                    <div class="danhmuc">
                        <h3>Sắp xếp</h3>
                        <ul>
                            <li>
                                <a href="#">Theo ngày tạo</a>
                            </li>
                            <li>
                                <a href="#">Theo tên đề thi</a>
                            </li>
                            <li>
                                <a href="#">Theo lượt xem</a>
                            </li>
                        </ul>
                    </div>


                </div>

                <div class="col-md-9">
                    <div class="panel panel-default panel-search">
                        <div class="panel-heading">Kết quả tìm kiếm cho "
                            <?php echo $this->data['key'] ?>"(
                            <?php echo count($this->data['data']); ?>)</div>
                        <div class="panel-body">

                            <div class="container-hot">
                                <div class="row">
                                    <?php foreach($this->data['data'] as $data) { ?>
                                    <div class="col-xs-6 col-md-3 col-booksize ">
                                        <div class="thumbnail thumbnail-book">

                                            <div class="image-logo">
                                                <img src="data:image;base64,<?php if(empty($data['img'])) echo $data['image_type']; else echo $data['img']; ?>" alt="img1">
                                            </div>
                                            <div class="caption">
                                                <h1>
                                                    <?php echo $data['name'] ?>
                                                </h1>
                                                <p>
                                                    <?php echo $data['description'] ?>
                                                </p>
                                                <p>Người tạo :
                                                    <?php echo $data['username'] ?>

                                                </p>
                                                <p><span style="background-color:transparent; color:#3D4752">Lượt xem :  <span class="badge"><?php echo $data['view'] ?></span></span>
                                                    <span style="background-color:transparent;color:#3D4752">Lượt tải :  <span class="badge"><?php echo $data['download'] ?></span></span>
                                                </p>
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
                </div>

            </div>


        </article>

        <?php include 'views/layout/footer.php' ?>
    </div>
    <script>
        function addFilter(variable, name) {
            $('#filter').val(variable);
            $('#dropname').text(name);

        }
    </script>
    <script>
        $('#search-input').keypress(function(e) {
            if (e.which == 13) {
                $('form#frm-search').submit();
                return false; //<---- Add this line
            }
        });
    </script>
</body>

</html>