<?= $this->element('header',['title' => 'View','menus' => [ '<i class="fa fa-list"></i><p>List </p>' => ['action' => 'index'], '<i class="fa fa-plus"></i><p>Add</p>' => ['action' => 'add'], '<i class="fa fa-edit"></i><p>Edit</p>' => ['action' => 'edit', $contact->id]]]) ?>

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
                <?= __('Contact') ?>
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
                  <th scope="row"><?= __('Email') ?></th>
                  <td><?= h($contact->email) ?></td>
                </tr>
                                                                <tr>
                  <th scope="row"><?= __('Mailing List') ?></th>
                  <td><?= $contact->has('mailing_list') ? $this->Html->link($contact->mailing_list->name, ['controller' => 'MailingLists', 'action' => 'view', $contact->mailing_list->id]) : '' ?></td>
                </tr>
                                                                                                                <tr>
                  <th scope="row"><?= __('Id') ?></th>
                  <td><?= $this->Number->format($contact->id) ?></td>
                </tr>
                                                                                                <tr>
                  <th scope="row"><?= __('Subscribe') ?></th>
                  <td><?= $contact->subscribe ? __('Yes') : __('No'); ?></td>
                </tr>
                                              </tbody>
            </table>

            

            <hr/>
            <div class="text-center" style="margin-top: 20px;">
              <div class="btn-group">
                <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info btn-fill']) ?>
                <?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id], ['class'=>'btn btn-info btn-sm btn-fill']) ?>
                <?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->id], ['class'=>'btn btn-danger btn-sm btn-fill', 'confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
              </div>
            </div>
          </div>
        </div><!-- end card view -->
      </div> <!-- end col-md-offset-3 col-md-6 -->

      <div class="col-md-12">
              </div>
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->
</div> <!-- end content -->
