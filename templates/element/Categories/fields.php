<div class="column column-80">
        <div class="categories form content">
            <?= $this->Form->create($category) ?>
            <fieldset>
                <legend><?= __('Add / Edit Category') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('blog_posts._ids', ['options' => $blogPosts]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>