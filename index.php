<?php
    include_once '../config/main.php';
    include_once '../inc/functions.php';
    $news= getNews($file_name);
    $limit=5;
    $cnt=count($news);
    $cnt/=$limit;
    $cnt=intval($cnt);
    $page=$_GET['page'];
if(empty($page) || $page < 0) {
    $page = 1;
}
if($page > $cnt) {
    $page = $cnt;
}
$start = $page * $limit - $limit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Управление статьями</title>
    	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <style>
	.custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
    </style>
</head>
<body background="whitesmoke" gcolor="whitesmoke">
<h1>Управление статьями</h1>
<div align="center">
    <ul class="pagination">
        <?php for($i=1; $i<=$cnt+1; $i++):?>
            <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
        <?php endfor; ?>
    </ul>
</div>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
    <a href="addnews.php" class="btn btn-primary btn-xs pull-right"><b>+</b> Добавить новую статью</a>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th class="text-center">Дата добавления</th>
            <th>Действия</th>
        </tr>
    </thead>
<!--    --><?php //foreach($news as $key=>$value): ?>
<!--                <tr>-->
<!--                <td>--><?//= $key ?><!--</td>-->
<!--                <td>--><?//= $value['title']?><!--</td>-->
<!--		<td>--><?//= date('r',$value['date'][0])?><!--</td>-->
<!--                <td class="text-center">-->
<!--		    <form action="editnews.php" method="POST">-->
<!--                <input type='hidden' name='id' value="--><?//= $key ?><!--">-->
<!--                <button target='_blank' name="edit" class='btn btn-info btn-xs'><span class="glyphicon glyphicon-edit"></span>Править</button>-->
<!--            </form>-->
<!--		    <form action="delnews.php?id=--><?//= $key ?><!--" method="POST">-->
<!--                <input type='hidden' name='id' value="--><?//= $key ?><!--">-->
<!--                <button target='_blank' name="del" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>Удалить</button></td>-->
<!--		    </form>-->
<!--            </tr>-->
<!--  <?php //endforeach; ?>-->
        <?php for($i=0; $i<$limit; $i++):?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $news[$i]['title']?></td>
            <td><?= date('r',$news[$i]['date'][0])?></td>
            <td class="text-center">
                <form action="editnews.php" method="POST">
                    <input type='hidden' name='id' value="<?= $i ?>">
                    <button target='_blank' name="edit" class='btn btn-info btn-xs'><span class="glyphicon glyphicon-edit"></span>Править</button>
                </form>
                <form action="delnews.php?" method="POST">
                    <input type='hidden' name='id' value="<?= $i ?>">
                    <button target='_blank' name="del" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>Удалить</button></td>
            </form>
        </tr>
        <?php endfor; ?>
    </table>
    </div>
</div>
</body>
</html>