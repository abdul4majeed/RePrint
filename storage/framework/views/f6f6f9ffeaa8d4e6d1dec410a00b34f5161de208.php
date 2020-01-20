<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Testing Hey Me is  <?php echo e($name); ?></h1>
    <a href="<?php echo e(route('verify_account',['email'=>$email,'token'=>$token])); ?>">Register</a>
    
</body>
</html><?php /**PATH E:\RePrint\RePrint\resources\views/mail/welcome.blade.php ENDPATH**/ ?>