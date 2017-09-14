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
                <?= h($mailingList->name) ?>
              </h4>
            </p>
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row"><?= __('Language') ?></th>
                  <td><?= h($mailingList->language) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Id') ?></th>
                  <td><?= $this->Number->format($mailingList->id) ?></td>
                </tr>
                <tr>
                  <th scope="row"><?= __('Nb Contacts') ?></th>
                  <td><?=count($mailingList->contacts) ?></td>
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
        <!-- LIST <?= __('Related Contacts') ?> -->
        <?php if (!empty($mailingList->contacts)): ?>
          <div class="card">

            <!-- HEADER -->
            <div class="header">
              <?= __('Related Contacts') ?>
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
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Subscribe') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($mailingList->contacts as $contacts): ?>
                            <tr>
                              <td data-title="Id"><?= h($contacts->id) ?></td>
                              <td data-title="Created"><?= h($contacts->created) ?></td>
                              <td data-title="Modified"><?= h($contacts->modified) ?></td>
                              <td data-title="Email"><?= h($contacts->email) ?></td>
                              <td data-title="Subscribe"><?= h($contacts->subscribe) ?></td>
                              <td data-title="actions" class="actions" class="text-right">
                                <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Contacts', 'action' => 'view', $contacts->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                                <?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Contacts', 'action' => 'edit', $contacts->id], ['class' => 'btn btn-simple btn-warning btn-icon edit','escape' => false]) ?>
                                <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Contacts', 'action' => 'delete', $contacts->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $contacts->id)]) ?>
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
        <?php endif; ?><!-- END ASSOC <?= __('Related Contacts') ?> -->
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
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Sended') ?></th>
                            <th><?= __('Subject') ?></th>
                            <th><?= __('Language') ?></th>
                            <th><?= __('Nb Sent') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($mailingList->newsletters as $newsletters): ?>
                            <tr>
                              <td data-title="Id"><?= h($newsletters->id) ?></td>
                              <td data-title="Created"><?= h($newsletters->created) ?></td>
                              <td data-title="Modified"><?= h($newsletters->modified) ?></td>
                              <td data-title="Sended"><?= h($newsletters->sended) ?></td>
                              <td data-title="Subject"><?= h($newsletters->subject) ?></td>
                              <td data-title="Language"><?= h($newsletters->language) ?></td>

                              <td data-title="Nb Sent"><?= h($newsletters->nb_sent) ?></td>

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
