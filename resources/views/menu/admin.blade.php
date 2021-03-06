<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            <ul class="nav nav-success">
                <li class="nav-item {{ ($title === "Dashboard") ? 'active' : '' }}">
                    <a href="/admin" class="" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Fitur</h4>
                </li>
                <li class="nav-item {{ Request::is('mahasiswa*') ? 'active' : '' }}">
                    <a href="/admin/mahasiswa" class="" aria-expanded="false">
                        <i class="fas fa-user-graduate"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('Dosen*') ? 'active' : '' }}">
                    <a href="/admin/dosen" class="" aria-expanded="false">
                        <i class="fas fa-user-tie"></i>
                        <p>Dosen</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/fakultas*') ? 'active' : '' }}">
                    <a href="/admin/fakultas" class="" aria-expanded="false">
                        <i class="fas fa-university"></i>
                        <p>Fakultas</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/prodi*') ? 'active' : '' }}">
                    <a href="/admin/prodi" class="" aria-expanded="false">
                        <i class="fas fa-bookmark"></i>
                        <p>Prodi</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/matakuliah*') ? 'active' : '' }}">
                    <a href="/admin/matakuliah" class="" aria-expanded="false">
                        <i class="fas fa-book"></i>
                        <p>Matakuliah</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/materi*') ? 'active' : '' }}">
                    <a href="/admin/materi" class="" aria-expanded="false">
                        <i class="fas fa-book-reader"></i>
                        <p>Materi</p>
                    </a>
                </li>

                {{-- <li class="nav-item {{ ($title === "Kelas Perkuliahan") ? 'active' : '' }}">
                    <a href="/admin/materi" class="" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                        <p>Kelas Perkuliahan</p>
                    </a>
                </li> --}}

            </ul>
        </div>
    </div>
</div>
