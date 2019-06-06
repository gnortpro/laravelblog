@extends('master')

@section('content')
<div class="row">
  <div class="col-lg-3 grid-margin d-flex align-items-stretch">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <!--card statistics-->
        <div class="card bg-success text-white">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h1 class="mb-0">9500</h1>
                <p>
                  Visitors
                </p>
              </div>
              <div class="ml-auto">
                <i class="mdi mdi-account-switch mdi-36px"></i>
              </div>
            </div>
          </div>
        </div>
        <!--card statistics-->
      </div>
      <div class="col-12 grid-margin stretch-card">
        <!--card statistics-->
        <div class="card bg-danger text-white">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h1 class="mb-0">4200</h1>
                <p>
                  Sales
                </p>
              </div>
              <div class="ml-auto">
                <i class="mdi mdi-clipboard-text mdi-36px"></i>
              </div>
            </div>
          </div>
        </div>
        <!--card statistics-->
      </div>
      <div class="col-12 grid-margin stretch-card">
        <!--card statistics-->
        <div class="card bg-warning text-white">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h1 class="mb-0">7874</h1>
                <p>
                  Orders
                </p>
              </div>
              <div class="ml-auto">
                <i class="mdi mdi-cube-outline mdi-36px"></i>
              </div>
            </div>
          </div>
        </div>
        <!--card statistics-->
      </div>
      <div class="col-12 stretch-card">
        <!--card statistics-->
        <div class="card bg-info text-white">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="mr-auto">
                <h1 class="mb-0">1500</h1>
                <p>
                  Revenue
                </p>
              </div>
              <div class="ml-auto">
                <i class="mdi mdi-scale-balance mdi-36px"></i>
              </div>
            </div>
          </div>
        </div>
        <!--card statistics-->
      </div>
    </div>
  </div>
  <div class="col-lg-9 grid-margin stretch-card">
    <!--business survey chart-->
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Business survey</h4>
        <canvas id="business-survey-chart" height="210"></canvas>
      </div>
    </div>
    <!--business survey chart ends-->
  </div>
</div>
@endsection