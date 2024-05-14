<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BlogPostsCategoriesFixture
 */
class BlogPostsCategoriesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'category_id' => 1,
                'blog_post_id' => 1,
            ],
        ];
        parent::init();
    }
}
