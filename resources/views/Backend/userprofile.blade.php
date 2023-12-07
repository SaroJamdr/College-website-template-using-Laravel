@include('Backend.include.header')
@include('Backend.include.sidebar')
@include('Backend.include.topnav')


<h3 class="text-center">My Profile</h3>

<div class="row mx-auto">
  <div class="col-5">
    <div class="card">
      <img src="Auth::user()->image" alt="admin_profile" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title text-center">{{Auth::user()->name}}</h5>
        <p class="text-center">{{Auth::user()->email}}</p>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="bi bi-pencil-square"></i>  Edit
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel}" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form action="{{route('edit',Auth::user()->id)}}" method="post">
                            @method('patch')
                            @csrf
                  <div class="form-floating">
                    <input type="text" name="name" class="form-control my-2" id="floatingPassword" value="{{Auth::user()->name}}">
                    <label for="name" >Name</label>
                  </div>
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control my-2" id="floatingInput"  value="{{Auth::user()->email}}">
                    <label for="floatingInput">Email address</label>
                  </div>

                  <div class="form-floating">
                    <input type="hidden" name="oldimage" value="{{Auth::user()->image}}" class="form-control my-2">
                    <img src="{{asset('images/'.Auth::user()->image)}}" height="50px" alt="">
                  </div>

                  <div class="mb-3">
                        <label class="form-label" for="disabledTextInput">Upload New Image</label>
                        <input type="file" name="image" value="{{Auth::user()->image}}" class="form-control" id="disabledTextInput">
                      </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>




      </div>
    </div>
  </div>
</div>


@include('Backend.include.footer')