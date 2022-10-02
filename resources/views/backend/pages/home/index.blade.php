@extends('backend.layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Главная')
{{-- vendor scripts --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/vendors/css/extensions/dragula.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/vendors/css/extensions/swiper.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/widgets.css')}}">
@endsection
@section('content')
    <!-- Widgets Statistics start -->
    <section id="widgets-Statistics">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <h4>Статистика</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
                                <i class="bx bx-edit-alt font-medium-5"></i>
                            </div>
                            <p class="text-muted mb-0 line-ellipsis">Всего пользователей</p>
                            <h2 class="mb-0">

                            </h2>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
                                <i class="bx bx-purchase-tag font-medium-5"></i>
                            </div>
                            <p class="text-muted mb-0 line-ellipsis">Purchase</p>
                            <h2 class="mb-0">65</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
                                <i class="bx bx-shopping-bag font-medium-5"></i>
                            </div>
                            <p class="text-muted mb-0 line-ellipsis">Order</p>
                            <h2 class="mb-0">40</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Widgets Statistics End -->


    <!-- Widgets Charts start -->
    <section id="widgets-chart">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
                <h4>Charts</h4>
                <hr>
            </div>
        </div>
        <div class="row widget-radial-charts">
            <!-- Radial Followers Primary Chart Starts -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="d-lg-flex justify-content-between">
                                <div class="widget-card-details d-flex flex-column justify-content-between p-2">
                                    <div>
                                        <h5 class="font-medium-2 font-weight-normal">Followers</h5>
                                        <p class="text-muted">Get Around Easily With Limousine Service</p>
                                    </div>
                                    <a href="#">Details</a>
                                </div>
                                <div id="radial-chart-primary"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Radial Followers Primary Chart Ends -->
            <!-- Radial Users Success Chart Starts -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="d-lg-flex justify-content-between">
                                <div class="widget-card-details d-flex flex-column justify-content-between p-2">
                                    <div>
                                        <h5 class="font-medium-2 font-weight-normal">Users</h5>
                                        <p class="text-muted">How To Stop Living Your Life On Auto Mode.</p>
                                    </div>
                                    <a href="#">Details</a>
                                </div>
                                <div id="radial-chart-success"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Radial Users Success Chart Ends -->
            <!-- Radial Registrations Danger Chart Starts -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="d-lg-flex justify-content-between">
                                <div class="widget-card-details d-flex flex-column justify-content-between p-2">
                                    <div>
                                        <h5 class="font-medium-2 font-weight-normal">Registrations</h5>
                                        <p class="text-muted">After uploading photo, you can submit form.</p>
                                    </div>
                                    <a href="#">Details</a>
                                </div>
                                <div id="radial-chart-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Radial Registrations Danger Chart Ends -->
        </div>
        <div class="row">
            <!-- Followers Danger Line Chart Starts -->
            <div class="col-xl-4 col-md-6">
                <div class="card widget-followers">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="card-title">Followers</h4>
                            <small class="text-muted">System project</small>
                        </div>
                        <div class="d-flex align-items-center widget-followers-heading-right">
                            <h5 class="mr-2 font-weight-normal mb-0">860K</h5>
                            <div class="d-flex flex-column align-items-center">
                                <i class='bx bx-caret-down text-danger font-medium-1'></i>
                                <small class="text-muted">-31%</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="follower-danger-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Followers Danger Line Chart Ends -->
            <!-- Followers Primary Line Chart Starts -->
            <div class="col-xl-4 col-md-6">
                <div class="card widget-followers">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="card-title">Followers</h4>
                            <small class="text-muted">System project</small>
                        </div>
                        <div class="d-flex align-items-center widget-followers-heading-right">
                            <h5 class="mr-2 font-weight-normal mb-0">520K</h5>
                            <div class="d-flex flex-column align-items-center">
                                <i class='bx bx-caret-up text-success font-medium-1'></i>
                                <small class="text-muted">+31%</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="follower-primary-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Followers Primary Line Chart Ends -->
            <!-- Followers Success Line Chart Starts -->
            <div class="col-xl-4 col-md-6">
                <div class="card widget-followers">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="card-title">Followers</h4>
                            <small class="text-muted">System project</small>
                        </div>
                        <div class="d-flex align-items-center widget-followers-heading-right">
                            <h5 class="mr-2 font-weight-normal mb-0">673K</h5>
                            <div class="d-flex flex-column align-items-center">
                                <i class='bx bx-caret-up text-success font-medium-1'></i>
                                <small class="text-muted">+62%</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="follower-success-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Followers Success Line Chart Ends -->
        </div>
        <div class="row">
            <!-- Statistics Multi Radial Chart Starts -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Statistics</h4>
                        <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="radial-chart-multi"></div>
                            <ul class="list-inline text-center">
                                <li class="mr-2"> <span class="bullet bullet-xs bullet-primary mr-50"></span>Comments</li>
                                <li class="mr-2"> <span class="bullet bullet-xs bullet-warning mr-50"></span>Sharing</li>
                                <li> <i class="bullet bullet-xs bullet-danger mr-50"></i>Replies</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Statistics Multi Radial Chart Ends -->
            <!-- Statistics Half Radial Chart Starts -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Statistics</h4>
                        <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-body pt-1">
                            <div id="radial-chart-half"></div>
                            <div class="chart-details text-center">
                                <h6 class="font-medium-2 mb-1">Awesome</h6>
                                <p class="text-muted">Close to reach 1000k followers !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Statistics Half Radial Chart Ends -->
            <!-- Gauge Chart Starts -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Gauge Chart</h4>
                        <ul class="list-inline mb-0">
                            <li class="mr-50"> <i class="bullet bullet-xs bullet-warning mr-50"></i>First</li>
                            <li><i class="bx bx-dots-vertical-rounded font-medium-3 align-middle cursor-pointer"></i></li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="gauge-chart" class="mb-2"></div>
                            <p class="text-center">Jelly beans halvah cake chocolate gummies.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Gauge Chart Ends -->
            <!-- Statistics Donut Chart Starts -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h4 class="card-title">Statistics</h4>
                        <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="pb-1 pt-3" id="donut-chart-statistics"></div>
                            <div class="chart-info d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center">
                                    <i class="bullet bullet-xs bullet-primary mr-50"></i>
                                    <span class="text-muted text-bold-600 ml-50">Installation</span>
                                </div>
                                <div class="text-muted">70%</div>
                            </div>
                            <div class="chart-info d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center">
                                    <i class="bullet bullet-xs bullet-warning mr-50"></i>
                                    <span class="text-muted text-bold-600 ml-50">Page Views</span>
                                </div>
                                <div class="text-muted">30%</div>
                            </div>
                            <div class="chart-info d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="bullet bullet-xs bullet-danger mr-50"></i>
                                    <span class="text-muted text-bold-600 ml-50">Active Users</span>
                                </div>
                                <div class="text-muted">40%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Statistics Donut Chart Ends -->
            <!-- Spending Donut Chart Starts -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Spending</h4>
                        <i class="bx bx-dots-vertical-rounded font-medium-3 align-middle cursor-pointer"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="donut-chart-spending" class="py-2"></div>
                            <div class="chart-info d-flex justify-content-between mb-75">
                                <div class="d-flex align-items-center">
                                    <i class="bullet bullet-xs bullet-primary mr-50"></i>
                                    <span class="text-muted text-bold-600 ml-50">Public Transport</span>
                                </div>
                                <div class="text-muted">44%</div>
                            </div>
                            <div class="chart-info d-flex justify-content-between mb-75">
                                <div class="d-flex align-items-center">
                                    <i class="bullet bullet-xs bullet-danger mr-50"></i>
                                    <span class="text-muted text-bold-600 ml-50">Cafe & Restautants</span>
                                </div>
                                <div class="text-muted">55%</div>
                            </div>
                            <div class="chart-info d-flex justify-content-between mb-75">
                                <div class="d-flex align-items-center">
                                    <i class="bullet bullet-xs bullet-warning mr-50"></i>
                                    <span class="text-muted text-bold-600 ml-50">Business Projects</span>
                                </div>
                                <div class="text-muted">13%</div>
                            </div>
                            <div class="chart-info d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <i class="bullet bullet-xs bullet-success mr-50"></i>
                                    <span class="text-muted text-bold-600 ml-50">Travelling & Vocation</span>
                                </div>
                                <div class="text-muted">33%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Spending Donut Chart Ends -->
            <!-- Radar Multi Series chart Starts -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Gauge Chart</h4>
                        <ul class="list-inline mb-0">
                            <li class="mr-50"> <i class="bullet bullet-xs bullet-warning mr-50"></i>First</li>
                            <li><i class="bx bx-dots-vertical-rounded font-medium-3 align-middle cursor-pointer"></i></li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="card-body pb-0">
                            <div id="radar-multi-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Radar Multi Series chart Ends -->
        </div>
        <div class="row">
            <!-- Statistics Line Chart Starts -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Statistics</h4>
                        <ul class="list-inline mb-0">
                            <li class="mr-50"> <i class="bullet bullet-xs bullet-info mr-50"></i>Views </li>
                            <li class="mr-1"> <i class="bullet bullet-xs bullet-success mr-50"></i>Likes </li>
                            <li><i class="bx bx-dots-vertical-rounded font-medium-3 align-middle cursor-pointer"></i></li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="statistics-line-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Statistics Line Chart Ends -->
            <!-- Sales Heat Map Chart Starts -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Daily Sales States
                        </h4>
                        <div class="heading-elements">
                            <i class="bx bx-dots-vertical-rounded font-medium-3 align-middle cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="sales-heatmap-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Heat Map Chart Ends -->
        </div>
        <div class="row">
            <!-- Statistics Multi Radial Chart Starts -->
            <div class="col-lg-6">
                <div class="card widget-state-multi-radial">
                    <div class="card-header d-sm-flex justify-content-between">
                        <h4 class="card-title">Statistics</h4>
                        <ul class="nav nav-tabs mt-sm-0 mt-50 mb-0" role="tablist">
                            <li class="nav-item">
                                <a class=" nav-link active" id="category-tab" data-toggle="tab" href="#category" aria-controls="category"
                                   role="tab" aria-selected="true">Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="service-tab" data-toggle="tab" href="#service" aria-controls="service" role="tab"
                                   aria-selected="false">Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab"
                                   aria-selected="false">Account</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <div id="statistics-multi-radial-chart"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex flex-column justify-content-around">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="category" aria-labelledby="category-tab" role="tabpanel">
                                            <div class="chart-info d-flex justify-content-between mb-75">
                                                <div class="d-flex align-items-center">
                                                    <i class="bullet bullet-primary mr-50"></i>
                                                    <span class="text-bold-600 ml-50">Computer</span>
                                                </div>
                                                <div class="text-muted">$430</div>
                                            </div>
                                            <div class="chart-info d-flex justify-content-between mb-75">
                                                <div class="d-flex align-items-center">
                                                    <i class="bullet bullet-success mr-50"></i>
                                                    <span class="text-bold-600 ml-50">Storage</span>
                                                </div>
                                                <div class="text-muted">$640</div>
                                            </div>
                                            <div class="chart-info d-flex justify-content-between mb-75">
                                                <div class="d-flex align-items-center">
                                                    <i class="bullet bullet-danger mr-50"></i>
                                                    <span class="text-bold-600 ml-50">Database</span>
                                                </div>
                                                <div class="text-muted">$500</div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="service" aria-labelledby="service-tab" role="tabpanel">
                                            <div class="chart-info d-flex justify-content-between mb-75">
                                                <div class="d-flex align-items-center">
                                                    <i class="bullet bullet-primary mr-50"></i>
                                                    <span class="text-bold-600 ml-50">Repairing</span>
                                                </div>
                                                <div class="text-muted">$740</div>
                                            </div>
                                            <div class="chart-info d-flex justify-content-between mb-75">
                                                <div class="d-flex align-items-center">
                                                    <i class="bullet bullet-success mr-50"></i>
                                                    <span class="text-bold-600 ml-50">Damage</span>
                                                </div>
                                                <div class="text-muted">$1530</div>
                                            </div>
                                            <div class="chart-info d-flex justify-content-between mb-75">
                                                <div class="d-flex align-items-center">
                                                    <i class="bullet bullet-danger mr-50"></i>
                                                    <span class="text-bold-600 ml-50">Renew</span>
                                                </div>
                                                <div class="text-muted">$258</div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="account" aria-labelledby="account-tab" role="tabpanel">
                                            <div class="chart-info d-flex justify-content-between mb-75">
                                                <div class="d-flex align-items-center">
                                                    <i class="bullet bullet-primary mr-50"></i>
                                                    <span class="text-bold-600 ml-50">Sales</span>
                                                </div>
                                                <div class="text-muted">$230</div>
                                            </div>
                                            <div class="chart-info d-flex justify-content-between mb-75">
                                                <div class="d-flex align-items-center">
                                                    <i class="bullet bullet-success mr-50"></i>
                                                    <span class="text-bold-600 ml-50">Purchase</span>
                                                </div>
                                                <div class="text-muted">$523</div>
                                            </div>
                                            <div class="chart-info d-flex justify-content-between mb-75">
                                                <div class="d-flex align-items-center">
                                                    <i class="bullet bullet-danger mr-50"></i>
                                                    <span class="text-bold-600 ml-50">Resale</span>
                                                </div>
                                                <div class="text-muted">$652</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <span class="text-muted">You're within monthly expanse</span>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#" class="align-self-end">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Statistics Multi Radial Chart Ends -->
            <!-- Average Order Chart Starts -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Average Order</h4>
                        <div class="heading-elements">
                            <div class="form-group position-relative has-icon-left w-75 ml-auto">
                                <input type="text" class="form-control single-daterange">
                                <div class="form-control-position">
                                    <i class='bx bx-calendar'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="avg-order-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Average Order Chart Ends -->
        </div>


    </section>
    <!-- Widgets Charts End -->
@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
    <script src="{{asset('/adm/app-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
    <script src="{{asset('/adm/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
    <script src="{{asset('/adm/app-assets/js/scripts/cards/widgets.js')}}"></script>
@endsection