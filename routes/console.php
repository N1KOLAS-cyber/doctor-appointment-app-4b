<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Configuración de Task Scheduling
// Esto le dice a Laravel que dispare las agendas a la hora indicada.
use Illuminate\Support\Facades\Schedule;
Schedule::command('app:send-daily-agendas')->dailyAt('17:21');
