<footer class="no-footer ">
    <div class="no-container-3xl">
        <div class="no-footer-top">
            <h1 class="no-footer-logo">
                <a href="/">
                    <div class="--blind">송현인베스트먼트</div>
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
                    <span>Company</span>
                    <p>송현인베스트먼트</p>
                </li>
                <li>
                    <span>Address</span>
                    <p>서울시 영등포구 여의대로 24. 10층 (여의도동, 한국경제인협회빌딩)</p>
                </li>
                <li>
                    <span>Fax</span>
                    <p>02-2138-1620</p>
                </li>
                <li>
                    <span>Phone</span>
                    <p>02-2138-3207</p>
                </li>
            </ul>
            <div class="no-footer-right">
                <div class="no-footer-etc">
                    <div class="no-footer-terms">
                        <a href="#">
                            <span>Privacy Policy</span>
                        </a>
                        <a href="#">
                            <span>terms of Service</span>
                        </a>
                    </div>
                    <ul class="no-footer-links">
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <copyright>Copyright © 2025 송현인베스트먼트 All Rights Reserved.</copyright>
            </div>
        </div>
    </div>
</footer>

<div class="no-top-btn">
    <!---
    <a href="<?=$ROOT?>/pages/contact/inquiry.php">
        <i class="fa-solid fa-file-pen"></i>
    </a>
    <a href="tel:02-3443-2036">
        <i class="fa-solid fa-phone"></i>
    </a>-->
    <button type="button">
        <div class="arrow">
            <i class="fa-sharp fa-solid fa-arrow-up"></i>
        </div>
    </button>
</div>
</body>

</html>