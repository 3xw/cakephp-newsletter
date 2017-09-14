<?= $this->Form->create('Newsletter', ['novalidate', 'url'=>['controller'=>'newsletters/contacts', 'action'=>'unsubscribe'] ]) ?>
<?php echo $this->Form->input('email', ['type' => 'email', 'label'=>$label]);?>
<div class="btn-group">
  <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-success btn-fill']) ?>
</div>
</form>
