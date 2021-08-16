<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->params['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/App/Views/Layouts/default/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar navbar-expand-lg navbar-light bg-light">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link<?php if($this->params['active'] == 'list'):?> active<?php endif;?>" href="/list/">List of Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php if($this->params['active'] == 'add'):?> active<?php endif;?>" href="/add/">Add new User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php if($this->params['active'] == 'edit'):?> active<?php endif;?>" href="/edit/">Edit User</a>
                    </li> 
                </ul>
            </div>            
        </div>                    
    </div>

    <div class="content">
        <div class="container">
            <h1>
                <?= $this->params['title'] ?>
            </h1>
            
            <?= $params['content']; ?>
                    
        </div>
    </div>

    <script src="/App/Views/Layouts/default/js/script.js"></script>

</body>
</html>