<div class="navbar-fixed-top  header-page  container-fluid">
    <div class="col-md-2">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
        <h3 class="title-page">
            <a href="<?php echo URL ?>"><span>BK-</span>Maker</a>
        </h3>
    </div>
    <div class="col-md-10">
        <nav class="navbar navbar-inverse nav-custom ">
            <div class="collapse navbar-collapse " id="myNavbar">

                <ul class="nav navbar-nav">
                    <li><a href="<?php echo URL ?>" class="active-choice"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;Trang chủ</a></li>
                    <?php if(Session::get('loggedIn')){ ?>
                    <li><a href="<?php echo URL ?>exam/index"><i class="fa fa-book" aria-hidden="true"></i>&nbsp; Tạo đề thi</a></li>
                    <li><a href="<?php echo URL ?>manage/index"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Quản lí đề thi</a></li>
                    <?php }; ?>
                    <li><a href="<?php echo URL ?>guest/index"><i class="fa fa-suitcase" aria-hidden="true"></i>&nbsp;Kho đề thi</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php if(!Session::get('loggedIn')){ ?>
                    <li><a href="<?php echo URL ?>login/index" class="login" id="login"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; Đăng nhập</a></li>
                    <?php } else { ?>
                    <?php if(Session::get('role') == 1) {?>
                        <li><a href="<?php echo URL ?>admin/index" class="login"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp; Quản trị  ADMIN</a></li>
                    <?php }; ?>
                    <li><a href="<?php echo URL ?>user/index" class="login"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Xin chào <?php echo Session::get('user_name'); ?></a></li>
                    <li><a href="<?php echo URL ?>login/logout" class="login"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Đăng xuất</a></li>

                    <?php }; ?>
                </ul>


            </div>



        </nav>

    </div>
    <!--end-->
</div>