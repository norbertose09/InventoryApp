<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Sign Up</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
   
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
       
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-6 mx-auto grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Item</h4>
                    <p class="card-description"> Set new values for item(s) </p>
                     <form class="forms-sample" method="POST" action="/itemsupdate/{{$itemedit->id}}">
                      @csrf
                      @method('PUT')
                        <div class="form-group">
                          <label for="exampleInputUsername1">Item name</label>
                          <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Item Name" value="{{$itemedit->name}}">
                          @error('name')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">Category</label>
                          <input type="text" name="category" class="form-control" id="exampleInputUsername1" placeholder="Category" value="{{$itemedit->category}}">
                          @error('category')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">Cost Price</label>
                          <input type="text" name="costprice" class="form-control" id="exampleInputUsername1" placeholder="Cost Price" value="{{$itemedit->costprice}}">
                          @error('costprice')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputUsername1">Selling Price</label>
                          <input type="text" name="sellingprice" class="form-control" id="exampleInputUsername1" placeholder="Selling price" value="{{$itemedit->sellingprice}}">
                          @error('sellingprice')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                        <a href="/stocks" class="btn btn-light">Cancel</a>
                      </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>