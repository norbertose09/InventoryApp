<x-layout>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-label"></i>
            </span> Out Of Stock
          </h3>
        </div>
       <div class="row">
        <div class="col-md-8 mx-auto grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Items List</h4>
              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th> Item Name </th>
                        <th> Category </th>
                        <th> Cost Price </th>
                        <th> Selling Price </th>
                      </tr>
                    </thead>
                    <tbody>
                        @unless(count($os) ==0)
                        @forelse($os as $os)
                      <tr> 
                          <td> {{ $os->name }} </td>
                          <td> {{ $os->category }} </td>
                          <td>$ {{ $os->costprice }} </td>
                          <td> $ {{ $os->sellingprice }} </td>
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