<?php

//检验上传音乐文件
function check_source()
{
    if (!isset($_FILES['source'])) {
        $GLOBALS['message'] = '请选择音乐文件！';
        return false;
    }
    $source = $_FILES['source'];
    if ($source['error'] !== UPLOAD_ERR_OK) {
        $GLOBALS['message'] = '上传音乐文件失败！';
        return false;
    }
    //检验文件的类型
    $music_type = array('audio/mp3', 'audio/wma');
    if (!in_array($source['type'], $music_type)) {
        $GLOBALS['message'] = '上传的音乐文件类型不支持！';
        return false;
    }
    //检验文件的大小
    if ($source['size'] > 10 * 1024 * 1024) {
        $GLOBALS['message'] = '上传的音乐文件过大！';
        return false;
    }
    if ($source['size'] < 1 * 1024 * 1024) {
        $GLOBALS['message'] = '上传的音乐文件过小！';
        return false;
    }
    //移动音乐文件
    $GLOBALS['target_song'] = './uploads/' . uniqid() . '-' . $source['name'];
    if (!move_uploaded_file($source['tmp_name'], $GLOBALS['target_song'])) {
        $GLOBALS['message'] = '上传音乐文件失败！';
        return false;
    }
    return true;
}
//检验上传的图片文件
function check_image()
{
    if (!isset($_FILES['image'])) {
        $GLOBALS['message'] = '请选择图片文件图片文件！';
        return false;
    }
    $image = $_FILES['image'];
    if ($image['error'] !== UPLOAD_ERR_OK) {
        $GLOBALS['message'] = '上传图片文件失败！';
        return false;
    }
    //检验文件的类型
    $image_type = array('image/png', 'image/gif', 'image/jpeg');
    if (!in_array($image['type'], $image_type)) {
        $GLOBALS['message'] = '上传的图片文件类型不支持！';
        return false;
    }
    //检验文件的大小
    if ($image['size'] > 10 * 1024 * 1024) {
        $GLOBALS['message'] = '上传的图片文件过大！';
        return false;
    }
    //移动图片文件
    $GLOBALS['target_img'] ='./uploads/' . uniqid() . '-' . $image['name'];
    if (!move_uploaded_file($image['tmp_name'], $GLOBALS['target_img'])) {
        $GLOBALS['message'] = '上传图片文件失败！';
        return false;
    }
    return true;
}
//总检验函数
function add_music()
{
    if (empty($_POST['title'])) {
        $GLOBALS['message'] = '请输入音乐标题';
        return;
    }
    if (empty($_POST['artist'])) {
        $GLOBALS['message'] = '请输入歌手名字！';
        return;
    }
    if (!check_image()) {
        return;
    }
    if (!check_source()) {
        return;
    }
    //存储数据
    $contents  = file_get_contents('data.json');
    $orignal   = json_decode($contents, true);
    $orignal[] = array(
        'id'     => uniqid(),
        'title'  => $_POST['title'],
        'artist' => $_POST['artist'],
        'image'  => substr($GLOBALS['target_img'], 2),
        'source' => substr($GLOBALS['target_song'], 2)
    );
    var_dump($orignal);
    file_put_contents('data.json', json_encode($orignal));
    $GLOBALS['message'] = '上传成功！';
}
//总检验
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    add_music();
    header('Location:list.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>添加音乐</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="display-3">添加音乐</h1>
    <hr>
    <?php if (isset($message)): ?>
      <div class="alert alert-danger" role="alert">
         <?php echo $GLOBALS['message']; ?>
      </div>
    <?php endif?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">标题</label>
        <input type="text" name="title" id="title" class="form-control is-invalid" autocomplete="off">
        <small class="invalid-feedback">请输入音乐标题</small>
      </div>
      <div class="form-group">
        <label for="title">歌手</label>
        <input type="text" name="artist" id="artist" class="form-control" autocomplete="off">
        <small class="form-text text-muted">请输入歌手名字</small>
      </div>
      <div class="form-group">
        <label for="title">海报</label>
        <input type="file" name="image" id="poster" class="form-control" accept="image/*">
        <small class="form-text text-muted">请上传海报</small>
      </div>
      <div class="form-group">
        <label for="title">音乐</label>
        <input type="file" name="source" id="source" class="form-control" accept="audio/*">
        <small class="form-text text-muted">请上传音乐</small>
      </div>
      <button class="btn btn-block btn-primary">保存</button>
    </form>
  </div>
</body>
</html>
