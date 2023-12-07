@include('Backend.include.header')
@include('Backend.include.sidebar')
@include('Backend.include.topnav')



<h4 class="text-center">Admin List</h4>


<div>
    
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="bi bi-plus-circle"></i> Add Admin
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                {{Form::open(['route' => 'admin.store','method'=>'Post','enctype'=>'multipart/form-data']) }} 

                  <div class="form-floating">
                    <input type="text" name="name" class="form-control my-2" id="floatingPassword">
                    <label for="name" >Name</label>
                  </div>
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control my-2" id="floatingInput">
                    <label for="floatingInput">Email address</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control my-2" id="floatingInput">
                    <label for="floatingInput">Password</label>
                  </div>

                  <div class="form-floating">
                    <input type="file" name="image" class="form-control my-2">
                    <label for="image">Image</label>
                  </div>


                  {{-- <div class="form-floating">
                    <input type="password" name="c_password" class="form-control my-2" id="floatingInput">
                    <label for="floatingInput">Confirm Password</label>
                  </div> --}}

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Submit</button>
                  </div>
                {!! Form::close() !!}
              </div>
          </div>
        </div>
    
</div>
<hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>


  <tbody>

    <?php
    $i = 1;
    ?>

    @foreach ($admin as $ad)
  
    
    <tr>
      <td scope="row">{{$i++}}</td>
      <td>{{$ad->name}}</td>
      <td>
        <img src="{{asset('public/images/'.$ad->image)}}" height="50px" width="50px" alt="">
      </td>
      <td>{{$ad->email}}</td>
      <td>{{$ad->password}}</td>
     <td>
        <a href="{{route('admin.delete',$ad->id)}}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>


@include('Backend.include.footer')



 
