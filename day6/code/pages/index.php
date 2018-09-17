<?php
function age($birthday){
  date_default_timezone_set('PRC');//设置默认时区
  $bir=strtotime($birthday);
  $now=time();
  return floor(($now-$bir)/(365*24*60*60));
}
$conn=mysqli_connect('127.0.0.1','root','root','demo');
if (!isset($conn)) {
  exit();
  $message_err = '链接数据失败！';
}
$query=mysqli_query($conn,'SELECT * FROM users;');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">用户管理 <a class="btn btn-link btn-sm" href="add.php">添加</a><a class="btn btn-link btn-sm" href="delete.php" id="id1">批量删除</a></h1>
    <?php if (isset($message_err)): ?>
      <div class="alert alert-danger" role="alert">
        <h1><?php echo $message_err ?></h1>
      </div>
    <?php endif ?>
    <table class="table table-hover">
      <thead>
        <tr style="text-align: center;">
          <th><input type="checkbox" id="select-all"></th>
          <th>编号</th>
          <th>头像</th>
          <th>姓名</th>
          <th>性别</th>
          <th>年龄</th>
          <th class="text-center" width="140">操作</th>
        </tr>
      </thead>
      <tbody style="text-align: center;">
      <?php while ($row=mysqli_fetch_assoc($query)) : ?>
          <tr>
          <td><input type="checkbox" value="<?php echo $row['id']; ?>"></td>
          <th scope="row">
            <?php echo $row['id']; ?>
          </th>
          <td><img src="<?php echo $row['avatar'] ?>" class="rounded" alt="张三"></td>
          <td>
            <?php echo $row['name']; ?>
          </td>
          <td>
            <?php echo $row['gender']==='1'?'♂':'♀'; ?>
          </td>
          <td>
            <?php echo age($row['birthday']); ?>
          </td>
          <td class="text-center" style="color: white;">
            <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $row['id'] ?>">编辑</a>
            <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $row['id'] ?>">删除</a>
          </td>
        </tr>
      <?php endwhile ?>
      </tbody>
    </table>
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
  </main>
   <script src="/delete-all.js"></script>
</body>
</html>
