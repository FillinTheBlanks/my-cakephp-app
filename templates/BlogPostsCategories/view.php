<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogPostsCategory $blogPostsCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Blog Posts Category'), ['action' => 'edit', $blogPostsCategory->blog_post_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Blog Posts Category'), ['action' => 'delete', $blogPostsCategory->blog_post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogPostsCategory->blog_post_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Blog Posts Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Blog Posts Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="blogPostsCategories view content">
            <h3><?= h($blogPostsCategory->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $blogPostsCategory->hasValue('category') ? $this->Html->link($blogPostsCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $blogPostsCategory->category->category_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Blog Post') ?></th>
                    <td><?= $blogPostsCategory->hasValue('blog_post') ? $this->Html->link($blogPostsCategory->blog_post->blog_post_id, ['controller' => 'BlogPosts', 'action' => 'view', $blogPostsCategory->blog_post->blog_post_id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
