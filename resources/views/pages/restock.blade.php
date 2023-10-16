<x-layout>

  <style>
.container {
  display: flex;
}

.heading {
 margin-right: 290px;
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
              <i class="mdi mdi-basket-fill"></i>
            </span> Restock
          </h3>
        </div>
          <a href="/history">Stock History</a><br><br>
           <a href="/restock">Refresh</a><br><br>
       <div class="row">
        <div class="col-md-10 mx-auto grid-margin stretch-card">
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
                        <th> Item Name </th>
                        <th> Category </th>
                        <th> Avail. Quantity </th>
                        <th> New. Quantity </th>
                      </tr>
                    </thead>
                    <form method="POST" action="/stockupdate">
                    @csrf
                    <tbody>
                        @unless(count($itemrestock) ==0)
                        @forelse($itemrestock as $itemrestock)
                        <input type="hidden" name="item_ids[]" value="{{ $itemrestock->id }}">
                      <tr> 
                          <td> {{ $itemrestock->name }} </td>
                          <td> {{ $itemrestock->category }} </td>
                          @if($itemrestock->quantity == 0)
                          <td> <label class="badge badge-gradient-secondary">Out Of Stock</label></td>
                          @else
                          <td> {{ $itemrestock->quantity }} </td>
                          @endif
                          <td><input type="number" name="quantities[]" value="{{ $itemrestock->quantity }}" style="width:60px; border:none;  border-bottom:1px solid #c1c1c1;"></td>
                          <td>
                          @empty
                          <h2>There are no Categories</h2>
                      </tr>
                      @endforelse
                      @endunless
                    </tbody>
                    <br>
                    <td><button class="badge badge-gradient-primary" style="width:100px; height:40px; border:none;">Update</button></td>
                   </form>
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