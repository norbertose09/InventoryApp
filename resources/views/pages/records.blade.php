<x-layout>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-sale"></i>
            </span> Sales
          </h3>
        </div>  
        <div class="row">
          <div class="col-md-8 mx-auto grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-white"></h4>
                <br>
                @if(session('message'))
                <div class="alert alert-info">
                  {{ session('message') }}
                </div>
                @endif
                 <div class="table-responsive">
                <table class="table">
                        <thead>
                          <tr>
                            <th> Item </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Total </th>
                            <th> Reprice</th>
                            <th> Action </th>

                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($sess as $sess)
                          <tr>
                              <td>{{ $sess->name }}</td>
                              <td>$ {{ $sess->sellingprice }}</td>
                              <td>{{ $sess->quantity }}</td>
                              <td>$ {{ $sess->total_price }}</td>
                              <td>
                               <form action="/recordedit/{{ $sess->id }}" method="POST">
                              @method('PUT')
                              @csrf<input type="number" name="total_price" value="" style="width:60px; border:none;  border-bottom:1px solid #c1c1c1;">
                              <button class="badge badge-gradient-success btn-sm" style="border:none;">>></button>
                              </form>
                              </td>
                          <td>
                              <form action="/recorddelete/{{ $sess->id }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <td><button class="badge badge-gradient-danger" style="border:none; margin-left:-70px;">X</button></td>
                              </form>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <br>
                     <p style="text-align:right;"> Total = <span style="font-size:18px;">$ {{ $Total }} </span> </p>
                      <br>
                
              </div><br><br>
                <form class="forms-sample" method="POST" action="/recordconfig">
                    @csrf

                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Item Name</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="item">
                    <option value="">Select an Item</option>
                     @foreach ($item as $item)
                       
                      <option value="{{ $item->name }}">{{ $item->name }}</option>
                     @endforeach

                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputUsername1">Quantity</label>
                    <input type="text" name="quantity" class="form-control" id="exampleInputUsername1" placeholder="Quantity">
                    @error('name')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>
                  <br>
               
                  <button type="submit" name="action" value="store-session" class="btn btn-gradient-success me-2">+ Add</button>
                  <button type="submit" name="action"value="store-database" class="btn btn-gradient-primary me-2">Record</button>

                
                </form>

                
              </div>
            </div>
          </div>
        </div>


       













      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
    </x-layout>
    