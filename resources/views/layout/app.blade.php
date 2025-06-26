<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - Amel Salon</title>

  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  @include('layout.style') 
  @yield('style')
  @yield('style1')
</head>
<body>

  <div class="container-fluid">
    <div class="row flex-nowrap">
      <!-- Sidebar -->
      <div id="sidebar" class="col-md-2 sidebar position-fixed vh-100 overflow-auto px-3 py-4">
        @if(Auth::user()->role === 'admin')
          @include('layout.sidebar-admin')
        @elseif(Auth::user()->role === 'pelanggan')
          @include('layout.sidebar-pelanggan')
        @endif
      </div>

      <!-- Main Content -->
      <div class="col py-3 main-content " id="mainContent" >
        @include('layout.topbar')

        <div class="container-fluid">
          @yield('nama')
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');

    toggleBtn?.addEventListener('click', function () {
      sidebar.classList.toggle('sidebar-collapsed');
      mainContent.classList.toggle('collapsed');
    });
  </script>
</body>
</html>
