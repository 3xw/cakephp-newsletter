<?= $this->element('header',['title' => __('Index of Mailing Lists'),'form' => true, 'menus' => [ '<i class="fa fa-plus"></i><p>'.__('Add').'</p>' => ['action' => 'add']]]) ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">

        <!-- LIST ELEMENT -->
        <div class="card">

          <!-- HEADER -->
          <div class="header">
              <h4 class="title">List of <?= __('Mailing Lists') ?></h4>
              <p class="category">
                <?=
                $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')])
                ?>
            </p>
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
                                                    <th><?= $this->Paginator->sort('id') ?></th>
                                                    <th><?= $this->Paginator->sort('name') ?></th>
                                                    <th><?= $this->Paginator->sort('language') ?></th>
                                                    <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($mailingLists as $mailingList): ?>
                          <tr>
                                                      <td data-title="id"><?= $this->Number->format($mailingList->id) ?></td>
                                                            <td data-title="name"><?= h($mailingList->name) ?></td>
                                                            <td data-title="language"><?= h($mailingList->language) ?></td>
                                                              <td data-title="actions" class="actions" class="text-right">
                              <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $mailingList->id],['class' => 'btn btn-simple btn-info btn-icon edit','escape' => false]) ?>
                              <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $mailingList->id], ['class' => 'btn btn-simple btn-warning btn-icon edit','escape' => false]) ?>
                              <?= $this->Form->postLink('<i class="fa fa-times"></i>', ['action' => 'delete', $mailingList->id], ['class' => 'btn btn-simple btn-danger btn-icon remove','escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $mailingList->id)]) ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <!-- PAGINATION -->
                <div class="row">
                  <div class="col-sm-5">
                    <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite">
                      <?=
                      $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')])
                      ?>
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
                      <ul class="pagination">
                        <?= $this->Paginator->prev(__('Prev')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('Next')) ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div><!-- end dataTables_wrapper-->
            </div><!-- end fresh-datatables-->
          </div><!-- end content-->
        </div><!-- end card-->
      </div><!-- end col-xs-12-->
    </div><!-- end row-->
  </div><!-- end container-fluid-->
</div><!-- end content-->
