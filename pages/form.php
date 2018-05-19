
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h3>Upload your image</h3>
<form method="POST" enctype="multipart/form-data">
    Name image: <input type="text" name='authorname' /><br><br>
    Description: <input type="text" name='description' /><br><br>
    Select image: <input type="file" name='sendImage' /><br><br>
    <input type="submit" value="upload">
</form>

<?php
if (($valid = valid($_REQUEST)) === true) {
    echo "ok";
} else {
    foreach($valid as $error){
        echo $error . "</br>";
    };
}

?>
</body>
</html>
