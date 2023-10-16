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
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-6 mx-auto grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">SIGN UP</h4>
                    <p class="card-description"> Create new user </p>
                    <form class="forms-sample" method="POST" action="/adminsignup">
                      @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">Username</label>
                          <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Username">
                          @error('name')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                          @error('email')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                          @error('password')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputConfirmPassword1">Confirm Password</label>
                          <input type="password" name="password_confirmation" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Sign UP</button>
                        <a href="/dashboard" class="btn btn-light">Cancel</a>
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