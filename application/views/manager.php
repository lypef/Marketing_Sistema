
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script>
    function myFunction ()
    {
        //$('#myModal').modal('show');
        document.getElementById("id1").innerHTML = '<div class="fb-comments" data-href="http://localhost/index.php/All/manager" data-numposts="5" width="100%" data-width="100%"></div>';
        $('#id1').load('#id1');
        
    }
</script>
<div class="fb-comments" data-href="http://localhost/index.php/All/manager" data-numposts="5" width="100%" data-width="100%"></div>
<div name="id1" id="id1"></div>


<div class="container">
  <h2>Basic Modal Example</h2>
  <a data-toggle="modal" class="btn btn-info btn-lg" onclick="myFunction()">Open Modal</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

