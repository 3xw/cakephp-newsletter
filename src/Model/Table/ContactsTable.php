<?php
namespace Trois\Newsletter\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
* Contacts Model
*
* @property \Trois\Newsletter\Model\Table\MailingListsTable|\Cake\ORM\Association\BelongsTo $MailingLists
*
* @method \Trois\Newsletter\Model\Entity\Contact get($primaryKey, $options = [])
* @method \Trois\Newsletter\Model\Entity\Contact newEntity($data = null, array $options = [])
* @method \Trois\Newsletter\Model\Entity\Contact[] newEntities(array $data, array $options = [])
* @method \Trois\Newsletter\Model\Entity\Contact|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \Trois\Newsletter\Model\Entity\Contact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \Trois\Newsletter\Model\Entity\Contact[] patchEntities($entities, array $data, array $options = [])
* @method \Trois\Newsletter\Model\Entity\Contact findOrCreate($search, callable $callback = null, $options = [])
*
* @mixin \Cake\ORM\Behavior\TimestampBehavior
*/
class ContactsTable extends Table
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

    $this->setTable('contacts');
    $this->setDisplayField('id');
    $this->setPrimaryKey('id');

    $this->addBehavior('Timestamp');

    $this->belongsTo('MailingLists', [
      'foreignKey' => 'mailing_list_id',
      'joinType' => 'INNER',
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
    ->email('email')
    ->requirePresence('email', 'create')
    ->notEmpty('email')
    ->add('email',['unique' => [
      'rule' => 'validateUnique',
      'provider' => 'table',
      'message' => __('Not unique')
      ]]
    );

    /*$validator->add(
      'email',
      ['unique' => [
        'rule' => 'validateUnique',
        'provider' => 'table',
        'message' => 'Not unique']
      ]
    );*/


    $validator
    ->boolean('subscribe')
    ->allowEmpty('subscribe');

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
    $rules->add($rules->isUnique(['email']));
    $rules->add($rules->existsIn(['mailing_list_id'], 'MailingLists'));

    return $rules;
  }
}
