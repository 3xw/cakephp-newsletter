<?php
namespace Trois\Newsletter\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Trois\Newsletter\Model\Table\MailingListsTable;

/**
 * Trois\Newsletter\Model\Table\MailingListsTable Test Case
 */
class MailingListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Trois\Newsletter\Model\Table\MailingListsTable
     */
    public $MailingLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.trois/newsletter.mailing_lists',
        'plugin.trois/newsletter.contacts',
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
        $config = TableRegistry::exists('MailingLists') ? [] : ['className' => MailingListsTable::class];
        $this->MailingLists = TableRegistry::get('MailingLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MailingLists);

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
}
