<x-layout>
    <style>
.container {
  display: flex;
}

.heading {
 margin-right: 80px;
}

.search-box {

  border: 1px solid #ccc;
}
</style>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-folder"></i>
            </span> Categories
          </h3>
        </div>
       <a href="/createcategory">Create Category</a><br><br>
       <a href="/category">Refresh</a><br><br>
        <div class="row">
          <div class="col-md-7 mx-auto grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                   <div class="container">
              <h4 class="card-title heading">Categories List</h4>
                <div class="search-field d-none d-md-block">
             <form class="d-flex align-items-center h-100" action="" method="GET">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent search-box" placeholder="search categories (dates, items...)" name="search" style="height: 43px; width: 150px;">
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
                
                  @if(session('deletemessage'))
                <div class="alert alert-danger">
                  {{ session('deletemessage') }}
                </div>
                @endif
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th> Category Name </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                        @unless(count($category) ==0)
                        @forelse($category as $category)
                      <tr> 
                          <td> {{ $category->name }} </td>
                          <td>
                            <form method="POST" action="">
                              @csrf
                            <button class="badge badge-gradient-success" style="border:none;">Edit</button>
                            </form>
                          </td>
                          <td>
                            <form method="POST" action="catedelete/{{ $category->id }}">
                              @csrf
                              @method('DELETE')
                            <button class="badge badge-gradient-danger" style="border:none;" onclick="confirmDelete({{ $category->id }})">Delete</button>
                            </form>
                          </td>
                          @empty
                          <div class="alert alert-info">
                              <td>No Category yet!</td>
                             </div>
                      </tr>
                      @endforelse
                      @endunless
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
    <script>
        function confrimDelete(categoryId){
          var confirmation = confirm('Are you sure you want to delete this category?');
          if (confirmation){
            window.location.href = '/catedit/' + categoryId;
          }
          else {

          }
        }
      </script>