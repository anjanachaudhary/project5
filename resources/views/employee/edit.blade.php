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
            <div class="h4 text-white"><center> LARAVEL 9 CRUD </center></div>
        </div>     
    </div>
    <div class="container py-3">
        <div class="d-flex justify-content between">
            <div class="h5">  STUDENT EDIT </div>
            <div>
                <a href="{{route('employees.index')}}" class=""btn btn-primary>  <center>       Back   </center>  </a>
            </div>     
        </div>

<form action="{{route('employees.update',$employee->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('put')

<div class="card boarder-0 shadow-lg">
            <div class="card-body">
            <div class="mb-3">

            <div class="form-group">
                    <label>
                    Firstname:
                    </label>
                    <input type="firstname" name="firstname" id="firstname"  placeholder="Enter firstname"required class="form-control @error('firstname')is invalid @enderror" value="{{old('firstname',$employee->firstname)}}" >
                    <small id="firstname" class="form-text
                         text-muted invalid-feedback">
                     @error('firstname')
                    <p class=valid-feedback>{{$message}}</p>
                    @enderror 
                    </small>
                   </div>

                <div class="form-group">
                    <label for="user">
                        Lastname:
                    </label>
                    <input type="lastname" name="lastname" id="lastname"  placeholder="Enter lastname"required class="form-control
                    @error('lastname')is invalid @enderror" value="{{old('lastname',$employee->lastname)}}">
                    <small id="lastnamevalid" class="form-text
                         text-muted invalid-feedback">
                     @error('lastname')
                    <p class=valid-feedback>{{$message}}</p>
                    @enderror
                    </small>
                </div>
            
                <div class="form-group">
                    <label for="user">
                        Email:
                    </label>
                    <input type="email" name="email" id="email"  placeholder="Enter email"  required class="form-control
                    @error('email')is invalid @enderror"value="{{old('email',$employee->email)}}">
                    <small id="emailvalid" class="form-text
                         text-muted invalid-feedback">
                    </small>
                </div>

                <div class="form-group">
                   


                 <div>
                    <label for="user">
                        Address:
                    </label>
                   <input type="textarea" name ="address" cols="4" rows="4" placeholder="enter address"required class="form-control
                     @error('address')is invalid @enderror" value="{{old('address',$employee->address)}}">
                     <small id="addressvalid" class="form-text
                         text-muted invalid-feedback">
                     @error('address')
                    <p class=valid-feedback>{{$message}}</p>
                    @enderror  
                    </small>
                </div>

            <label for="user"> Gender:</label>
             <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="male" {{($employee->gender=="male")? "checked" : ""}} id="male">
                <label class="form-check-label" for="male">male</label>
             </div>
             <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="female" {{($employee->gender=="female")? "checked" : ""}} id="female">
                <label class="form-check-label" for="female">female</label>
             </div>

            <div class="form-group">
                    <label for="user"> Branch:</label>
                     <select name="branch" id="branch"  value ="ME" {{($employee->branch=="ME")? 'selected' : ""}}>
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
             <div class="form-check form-check-inline">
              <input  class="form-check-input" type="checkbox" name="hobby" value="sports" {{($employee->hobby=="sports")? "checked" : ""}} id="sport">
              <label class="form-check-label" for="sport">Sports</label>
              <input  class="form-check-input" type="checkbox" name="hobby" value="music" {{($employee->hobby=="music")? "checked" : ""}} id="music">
              <label class="form-check-label" for="music">Music</label>
              <input class="form-check-input" type="checkbox" name="hobby" value="reading" {{($employee->hobby=="reading")? "checked" : ""}} id="read">
              <label class="form-check-label"for="read">Reading</label>
                @error('hobby')
                    <p class=valid-feedback>{{$message}}</p>
                 @enderror
           </div>

            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" placeholder="image" class="form-control
                    @error('image')is invalid @enderror"value="{{old('image',$employee->image)}}">
                <img src="/images/20221103060352.gif"{{ $employee->image }} "width="100" height="100">
                 @error('image')
                    <p class=valid-feedback>{{$message}}</p>
                 @enderror            
            </div>

             <button class="btn btn -primary" mt-3>update student</button>
    
</form>
</div>
</body>  
</html>   