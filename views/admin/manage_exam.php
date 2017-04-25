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
                <li class="breadcrumb-item">Quản lí đề thi</li>
            </ol>
        </div>
        <?php 
    $namecol = $this->data['namecol'];
    $data = $this->data['data'];
    $num_page = $this->data['num_page'];
    $index = $this->data['index'];
    ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <?php foreach($namecol as $col){ ?>

                        <th class="text-center">
                            <?php echo $col; ?>
                        </th>
                        <?php }; ?>
                        <th class="text-center">Tool</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($data as $row) { ?>
                    <tr>
                        <?php foreach($namecol as $col){ ?>
                        <?php if($col == "status") {?>
                        <td class="text-center">
                            <?php if($row['status'] == 0) 
                                                {
                                                    echo "<span style='color:red'>Đã xóa<span>";
                                                }
                                            else {
                                                echo "<span style='color:green'>Đang hoạt động<span>";
                                            }

                                        ?>
                        </td>
                        <?php } elseif($col == "approval") { ?>
                           <td class="text-center">
                            <?php if($row['approval'] == 0) 
                                        {
                                                    echo "<span style='color:red'>Chưa duyệt<span>";
                                                }
                                            else {
                                                echo "<span style='color:green'>Đã duyệt<span>";
                                            }

                                        ?>
                                        </td>
                        <?php } else { ?>
                        
                        <td style="overflow: hidden;text-overflow: ellipsis;max-width: 100px;" class="text-center">

                            <?php echo $row["$col"]; ?>
                        </td>
                        <?php }; ?>
                        <?php }; ?>
                        <td class="text-center">

                            <?php if($row['status'] == 0) { ?>

                            <a title="Restore" href="<?php echo URL; ?>admin/restore_exam/<?php echo $row['exam_id']; ?>"> <i class="fa fa-undo" style="color:yellow;" aria-hidden="true"></i></a>
                            <?php } else { ?>
                            <?php if($row['approval'] == 0) {?>
                            <a title="Approval" href="<?php echo URL; ?>admin/edit_exam/<?php echo $row['exam_id']; ?>"><i class="fa fa-check-square-o" aria-hidden="true"></i></a> |
                            <?php }; ?>
                            <a title="Delete" href="<?php echo URL; ?>admin/del_exam/<?php echo $row['exam_id']; ?>"><i class="fa fa-times" style="color:red;" aria-hidden="true"></i></a>
                            <?php }; ?>

                        </td>
                    </tr>
                    <?php }; ?>
                </tbody>
            </table>

        </div>
        <ul class="pager">
            <?php for($i = 0; $i < $num_page; $i++){ ?>
                 <?php if($index == $i) { ?>
                    <li><a href="#" class="alert alert-danger"><?php echo $i + 1  ; ?></a></li>
                <?php } else { ?>
                      <li><a href="<?php echo URL; ?>/admin/pager/<?php echo $i; ?>" ><?php echo $i + 1;  ?></a></li>
                <?php }; ?>
            <?php }; ?>
        </ul>

    </div>
</body>

</html>