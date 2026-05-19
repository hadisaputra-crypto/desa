<?php $pager->setSurroundCount(3) ?>

<ul class="pagination">
  <?php if ($pager->hasPrevious()) : ?>
    <li>
      <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
        <i class="fa fa-step-backward"></i>
      </a>
    </li>
    <li class="previous">
      <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
        <i class="fa fa-angle-left"></i> Prev
      </a>
    </li>
  <?php endif ?>

  <?php foreach ($pager->links() as $link) : ?>
    <li class="<?= $link['active'] ? 'active"' : '' ?>">
      <a href="<?= $link['uri'] ?>">
        <?= $link['title'] ?>
      </a>
    </li>
  <?php endforeach ?>

  <?php if ($pager->hasNext()) : ?>
    <li class="next">
      <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
        Next <i class="fa fa-angle-right"></i>
      </a>
    </li>
    <li>
      <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
        <i class="fa fa-step-forward"></i>
      </a>
    </li>
  <?php endif ?>
</ul>