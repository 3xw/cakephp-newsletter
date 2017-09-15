<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
tinymce.init({
  selector: '.wysiwyg',
  menubar: false,
  height: 500,
  plugins: [
    'advlist autolink lists link textcolor',
    'visualblocks code fullscreen',
    'code help'
  ],
  toolbar: 'link |insert | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//www.tinymce.com/css/codepen.min.css']
});
</script>
