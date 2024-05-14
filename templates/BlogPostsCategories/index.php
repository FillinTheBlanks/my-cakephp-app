<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\BlogPostsCategory> $blogPostsCategories
 */
?>
<div class="blogPostsCategories index content">
    <?= $this->Html->link(__('New Blog Posts Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Blog Posts Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('blog_post_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogPostsCategories as $blogPostsCategory): ?>
                <tr>
                    <td><?= $blogPostsCategory->hasValue('category') ? $this->Html->link($blogPostsCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $blogPostsCategory->category->category_id]) : '' ?></td>
                    <td><?= $blogPostsCategory->hasValue('blog_post') ? $this->Html->link($blogPostsCategory->blog_post->blog_post_id, ['controller' => 'BlogPosts', 'action' => 'view', $blogPostsCategory->blog_post->blog_post_id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $blogPostsCategory->blog_post_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blogPostsCategory->blog_post_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blogPostsCategory->blog_post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogPostsCategory->blog_post_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
