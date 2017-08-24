<?php
namespace Trois\Newsletter\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Templates Model
 *
 * @property \Trois\Newsletter\Model\Table\NewslettersTable|\Cake\ORM\Association\HasMany $Newsletters
 *
 * @method \Trois\Newsletter\Model\Entity\Template get($primaryKey, $options = [])
 * @method \Trois\Newsletter\Model\Entity\Template newEntity($data = null, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Template[] newEntities(array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Template|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Trois\Newsletter\Model\Entity\Template patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Template[] patchEntities($entities, array $data, array $options = [])
 * @method \Trois\Newsletter\Model\Entity\Template findOrCreate($search, callable $callback = null, $options = [])
 */
class TemplatesTable extends Table
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

        $this->setTable('templates');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Newsletters', [
            'foreignKey' => 'template_id',
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
            ->allowEmpty('description');

        $validator
            ->requirePresence('layout_path', 'create')
            ->notEmpty('layout_path');

        return $validator;
    }
}
