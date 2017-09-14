<?php
namespace Trois\Newsletter\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Trois\Newsletter\Model\Table\NewslettersTable;

/**
 * Trois\Newsletter\Model\Table\NewslettersTable Test Case
 */
class NewslettersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Trois\Newsletter\Model\Table\NewslettersTable
     */
    public $Newsletters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.trois/newsletter.newsletters',
        'plugin.trois/newsletter.mailing_lists',
        'plugin.trois/newsletter.newsletters_mailing_lists',
        'plugin.trois/newsletter.posts',
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
        $config = TableRegistry::exists('Newsletters') ? [] : ['className' => NewslettersTable::class];
        $this->Newsletters = TableRegistry::get('Newsletters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Newsletters);

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
