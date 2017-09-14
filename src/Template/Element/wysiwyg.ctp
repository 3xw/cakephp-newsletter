<?=$this->Html->css('vendor/Trumbowyg/trumbowyg.min', ['block'=>'scriptBottom'])?>
<?=$this->Html->css('vendor/Trumbowyg/trumbowyg.colors.min', ['block'=>'scriptBottom'])?>

<?=$this->Html->script('Newsletter.vendor/Trumbowyg/trumbowyg.min', ['block'=>'scriptBottom'])?>
<?=$this->Html->script('vendor/Trumbowyg/plugins/colors/trumbowyg.colors.min', ['block'=>'scriptBottom'])?>
<?=$this->Html->script('vendor/Trumbowyg/plugins/noembed/trumbowyg.noembed.min', ['block'=>'scriptBottom'])?>


<?=$this->Html->scriptBlock("$('.trumbowyg').trumbowyg({
  lang:'fr',
  btnsDef: {
    // Customizables dropdowns

  },
  btns: [
    ['viewHTML'],
    ['formatting'],
    'btnGrp-semantic',
    ['link'],
    'btnGrp-justify',
    ['removeformat'],
    ['fullscreen']

  ],
  resetCss: true,
  removeformatPasted: true,
  autogrow: true

});", ['block'=>true])?>
