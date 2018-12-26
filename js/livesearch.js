<script>
  $(document).ready(function(){
    $('#searchbar').keyup(function(){
      $('#result').html('');
      var searchField = $('#searchbar').val();
      var expression = new RegExp(searchField, "i");
      $.getJSON('data.json',function(data){
        $.each(data,function(key, value){
          if(value.name.search(expression) != -1){
            $('#result').append("<a href='search.php?req="+value.name+"'><li style='text-align:left; border:none;' class = 'list-group-item'><h4>"+value.name+"</h4></li></a>");
          }
        });
      })
    });
  });
</script>