<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<h1>Welcome Laravel ⭐👌</h1>

<!-- <a href="<?=url("/page/1/page")?>">First Page</a>
<a href="<?=url("/page/1/number")?>">First Number</a>
<a href="<?=url("/page/1")?>">Something</a> -->

<!-- Using Route name -->
<a href="<?=route('page',['id'=>1,'type'=>'page'])?>">First Page</a>
<a href="<?=route('page',['id'=>1,'type'=>'number'])?>">First Number</a>
<a href="<?=route('page',['id'=>1])?>">Something</a>
</body>
</html>

