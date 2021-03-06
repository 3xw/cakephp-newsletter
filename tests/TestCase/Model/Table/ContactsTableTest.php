<?php
namespace Trois\Newsletter\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Trois\Newsletter\Model\Table\ContactsTable;

/**
 * Trois\Newsletter\Model\Table\ContactsTable Test Case
 */
class ContactsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Trois\Newsletter\Model\Table\ContactsTable
     */
    public $Contacts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.trois/newsletter.contacts',
        'plugin.trois/newsletter.mailing_lists',
        'plugin.trois/newsletter.newsletters',
        'plugin.trois/newsletter.newsletters_mailing_lists',
        'plugin.trois/newsletter.posts',
        'plugin.trois/newsletter.categories',
        'plugin.trois/newsletter.attachments',
        'plugin.trois/newsletter.attachments_posts',
        'plugin.trois/newsletter.newsletters_posts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Contacts') ? [] : ['className' => ContactsTable::class];
        $this->Contacts = TableRegistry::get('Contacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contacts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
