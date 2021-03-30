<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <form action="<?= base_url('account/signin/getJson')?>" method="post">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="username">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>
</html>