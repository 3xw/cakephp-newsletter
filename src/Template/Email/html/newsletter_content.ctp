<!-- Email Body : BEGIN -->
<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
  <?php if ($newsletter->header): ?>
    <!-- 1 Column Text : BEGIN -->
    <tr>
      <td bgcolor="#ffffff">
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
          <tr>
            <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
              <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 23px; color: #333333; font-weight: bold;">
                <?= $newsletter->header?>
              </h2>
              <?php if ($newsletter->body): ?>
                <?= $newsletter->body?>
              <?php endif; ?>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <!-- 1 Column Text + Button : END -->
  <?php endif;?>

  <!-- Clear Spacer : BEGIN -->
  <tr>
    <td height="40" style="font-size: 0; line-height: 0;">
      &nbsp;
    </td>
  </tr>
  <?php foreach ($newsletter->posts as $post): ?>
    <!-- Thumbnail Right, Text Left : BEGIN -->
    <tr>
      <td bgcolor="#ffffff" dir="rtl" align="center" valign="top" width="100%" style="padding: 10px;">
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
                      <p style="margin: 0 0 10px 0;"><?= $post->header?></p>
                      <!-- Button : BEGIN -->
                      <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" class="center-on-narrow" style="float:left;">
                        <tr>
                          <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
                            <a href="<?= "https://bonpourlatete.com/".$post->category->slug."/".$post->slug ?>" style="background:  #222222; border: 15px solid #222222; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
                              <span style="color:#ffffff;" class="button-link">&nbsp;&nbsp;&nbsp;&nbsp;Lire&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </a>
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
                            <a href="<?= "https://bonpourlatete.com/".$post->category->slug."/".$post->slug ?>" style="background:  #222222; border: 15px solid #222222; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
                              <span style="color:#ffffff;" class="button-link">&nbsp;&nbsp;&nbsp;&nbsp;Lire&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </a>
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


  <!-- Thumbnail Right, Text Left : END -->

</table>
<!-- Email Body : END -->
