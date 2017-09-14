<style>

/* What it does: Remove spaces around the email design added by some email clients. */
/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
html,
body {
  margin: 0 auto !important;
  padding: 0 !important;
  height: 100% !important;
  width: 100% !important;
}

/* What it does: Stops email clients resizing small text. */
* {
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
  margin:0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
  mso-table-lspace: 0pt !important;
  mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
table {
  border-spacing: 0 !important;
  border-collapse: collapse !important;
  table-layout: fixed !important;
  margin: 0 auto !important;
}
table table table {
  table-layout: auto;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
  -ms-interpolation-mode:bicubic;
}

/* What it does: A work-around for iOS meddling in triggered links. */
*[x-apple-data-detectors] {
  color: inherit !important;
  text-decoration: none !important;
}

/* What it does: A work-around for Gmail meddling in triggered links. */
.x-gmail-data-detectors,
.x-gmail-data-detectors *,
.aBn {
  border-bottom: 0 !important;
  cursor: default !important;
}

/* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
.a6S {
  display: none !important;
  opacity: 0.01 !important;
}
/* If the above doesn't work, add a .g-img class to any image in question. */
img.g-img + div {
  display:none !important;
}

/* What it does: Prevents underlining the button text in Windows 10 */
.button-link {
  text-decoration: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size you'd like to fix */
/* Thanks to Eric Lepetit (@ericlepetitsf) for help troubleshooting */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
  .email-container {
    min-width: 375px !important;
  }
}

</style>

<!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
<!--[if gte mso 9]>
<xml>
<o:OfficeDocumentSettings>
<o:AllowPNG/>
<o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml>
<![endif]-->

<!-- Progressive Enhancements -->
<style>

/* What it does: Hover styles for buttons */
.button-td,
.button-a {
  transition: all 100ms ease-in;
}
.button-td:hover,
.button-a:hover {
  background: #555555 !important;
  border-color: #555555 !important;
}

/* Media Queries */
@media screen and (max-width: 600px) {

  .email-container {
    width: 100% !important;
    margin: auto !important;
  }

  /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
  .fluid {
    max-width: 100% !important;
    height: auto !important;
    margin-left: auto !important;
    margin-right: auto !important;
  }

  /* What it does: Forces table cells into full-width rows. */
  .stack-column,
  .stack-column-center {
    display: block !important;
    width: 100% !important;
    max-width: 100% !important;
    direction: ltr !important;
  }
  /* And center justify these ones. */
  .stack-column-center {
    text-align: center !important;
  }

  /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
  .center-on-narrow {
    text-align: center !important;
    display: block !important;
    margin-left: auto !important;
    margin-right: auto !important;
    float: none !important;
  }
  table.center-on-narrow {
    display: inline-block !important;
  }

  /* What it does: Adjust typography on small screens to improve readability */
  .email-container p {
    font-size: 17px !important;
    line-height: 22px !important;
  }

}

</style>
<?= $this->element('header',['title' => $newsletter->subject,'menus' => [ '<i class="fa fa-list"></i><p>List </p>' => ['action' => 'index'], '<i class="fa fa-plus"></i><p>Add</p>' => ['action' => 'add'], '<i class="fa fa-edit"></i><p>Edit</p>' => ['action' => 'edit', $newsletter->id]]]) ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="content email-container">
          <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">

            <?php if ( $newsletter->header): ?>
              <!-- 1 Column Text : BEGIN -->
              <tr>
                <td bgcolor="#ffffff">
                  <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="padding: 42px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                        <p>
                          <b><?= $newsletter->header?></b>
                        </p>
                        <?php if ($newsletter->body): ?>
                          <?= $newsletter->body?>
                        <?php endif; ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <!-- 1 Column Text + Button : END -->
            <?php endif; ?>


            <tr>
              <td height="40" style="font-size: 0; line-height: 0;">
                &nbsp;
              </td>
            </tr>


            <?php foreach ($newsletter->posts as $post): ?>
              <!-- Thumbnail Right, Text Left : BEGIN -->
              <tr>
                <td bgcolor="#ffffff" dir="rtl" align="right" valign="top" width="100%" style="padding: 10px;">
                  <table role="presentation" aria-hidden="true" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <?php if ($post->attachments): ?>
                        <!-- Column : BEGIN -->
                        <td width="33.33%" class="stack-column-center">
                          <table role="presentation" aria-hidden="true" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td dir="ltr" valign="top" style="padding: 0 10px;">
                                <?= $this->Attachment->image([ 'image' => $post->attachments[0]->path, 'profile' => $post->attachments[0]->profile, 'width' => '170', 'quality' => '50', 'cropratio'=>'1:1' ],['style' => 'height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;']) ?>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <!-- Column : END -->
                        <!-- Column : BEGIN -->
                        <td width="66.66%" class="stack-column-center">
                          <table role="presentation" aria-hidden="true" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td dir="ltr" valign="top" style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 10px; text-align: left;" class="center-on-narrow">
                                <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 21px; color: #333333; font-weight: bold;"><?=$post->title?></h2>
                                <p style="margin: 0 0 10px 0;"><?= $post->subtitle?></p>
                                <!-- Button : BEGIN -->
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" class="center-on-narrow" style="float:left;">
                                  <tr>
                                    <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
                                      <span style="color:#ffffff;" class="button-link">&nbsp;&nbsp;&nbsp;&nbsp;Lire&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    </td>
                                  </tr>
                                </table>
                                <!-- Button : END -->
                              </td>
                            </tr>
                          </table>
                        </td>
                        <!-- Column : END -->
                      <?php else: ?>
                        <td width="100%" class="stack-column-center">
                          <table role="presentation" aria-hidden="true" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td dir="ltr" valign="top" style="font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding: 10px; text-align: left;" class="center-on-narrow">
                                <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 21px; color: #333333; font-weight: bold;"><?=$post->title?></h2>
                                <p style="margin: 0 0 10px 0;"><?= $post->header?></p>
                                <!-- Button : BEGIN -->
                                <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" class="center-on-narrow" style="float:left;">
                                  <tr>
                                    <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
                                      <span style="color:#ffffff;" class="button-link">&nbsp;&nbsp;&nbsp;&nbsp;Lire&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    </td>
                                  </tr>
                                </table>
                                <!-- Button : END -->
                              </td>
                            </tr>
                          </table>
                        </td>
                      <?php endif; ?>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td height="40" style="font-size: 0; line-height: 0;">
                  &nbsp;
                </td>
              </tr>
            <?php endforeach; ?>

          </table>
        </div>
      </div> <!-- end col-md-offset-3 col-md-6 -->

      <div class="col-md-4">
        <div class="card">

          <!-- HEADER -->
          <div class="header">
            <?= __('Infos') ?>
          </div>

          <!-- CONTENT -->
          <div class="content">
            <div class="fresh-datatables">
              <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                <!-- TABLE -->
                <div class="row">
                  <div class="col-sm-12">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
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
                          <th scope="row"><?= __('Id') ?></th>
                          <td><?= $this->Number->format($newsletter->id) ?></td>
                        </tr>
                        <tr>
                          <th scope="row"><?= __('Created') ?></th>
                          <td><?= h($newsletter->created) ?></td>
                        </tr>
                        <tr>
                          <th scope="row"><?= __('Modified') ?></th>
                          <td><?= h($newsletter->modified) ?></td>
                        </tr>
                        <tr>
                          <th scope="row"><?= __('Sended') ?></th>
                          <td><?= h($newsletter->sended) ?></td>
                        </tr>
                        <tr>
                          <th scope="row"><?= __('Nb Sent') ?></th>
                          <td><?= h($newsletter->nb_sent) ?></td>
                        </tr>
                        <tr>
                          <th scope="row"><?= __('Mailing Lists') ?></th>
                          <td>
                            <?php foreach ($newsletter->mailing_lists as $list):?>
                              <span class="label label-primary"><?=$list->name?></span>
                            <?php endforeach; ?>
                          </td>
                        </tr>
                      </tbody>

                    </table>
                    <div class="btn-group">
                      <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info btn-fill']) ?>
                      <?= $this->Html->link(__('Edit Newsletter'), ['action' => 'edit', $newsletter->id], ['class'=>'btn btn-info btn-sm btn-fill']) ?>
                      <?= $this->Form->postLink(__('Delete Newsletter'), ['action' => 'delete', $newsletter->id], ['class'=>'btn btn-danger btn-sm btn-fill', 'confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]) ?>
                    </div>
                    <hr>
                    <br>
                    <?php echo $this->Form->create($newsletter, ['url' => ['action' => 'testSend'], 'class'=>'form-inline', 'type'=>'POST']);?>
                    <div class="form-group">
                      <?php echo $this->Form->input('to', ['div'=>false, 'class'=>false,'placeholder'=>'jane.doe@example.com', 'label'=>false, 'class'=>'form-control', 'type'=>'email']) ?>
                    </div>
                    <?php echo $this->Form->input('newsletter_id', ['type'=>'hidden', 'value'=>$newsletter->id])?>
                    <?= $this->Form->button(__('Send Test'), ['class'=>'btn btn-default']) ?>
                    <?php echo $this->Form->end()  ?>
                    <hr>
                    <?= $this->Form->postLink(__('Send').' <i class="fa fa-envelope-o"></i>', ['action' => 'send',  $newsletter->id], ['class' => 'btn  btn-danger','escape' => false,'confirm' => __('Are you sure you want to send # {0}?',  $newsletter->id)]) ?>

                  </div>
                </div>
              </div><!-- end dataTables_wrapper-->
            </div><!-- end fresh-datatables-->
          </div><!-- end content-->
        </div><!-- end card-->
      </div>
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->
</div> <!-- end content -->
