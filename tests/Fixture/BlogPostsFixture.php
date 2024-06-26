<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BlogPostsFixture
 */
class BlogPostsFixture extends TestFixture
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
                'id' => 1,
                'created' => '2024-05-13 01:24:46',
                'modified' => '2024-05-13 01:24:46',
                'title' => 'Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
