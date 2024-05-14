<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogPostsCategories Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\BlogPostsTable&\Cake\ORM\Association\BelongsTo $BlogPosts
 *
 * @method \App\Model\Entity\BlogPostsCategory newEmptyEntity()
 * @method \App\Model\Entity\BlogPostsCategory newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\BlogPostsCategory> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogPostsCategory get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\BlogPostsCategory findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\BlogPostsCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\BlogPostsCategory> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogPostsCategory|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\BlogPostsCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\BlogPostsCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlogPostsCategory>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BlogPostsCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlogPostsCategory> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BlogPostsCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlogPostsCategory>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BlogPostsCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlogPostsCategory> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BlogPostsCategoriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('blog_posts_categories');
        $this->setDisplayField(['blog_post_id', 'category_id']);
        $this->setPrimaryKey(['blog_post_id', 'category_id']);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('BlogPosts', [
            'foreignKey' => 'blog_post_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);
        $rules->add($rules->existsIn(['blog_post_id'], 'BlogPosts'), ['errorField' => 'blog_post_id']);
        return $rules;
    }
}
