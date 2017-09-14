<?= $this->Form->create('Newsletter', ['novalidate', 'url'=>['controller'=>'Mailing\contacts', 'action'=>'subscribe'] ]) ?>
<?php echo $this->Form->input('email', ['type' => 'email', 'label'=>$label]);?>
<?php echo $this->Form->input('mailing_list_id', ['type' => 'hidden', 'value'=>$mailing_list_id]);?>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-success btn-fill']) ?>
<?= $this->Form->end()?>
