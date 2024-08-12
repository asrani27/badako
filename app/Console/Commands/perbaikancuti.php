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
        $nip = Cuti::groupBy('nip')->pluck('nip');

        foreach ($nip as $ni) {

            $data = Cuti::where('nip', '196712201989032004')->orderBy('id', 'asc')->get();
            foreach ($data as $d) {
                //N1
                $p = M_pegawai::where('nip', $d->nip)->first();


                if ($p->sisacuti_2023 == 0) {
                    $n1 = 0;
                    $n = $p->sisacuti_2024 - $d->lama;
                } else {

                    if ($d->lama > $p->sisacuti_2023) {

                        $n1 = 0;
                        $sisa_lama_cuti = $d->lama - $p->sisacuti_2023;

                        if ($sisa_lama_cuti == 0) {
                            $n1 = 0;
                            $n = $p->sisacuti_2024;
                        } else {
                            $n1 = 0;
                            $n = $p->sisacuti_2024 - $sisa_lama_cuti;
                        }
                    } else {
                        $n1 = $p->sisacuti_2023 - $d->lama;
                        $n = $p->sisacuti_2024;
                    }
                }

                $d->update([
                    'n' => $n < 0 ? 0 : $n,
                    'n1' => $n1 < 0 ? 0 : $n1,
                ]);

                $p->update([
                    'sisacuti_2023' =>  $n1 < 0 ? 0 : $n1,
                    'sisacuti_2024' =>  $n < 0 ? 0 : $n,
                ]);
            }
        }
    }
}
