<?= $this->Form->create('Newsletter', ['novalidate', 'url'=>['controller'=>'Mailing/contacts', 'action'=>'unsubscribe'] ]) ?>
<?php echo $this->Form->input('email', ['type' => 'email', 'label'=>$label]);?>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-success btn-fill']) ?>
<?= $this->Form->end()?>
