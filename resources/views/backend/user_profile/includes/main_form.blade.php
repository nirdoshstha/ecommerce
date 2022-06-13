<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            @include('backend.includes.flash_message')
        </div>
    </div>
    <div class="row">
        <div class="col-4 col-sm-4">
            <table class="table table-striped">
                <tbody>
                    <tr>
                       <div class="text-center mb-2"><img src="{{asset($img_path.$data['row']->image)}}" alt="Name" class="img-fluid img-circle bg-info p-1" width="150"></div>
                    </tr>
                <tr>
                    <th>Name</th>
                    <td> {{$data['row']->user->name}}</td>
                </tr>
                <tr>
                    <th>Email </th>
                    <td>{{$data['row']->user->email}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$data['row']->phone}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$data['row']->address}}</td>
                </tr>
                <tr>
                    <th>Short Biodata</th>
                    <td>{{$data['row']->short_bio}}</td>
                </tr>
                <tr>
                    <th>User Role</th>
                    <td>
                        <button class="btn btn-success btn-sm">Admin</button>
                    </td>
                </tr>

            </tbody></table>
        </div>


        <div class="col-8 col-sm-8">
          <div class="card card-light card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Basic Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Change Password</a>
                </li>

              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    @include($view_path.'includes.basic_info')
                </div>


                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    @include($view_path.'includes.change_password')
                </div>

              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div>
</div>
