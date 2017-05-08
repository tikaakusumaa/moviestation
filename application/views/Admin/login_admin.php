<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Flat Login Form 3.0</title>
  
  <link rel="stylesheet" href="<?=base_url()?><?=base_url()?>Assets/login/css/reset.css">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="<?=base_url()?>Assets/login/css/style.css">

  
</head>

<body>
  
<div class="pen-title">
  <h1>Flat Login Form</h1><span>Pen <i class='fa fa-paint-brush'></i> + <i class='fa fa-code'></i> by <a href='http://andytran.me'>Andy Tran</a></span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Me</div>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <?= form_open('Admin/auth'); ?>
      <input type="text" placeholder="Username" name="Username" />
      <input type="password" placeholder="Password"/>
      <button>Login</button>
    <?= form_close() ?>
  </div>

  <div class="cta"><a href="http://andytran.me">Forgot your password?</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://codepen.io/andytran/pen/vLmRVp.js'></script>
  <script src="<?=base_url()?>Assets/login/js/index.js"></script>

</body>
</html>
