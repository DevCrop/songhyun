</head>

<?php
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$basename = basename($path);

$pageType = ($basename === '' || $basename === 'index.php') ? 'main' : 'sub';
?>

<body data-page="<?= $pageType ?>">
    <div class="no-backdrop" id="no-backdrop"></div>
    <header class="no-header" id="header" data-lenis-prevent>
        <div class="no-header-container no-container-3xl">
            <div class="no-header__inner">
                <h1 class="no-header-logo">
                    <a href="/">
                        <figure>
                            <img src="<?=$ROOT?>/resource/images/logo/logo-white.png" alt="" class="logo-white">
                            <img src="<?=$ROOT?>/resource/images/logo/logo-brand.png" alt="" class="logo-brand">
                        </figure>
                        <div class="--blind">송현인베스트먼트</div>
                    </a>
                </h1>
                <nav class="no-header-menu">
                    <ul class="no-header-gnb">
                        <?php foreach ($MENU_ITEMS as $di => $depth):
                                    $depth_active = $depth['isActive'] ? 'active' : '';
                                ?>
                        <li>
                            <a href="<?= $depth['path'] ?>"
                                class="f-body-2 <?= $depth_active ?>"><?= $depth['title'] ?></a>
                            <?php if (array_key_exists('pages', $depth) && count($depth['pages']) > 0) : ?>
                            <ul class="no-header__lnb">
                                <?php foreach ($depth['pages'] as $pi => $PAGE): 
                                                $page_active = $PAGE['isActive'] ? 'active' : '';    
                                                ?>
                                <li class="no-header__lnb--item <?=$page_active?>">
                                    <a href="<?=$PAGE['path']?>" class="no-header__lnb--link f-body-3">
                                        <?=$PAGE['title']?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>

                    </ul>
                </nav>
                <button type="button" class="no-header-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>



    <?php
    $aos = [
            'fast' => 'data-aos="fade-up" data-aos-duration="600"',
            'middle' => 'data-aos="fade-up" data-aos-duration="1000"',
            'slow' => 'data-aos="fade-up" data-aos-duration="1600"',
        ];
?>