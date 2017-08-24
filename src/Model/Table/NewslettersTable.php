<?php
namespace Trois\Newsletter\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Newsletters Model
 *
 * @property \Trois\Newsletter\Model\Table\TemplatesTable|\Cake\ORM\Association\BelongsTo $Templates
 * @property \Trois\Newsletter\Model\Table\MailingListsTable|\Cake\ORM\Association\BelongsToMany $MailingLists
 *
 * @method \Trois\Newsletter\Model\Entity\Newsletter get($primaryKey, $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter newEntity($data = null, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter[] newEntities(array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter[] patchEntities($entities, array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Newsletter findOrCreate($search, callable $callback = null, $options = [])
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
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Templates', [
            'foreignKey' => 'template_id',
            'joinType' => 'INNER',
            'className' => 'Trois/Newsletter.Templates'
        ]);
        $this->belongsToMany('MailingLists', [
            'foreignKey' => 'newsletter_id',
            'targetForeignKey' => 'mailing_list_id',
            'joinTable' => 'newsletters_mailing_lists',
            'className' => 'Trois/Newsletter.MailingLists'
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
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->requirePresence('language', 'create')
            ->notEmpty('language');

        $validator
            ->requirePresence('header', 'create')
            ->notEmpty('header');

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');

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
        $rules->add($rules->existsIn(['template_id'], 'Templates'));

        return $rules;
    }
}
