<?= $this->element('header',['title' => __('Add Contact'),'menus' => ['<i class="fa fa-list"></i><p>List </p>' => ['action' => 'index']]]) ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <!-- LIST ELEMENT -->
        <div class="card">

          <!-- CONTENT -->
          <div class="content">

            <!-- FORM -->
            <?= $this->Form->create($contact); ?>
            <?php
                              echo $this->Form->input('email', ['class' => 'form-control']);
                                    echo $this->Form->input('subscribe', ['class' => 'form-control']);
                                    echo $this->Form->input('mailing_list_id', ['class' => 'form-control']);
                              ?>

            <div class="btn-group">
              <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info btn-fill']) ?>
              <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-success btn-fill']) ?>
            </div>

            <?= $this->Form->end() ?>

          </div><!-- end content-->
        </div><!-- end card-->
      </div><!-- end col-md-8 col-md-offset-2-->
    </div><!-- end row-->
  </div><!-- end container-fluid-->
</div><!-- end content-->
