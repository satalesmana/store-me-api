<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Me</title>
</head>
<body>
    <?php if(! isset($page)){
        echo "Ini halaman utama";
    } else {
        echo "Ini halaman $page";
    } ?>
</body>
</html>