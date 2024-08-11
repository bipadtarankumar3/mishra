@extends('adminLayouts.home')
@section('content')

<div class="content-body">
    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-round-controls"><i class="la la-edit"></i>
                        Add/Edit Mail Configuration</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="card-text">
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p> --}}

                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>{{ $error }}</strong>
                                        </div>
                                    @endforeach
                                @endif
                                
                            </div>
                        <form class="form" action="{{URL::to('admin/addMailConfiguration')}}" method="POST">
                                @csrf
                                <input type="hidden" name="mailConfigureKey" @if (!empty($MailConfigure)) value="{{$MailConfigure->id}}"@endif >
                                <input type="hidden" name="mailConfigureStatus" @if (!empty($MailConfigure)) value="mailConfigureUpdate" @else value="mailConfigureInsert"  @endif >
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="form-row">

                                            <div class="col-md-6">
                                                <label for="mailHost">Mail Host</label>
                                                <input type="text" id="mailHost"  class="form-control round"
                                            placeholder="Mail Host" name="mailHost" @if (!empty($MailConfigure)) value="{{$MailConfigure->mail_host}}" @endif>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="mailPort">Mail Port</label>
                                                <input type="text" id="mailPort"  class="form-control round"
                                                    placeholder="Mail Port" name="mailPort" @if (!empty($MailConfigure)) value="{{$MailConfigure->mail_port}}" @endif>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="mailUserName">Mail User Name</label>
                                                <input type="text" id="mailUserName"  class="form-control round"
                                                    placeholder="Product Style" name="mailUserName" @if (!empty($MailConfigure)) value="{{$MailConfigure->mail_username}}" @endif>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="mailPassword">Mail Password</label>
                                                <input type="password" id="mailPassword"  class="form-control round"
                                                    placeholder="Product Style" name="mailPassword" @if (!empty($MailConfigure)) value="{{$MailConfigure->mail_password}}" @endif>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="mailEncription">Mail Encription</label>
                                                <input type="text" id="mailEncription"  class="form-control round"
                                                    placeholder="Product Style" name="mailEncription" @if (!empty($MailConfigure)) value="{{$MailConfigure->mail_encryption}}" @endif>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="mailFromAddress">Mail From Address</label>
                                                <input type="text" id="mailFromAddress"  class="form-control round"
                                                    placeholder="Product Style" name="mailFromAddress" @if (!empty($MailConfigure)) value="{{$MailConfigure->mail_from_address}}" @endif>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="mailFromName">Mail From Name</label>
                                                <input type="text" id="mailFromName"  class="form-control round"
                                                    placeholder="Product Style" name="mailFromName" @if (!empty($MailConfigure)) value="{{$MailConfigure->mail_from_name}}" @endif>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                <a href="{{URL::to('admin/dashboard')}}"><button type="button" class="btn btn-warning round mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </button></a>
                                    <button type="submit" class="btn btn-primary round">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
