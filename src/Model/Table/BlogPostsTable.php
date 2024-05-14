<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogPosts Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsToMany $Categories
 *
 * @method \App\Model\Entity\BlogPost newEmptyEntity()
 * @method \App\Model\Entity\BlogPost newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\BlogPost> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogPost get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\BlogPost findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\BlogPost patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\BlogPost> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogPost|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\BlogPost saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\BlogPost>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlogPost>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BlogPost>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlogPost> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BlogPost>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlogPost>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BlogPost>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BlogPost> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BlogPostsTable extends Table
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

        $this->setTable('blog_posts');
        $this->setDisplayField(['title']);
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('MetaFields', [
            'foreignKey' => 'blog_post_id',
        ]);
        
        $this->belongsToMany('Categories', [
            'foreignKey' => 'blog_post_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'blog_posts_categories',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('title')
            ->maxLength('title', 45)
            ->allowEmptyString('title');

        $validator
            ->scalar('content')
            ->maxLength('content', 255)
            ->allowEmptyString('content');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->validCount('categories',1,'>=','Please select at least 1 category'));
        $rules->add($rules->isUnique(['title']));
        return $rules;
    }
}
