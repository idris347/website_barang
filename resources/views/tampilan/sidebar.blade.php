<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ url('/home') }}"><img src="{{ asset('midas') }}/assets/img/tutor-de.png" alt="logo" width="150" class=""></a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/home') }}"><img src="{{ asset('midas') }}/assets/img/tutor-de.png" alt="logo" width="75" class=""></a>
      </div>
      <ul class="sidebar-menu">
      <br>
      @if (Auth::user()->role=='1')
      <li class="dropdown {{ Request::is('home') ? 'active' : '' }}">
        <a href="{{ url('/home', []) }}" class="nav-link has-drodown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Gudang</li>
      <li class="dropdown {{ Request::is('user*') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}" class="nav-link"><i class="fas far fa-user"></i> <span>Data Admin</span>
      </a></li>
      @endif
      @if (Auth::user()->role=='2')
      <li class="dropdown {{ Request::is('home') ? 'active' : '' }}">
        <a href="{{ url('/home', []) }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Gudang</li>
      <li class="dropdown {{ Request::is('barang*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-cube"></i> <span>Data Barang</span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('barangs.index') }}" class="nav-link {{ Request::is('barangs*') ? 'active' : '' }}">Barang</a></li>
          <li><a href="{{ route('jeniss.index') }}" class="nav-link {{ Request::is('jeniss*') ? 'active' : '' }}">Data Jenis</a></li>
          <li><a href="{{ route('satuans.index') }}" class="nav-link {{ Request::is('satuans*') ? 'active' : '' }}">Data Satuan</a></li>
        </ul>
      </li>
      <li class="dropdown {{ Request::is('statiks*') ? 'active' : '' }}">
        <a href="{{ route('statiks.index') }}" class="nav-link"><i class="fas fa-chart-area"></i><span>Statistik</span></a>
      </li>
      <li class="dropdown {{ Request::is('planograms*','plan*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-store-alt"></i><span>Planogram</span></a>
        <ul class="dropdown-menu">
        {{-- <li><a href="{{ route('planograms.index') }}" class="nav-link"><span>Planogram</span></a></li> --}}
        <li><a href="{{ url('plan') }}" class="nav-link {{ Request::is('plan') ? 'active' : '' }}">Sketsa Planogram</a></li>
      </ul>
      </li>
      <li class="dropdown {{ Request::is('scan*', 'scan2*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-qrcode"></i><span>Scan Qrcode</span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ url('scan') }}" class="nav-link {{ Request::is('scan') ? 'active' : '' }}">Scan-barang</a></li>
          <li><a href="{{ url('scan2') }}" class="nav-link {{ Request::is('scan2') ? 'active' : '' }}">Scan-detail-barang</a></li>
        </ul>
      </li>
      <li class="dropdown {{ Request::is('masuks*') ? 'active' : '' }}">
        <a href="{{ route('masuks.index') }}" class="nav-link"><i class="fas fa-arrow-circle-down"></i><span>Barang Masuk</span></a>
      </li>
      <li class="dropdown {{ Request::is('keluars*') ? 'active' : '' }}">
        <a href="{{ route('keluars.index') }}" class="nav-link"><i class="fas fa-arrow-circle-up"></i><span>Barang Keluar</span></a>
      </li>
      <li class="dropdown {{ Request::is('log*') ? 'active' : '' }}">
        <a href="{{ url('log') }}" class="nav-link"><i class="fas fa-history"></i><span>Riwayat</span></a>
      </li>
      <li class="dropdown {{ Request::is('laporan*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Laporan</span></a>
        <ul class="dropdown-menu">
          <li><a href="{{ url('laporan_barang') }}" class="nav-link">Laporan Barang</a></li>
          <li><a href="{{ url('laporan_masuk') }}" class="nav-link">Laporan Barang Masuk</a></li>
          <li><a href="{{ url('laporan_keluar') }}" class="nav-link">Laporan Barang Keluar</a></li>
        </ul>
      </li>
    @endif
      @if(Auth::user()->role=='3')
      <li class="dropdown {{ Request::is('home') ? 'active' : '' }}">
        <a href="{{ url('/home', []) }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Gudang</li>
    <li class="{{ Request::is('laporan_barang*') ? 'active' : '' }}">
      <a href="{{ url('laporan_barang') }}" class="nav-link"><i class="fas fa-file-alt"></i><span>Laporan Barang</span></a>
    </li>
    <li class="{{ Request::is('laporan_masuk*') ? 'active' : '' }}">
        <a href="{{ url('laporan_masuk') }}" class="nav-link"><i class="fas fa-file-alt"></i><span>Laporan Barang Masuk</span></a>
    </li>
    <li class="{{ Request::is('laporan_keluar*') ? 'active' : '' }}">
        <a href="{{ url('laporan_keluar') }}" class="nav-link"><i class="fas fa-file-alt"></i><span>Laporan Barang Keluar</span></a>
    </li>
    <li class="dropdown {{ Request::is('scan*', 'scan2*') ? 'active' : '' }}">
      <a href="#" class="nav-link has-dropdown"><i class="fas fa-qrcode"></i><span>Scan Qrcode</span></a>
      <ul class="dropdown-menu">
        <li><a href="{{ url('scan') }}" class="nav-link {{ Request::is('scan') ? 'active' : '' }}">Scan-barang</a></li>
        <li><a href="{{ url('scan2') }}" class="nav-link {{ Request::is('scan2') ? 'active' : '' }}">Scan-detail-barang</a></li>
      </ul>
    </li>
    <li class="dropdown {{ Request::is('statiks*') ? 'active' : '' }}">
      <a href="{{ route('statiks.index') }}" class="nav-link"><i class="fas fa-chart-area"></i><span>Statistik</span></a>
    </li>
      @endif
       </ul>
    </aside>
  </div>