<?php

namespace App\Console\Commands;

use App\Models\Uraian;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\M_kegiatan;
use App\Models\M_pegawai;
use App\Models\M_program;
use App\Models\M_subkegiatan;
use App\Models\Subkegiatan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class perbaikandata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perbaikandata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $p = M_pegawai::get();
        foreach ($p as $i) {
            $i->update(['sisacuti_2024' => 12]);
        }
        return 'sukses';
    }
}
