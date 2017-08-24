<?php
namespace Trois\Newsletter\Model\Entity;

use Cake\ORM\Entity;

/**
 * Newsletter Entity
 *
 * @property int $id
 * @property string $subject
 * @property string $language
 * @property string $header
 * @property string $body
 * @property int $template_id
 *
 * @property \Trois\Newsletter\Model\Entity\Template $template
 * @property \Trois\Newsletter\Model\Entity\MailingList[] $mailing_lists
 */
class Newsletter extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
