<?php
namespace Trois\Newsletter\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Trois\Newsletter\View\Helper\NewsletterHelper;

/**
 * Trois\Newsletter\View\Helper\NewsletterHelper Test Case
 */
class NewsletterHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Trois\Newsletter\View\Helper\NewsletterHelper
     */
    public $Newsletter;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Newsletter = new NewsletterHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Newsletter);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
