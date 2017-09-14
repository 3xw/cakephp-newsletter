<?php
namespace Trois\Newsletter\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property \Trois\Newsletter\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \Trois\Newsletter\Model\Table\AttachmentsTable|\Cake\ORM\Association\BelongsToMany $Attachments
 * @property \Trois\Newsletter\Model\Table\NewslettersTable|\Cake\ORM\Association\BelongsToMany $Newsletters
 *
 * @method \Trois\Newsletter\Model\Entity\Post get($primaryKey, $options = [])
 * @method \Trois\Newsletter\Model\Entity\Post newEntity($data = null, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Post[] newEntities(array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Post|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Trois\Newsletter\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Post[] patchEntities($entities, array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Post findOrCreate($search, callable $callback = null, $options = [])
 */
class PostsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('posts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'Trois/Newsletter.Categories'
        ]);
        $this->belongsToMany('Attachments', [
            'foreignKey' => 'post_id',
            'targetForeignKey' => 'attachment_id',
            'joinTable' => 'attachments_posts',
            'className' => 'Trois/Newsletter.Attachments'
        ]);
        $this->belongsToMany('Newsletters', [
            'foreignKey' => 'post_id',
            'targetForeignKey' => 'newsletter_id',
            'joinTable' => 'newsletters_posts',
            'className' => 'Trois/Newsletter.Newsletters'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->dateTime('publish_date')
            ->requirePresence('publish_date', 'create')
            ->notEmpty('publish_date');

        $validator
            ->requirePresence('header', 'create')
            ->notEmpty('header');

        $validator
            ->allowEmpty('body');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
