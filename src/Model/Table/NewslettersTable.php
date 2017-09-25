<?php
namespace Trois\Newsletter\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Newsletters Model
 *
 * @property \Trois\Newsletter\Model\Table\MailingListsTable|\Cake\ORM\Association\BelongsToMany $MailingLists
 * @property \Trois\Newsletter\Model\Table\PostsTable|\Cake\ORM\Association\BelongsToMany $Posts
 *
 * @method \Trois\Newsletter\Model\Entity\Newsletter get($primaryKey, $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter newEntity($data = null, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter[] newEntities(array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter[] patchEntities($entities, array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NewslettersTable extends Table
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

        $this->setTable('newsletters');
        $this->setDisplayField('subject');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('MailingLists', [
            'foreignKey' => 'newsletter_id',
            'targetForeignKey' => 'mailing_list_id',
            'joinTable' => 'newsletters_mailing_lists',
            'className' => 'Trois/Newsletter.MailingLists'
        ]);
        $this->belongsToMany('Posts', [
            'foreignKey' => 'newsletter_id',
            'targetForeignKey' => 'post_id',
            'joinTable' => 'newsletters_posts',
            'className' => 'Trois/Newsletter.Posts'
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
            ->dateTime('sended')
            ->allowEmpty('sended');

        $validator
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->requirePresence('language', 'create')
            ->notEmpty('language');

        $validator
            ->allowEmpty('header');

        $validator
            ->allowEmpty('body');

        return $validator;
    }
}
