<?php
    session_start();
    require('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="description" content="Chartist.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
    <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
</head>
    <body class="mod-bg-1 mod-nav-link">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">
            <a class="navbar-brand d-flex align-items-center fw-500" href="users.html"><img alt="logo" class="d-inline-block align-top mr-2" src="img/logo.png"> Учебный проект</a> <button aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarColor02" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="page_login.html">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Выйти</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main id="js-page-content" role="main" class="page-content mt-3">
            <div class="alert alert-success">
                Профиль успешно обновлен.
            </div>
            <div class="subheader">
                <h1 class="subheader-title">
                    <i class='subheader-icon fal fa-users'></i> Список пользователей
                </h1>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    
                    <?php
                        if( is_not_logged($_SESSION['user']) === 1 ){
                            echo '<a class="btn btn-success" href="create_user.html">Добавить</a>';
                        }
                    //is_admin($_SESSION['user']);
                    //var_dump($_SESSION['user']);
                    //var_dump($_SESSION['admin']);
                    //unset($_SESSION['user']);
                    //unset($_SESSION['admin']);
                    
                    $cards = [
    
                        [
                            "img" => "img/demo/avatars/avatar-b.png",
                            "name" => "Oliver Kopyov",
                            "profession" => "IT Director, Gotbootstrap Inc.",
                            "phone" => "+1 317-456-2564",
                            "mail" => "oliver.kopyov@smartadminwebapp.com",
                            "adress" => "15 Charist St, Detroit, MI, 48212, USA"
                        ],
                        [
                            "img" => "img/demo/avatars/avatar-c.png",
                            "name" => "Alita Gray",
                            "profession" => "Project Manager, Gotbootstrap Inc.",
                            "phone" => "+1 313-461-1347",
                            "mail" => "Alita@smartadminwebapp.com",
                            "adress" => "134 Hamtrammac, Detroit, MI, 48314, USA"
                        ],
                        [
                            "img" => "img/demo/avatars/avatar-e.png",
                            "name" => "Dr. John Cook PhD",
                            "profession" => "Human Resources, Gotbootstrap Inc.",
                            "phone" => "+1 313-779-1347",
                            "mail" => "john.cook@smartadminwebapp.com",
                            "adress" => "55 Smyth Rd, Detroit, MI, 48341, USA"
                        ],
                        [
                            "img" => "img/demo/avatars/avatar-k.png",
                            "name" => "Jim Ketty",
                            "profession" => "Staff Orgnizer, Gotbootstrap Inc.",
                            "phone" => "+1 313-779-3314",
                            "mail" => "jim.ketty@smartadminwebapp.com",
                            "adress" => "134 Tasy Rd, Detroit, MI, 48212, USA"
                        ],
                        [
                            "img" => "img/demo/avatars/avatar-g.png",
                            "name" => "Dr. John Oliver",
                            "profession" => "Oncologist, Gotbootstrap Inc.",
                            "phone" => "+1 313-779-8134",
                            "mail" => "john.oliver@smartadminwebapp.com",
                            "adress" => "134 Gallery St, Detroit, MI, 46214, USA"
                        ],
                        [
                            "img" => "img/demo/avatars/avatar-h.png",
                            "name" => "Sarah McBrook",
                            "profession" => "Xray Division, Gotbootstrap Inc.",
                            "phone" => "+1 313-779-7613",
                            "mail" => "sarah.mcbrook@smartadminwebapp.com",
                            "adress" => "13 Jamie Rd, Detroit, MI, 48313, USA" 
                        ],
                        [
                            "img" => "img/demo/avatars/avatar-i.png",
                            "name" => "Jimmy Fellan",
                            "profession" => "Accounting, Gotbootstrap Inc.",
                            "phone" => "+1 313-779-4314",
                            "mail" => "jimmy.fallan@smartadminwebapp.com",
                            "adress" => "55 Smyth Rd, Detroit, MI, 48341, USA"
                        ],
                        [
                            "img" => "img/demo/avatars/avatar-j.png",
                            "name" => "Arica Grace",
                            "profession" => "Accounting, Gotbootstrap Inc.",
                            "phone" => "+1 313-779-3347",
                            "mail" => "arica.grace@smartadminwebapp.com",
                            "adress" => "798 Smyth Rd, Detroit, MI, 48341, USA"
                        ]
                        ];
                    
                    ?>
                    

                    <div class="border-faded bg-faded p-3 mb-g d-flex mt-3">
                        <input type="text" id="js-filter-contacts" name="filter-contacts" class="form-control shadow-inset-2 form-control-lg" placeholder="Найти пользователя">
                        <div class="btn-group btn-group-lg btn-group-toggle hidden-lg-down ml-3" data-toggle="buttons">
                            <label class="btn btn-default active">
                                <input type="radio" name="contactview" id="grid" checked="" value="grid"><i class="fas fa-table"></i>
                            </label>
                            <label class="btn btn-default">
                                <input type="radio" name="contactview" id="table" value="table"><i class="fas fa-th-list"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="js-contacts">
                <?php foreach( $cards as $card ): ?>
                <div class="col-xl-4">
                    <div id="c_1" class="card border shadow-0 mb-g shadow-sm-hover" data-filter-tags=<?php echo $card['name']; ?>>
                        <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
                            <div class="d-flex flex-row align-items-center">
                                <span class="status status-success mr-3">
                                    <span class="rounded-circle profile-image d-block " style="background-image:url(<?php echo $card['img']; ?>); background-size: cover;"></span>
                                </span>
                                <div class="info-card-text flex-1">
                                    
                                    
                                    <a href="javascript:void(0);" class="fs-xl text-truncate text-truncate-lg text-info" data-toggle="dropdown" aria-expanded="false">
                                        <?php echo $card['name']; ?>
                                        <?php if( isset($_SESSION['admin']) ): ?>
                                            <?php echo '<i class=" hidden fal fas fa-cog fa-fw d-inline-block ml-1 fs-md"></i>';?>
                                            <?php echo '<i class=" hidden fal fa-angle-down d-inline-block ml-1 fs-md"></i>';?>
                                        <?php endif; ?>
                                        <?php if( $_SESSION['user']['email'] == $card['mail'] and !isset($_SESSION['admin']) ): ?>
                                            <?php echo '<i class=" hidden fal fas fa-cog fa-fw d-inline-block ml-1 fs-md"></i>';?>
                                            <?php echo '<i class=" hidden fal fa-angle-down d-inline-block ml-1 fs-md"></i>';?>
                                        <?php endif; ?>
                                    </a>
                                    
                                    
                                            <div class="  dropdown-menu">
                                                <a class="dropdown-item" href="example/edit?id=<?php echo $card['id']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                Редактировать</a>
                                                <a class="dropdown-item" href="example/security?id=<?php echo $card['id']; ?>">
                                                    <i class="fa fa-lock"></i>
                                                Безопасность</a>
                                                <a class="dropdown-item" href="example/status?id=<?php echo $card['id']; ?>">
                                                    <i class="fa fa-sun"></i>
                                                Установить статус</a>
                                                <a class="dropdown-item" href="example/media?id=<?php echo $card['id']; ?>">
                                                    <i class="fa fa-camera"></i>
                                                    Загрузить аватар
                                                </a>
                                                <a href="#" class="dropdown-item" onclick="return confirm('are you sure?');">
                                                    <i class="fa fa-window-close"></i>
                                                    Удалить
                                                </a></div>
                                            
                                    
                                    <span class="text-truncate text-truncate-xl"><?php echo $card['profession']; ?></span>
                                </div>
                                <button class="js-expand-btn btn btn-sm btn-default d-none" data-toggle="collapse" data-target="#c_1 > .card-body + .card-body" aria-expanded="false">
                                    <span class="collapsed-hidden">+</span>
                                    <span class="collapsed-reveal">-</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0 collapse show">
                            <div class="p-3">
                                <a href="tel:<?php echo $card['phone']; ?>" class="mt-1 d-block fs-sm fw-400 text-dark">
                                    <i class="fas fa-mobile-alt text-muted mr-2"></i> <?php echo $card['phone']; ?></a>
                                <a href="mailto:<?php echo $card['mail']; ?>" class="mt-1 d-block fs-sm fw-400 text-dark">
                                    <i class="fas fa-mouse-pointer text-muted mr-2"></i> <?php echo $card['mail']; ?></a>
                                <address class="fs-sm fw-400 mt-4 text-muted">
                                    <i class="fas fa-map-pin mr-2"></i> <?php echo $card['adress']; ?></address>
                                <div class="d-flex flex-row">
                                    <a href="javascript:void(0);" class="mr-2 fs-xxl" style="color:#4680C2">
                                        <i class="fab fa-vk"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="mr-2 fs-xxl" style="color:#38A1F3">
                                        <i class="fab fa-telegram"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="mr-2 fs-xxl" style="color:#E1306C">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php 
                    unset($_SESSION['user']);
                    unset($_SESSION['admin']);
                ?>
            </div>
        </main>
     
        <!-- BEGIN Page Footer -->
        <footer class="page-footer" role="contentinfo">
            <div class="d-flex align-items-center flex-1 text-muted">
                <span class="hidden-md-down fw-700">2020 © Учебный проект</span>
            </div>
            <div>
                <ul class="list-table m-0">
                    <li><a href="intel_introduction.html" class="text-secondary fw-700">Home</a></li>
                    <li class="pl-3"><a href="info_app_licensing.html" class="text-secondary fw-700">About</a></li>
                </ul>
            </div>
        </footer>
        
    </body>

    <script src="js/vendors.bundle.js"></script>
    <script src="js/app.bundle.js"></script>
    <script>

        $(document).ready(function()
        {

            $('input[type=radio][name=contactview]').change(function()
                {
                    if (this.value == 'grid')
                    {
                        $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-g');
                        $('#js-contacts .col-xl-12').removeClassPrefix('col-xl-').addClass('col-xl-4');
                        $('#js-contacts .js-expand-btn').addClass('d-none');
                        $('#js-contacts .card-body + .card-body').addClass('show');

                    }
                    else if (this.value == 'table')
                    {
                        $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-1');
                        $('#js-contacts .col-xl-4').removeClassPrefix('col-xl-').addClass('col-xl-12');
                        $('#js-contacts .js-expand-btn').removeClass('d-none');
                        $('#js-contacts .card-body + .card-body').removeClass('show');
                    }

                });

                //initialize filter
                initApp.listFilter($('#js-contacts'), $('#js-filter-contacts'));
        });

    </script>
</html>