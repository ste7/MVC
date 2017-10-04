<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo APP_URL ?>../app/style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.0/css/bulma.css">
    <title>MVC</title>
</head>
<body>

<div class="container">
    <p class="title is-3">Home</p>
    <p class="subtitle is-6">page</p>


    <div class="block">
        <div class="menu">
            <p class="menu-label">Users</p>

            <ul class="menu-list">
                <?php foreach($data['users'] as $user): ?>
                <li><a href="user/<?php echo $user->id ?>"><?php echo $user->username; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>