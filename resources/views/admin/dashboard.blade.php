@extends('adminLayouts.home')
@section('content')

<div class="pagetitle">
  <h1>Dashboard</h1>
  
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
 <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            

            <div class="card-body card-body-bg">
              <h5 class="card-title"> <span> </span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-file-text"></i>
                </div>
                <div class="ps-3">
                  <h6><a href="{{URL::to('admin/import_form')}}">Import Form</a></h6>
                  <span class="text-success small pt-1 fw-bold">*</span>
      <span class="text-muted small pt-2 ps-1">Fillup this form for Import</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            

            <div class="card-body card-body-bg">
              <h5 class="card-title"> <span></span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-table"></i>
                </div>
                <div class="ps-3">
                  <h6><a href="{{URL::to('admin/export_form')}}">Export Form</a></h6>
                  <span class="text-success small pt-1 fw-bold">*</span>
                  <span class="text-muted small pt-2 ps-1">Fillup this form for Export Form</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

      </div>


    </div>
  </div>
</section>

@endsection