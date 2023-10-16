<div class="row">
          <div class="col-md-5 mx-auto grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-white"></h4>
                <br>
                {{-- <p class="card-description"> Basic form layout </p> --}}
                <form class="forms-sample" method="POST" action="/recordconfig">
                    @csrf

                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Item Name</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="item">
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
                
                  <button type="submit" class="btn btn-gradient-primary me-2">Record</button>
                
                </form>
              </div>
            </div>
          </div>
          {{-- <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Today's Sales</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Item name </th>
                        <th> Unit Price </th>
                        <th> Quantity </th>
                        <th> Total Price </th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($store as $store)    
                      <tr>
                        <td>{{ $store->id }}</td>
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->unit_price }}</td>
                        <td>{{ $store->quantity }}</td>
                        <td>{{ $store->total_price }}</td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                  <br><br>
                <button type="submit" class="btn btn-gradient-primary me-2 float-right">Balance Record</button>
                </div>
              </div>
            </div>
          </div> --}}
      
        </div>