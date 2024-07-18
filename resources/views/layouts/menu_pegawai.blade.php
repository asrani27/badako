<li class="{{ (request()->is('pegawai/beranda')) ? 'active' : '' }}"><a href="/pegawai/beranda"><i class="fa fa-home"></i> <span><i>Beranda</i></span></a></li>

<li class="header">MENU PENGAJUAN</li>
<li class="{{ (request()->is('pegawai/cuti')) ? 'active' : '' }}"><a href="/pegawai/cuti"><i class="fa fa-paper-plane"></i> <span><i>Cuti</i></span></a></li>
<li class="{{ (request()->is('pegawai/pengangkatan')) ? 'active' : '' }}"><a href="/pegawai/pengangkatan"><i class="fa fa-paper-plane"></i> <span><i>Pengangkatan CPNS</i></span></a></li>
<li class="{{ (request()->is('pegawai/karpeg')) ? 'active' : '' }}"><a href="/pegawai/karpeg"><i class="fa fa-paper-plane"></i> <span><i>Karpeg</i></span></a></li>
<li class="{{ (request()->is('pegawai/kariskarsu')) ? 'active' : '' }}"><a href="/pegawai/kariskarsu"><i class="fa fa-paper-plane"></i> <span><i>Karis/Karsu</i></span></a></li>
<li class="{{ (request()->is('pegawai/pensiun')) ? 'active' : '' }}"><a href="/pegawai/pensiun"><i class="fa fa-paper-plane"></i> <span><i>Pensiun</i></span></a></li>

<li class="header">MENU VERIFIKASI</li>
<li class="{{ (request()->is('pegawai/cuti/verifikasi')) ? 'active' : '' }}"><a href="/pegawai/cuti/verifikasi"><i class="fa fa-edit"></i> <span><i>Verif Cuti Sbg Atasan</i></span>
    <span class="pull-right-container">
        @if (cuti_sebagai_atasan() != 0)
            <small class="label pull-right bg-red">{{cuti_sebagai_atasan()}}</small>
        @endif
    </span>
    </a>
</li>

@if (kadis_aktif(Auth::user()->username))
<li class="{{ (request()->is('pegawai/cuti/verifikasi_kadis')) ? 'active' : '' }}"><a href="/pegawai/cuti/verifikasi_kadis"><i class="fa fa-edit"></i> <span><i>Verif Cuti Sbg Kadis</i></span>
    <span class="pull-right-container"> 
        @if (cuti_sebagai_kadis() != 0)
        <small class="label pull-right bg-red">{{cuti_sebagai_kadis()}}</small>
        @endif
    </span>
</a></li>
@endif



@if (sekretaris_aktif(Auth::user()->username))
<li class="{{ (request()->is('pegawai/cuti/verifikasi_sekretaris')) ? 'active' : '' }}"><a href="/pegawai/cuti/verifikasi_sekretaris"><i class="fa fa-edit"></i> <span><i>Verif Cuti Sbg Sekretaris</i></span>
    <span class="pull-right-container"> 
        @if (cuti_sebagai_sekre() != 0)
        <small class="label pull-right bg-red">{{cuti_sebagai_sekre()}}</small>
        @endif
    </span>
</a></li>
@endif

<li class="{{ (request()->is('pegawai/pensiun/verifikasi')) ? 'active' : '' }}"><a href="/pegawai/pensiun/verifikasi"><i class="fa fa-edit"></i> <span><i>Verif Pensiun Sbg Atasan</i></span>
    <span class="pull-right-container"> 
        @if (pensiun_sebagai_atasan() != 0)
        <small class="label pull-right bg-red">{{pensiun_sebagai_atasan()}}</small>
        @endif
    </span>
</a></li>
@if (\App\Models\Kadis::where('nip', Auth::user()->username)->first() != null)
<li class="{{ (request()->is('pegawai/pensiun/verifikasi_kadis')) ? 'active' : '' }}"><a href="/pegawai/pensiun/verifikasi_kadis"><i class="fa fa-edit"></i> <span><i>Verif Pensiun Sbg Kadis</i></span>
    <span class="pull-right-container"> 
        @if (pensiun_sebagai_kadis() != 0)
        <small class="label pull-right bg-red">{{pensiun_sebagai_kadis()}}</small>
        @endif
    </span>
</a></li>
@endif
@if (\App\Models\Sekretaris::where('nip', Auth::user()->username)->first() != null)
<li class="{{ (request()->is('pegawai/pensiun/verifikasi_sekretaris')) ? 'active' : '' }}"><a href="/pegawai/pensiun/verifikasi_sekretaris"><i class="fa fa-edit"></i> <span><i>Verif Pensiun Sbg Sekretaris</i></span>
    <span class="pull-right-container"> 
        @if (pensiun_sebagai_sekre() != 0)
        <small class="label pull-right bg-red">{{pensiun_sebagai_sekre()}}</small>
        @endif
    </span>
</a></li>
@endif


<li class="header">MENU SETTING</li>
<li class="{{ (request()->is('gantipass*')) ? 'active' : '' }}"><a href="/gantipass"><i class="fa fa-key"></i> <span><i>Ganti Password</i></span></a></li>
<li class="{{ (request()->is('logout')) ? 'active' : '' }}"><a href="/logout"><i class="fa fa-sign-out"></i> <span><i>Logout</i></span></a></li>
