<x-layout>
    <style>
.container {
  display: flex;
}

.heading {
 margin-right: 450px;
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
            </span> Stocks
          </h3>
        </div>
       <a href="/history">Stock History</a><br><br>
           <a href="/stocks">Refresh</a><br><br>
       <div class="row">
        <div class="col-md-12 mx-auto grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
               <div class="container">
              <h4 class="card-title heading">Stock List</h4>
                <div class="search-field d-none d-md-block">
             <form class="d-flex align-items-center h-100" action="" method="GET">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent search-box" placeholder="search stocks (dates, items...)" name="search" style="height: 43px;">
              </div>
            </form>
          </div>
         </div>
              <br>
                    @if(session('message'))
                <div class="alert alert-success">
                  {{ session('message') }}
                </div>
                @endif
                   @if(session('deleteitemmessage'))
                <div class="alert alert-danger">
                  {{ session('deleteitemmessage') }}
                </div>
                @endif
              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        
                        <th> Item Name </th>
                        <th> Category </th>
                        <th> Cost Price</th>
                        <th> Selling Price</th>
                        <th> Avail. Quantity </th>
                        <th> Action </th>

                      </tr>
                    </thead>
                
                    <tbody>
                      
                        @foreach($item as $item)
                      <tr> 
                   
                          <td> {{ $item->name }} </td>
                          <td> {{ $item->category }} </td>
                          <td>$ {{ $item->costprice }} </td>
                          <td>$ {{ $item->sellingprice }} </td>
                          @if($item->quantity == 0)
                          <td> <label class="badge badge-gradient-secondary">Out Of Stock</label></td>
                          @else
                          <td> {{ $item->quantity }} </td>
                          @endif
                          <td>
                          <form method="POST" action="stockedit/{{ $item->id }}">
                              @csrf
                              @method('PUT')
                            <button class="badge badge-gradient-success" style="border:none;">Edit</button>
                            </form>
                          </td>
                          <td>
                          <form method="POST" action="stockdelete/{{ $item->id }}">
                              @csrf
                              @method('DELETE')
                            <button class="badge badge-gradient-danger" style="border:none;">Delete</button>
                            </form>
                          </td>
                      </tr>
                      @endforeach
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