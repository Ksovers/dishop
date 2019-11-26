<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $this->meta['title']; ?></title>
    <meta name="description" content="<?php echo $this->meta['desc']; ?>">
    <meta name="keywords" content="<?php echo $this->meta['key']; ?>">
</head>
<body>
    ШАБЛОН
    <?php print $data['name'];?>
    <?php print $content;?>
    
</body>
</html>