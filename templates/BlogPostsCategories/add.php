<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogPostsCategory $blogPostsCategory
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $blogPosts
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Blog Posts Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="blogPostsCategories form content">
            <?= $this->Form->create($blogPostsCategory) ?>
            <fieldset>
                <legend><?= __('Add Blog Posts Category') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
