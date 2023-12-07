@include('Backend.include.header')
@include('Backend.include.sidebar')
@include('Backend.include.topnav')


    <div class="tect-center">
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <div class="card p-3">
                        <form action="{{route('chpass',Auth::user()->id)}}" method="post">
                            @method('patch')
                            @csrf

                           
                        <div>
                            <label>Old password</label>
                            <input type="password" name="old_pass" class="form-control">
                        </div>
                        <div>
                            <label>New password</label>
                            <input type="password" name="new_pass" class="form-control">
                        </div>
                        <div>
                            <label>Confirm password</label>
                            <input type="password" name="con_pass" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-sm btn-primary">Update Password</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



@include('Backend.include.footer')
