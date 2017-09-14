<?php
namespace Trois\Newsletter\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
* Newsletter helper
*/
class NewsletterHelper extends Helper
{

  /**
  * Default configuration.
  *
  * @var array
  */
  protected $_defaultConfig = [];

  public function subscribe($label, $mailing_list_id)
  {
    return $this->_View->element(
      'Trois/Newsletter.SubscribeForm',
      [
        'label'=>$label,
        'mailing_list_id'=>$mailing_list_id
      ]
    );
  }

  public function unsubscribe($label)
  {
    return $this->_View->element(
      'Trois/Newsletter.UnsubscribeForm',
      [
        'label'=>$label
      ]
    );
  }

}
