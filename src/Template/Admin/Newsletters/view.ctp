<?= $this->element('header',['title' => 'View','menus' => [ '<i class="fa fa-list"></i><p>List </p>' => ['action' => 'index'], '<i class="fa fa-plus"></i><p>Add</p>' => ['action' => 'add'], '<i class="fa fa-edit"></i><p>Edit</p>' => ['action' => 'edit', $newsletter->id]]]) ?>

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
                <?= __('Newsletter') ?>
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
                  <th scope="row"><?= __('Subject') ?></th>
                  <td><?= h($newsletter->subject) ?></td>
                </tr>
                                                                <tr>
                  <th scope="row"><?= __('Language') ?></th>
                  <td><?= h($newsletter->language) ?></td>
                </tr>
                                                                <tr>
                  <th scope="row"><?= __('Template') ?></th>
                  <td><?= $newsletter->has('template') ? $this->Html->link($newsletter->template->name, ['controller' => 'Templates', 'action' => 'view', $newsletter->template->id]) : '' ?></td>
                </tr>
                                                                                                                <tr>
                  <th scope="row"><?= __('Id') ?></th>
                  <td><?= $this->Number->format($newsletter->id) ?></td>
                </tr>
                                                                              </tbody>
            </table>

                                    <div class="row">
               <div class="col-sm-12">
                  <h4><?= __('Header') ?></h4>
                  <?= $this->Text->autoParagraph(h($newsletter->header)); ?>
               </div>
            </div>
                        <div class="row">
               <div class="col-sm-12">
                  <h4><?= __('Body') ?></h4>
                  <?= $this->Text->autoParagraph(h($newsletter->body)); ?>
               </div>
            </div>
                        

            <hr/>
            <div class="text-center" style="margin-top: 20px;">
              <div class="btn-group">
                <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info btn-fill']) ?>
                <?= $this->Html->link(__('Edit Newsletter'), ['action' => 'edit', $newsletter->id], ['class'=>'btn btn-info btn-sm btn-fill']) ?>
                <?= $this->Form->postLink(__('Delete Newsletter'), ['action' => 'delete', $newsletter->id], ['class'=>'btn btn-danger btn-sm btn-fill', 'confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]) ?>
              </div>
            </div>
          </div>
        </div><!-- end card view -->
      </div> <!-- end col-md-offset-3 col-md-6 -->

      <div class="col-md-12">
                <!-- LIST <?= __('Related MailingLists') ?> -->
        <?php if (!empty($newsletter->mailing_lists)): ?>
          <div class="card">

            <!-- HEADER -->
            <div class="header">
              <?= __('Related MailingLists') ?>
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
                                                        <th><?= __('Name') ?></th>
                                                        <th><?= __('Language') ?></th>
                                                        <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($newsletter->mailing_lists as $mailingLists): ?>
                            <tr>
                              <td data-title="Id"><?= h($mailingLists->id) ?></td>
                              <td data-title="Name"><?= h($mailingLists->name) ?></td>
                              <td data-title="Language"><?= h($mailingLists->language) ?></td>

                              <td data-title="actions" class="actions" class="text-right">
                                <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'MailingLists', 'action' => 'view', $mailingLists->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                                <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'MailingLists', 'action' => 'edit', $mailingLists->id], ['class' => 'btn btn-simple btn-warning btn-icon edit','escape' => false]) ?>
                                <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'MailingLists', 'action' => 'delete', $mailingLists->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $mailingLists->id)]) ?>
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
        <?php endif; ?><!-- END ASSOC <?= __('Related MailingLists') ?> -->
              </div>
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->
</div> <!-- end content -->
