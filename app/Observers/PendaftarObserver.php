<?php

namespace App\Observers;

use App\Models\Pendaftar;
use App\Events\PendaftarRegistered;

class PendaftarObserver
{
    /**
     * Handle the Pendaftar "created" event.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return void
     */
    public function created(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Handle the Pendaftar "updated" event.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return void
     */
    public function updated(Pendaftar $pendaftar)
    {
        $status = (bool) $pendaftar->aktif;
		if($status){
			event(new PendaftarRegistered($pendaftar));	
		}
    }

    /**
     * Handle the Pendaftar "deleted" event.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return void
     */
    public function deleted(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Handle the Pendaftar "restored" event.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return void
     */
    public function restored(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Handle the Pendaftar "force deleted" event.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return void
     */
    public function forceDeleted(Pendaftar $pendaftar)
    {
        //
    }
}
