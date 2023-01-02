<?php $pager->setSurroundCount(3) ?>

<ul class="filter-list">

    <?php foreach ($pager->links() as $link) : ?>
        <a class="filter-btn" href="<?= $link['uri'] ?>#daftar">
            <?= $link['title'] ?>
        </a>
    <?php endforeach ?>

</ul>