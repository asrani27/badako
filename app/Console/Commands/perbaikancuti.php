<?php

namespace App\Console\Commands;

use App\Models\Cuti;
use App\Models\M_pegawai;
use Illuminate\Console\Command;

class perbaikancuti extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perbaikancuti';

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
        $nip = Cuti::where('nip', '197402181999031005')->groupBy('nip')->pluck('nip');
        foreach ($nip as $n) {
            $data = Cuti::where('nip', '197402181999031005')->orderBy('id', 'asc')->get();
            foreach ($data as $d) {
                //N1
                $p = M_pegawai::where('nip', $d->nip)->first();
                if ($p->sisacuti_2023 == 0) {
                    $n1 = 0;
                } else {
                    $n = $p->sisacuti_2024 - $d->lama;
                }
                
            }
            dd($data);
        }
    }
}
