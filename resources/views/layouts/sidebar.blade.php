<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="../../assets/images/logos/dark-logo.svg" width="200" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/" aria-expanded="false">
              <span>
                <i class="ti ti-home"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          @if (auth ()->user()->role == 'admin')
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Kelola Data</spanx>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/user" aria-expanded="false">
              <span>
                <i class="ti ti-users"></i>
              </span>
              <span class="hide-menu">User</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/produk" aria-expanded="false">
              <span>
                <i class="ti ti-box"></i>
              </span>
              <span class="hide-menu">Produk</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/jenis" aria-expanded="false">
              <span>
                <i class="ti ti-cards"></i>
              </span>
              <span class="hide-menu">Jenis Produk</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/pelanggan" aria-expanded="false">
              <span>
                <i class="ti ti-user-plus"></i>
              </span>
              <span class="hide-menu">Pelanggan</span>
            </a>
          </li>
          @endif
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Transaksi</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/penjualan" aria-expanded="false">
              <span>
                <i class="ti ti-cash"></i>
              </span>
              <span class="hide-menu">Penjualan</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
