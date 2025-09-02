<footer class="no-footer ">
    <div class="no-container-3xl">
        <div class="no-footer-top">
            <h1 class="no-footer-logo">
                <a href="/">
                    <div class="--blind">미건시스템 (주) 식스닷</div>
                </a>
            </h1>
            <nav class="no-footer-menu">
                <ul class="no-footer-gnb">
                    <?php foreach ($MENU_ITEMS as $di => $depth):
                                    $depth_active = $depth['isActive'] ? 'active' : '';
                                ?>
                    <li>
                        <a href="<?= $depth['path'] ?>" class="f-body-3 <?= $depth_active ?>"><?= $depth['title'] ?></a>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </nav>
        </div>
        <div class="no-footer-bottom f-body-4">
            <ul class="no-footer-info ">
                <li>
                    <span>회사명</span>
                    <p>(주) 미건시스템</p>
                </li>
                <li>
                    <span>주소</span>
                    <p>서울시 서초구 강남대로 23길 25 미건빌딩</p>
                </li>
                <li>
                    <span>TEL.</span>
                    <p>02-3443-2036</p>
                </li>
                <li>
                    <span>FAX</span>
                    <p>02-3443-2039</p>
                </li>
            </ul>
            <copyright>ⓒ MIKUN Systems. All Rights Reserved.</copyright>
        </div>
    </div>
</footer>

<div class="no-top-btn ">
    <a href="">
        <i class="fa-solid fa-file-pen"></i>
    </a>
    <a href="">
        <i class="fa-solid fa-phone"></i>
    </a>
    <button type="button">
        <div class="arrow">
            <i class="fa-regular fa-arrow-up-long" aria-hidden="true"></i>
        </div>
    </button>
</div>
</body>

</html>