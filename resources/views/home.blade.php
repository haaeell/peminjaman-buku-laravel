
@extends ('layouts.dashboard')

@section('content')
@section('judul','Dashboard Admin')

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Admin</h4>
          </div>
          <div class="card-body">
            10
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>News</h4>
          </div>
          <div class="card-body">
            42
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Reports</h4>
          </div>
          <div class="card-body">
            1,201
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Online Users</h4>
          </div>
          <div class="card-body">
            47
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4>Invoices</h4>
          <div class="card-header-action">
            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <tr>
                <th>Invoice ID</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
              </tr>
              <tr>
                <td><a href="#">INV-87239</a></td>
                <td class="font-weight-600">Kusnadi</td>
                <td><div class="badge badge-warning">Unpaid</div></td>
                <td>July 19, 2018</td>
                <td>
                  <a href="#" class="btn btn-primary">Detail</a>
                </td>
              </tr>
              <tr>
                <td><a href="#">INV-48574</a></td>
                <td class="font-weight-600">Hasan Basri</td>
                <td><div class="badge badge-success">Paid</div></td>
                <td>July 21, 2018</td>
                <td>
                  <a href="#" class="btn btn-primary">Detail</a>
                </td>
              </tr>
              <tr>
                <td><a href="#">INV-76824</a></td>
                <td class="font-weight-600">Muhamad Nuruzzaki</td>
                <td><div class="badge badge-warning">Unpaid</div></td>
                <td>July 22, 2018</td>
                <td>
                  <a href="#" class="btn btn-primary">Detail</a>
                </td>
              </tr>
              <tr>
                <td><a href="#">INV-84990</a></td>
                <td class="font-weight-600">Agung Ardiansyah</td>
                <td><div class="badge badge-warning">Unpaid</div></td>
                <td>July 22, 2018</td>
                <td>
                  <a href="#" class="btn btn-primary">Detail</a>
                </td>
              </tr>
              <tr>
                <td><a href="#">INV-87320</a></td>
                <td class="font-weight-600">Ardian Rahardiansyah</td>
                <td><div class="badge badge-success">Paid</div></td>
                <td>July 28, 2018</td>
                <td>
                  <a href="#" class="btn btn-primary">Detail</a>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
        <div class="card gradient-bottom">
          <div class="card-header">
            <h4>Top 5 Products</h4>
            <div class="card-header-action dropdown">
              <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
              <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <li class="dropdown-title">Select Period</li>
                <li><a href="#" class="dropdown-item">Today</a></li>
                <li><a href="#" class="dropdown-item">Week</a></li>
                <li><a href="#" class="dropdown-item active">Month</a></li>
                <li><a href="#" class="dropdown-item">This Year</a></li>
              </ul>
            </div>
          </div>
          <div class="card-body" id="top-5-scroll">
            <ul class="list-unstyled list-unstyled-border">
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{asset('stisla/assets')}}/img/products/product-3-50.png" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">86 Sales</div></div>
                  <div class="media-title">oPhone S9 Limited</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="64%"></div>
                      <div class="budget-price-label">$68,714</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="43%"></div>
                      <div class="budget-price-label">$38,700</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{asset('stisla/assets')}}/img/products/product-4-50.png" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">67 Sales</div></div>
                  <div class="media-title">iBook Pro 2018</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="84%"></div>
                      <div class="budget-price-label">$107,133</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="60%"></div>
                      <div class="budget-price-label">$91,455</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{asset('stisla/assets')}}/img/products/product-1-50.png" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">63 Sales</div></div>
                  <div class="media-title">Headphone Blitz</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="34%"></div>
                      <div class="budget-price-label">$3,717</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="28%"></div>
                      <div class="budget-price-label">$2,835</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{asset('stisla/assets')}}/img/products/product-3-50.png" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">28 Sales</div></div>
                  <div class="media-title">oPhone X Lite</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="45%"></div>
                      <div class="budget-price-label">$13,972</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="30%"></div>
                      <div class="budget-price-label">$9,660</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{asset('stisla/assets')}}/img/products/product-5-50.png" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">19 Sales</div></div>
                  <div class="media-title">Old Camera</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="35%"></div>
                      <div class="budget-price-label">$7,391</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="28%"></div>
                      <div class="budget-price-label">$5,472</div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="card-footer pt-3 d-flex justify-content-center">
            <div class="budget-price justify-content-center">
              <div class="budget-price-square bg-primary" data-width="20"></div>
              <div class="budget-price-label">Selling Price</div>
            </div>
            <div class="budget-price justify-content-center">
              <div class="budget-price-square bg-danger" data-width="20"></div>
              <div class="budget-price-label">Budget Price</div>
            </div>
          </div>
        </div>
      </div>

      
@endsection
