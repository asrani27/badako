<li class="{{ (request()->is('pegawai/beranda')) ? 'active' : '' }}"><a href="/pegawai/beranda"><i class="fa fa-home"></i> <span><i>Beranda</i></span></a></li>
{{-- <li class="{{ (request()->is('pegawai/biodata')) ? 'active' : '' }}"><a href="/pegawai/biodata"><i class="fa fa-home"></i> <span><i>Biodata</i></span></a></li>
<li class="{{ (request()->is('pegawai/kependudukan')) ? 'active' : '' }}"><a href="/pegawai/kependudukan"><i class="fa fa-home"></i> <span><i>Kependudukan</i></span></a></li>
<li class="{{ (request()->is('pegawai/bpjs')) ? 'active' : '' }}"><a href="/pegawai/bpjs"><i class="fa fa-home"></i> <span><i>BPJS</i></span></a></li>
<li class="{{ (request()->is('pegawai/pendidikan')) ? 'active' : '' }}"><a href="/pegawai/pendidikan"><i class="fa fa-home"></i> <span><i>Pendidikan</i></span></a></li>
<li class="{{ (request()->is('pegawai/alamat')) ? 'active' : '' }}"><a href="/pegawai/alamat"><i class="fa fa-home"></i> <span><i>Alamat</i></span></a></li>
<li class="{{ (request()->is('pegawai/npwp')) ? 'active' : '' }}"><a href="/pegawai/npwp"><i class="fa fa-home"></i> <span><i>NPWP</i></span></a></li>
<li class="{{ (request()->is('pegawai/kepegawaian')) ? 'active' : '' }}"><a href="/pegawai/kepegawaian"><i class="fa fa-home"></i> <span><i>Kepegawaian</i></span></a></li> --}}
<li class="{{ (request()->is('gantipass*')) ? 'active' : '' }}"><a href="/gantipass"><i class="fa fa-key"></i> <span><i>Ganti Password</i></span></a></li>
<li class="{{ (request()->is('logout')) ? 'active' : '' }}"><a href="/logout"><i class="fa fa-sign-out"></i> <span><i>Logout</i></span></a></li>
