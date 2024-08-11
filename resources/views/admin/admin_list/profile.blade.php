@extends('adminLayouts.home')
@section('content')

<div class="container-fluid">

    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">Update Setting</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="index.html">Setting</a></li>
                  <li class="breadcrumb-item" aria-current="page">Update Setting</li>
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
              <h5>Update Profile </h5>
            </div>
            <form method="POST" action="{{URL::to('admin/add_sub_user')}}"  enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" @if (isset($user)) value="{{$user->id}}"  @endif>
              

              <div class="card-body border-top">
                <h5>Personal Info</h5>
                <div class="row">

                  @if (Auth::user()->type == 'user')
                    <div class="col-sm-12 col-md-4">
                      <div class="mb-3">
                        <label for="name_url" class="control-label col-form-label">User Name</label>
                        <input type="text" name="name_url"  readonly @if (isset($user)) value="{{$user->name_url}}"  @endif class="form-control" id="name_url" placeholder="User Name Here" @required(true)>
                      </div>
                    </div>  
                  @endif
                  


                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="inputname" class="control-label col-form-label"> Name </label>
                      <input type="text" name="name"  @if (isset($user)) value="{{$user->name}}"  @endif class="form-control" id="anme" placeholder=" Name Here" @required(true)>
                    </div>
                  </div>
                  
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="inputcontact" class="control-label col-form-label">Phone</label>
                      <input type="text" name="phone"    pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required title="Enter Valid mobile number ex.9811111111"  @if (isset($user)) value="{{$user->phone}}"  @endif class="form-control" id="phone" placeholder="Phone Here">
                    </div>
                  </div>
               
                  
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="inputlname" class="control-label col-form-label">Email</label>
                      <input type="email" name="email"  @if (isset($user)) value="{{$user->email}}"  @endif class="form-control" id="inputEmail3" placeholder="Email Here" @required(true)>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="inputEmail3" class="control-label col-form-label">Old Password</label>
                      <input type="password" name="old_password"  @if (!isset($user)) @required(true) @endif class="form-control" id="inputEmail3" placeholder="Old Password Here" >
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="inputEmail3" class="control-label col-form-label">Password</label>
                      <input type="password" name="password"  @if (!isset($user)) @required(true) @endif class="form-control" id="inputEmail3" placeholder="Password Here" >
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="background_color" class="control-label col-form-label">Background color</label>
                      <input type="color" name="background_color"  @if (isset($user)) value="{{$user->background_color}}"  @endif class="form-control" id="background_color" placeholder="Color Here" >
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="default_background" class="control-label col-form-label">Default Background</label>
                      <select name="default_background" id="default_background" class="form-control">
                        <option value="">Please select </option>
                        <option value="Yes"  @if (isset($user) && $user->default_background == 'Yes') selected  @endif>Yes</option>
                        <option value="No"  @if (isset($user) && $user->default_background == 'No') selected  @endif>No</option>
                      </select>
         
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="default_background" class="control-label col-form-label">Review Option</label>
                      <select name="review_show_option" id="review_show_option" class="form-control">
                        <option value="1"  @if (isset($user)) @if ($user->review_show_option == '1') selected  @endif @endif   >1</option>
                        <option value="2"  @if (isset($user)) @if ($user->review_show_option == '2') selected  @endif @endif   >2</option>
                        <option value="3"  @if (isset($user)) @if ($user->review_show_option == '3') selected  @endif @endif   >3</option>
                        <option value="4"  @if (isset($user)) @if ($user->review_show_option == '4') selected  @endif @endif   >4</option>
                        <option value="5"  @if (isset($user)) @if ($user->review_show_option == '5') selected  @endif @endif   >5</option>
                      </select>
                    </div>
                  </div>
             

                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="front_page_text" class="control-label col-form-label">Front Page Text</label>
                      <input type="text" name="front_page_text"  @if (isset($user)) value="{{$user->front_page_text}}"  @endif class="form-control" id="front_page_text" placeholder="Front Page Text" >
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="private_page_text" class="control-label col-form-label">Private Page Text</label>
                      <input type="text" name="private_page_text"  @if (isset($user)) value="{{$user->private_page_text}}"  @endif class="form-control" id="private_page_text" placeholder="Private Page Text" >
                    </div>
                  </div>
                  {{-- <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="dynamic_page_text" class="control-label col-form-label">Dynamic Page Text</label>
                      <input type="text" name="dynamic_page_text"  @if (isset($user)) value="{{$user->dynamic_page_text}}"  @endif class="form-control" id="dynamic_page_text" placeholder="Dynamic Page Text" >
                    </div>
                  </div> --}}
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="google_page_text" class="control-label col-form-label">Social Links Page Text</label>
                      <input type="text" name="google_page_text"  @if (isset($user)) value="{{$user->google_page_text}}"  @endif class="form-control" id="google_page_text" placeholder="Social Links Page Text" >
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="inputEmail3" class="control-label col-form-label">Logo <span style="color: red">(Please add 150X150 size logo)</span></label>
                      <input type="file" name="file"  class="form-control" id="file" placeholder="Notes Here">
                        @if (isset($user)) 
                          <img src="{{$user->logo}}" width="100px" alt="" style="margin-top: 10px">
                        @endif 
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="background_image" class="control-label col-form-label">Background Image <span style="color: red">(775px - 944px)</span></label>
                      <input type="file" name="background_image"  class="form-control" id="background_image">
                        @if (isset($user)) 
                          <img src="{{$user->background_image}}" width="100px" alt="" style="margin-top: 10px">
                        @endif 
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="facebook_share" class="control-label col-form-label">Facebook Share</label>
                      <select name="facebook_share" id="" class="form-control">
                        <option value="">Please select </option>
                        <option value="Yes"  @if (isset($user) && $user->facebook_share == 'Yes') selected  @endif>Yes</option>
                        <option value="No"  @if (isset($user) && $user->facebook_share == 'No') selected  @endif>No</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="wp_share" class="control-label col-form-label">Whatsapp Share</label>
                      <select name="wp_share" id="wp_share" class="form-control">
                        <option value="">Please select </option>
                        <option value="Yes"  @if (isset($user) && $user->wp_share == 'Yes') selected  @endif>Yes</option>
                        <option value="No"  @if (isset($user) && $user->wp_share == 'No') selected  @endif>No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                      <label for="private_feedback" class="control-label col-form-label">Private Feedback</label>
                      <select name="private_feedback" id="private_feedback" class="form-control">
                        <option value="">Please select </option>
                        <option value="yes"  @if (isset($user) && $user->private_feedback == 'yes') selected  @endif>Yes</option>
                        <option value="no"  @if (isset($user) && $user->private_feedback == 'no') selected  @endif>No</option>
                      </select>
                    </div>
                  </div>
                  


                <div class="action-form">
                  <div class="mb-3 mb-0 text-start">
                    <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                      Save
                    </button>
                    <a href="{{URL::to('admin/dashboard')}}">
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