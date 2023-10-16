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
      vertical-align:middle;
      margin-right: 10px;
    }

    .date-filter-form button {
    padding: 10px 20px; }

.container {
  display: flex;
}

.heading {
 margin-right: 300px;
}

.search-box {
  width: 100px;
  border: 1px solid #ccc;
}
  </style>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-store"></i>
                </span> Revenue
              </h3>
             
            </div>
            <br>

              <form action="" method="GET" class="forms-sample">
              <div class="date-filter-form">
              <label for="start_date" style="font-size:11px; font-weight:bold;">Start Date:</label>
              <input type="date" class="form-control" name="start_date" required>

              <label for="end_date" style="font-size:11px; font-weight:bold;">End Date:</label>
              <input type="date" class="form-control" name="end_date" required>
              <button type="submit" class="badge badge-gradient-primary btn btn-sm" style="width:50px; height:30px; border:none; font-size:11px; padding:5px 10px;">Filter</button>
              </div>
            </form>
            <br><br>
           <a href="/revenue">Refresh</a><br><br>

        
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                   
                         <div class="container">
               <h4 class="card-title heading">Sales -&nbsp&nbsp  <span style="font-size:17px;">SP: ${{$filSp}} &nbsp&nbsp&nbsp&nbsp PFT: ${{$filProfit}} &nbsp&nbsp&nbsp&nbsp QTY: {{$filquan}}</span></h4>

                <div class="search-field d-none d-md-block">
             <form class="d-flex align-items-center h-100" action="" method="GET">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent search-box" placeholder="search revenue (dates, items...)" name="search" style="height: 43px;">
              </div>
            </form>
          </div>
        </div>
        <br>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <!-- <th> Item ID </th> -->
                            <th> Item Name </th>
                            {{-- <th> Category </th> --}}
                            <th> Cost Price </th>
                            <th> Selling Price </th>
                            <th> Quantity </th>
                            <th> Total </th>
                            <th> Profit </th>
                            {{-- <th> Status </th> --}}
                            <!-- <th> Action </th> -->

                          </tr>
                        </thead>
                        <tbody>
                          @if(isset($filteredItems))
                          @foreach ($filteredItems as $revenue)
                          <tr>
                            <!-- <td>{{ $revenue->id }}</td> -->
                            <td>{{ $revenue->name }}</td>
                            <td>$ {{ $revenue->costprice }}</td>
                            <td>$ {{ $revenue->sellingprice }}</td>
                            <td>{{ $revenue->quantity }}</td>
                            <td>$ {{ $revenue->total_price }}</td>
                            <td>$ {{ $revenue->profit }}</td>
                            {{-- <td> <label class="badge badge-gradient-info">SOLD</label></td> --}}
                            <!-- <td><label class="badge badge-gradient-danger">DISMISS</label></td> -->
                        </tr>
                        @endforeach
                        @else
                          @foreach ($rev as $rev)
                          <tr>
                              <!-- <td>{{ $rev->id }}</td> -->
                              <td>{{ $rev->name }}</td>
                              <td>$ {{ $rev->costprice }}</td>
                              <td>$ {{ $rev->sellingprice }}</td>
                              <td>{{ $rev->quantity }}</td>
                              <td>$ {{ $rev->total_price }}</td>
                              <td>$ {{ $rev->profit }}</td>
                              {{-- <td> <label class="badge badge-gradient-info">SOLD</label></td> --}}
                              <!-- <td><label class="badge badge-gradient-danger">DISMISS</label></td> -->
                          </tr>
                          @endforeach
                          @endif
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