<x-layout>
    <style>
.container {
  display: flex;
}

.heading {
 margin-right: 220px;
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
              <i class="mdi mdi-label"></i>
            </span> Stock History
          </h3>
        </div>
         <a href="/history">Refresh</a><br><br>
      
       <div class="row">
        <div class="col-md-8 mx-auto grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <div class="container">
              <h4 class="card-title heading">Items</h4>

                <div class="search-field d-none d-md-block">
             <form class="d-flex align-items-center h-100" action="" method="GET">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent search-box" placeholder="Search list (dates, items...)" name="search" style="height: 43px;">
              </div>
            </form>
          </div>
        </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th> Date </th>
                        <th> Item Name </th>
                        <th> Old Stock </th>
                        <th> New Stock </th>
                        <th> Total </th>

                      </tr>
                    </thead>
                    
                    <tbody>
                        @unless(count($history) ==0)
                        @forelse($history as $history)
                         @php
                        $difference = $history->new_quantity - $history->old_quantity;
                        @endphp
                      <tr> 
                   
                          <td> {{ $history->created_at }} </td>
                          <td> {{ $history->name }} </td>
                          <td>{{ $history->old_quantity }} </td>
                          <td>{{ $difference }} </td>
                          <td>{{ $history->new_quantity }} </td>

                          
                          @empty
                          <h2>All items are in stock</h2>
                      </tr>
                      @endforelse
                      @endunless
                    </tbody>
                    <br>
                
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