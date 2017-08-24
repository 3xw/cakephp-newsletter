<?= $this->element('header',['title' => 'View','menus' => [ '<i class="fa fa-list"></i><p>List </p>' => ['action' => 'index'], '<i class="fa fa-plus"></i><p>Add</p>' => ['action' => 'add'], '<i class="fa fa-edit"></i><p>Edit</p>' => ['action' => 'edit', $mailingList->id]]]) ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">

        <div class="card card-user">
          <div class="image">
            <img src="<?= $this->Url->build('/img/admin/bg.jpg') ?>" alt="...">
          </div>
          <div class="content">
            <p class="description text-center">
              <h4 class="title text-center">
                <?= __('MailingList') ?>
              </h4>
            </p>

            <table class="table">
              <thead>
                <tr>
                  <th><?= __('Key') ?></th>
                  <th><?= __('Value') ?></th>
                </tr>
              </thead>
              <tbody>
                                                                <tr>
                  <th scope="row"><?= __('Name') ?></th>
                  <td><?= h($mailingList->name) ?></td>
                </tr>
                                                                <tr>
                  <th scope="row"><?= __('Language') ?></th>
                  <td><?= h($mailingList->language) ?></td>
                </tr>
                                                                                                                <tr>
                  <th scope="row"><?= __('Id') ?></th>
                  <td><?= $this->Number->format($mailingList->id) ?></td>
                </tr>
                                                                              </tbody>
            </table>

            

            <hr/>
            <div class="text-center" style="margin-top: 20px;">
              <div class="btn-group">
                <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info btn-fill']) ?>
                <?= $this->Html->link(__('Edit Mailing List'), ['action' => 'edit', $mailingList->id], ['class'=>'btn btn-info btn-sm btn-fill']) ?>
                <?= $this->Form->postLink(__('Delete Mailing List'), ['action' => 'delete', $mailingList->id], ['class'=>'btn btn-danger btn-sm btn-fill', 'confirm' => __('Are you sure you want to delete # {0}?', $mailingList->id)]) ?>
              </div>
            </div>
          </div>
        </div><!-- end card view -->
      </div> <!-- end col-md-offset-3 col-md-6 -->

      <div class="col-md-12">
                <!-- LIST <?= __('Related Newsletters') ?> -->
        <?php if (!empty($mailingList->newsletters)): ?>
          <div class="card">

            <!-- HEADER -->
            <div class="header">
              <?= __('Related Newsletters') ?>
            </div>

            <!-- CONTENT -->
            <div class="content">
              <div class="fresh-datatables">
                <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                  <!-- TABLE -->
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                        <thead>
                          <tr>
                                                        <th><?= __('Id') ?></th>
                                                        <th><?= __('Subject') ?></th>
                                                        <th><?= __('Language') ?></th>
                                                        <th><?= __('Header') ?></th>
                                                        <th><?= __('Body') ?></th>
                                                        <th><?= __('Template Id') ?></th>
                                                        <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($mailingList->newsletters as $newsletters): ?>
                            <tr>
                              <td data-title="Id"><?= h($newsletters->id) ?></td>
                              <td data-title="Subject"><?= h($newsletters->subject) ?></td>
                              <td data-title="Language"><?= h($newsletters->language) ?></td>
                              <td data-title="Header"><?= h($newsletters->header) ?></td>
                              <td data-title="Body"><?= h($newsletters->body) ?></td>
                              <td data-title="Template Id"><?= h($newsletters->template_id) ?></td>

                              <td data-title="actions" class="actions" class="text-right">
                                <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Newsletters', 'action' => 'view', $newsletters->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                                <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Newsletters', 'action' => 'edit', $newsletters->id], ['class' => 'btn btn-simple btn-warning btn-icon edit','escape' => false]) ?>
                                <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Newsletters', 'action' => 'delete', $newsletters->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $newsletters->id)]) ?>
                              </td>
                            </tr>

                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div><!-- end dataTables_wrapper-->
              </div><!-- end fresh-datatables-->
            </div><!-- end content-->
          </div><!-- end card-->
        <?php endif; ?><!-- END ASSOC <?= __('Related Newsletters') ?> -->
              </div>
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->
</div> <!-- end content -->
