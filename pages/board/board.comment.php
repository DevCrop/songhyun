<?php
include_once "../../inc/lib/base.class.php";

try {
    // Obtain the PDO instance
    $db = DB::getInstance();

    // Prepare and execute the query to fetch comments
    $query = "SELECT 
                a.no, 
                a.sitekey, 
                a.user_no, 
                a.parent_no, 
                a.write_name, 
                a.regdate, 
                a.contents, 
                a.isAdmin 
              FROM nb_board_comment a 
              WHERE a.parent_no = :parent_no 
                AND a.sitekey = :sitekey 
              ORDER BY a.no ASC";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':parent_no', $no, PDO::PARAM_INT);
    $stmt->bindParam(':sitekey', $NO_SITE_UNIQUE_KEY, PDO::PARAM_STR);
    $stmt->execute();

    // Get the number of comments
    $comment_count = $stmt->rowCount();

} catch (PDOException $e) {
    echo json_encode([
        "result" => "fail",
        "msg" => "댓글을 불러오는 중 오류가 발생했습니다. 관리자에게 문의해주세요.",
        "error" => $e->getMessage()
    ]);
    exit;
}
?>

<div class="no-view-content editor">
    <div class="no_comment_wrap">

        <div class="no_comment_input">
            <div class="no_comment_input_top">
                <input type="text" id="write_name" name="write_name" class="input_mr" placeholder="name">
            </div>

            <div class="no_comment_input_mid">
                <textarea id="comment_contents" name="comment_contents" placeholder="content"></textarea>
            </div>

            <a href="javascript:void(0)" onclick="doCommentSave(0);" title="댓글 등록" class="link-primary md-w-100">
                댓글 등록
            </a>

        </div>

        <!-- Display the number of registered comments -->
        <span class="no_written">등록된 댓글(<b><?= htmlspecialchars($comment_count) ?></b>)</span>

        <?php
    // Fetch and display each comment
    while ($v = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="no_answer">
            <div class="no_answer_box">
                <div class="no_answer_txt">
                    <span class="no_answer_name"><?= htmlspecialchars($v['write_name']) ?></span>
                    <span
                        class="no_answer_date"><?= $v['regdate'] ? date('Y.m.d', strtotime($v['regdate'])) : '' ?></span>

                    <!-- MODIFY, DELETE BUTTONS -->
                    <?php if (($v['user_no'] == $NO_USR_NO) && ($v['isAdmin'] === "N")) { ?>
                    <a href="javascript:void(0)" onClick="doCommentDelete(<?= htmlspecialchars($v['no']) ?>);"
                        title="delete" class="no_answer_del">delete</a>
                    <?php } elseif ($v['user_no'] == -1) { ?>
                    <!-- Secret delete option for admin -->
                    <!-- <a href="javascript:void(0)" onClick="doCommentDeleteSecret(<?= htmlspecialchars($v['no']) ?>);" title="delete" class="no_answer_del">delete</a> -->
                    <?php } ?>
                </div>
                <p>
                    <?= nl2br(htmlspecialchars($v['contents'])) ?>
                </p>
            </div>
        </div>
        <?php
    }
    ?>
    </div>