<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogPostsCategory $blogPostsCategory
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 * @var string[]|\Cake\Collection\CollectionInterface $blogPosts
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $blogPostsCategory->blog_post_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $blogPostsCategory->blog_post_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Blog Posts Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="blogPostsCategories form content">
            <?= $this->Form->create($blogPostsCategory) ?>
            <fieldset>
                <legend><?= __('Edit Blog Posts Category') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
