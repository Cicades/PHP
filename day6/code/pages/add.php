<?php
function post_back(){
  if (empty($_POST['name'])) {
    $GLOBALS['err_message'] = '请输入用户名！';
    return;
  }
  if (empty($_POST['gender'])) {
    $GLOBALS['err_message'] = '请填写性别！';
    return;
  }
  if (empty($_POST['birthday'])) {
    $GLOBALS['err_message'] = '请填写生日！';
    return;
  }
  if (empty($_FILES['avatar'])) {
    $GLOBALS['err_message'] = '请上传头像！';
    return;
  }
  $avatar=$_FILES['avatar'];
  if (strpos($avatar['type'], 'image')!==0) {
    $GLOBALS['err_message'] = '请上传图片文件！';
    return;
  }
  if ($avatar['size']>10*1024*1024) {
    $GLOBALS['err_message'] = '上传的图片文件过大！';
    return;
  }
  $ext=pathinfo($avatar['name'],PATHINFO_EXTENSION);
  $target='uploads/'.uniqid().'.'.$ext;
  $result=move_uploaded_file($avatar['tmp_name'], $target);
  if (!$result) {
    $GLOBALS['err_message'] = '上传文件失败！';
    return;
  }
  $name=$_POST['name'];
  $gender=$_POST['gender'];
  $birthday=$_POST['birthday'];
  $avatar='/pages/'.$target;
  $conn=mysqli_connect('127.0.0.1','root','root','demo');
  $query=mysqli_query($conn,"INSERT INTO users VALUES(null,'{$avatar}','{$name}',$gender,'{$birthday}')");
  if (!$query) {
    $GLOBALS['err_message'] = '上传文件失败！';
  }
  $GLOBALS['err_message'] = '上传成功！';
} //函数结束

if ($_SERVER['REQUEST_METHOD']==='POST') {
  post_back();
  header('Location:index.php');
}
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
    <h1 class="heading">添加用户</h1>
    <?php if (isset($err_message)): ?>
      <div class="alert alert-warning">
    <?php echo $err_message; ?>
    </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="post">
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" name="avatar" accept="image/*">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" name="name">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1">男</option>
          <option value="0">女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" name="birthday">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
