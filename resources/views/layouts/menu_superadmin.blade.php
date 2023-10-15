<li class="{{ (request()->is('superadmin/beranda')) ? 'active' : '' }}"><a href="/superadmin/beranda"><i class="fa fa-home"></i> <span><i>Dashboard</i></span></a></li>
<li class="{{ (request()->is('superadmin/role*')) ? 'active' : '' }}"><a href="/superadmin/role"><i class="fa fa-gear"></i> <span><i>Role/Hak Akses</i></span></a></li>
<li class="{{ (request()->is('superadmin/akun*')) ? 'active' : '' }}"><a href="/superadmin/akun"><i class="fa fa-user-plus"></i> <span><i>Akun Petugas</i></span></a></li>
<li class="{{ (request()->is('superadmin/pelanggan*')) ? 'active' : '' }}"><a href="/superadmin/pelanggan"><i class="fa fa-users"></i> <span><i>Pelanggan Terdaftar</i></span></a></li>
<li class="{{ (request()->is('gantipass*')) ? 'active' : '' }}"><a href="/gantipass"><i class="fa fa-key"></i> <span><i>Ganti Password</i></span></a></li>
<li class="{{ (request()->is('logout')) ? 'active' : '' }}"><a href="/logout"><i class="fa fa-sign-out"></i> <span><i>Logout</i></span></a></li>
