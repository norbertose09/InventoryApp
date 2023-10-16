<x-layout>
   <style>
    input[type="date"]{
      width:150px;
      padding:8px;
      font-size:14px;
      border:1px solid #ccc;
      border-radius:4px;
    }

    input[type="date"]:focus {
      outline:none;
      border-color:#007bff;
      box-shadow: 0 0 5px 0 rgba(0. 123, 255, 0.5);
    }

    .date-filter-form input[type="date"],
    .date-filter-form button {
      display: inline-block;
      vertical-alugn:middle;
      margin-right: 10px;
    }

    .date-filter-form button {
    padding: 10px 20px; }
  </style>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Today's Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <span class="mb-5" style="font-size:25px">$ {{ $todaysSellingprice }}</span>  SP<br><br>

                    <span class="mb-5" style="font-size:25px">$ {{ $todaysSales }}</span>  PFT<br><br>

                    <h6 class="card-text">Items Sold - {{ $totalItemsSold }}</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">All Sales  <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <span class="mb-5" style="font-size:25px">$ {{ $allSp }}</span>  SP<br><br>

                    <span class="mb-5" style="font-size:25px">$ {{ $allSales }}</span>  PFT<br><br>
                    <h6 class="card-text">Items Sold - {{ $totalItemsSoldAll }}</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Items In Stock <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <span class="mb-5" style="font-size:25px">$ {{ $tCp }}</span>  CP<br><br>
                    <span class="mb-5" style="font-size:25px">$ {{ $tSp }}</span>  SP<br><br>
                    <span class="mb-5">Total Item(S) - {{ $totalItemsInStock }}</span><br>
                    <span class="card-text">Total Category(s) - {{ $totalCatInStock }}</span>
                  </div>
                </div>
              </div>
            </div>
           <a href="/dashboard">Refresh</a><br><br>

          @if($store === 0)
               <div class="alert alert-info" style="width:150px;">
                              <p>No Sales Yet!</p>
                             </div>
                             @endif
                             <br>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Today's Sales</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            
                            <th> Item Name </th>
                            {{-- <th> Category </th> --}}
                            <th> Cost Price </th>
                            <th> Selling Price </th>
                            <th> Quantity </th>
                            <th> Total </th>
                            <th> Profit </th>
                            
                            <!-- <th> Action </th> -->

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          @foreach ($store as $store)
                             <td>{{ $store->name }}</td>
                              <td>&#8358; {{ $store->costprice }}</td>
                              <td>&#8358; {{ $store->sellingprice }}</td>
                              <td>{{ $store->quantity }}</td>
                              <td>&#8358; {{ $store->total_price }}</td>
                              <td>&#8358; {{ $store->profit }}</td>
                                @endforeach
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        </x-layout>