<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlogPostsCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlogPostsCategoriesTable Test Case
 */
class BlogPostsCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BlogPostsCategoriesTable
     */
    protected $BlogPostsCategories;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.BlogPostsCategories',
        'app.Categories',
        'app.BlogPosts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BlogPostsCategories') ? [] : ['className' => BlogPostsCategoriesTable::class];
        $this->BlogPostsCategories = $this->getTableLocator()->get('BlogPostsCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BlogPostsCategories);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BlogPostsCategoriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
