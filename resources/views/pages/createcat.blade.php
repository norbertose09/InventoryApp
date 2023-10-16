<x-layout>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Create Category</h3>
            </div>
            <div class="row">
              <div class="col-md-6 mx-auto grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">#Category</h4>
                    <br>
                    <form class="forms-sample" method="POST" action="/createcatconfig">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Category name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Category name">
                        @error('name')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      <br>
                    <p class="card-description"> Note: Category could be "perishable, non-perishable, drinks, etc and not a particular item. If you want to create an item, visit the <a href="/createitem">create item</a> page". </p>
                      <button type="submit" class="btn btn-gradient-primary me-2">Create</button>
                      <a href="/category" class="btn btn-light">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
        </x-layout>