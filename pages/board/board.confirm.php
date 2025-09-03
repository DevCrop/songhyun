<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/lib/base.class.php";

$board_no = $_GET['board_no'] ?? null;
?>


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>

<script type="text/javascript" src="<?= $NO_IS_SUBDIR ?>/pages/board/js/board.js?v=<?= $STATIC_FRONT_JS_MODIFY_DATE ?>">
</script>




<form id="frm" name="frm" method="post" action="board.confirm.process.php">
    <input type="hidden" id="mode" name="mode" value="">
    <input type="hidden" name="board_no" value="<?= htmlspecialchars($_REQUEST['board_no'] ?? '') ?>">
    <input type="hidden" name="no" value="<?= htmlspecialchars($_REQUEST['no'] ?? '') ?>">

    <!-- BEGIN :: CONTENT -->
    <section class="no-section-md">
        <div class="no-container-sm">
            <h3 class="no-confirm-title">
                Verify Password
            </h3>
            <p class="no-confirm-desc">
                A password is required to view and edit/delete posts. <br>
                <span>Please enter the password you entered when writing the article.</span>
            </p>

            <div class="no-input-wrap center">
                <div class="no-input-box password">
                    <label for="pwd">Password</label>
                    <input type="password" id="pwd" name="pwd" placeholder="Password">
                </div>
            </div>

            <div>
                <a href="javascript:void(0);" onclick="history.back();" class="no-btn-primary no-btn-inquiry">취소하기</a>
                <a href="javascript:void(0);"
                    onclick="doPasswordConfirm('<?= htmlspecialchars($_REQUEST['mode'] ?? '') ?>')" title="confirm"
                    class="no-btn-primary no-btn-inquiry">확인</a>
            </div>
        </div>
    </section>
    <!-- END :: CONTENT -->
</form>
<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>