$(document).ready(function() {
  $("#sendForm").submit(function(){
    $("#sendBtn").innerHTML('Sending...');
    $('#sendBtn').prop('disabled', true);
    if (!confirm('Are you sure?')) {
      return false;
    }
  });
});
