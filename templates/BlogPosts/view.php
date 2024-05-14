<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BlogPost $blogPost
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Blog Post'), ['action' => 'edit', $blogPost->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Blog Post'), ['action' => 'delete', $blogPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blogPost->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Blog Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Blog Post'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="blogPosts view content">
            <h3><?= h($blogPost->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($blogPost->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content') ?></th>
                    <td><?= h($blogPost->content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($blogPost->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($blogPost->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($blogPost->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Categories') ?></h4>
                <?php if (!empty($blogPost->categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($blogPost->categories as $category) : ?>
                        <tr>
                            <td><?= h($category->id) ?></td>
                            <td><?= h($category->name) ?></td>
                            <td><?= h($category->created) ?></td>
                            <td><?= h($category->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $category->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $category->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>

                <h4><?= __('Related Meta Fields') ?></h4>
                <?php if (!empty($blogPost->meta_fields)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('MetaKey') ?></th>
                            <th><?= __('MetaValue') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($blogPost->meta_fields as $metaField) : ?>
                        <tr>
                            <td><?= h($metaField->id) ?></td>
                            <td><?= h($metaField->meta_key) ?></td>
                            <td><?= h($metaField->meta_value) ?></td>
                            <td><?= h($metaField->created) ?></td>
                            <td><?= h($metaField->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'MetaFields', 'action' => 'view', $metaField->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'MetaFields', 'action' => 'edit', $metaField->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'MetaFields', 'action' => 'delete', $metaField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metaField->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
