<?php
if (empty($_COOKIE['num'])) {
    $num = random_int(0, 100);
    setcookie('num', $num);
    setcookie('chance','10');
}
if (isset($_GET['num'])&&$_COOKIE['chance']!=='0') {
    $chance=(int)$_COOKIE['chance'];
    setcookie('chance',-- $chance);
    $guess_num = (int) $_COOKIE['num'];
    $input_num = (int) $_GET['num'];
    $result    = $input_num - $guess_num;
    if ($result === 0) {
        $GLOBALS['message'] = '猜对了！';
        setcookie('num');
    } elseif ($result > 0) {
        $GLOBALS['message'] = '太大了！';
    } else {
        $GLOBALS['message'] = '太小了！';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>猜数字</title>
  <style>
    body {
      padding: 100px 0;
      background-color: #2b3b49;
      color: #fff;
      text-align: center;
      font-size: 2.5em;
    }
    input {
      padding: 5px 20px;
      height: 50px;
      background-color: #3b4b59;
      border: 1px solid #c0c0c0;
      box-sizing: border-box;
      color: #fff;
      font-size: 20px;
    }
    button {
      padding: 5px 20px;
      height: 50px;
      font-size: 16px;
    }
    #message{
      color: aqua;
    }
  </style>
</head>
<body>
  <h1>猜数字游戏</h1>
  <p>Hi，我已经准备了一个0~100的数字，你需要在仅有的<span><?php echo isset($_COOKIE['chance'])?$chance:10; ?></span>次机会之内猜对它。</p>
  <?php if (isset($message)): ?>
  <p id="message"><?php echo $message; ?></p>
  <?php endif?>
  <form action="index.php" method="get">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
  </form>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" style="font-size: 14px;color: greenyellow">再来一次</a>
</body>
</html>
