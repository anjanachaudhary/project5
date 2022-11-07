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
    <title>LARAVEL 9 CRUD</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-grid.min.css')}}">
</head>
<body>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white"><head><center>LARAVEL 9 CRUD </center></head></div>
        </div>     
    </div>
    <div class="container py-3">
        <div class="d-flex justify-content between">
            <div class="h5"> STUDENT DATABASE </div>
            <div>
            <div>
                <a href="{{route('employees.create')}}" class=""btn btn-primary><button>CREATE</button> </a>
            </div>
            </div>
        </div>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success')}}
    </div>
    @endif


        <div class="card boarder-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>email</th>
                        <th>address</th>
                        <th>gender</th>
                        <th>branch</th>
                        <th>hobby</th>
                        <th>image</th>
                        <th>action</th>
                    </tr>
                    </thead>
                   <tr>
                   
@foreach($employee as $row)
<tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->firstname }}</td>
        <td>{{ $row->lastname }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->address }}</td>
        <td>{{ $row->gender }}</td>
        <td>{{ $row->branch }}</td>
        <td>{{ $row->hobby }}</td>
        <td>
            @if($row->image != '' && file_exists(public_path().'/uploads/employees/'. $row->image))
            <img src="{{url('uploads/employees/'.$row->image) }}" alt="" width="50" height="50" class="rounde -circle">
            @else
            <img src="{{ asset('images/' .  $row->image) }}" width="50" height="50" class="img-thumbnail" />
            @endif
           
        

    </td>
        
<td>     
  <a href="{{ route('employees.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>            
    <form method="POST" action="{{ route('employees.destroy', [$row->id]) }}">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit">Delete</button>
   </form>     
</td>
        
</tr>

@endforeach

    </td>
    </tr>
                       
    </table>

    </div>
    </div>
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


