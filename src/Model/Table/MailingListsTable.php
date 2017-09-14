<?php
namespace Trois\Newsletter\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MailingLists Model
 *
 * @property \Trois\Newsletter\Model\Table\ContactsTable|\Cake\ORM\Association\HasMany $Contacts
 * @property \Trois\Newsletter\Model\Table\NewslettersTable|\Cake\ORM\Association\BelongsToMany $Newsletters
 *
 * @method \Trois\Newsletter\Model\Entity\MailingList get($primaryKey, $options = [])
 * @method \Trois\Newsletter\Model\Entity\MailingList newEntity($data = null, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\MailingList[] newEntities(array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\MailingList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Trois\Newsletter\Model\Entity\MailingList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\MailingList[] patchEntities($entities, array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\MailingList findOrCreate($search, callable $callback = null, $options = [])
 */
class MailingListsTable extends Table
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

        $this->setTable('mailing_lists');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Contacts', [
            'foreignKey' => 'mailing_list_id',
            'className' => 'Trois/Newsletter.Contacts'
        ]);
        $this->belongsToMany('Newsletters', [
            'foreignKey' => 'mailing_list_id',
            'targetForeignKey' => 'newsletter_id',
            'joinTable' => 'newsletters_mailing_lists',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('language', 'create')
            ->notEmpty('language');

        return $validator;
    }
}
