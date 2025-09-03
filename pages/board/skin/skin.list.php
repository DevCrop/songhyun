    <section class="no-sub-notice no-section-md">
        <div class="no-container-xl">
            <div class="--section-title-with-search">
                <hgroup>
                    <h2 class="f-heading-3 clr-text-title">제품 문의</h2>
                </hgroup>

                <div class="no-form-search ">
                    <input type="text" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력해주세요.">
                    <button type="button" class="" aria-label="search" onclick="doSearch();">
                        <i class="fa-light fa-magnifying-glass" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <div class="--cnt">
                <!-- --cnt 내부 -->
                <div class="notice">
                    <table class="notice">
                        <colgroup>
                            <col style="width: auto;" />
                            <col />
                            <col />
                        </colgroup>
                        <thead>
                            <tr class="">
                                <th class="notice-head notice-title f-body-2">제목</th>
                                <th class="notice-head notice-date f-body-2">작성일</th>
                                <th class="notice-head notice-views f-body-2">조회수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arrResultSet as $row): 
                            ?>
                            <tr class="notice-row">
                                <td class="notice-cell notice-title">
                                    <a class="f-body-1 --semibold"
                                        href="<?=$ROOT?>/pages/board/board.confirm.php?mode=view&board_no=<?=$board_no?>&no=<?=$row['no']?>">
                                        <?= htmlspecialchars($row['title']) ?>
                                    </a>
                                </td>
                                <td class="notice-cell notice-date ">
                                    <time datetime="<?= $row['date'] ?>">
                                        <?= date("Y-m-d", strtotime($row['date'])) ?>
                                    </time>
                                </td>
                                <td class="notice-cell notice-views">
                                    <?= number_format($row['views']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>

                <div class="no-write-btn">
                    <a href="<?=$ROOT?>/pages/board/board.write.php?board_no=<?=$board_no?>" class="no-btn-primary">
                        자세히 보기
                    </a>
                </div>

                <nav class="no-pagination" aria-label="페이지 네비게이션">
                    <a href="#" class="--arrow" aria-label="첫 페이지">«</a>
                    <a href="#" class="--arrow" aria-label="이전 페이지">‹</a>

                    <a href="#">1</a>
                    <a href="#" class="active">2</a>
                    <a href="#">3</a>
                    <a href="#" class="--arrow" aria-label="다음 페이지">›</a>
                    <a href="#" class="--arrow" aria-label="마지막 페이지">»</a>
                </nav>

            </div>
    </section>