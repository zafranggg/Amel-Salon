<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>@yield('title') - Amel Salon</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@include('layout.style') 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('style')
@yield('style1')

</head>
<body>
  <div class="container-fluid main-container">
    <div class="row">
      <!-- Sidebar -->
      
@include('layout.sidebar') 
      

      <!-- Main Content -->
      <div class="col-md-10">
@include('layout.topbar') 
        @yield('nama')

    @yield('content')
      </div>
      </div>
      </div>
      

<script>
  document.getElementById('toggleSidebar').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('collapsed');
  });
</script>

</body>
</html>

