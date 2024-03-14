<?php

namespace App\Listeners;

use App\Events\DataApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DataApprovedListener implements ShouldQueue
{
    public function handle(DataApproved $event)
    {
        // Simpan notifikasi ke dalam database atau sesi
        // Contoh sesi:
        session()->push('data_approved_notifications', $event->message);
    }
}
