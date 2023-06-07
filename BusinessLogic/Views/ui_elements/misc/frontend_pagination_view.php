<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(1);
?>

<nav class="mt-4">
    <ul class="pagination mb-0">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <?php echo anchor($pager->getPrevious(), getIcon('bi-arrow-left-circle-fill'), ['class' => 'page-link page-prev', 'title' => 'Назад'])?>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="<?php echo sprintf('page-item%s', $link['active'] ? ' active' : '')?>">
                <?php echo anchor($link['uri'], $link['title'], ['class' => 'page-link', 'title' => $link['title']])?>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <?php echo anchor($pager->getNext(), getIcon('bi-arrow-right-circle-fill'), ['class' => 'page-link page-next', 'title' => 'Вперёд'])?>
            </li>
        <?php endif ?>
    </ul>
</nav>
