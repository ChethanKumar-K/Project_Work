function fetchSubject(id) {
  $('#subject').html("");
  $.ajax(
    {
      type:'post',
      url:'ajaxdata.php',
      data:{ semester : id},
      success : function(data){
        $('#subject').html(data);
      }
    }
  )
}