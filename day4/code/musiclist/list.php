<?php 
  //获取数据，动态生成标签
  $contents=file_get_contents('data.json');
  //把json格式的字符串转换为对象的过程叫做反序列化
  $arr=json_decode($contents);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>音乐列表</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="display-3">音乐列表<a href="add.php" class="btn btn-primary">添加</a></h1>
    <hr>
    <table class="table table-bordered table-striped table-hover">
      <thead class="thead-inverse">
        <tr>
          <th>标题</th>
          <th>歌手</th>
          <th>海报</th>
          <th>音乐</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($arr as $item): ?>
          <tr>
            <td><?php echo $item->title; ?></td>
            <td><?php echo $item->artist; ?></td>
            <td><img src="<?php echo $item->image; ?>" alt=""></td>
            <td><audio src="<?php echo $item->source; ?>" controls></audio></td>
            <td><a href="delete.php?id=<?php echo $item->id; ?>"><button class="btn btn-danger btn-sm">删除</button></a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>
