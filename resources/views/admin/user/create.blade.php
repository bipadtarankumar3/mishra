@extends('adminLayouts.home')
@section('content')

<div class="container-fluid">

    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Create User</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="index.html">User</a></li>
                  <li class="breadcrumb-item" aria-current="page">Create User</li>
                </ol>
              </nav>
            </div>
            <div class="col-3">
              <div class="text-center mb-n5">  
                <img src="{{asset('adminAssets/images/breadcrumb/ChatBc.png')}}" alt="" class="img-fluid mb-n4">
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- basic table -->
    <div class="row">
        <div class="col-md-12">
          
          <div class="card w-100">
            <div class="card-header">
              <h5>Create User </h5>
            </div>
            <form method="POST" action="{{URL::to('admin/add_sub_user')}}"  enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" @if (isset($user)) value="{{$user->id}}"  @endif>
              <input type="hidden" name="customer_password" @if (isset($user)) value="changed"  @endif>
              

              <div class="card-body border-top">
                <h5>Personal Info</h5>
                <div class="row">
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="name_url" class="control-label col-form-label">User Name <span style="color: red;">*</span></label>
                      <input type="text" name="name_url" onkeyup="check_username(this.value)"  @if (isset($user)) value="{{$user->name_url}}"  @endif class="form-control" id="name_url" placeholder="User Name Here" required>
                      <span class="user_name_url"></span>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="inputname" class="control-label col-form-label">Business Name  <span style="color: red;">*</span></label>
                      <input type="text" name="name"  @if (isset($user)) value="{{$user->name}}"  @endif class="form-control" id="anme" placeholder="Name Here" required>
                    </div>
                  </div>
                  
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="inputcontact" class="control-label col-form-label">Phone</label>
                      <input type="text" name="phone" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required title="Enter Valid mobile number ex.9811111111" @if (isset($user)) value="{{$user->phone}}"  @endif class="form-control" id="phone" placeholder="Phone Here">
                    </div>
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                      <label for="inputlname" class="control-label col-form-label">Email  <span style="color: red;">*</span></label>
                      <input type="email" name="email"  @if (isset($user)) value="{{$user->email}}"  @endif class="form-control" id="inputEmail3" placeholder="Email Here" required>
                    </div>
                  </div>
                  
                  <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                      <label for="inputEmail3" class="control-label col-form-label">Password</label>
                      <input type="password" name="password"  @if (!isset($user)) required @endif class="form-control" id="inputEmail3" placeholder="Password Here" >
                    </div>
                  </div>
                  {{-- <div class="col-sm-12 col-md-3">
                    <div class="mb-3">
                      <label for="inputEmail3" class="control-label col-form-label">Expiry Date <span style="color: red;">*</span></label>
                      <input type="date" name="expiry_date"  @if (isset($user)) value="{{$user->expiry_date}}"  @endif class="form-control" id="date" placeholder="Expiry Date Here" required>
                    </div>
                  </div> --}}
                </div>
                <div class="row">
                  

                  <div class="col-sm-12 col-md-12">
                    <div class="mb-3">
                      <label for="inputcontact" class="control-label col-form-label">Notes</label>
                      <input type="text" name="note"  @if (isset($user)) value="{{$user->note}}"  @endif class="form-control" id="note" placeholder="Notes Here">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="inputEmail3" class="control-label col-form-label">Logo</label>
                      <input type="file" name="file"  class="form-control" id="file" placeholder="Notes Here">
                        @if (isset($user)) 
                          <img src="{{$user->logo}}" width="100px" alt="" style="margin-top: 10px">
                        @endif 
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="wp_key" class="control-label col-form-label">WP Key</label>
                      <input type="text" name="wp_key"  class="form-control" id="wp_key"  @if (isset($user)) value="{{$user->wp_key}}"  @endif  placeholder="Key Here">
                       
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="template_category_id" class="control-label col-form-label">Category</label>
                      <select name="template_category_id" id="template_category_id" class="form-control" onchange="update_category_id('category_id')">
                        <option value="">Select Category</option>
                        @foreach ($TemplateCategory as $item)
                            <option value="{{$item->id}}" @if(isset($user) && $item->id == $user->template_category_id) selected @endif>{{$item->category_name}}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="inputcontact" class="control-label col-form-label">Status <span style="color: red;">*</span></label>
                      <select name="status" id=""  class="col-3 control-label col-form-label form-control" required>
                        <option value="active" style="background-color: green;color:white" @if (isset($user)) @if($user->status =='active' ) selected @endif  @endif>Active</option>
                        <option value="inactive"  style="background-color: red;color:white"  @if (isset($user)) @if($user->status =='inactive' ) selected @endif  @endif>Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="action-form">
                  <div class="mb-3 mb-0 text-start">
                    <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light submit_button">
                      Create
                    </button>
                    <a href="{{URL::to('admin/sub_user_list')}}">
                      <button type="button" class="btn btn-dark rounded-pill px-4 waves-effect waves-light">
                        Cancel
                      </button>
                    </a>
                  </div>
                </div>

              </div>
              
            </form>
          </div>

        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
      $('#name_url').keyup(function() {
        this.value = this.value.replace(/\s/g,'');
      });

      function check_username(name) {
          $.ajax({
              type: "GET",
              url: "{{URL::to('admin/user_name_checking')}}",// where you wanna post
              data: {
                  'name':name
              },
              error: function(jqXHR, textStatus, errorMessage) {
                  console.log(errorMessage); // Optional
              },
              success: function(data) {

                if (data == 'exist') {
                  $('.submit_button').attr('disabled','disabled');
                  $('.user_name_url').html('<p style="color:red">Already Exist</p>');
                } else {
                  $('.user_name_url').html('');
                  $('.submit_button').removeAttr('disabled');
                }

              } 
          });
      }
    </script>
@endsection