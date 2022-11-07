<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-grid.min.css')}}">
</head>
<body>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white"><center> LARAVEL 9 CRUD </center></div>
        </div>     
    </div>
    <div class="container py-3">
        <div class="d-flex justify-content between">
            <div class="h5">  STUDENT  DATABASE  </div>
            <div>
                <a href="{{route('employees.index')}}" class=""btn btn-primary> <center> <button> Back </button> </center></a>
            </div>
            </div>
    </div>
    

  <form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="card boarder-0 shadow-lg">
            <div class="card-body">
            <div class="mb-3">

            <div class="form-group">
                    <label>
                    Firstname:
                    </label>
                    <input type="firstname" name="firstname" id="firstname"  placeholder="Enter firstname"required class="form-control">
                    <small id="firstname" class="form-text
                         text-muted invalid-feedback"> 
                    </small>
                   </div>



                <div class="form-group">
                    <label for="user">
                        Lastname:
                    </label>
                    <input type="lastname" name="lastname" id="lastname"  placeholder="Enter lastname"required class="form-control">
                    <small id="lastnamevalid" class="form-text
                         text-muted invalid-feedback">
                    </small>
                </div>
            
                <div class="form-group">
                    <label for="user">
                        Email:
                    </label>
                    <input type="email" name="email" id="email" required class="form-control" placeholder="Enter email">
                    <small id="emailvalid" class="form-text
                         text-muted invalid-feedback">
                    </small>
                </div>

                <div class="form-group">
                    <label for="user">
                        Address:
                    </label>
                    <textarea name="address" id="address" cols="3" rows="2" required class="form-control" placeholder="Enter address"></textarea>
                    <small id="addressvalid" class="form-text
                         text-muted invalid-feedback">
                    </small>
                </div>

            <label for="user"> Gender:</label>
             <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="male" id="male">
                <label class="form-check-label" for="male">male</label>
             </div>
             <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="female" id="female">
                <label class="form-check-label" for="female">female</label>
             </div>

 
                <div class="form-group">
                    <label for="user"> Branch:</label>
                    <select name="branch" id="branch" required>
                        <option value="CSE">CSE</option>
                        <option value="ME">ME</option>
                         <option value="MBA">MBA</option>  
                     </select>
                     @error('branch')
                    <p class=valid-feedback>{{$message}}</p>
                     @enderror
                </div>
               

           <div>
            <label> Hobby</label>
            <div class="form-check form-check-inline" reuired>
              <input class="form-check-input" type="checkbox" name="hobby" value="sports" id="sport">
              <label  class="form-check-label" for="sport">Sports</label>
              <input class="form-check-input"type="checkbox" name="hobby" value="music" id="music">
              <label  class="form-check-label"for="music">Music</label>
              <input class="form-check-input" type="checkbox" name="hobby" value="reading" id="read">
              <label class="form-check-label" for="read">Reading</label>
                @error('hobby')
                    <p class=valid-feedback>{{$message}}</p>
                 @enderror      
           </div>

         <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image" required>
                <img src="{{ asset('images/') }}" width="50" height="50" class="img-thumbnail" />
                </div>
                 @error('image')
                    <p class=valid-feedback>{{$message}}</p>
                 @enderror    
            </div>      
            
                <button class="btn btn -primary" mt-3>save student</button>
    
</form>

</div>

<script type="text/javascript">

         jQuery(document).ready(function(){
            jQuery('#submit').click(function(e){
               e.preventDefault();
               jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/form') }}",
                  method: 'post',
                  data: {
                     firstname: jQuery('#firstname').val(),
                     lastname: jQuery('#lastname').val(),
                     email: jQuery('#email').val(),
                     address: jQuery('#address').val(),
                     gender: jQuery('#gender').val(),
                     hobby: jQuery('#hobby').val(),
                     branch: jQuery('#branch').val(),
                     image: jQuery('#image').val(),
                     
                  },
                  success: function(data){
                  		jQuery.each(data.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<p>'+value+'</p>');
                  		});
                	}
                    
                  });
               });
            });
</script>

</body>  
</html>   
                