<?php
function post_back(){
  global $conn;
  if (empty($_POST['name'])) {
    $GLOBALS['err_message'] = '用户名不能为空！';
    return;
  }
  if (empty($_POST['gender'])) {
    $GLOBALS['err_message'] = '性别不能为空！';
    return;
  }
  if (empty($_POST['birthday'])) {
    $GLOBALS['err_message'] = '生日不能为空！';
    return;
  }
  if (isset($_FILES['avatar'])&&$_FILES['avatar']['error']===UPLOAD_ERR_OK) {//如果修改了图片
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
    $avatar='/pages/'.$target;
    echo("UPDATE users SET avatar='{$avatar}' WHERE id={$_GET['id']};");
    mysqli_query($conn,"UPDATE users SET avatar='{$avatar}' WHERE id={$_GET['id']};");
  }//修改图片结束
  $name=$_POST['name'];
  $gender=$_POST['gender'];
  $birthday=$_POST['birthday'];
  //echo("UPDATE users SET name='{$name}',gender={$gender},birthday='{$birthday}' WHERE id={$_GET['id']};");
  $query=mysqli_query($conn,"UPDATE users SET name='{$name}',gender={$gender},birthday='{$birthday}' WHERE id={$_GET['id']};");
  if (!$query) {
    $GLOBALS['err_message'] = '修改用户信息失败！';
    return;
  }
  $GLOBALS['err_message'] = '修改用户信息成功！';
} //函数结束
$conn=mysqli_connect('127.0.0.1','root','root','demo');//连接数据库
if ($_SERVER['REQUEST_METHOD']==='POST') {
  post_back();
  //header('Location:index.php');
} 
$query=mysqli_query($conn,"select * from users where id={$_GET['id']} limit 1;");
$data=mysqli_fetch_assoc($query);
if (empty($data)) {
  $GLOBALS['err_message'] = '获取用户数据失败！';
  exit();
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
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $data['id'] ?>" enctype="multipart/form-data" method="post">
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" name="avatar" accept="image/*">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1" <?php echo $data['gender']==='1'?'selected=true':''; ?>>男</option>
          <option value="0" <?php echo $data['gender']==='0'?'selected=true':''; ?>>女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" name="birthday" value="<?php echo $data['birthday'] ?>">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
