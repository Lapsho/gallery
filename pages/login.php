<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php include Commons::CSS_PATH ?>
</head>
<body>
<div class="general">
    <div class="container">
        <h1 class="h1 text-center">Login as user</h1>
        <?php ?>
        <?php if ($errors = $collectErrors->getErrors()): ?>
            <div class="alert alert-danger">
                <strong>Error:&nbsp;</strong><?php echo $errors ?>
            </div>
        <?php endif; ?>
        <form action="/processLogin" method="post">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login"
                       value="<?php echo $collectErrors->getFieldValue('login') ?>">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <a class="btn btn-dark" href="/">Back to Gallery</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>