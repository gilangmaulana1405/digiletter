<?php

namespace App\Listeners;

use App\Events\UserDataInput;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserDataInputListener implements ShouldQueue
{
    public function handle(UserDataInput $event)
    {
        // Simpan notifikasi ke dalam database atau sesi
        // Contoh sesi:
        session()->push('admin_data_input_notifications', $event->message);
    }
}
