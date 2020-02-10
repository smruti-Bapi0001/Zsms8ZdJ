  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Laravel Test {{ date('Y') }}. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/js/app.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){ 
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    var html;
      $("#vehicleMake").change(function(){
        html = "";
        $("#vehicleModel").html(html);        
        $.ajax({
           type:'GET',
           url: "{{url(url("vehicle-models"))}}"+"/"+$("#vehicleMake").val(),
           success:function(data){
             console.log(data);
            //  $(data).each(function(index, value) {
            //   console.log("index ="+ index + "key = "+ value );
            // });
            $.each(data, function(key, value) {
              $.each(value, function(model, id){
                 html += "<option value =" + id +">" + model + "</option>"; 
              });
            });
            $("#vehicleModel").html(html);
                         
           },
           error :function(data){
             console.log(data);
           }
        });
      });
      $(".submitButton").click(function(e){
        e.preventDefault();
        $.ajax({
           type:'POST',
           url: "{{url("storeServiceRequest")}}",
           data: $('#submitFrm').serialize(),
           success:function(data){
             $("#flashShow").slideDown(function() {
              setTimeout(function() {
                  $("#flashShow").slideUp();
                  }, 5000);
                  window.location.href = '{{url('/')}}';
              });
              
           },
           error :function(data){
            $("#flashShowError").slideDown(function() {
              setTimeout(function() {
                  $("#flashShowError").slideUp();
                  }, 5000);                  
              });
           }
        });
      });
      $(".editButton").click(function(e){
        e.preventDefault();
        var serviceId = $('#serviceId').val();
        $.ajax({
           type:'PUT',
           url: "{{url(url("editServiceRequest"))}}" + "/" + serviceId,
           data: $('#submitFrm').serialize(),
           success:function(data){             
            $("#flashShow").slideDown(function() {
              setTimeout(function() {
                  $("#flashShow").slideUp();
                  }, 5000);
                  window.location.href = '{{url('/')}}';
              });
              
           },
           error :function(data){
             console.log(data);
           }
        });
      });
      $(".deleteRequest").click(function(e){
        e.preventDefault();
        confirm("Are you sure to delete the request!");
        var serviceId = $(this).attr("data-id");        
        $.ajax({
          type : "PUT",
           url:  "/delete/" + serviceId,           
           success:function(data){
            location.reload();             
           },
           error :function(data){
             console.log(data);
           }
        });
      });

    });
  </script>
  @stack('scripts')