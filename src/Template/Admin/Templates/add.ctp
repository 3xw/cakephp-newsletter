<?= $this->element('header',['title' => __('Add Template'),'menus' => ['<i class="fa fa-list"></i><p>List </p>' => ['action' => 'index']]]) ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <!-- LIST ELEMENT -->
        <div class="card">

          <!-- CONTENT -->
          <div class="content">

            <!-- FORM -->
            <?= $this->Form->create($template); ?>
            <?php
                              echo $this->Form->input('name', ['class' => 'form-control']);
                                    echo $this->Form->input('description', ['class' => 'form-control']);
                                    echo $this->Form->input('layout_path', ['class' => 'form-control']);
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
