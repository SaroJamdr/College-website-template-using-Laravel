@include('Backend.include.header')
@include('Backend.include.sidebar')
@include('Backend.include.topnav')
<div class="row">
  <div class="col-6">
    <h3>User list</h3>
  </div>
  <div class="col-6">
    <div class="text-right pt-3">

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-circle"></i>
       Add users
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
            {{Form::open(['route' => 'store.slider','method'=>'Post','enctype'=>'multipart/form-data']) }} 
                
                <div class="form-floating">
                  <input type="file" name="image" class="form-control my-2">
                  <label for="image">Image</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="h1" class="form-control my-2" id="floatingPassword">
                    <label for="h1" >Heading 1</label>
                </div>
              
                <div class="form-floating">
                    <input type="text" name="h2" class="form-control my-2" id="floatingPassword">
                    <label for="h1" >Heading 2</label>
                </div>
              
                <div class="form-floating">
                    <input type="text" name="h3" class="form-control my-2" id="floatingPassword">
                    <label for="h1" >Heading 3</label>
                </div>
              
                <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Submit</button>
                </div>
            {!! Form::close() !!}

            </div>
           
          </div>
        </div>
      </div>


    </div>

  </div>
</div>
<hr>




<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2>Fixed Header Example <small>Users</small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Settings 1</a>
            <a class="dropdown-item" href="#">Settings 2</a>
          </div>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box table-responsive">
            <p class="text-muted font-13 m-b-30">
              This example shows FixedHeader being styling by the Bootstrap CSS framework.
            </p>
            <table id="datatable-fixed-header" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Sn</th>
                  <th>Image</th>
                  <th>Heading 1</th>
                  <th>Heading 1</th>
                  <th>Heading 1</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $i = 1;
                ?>

                @foreach ($slider as $slide)
            
                <tr>
                    <td>{{$i++}}</td>
                    <td>
                        <img src="{{asset('public/images/'.$slide->image)}}" height="50px" width="50px" alt="">
                    </td>
                    <td>{{$slide->h1}}</td>
                    <td>{{$slide->h2}}</td>
                    <td>{{$slide->h3}}</td>
                    <td>
                        <a href="{{route('delete.slider',$slide->id)}}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>

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
  
                    {{-- {{Form::open(['route' => 'edit.slider' ,'method'=>'Post','enctype'=>'multipart/form-data']) }}  --}}
                 <form action="{{route('edit.slider',$slider->id)}}" method="patch" enctype="multipart/form-data">
                  @csrf
                  {{-- {{Form::open(['route' => ['edit.slider', $slider->slide],'method'=>'PATCH','enctype'=>'multipart/form-data'])}} --}}
                  
                  
                    <div class="form-floating">
                      <input type="file" name="image" class="form-control my-2"  value="{{old('image')}}">
                      <label for="image">Image</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="h1" class="form-control my-2" id="floatingPassword" value="{{old('h1')}}">
                        <label for="h1" >Heading 1</label>
                    </div>
                  
                    <div class="form-floating">
                        <input type="text" name="h2" class="form-control my-2" id="floatingPassword" value="{{old('h2')}}">
                        <label for="h1" >Heading 2</label>
                    </div>
                  
                    <div class="form-floating">
                        <input type="text" name="h3" class="form-control my-2" id="floatingPassword" value="{{old('h3')}}">
                        <label for="h1" >Heading 3</label>
                    </div>
                  
                    <div class="modal-footer">
                          <button type="submit" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Submit</button>
                    </div>
                {{-- {!! Form::close() !!} --}}
                  </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
  

                      </td>
                </tr>

                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('Backend.include.footer')