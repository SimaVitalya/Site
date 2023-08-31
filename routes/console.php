<?php

    use App\vendor\laravel\framework\src\Illuminate\Foundation\Inspiring;

    Artisan::command('inspire', function () {
        $this->comment(Inspiring::quote());
    })->purpose('Display an inspiring quote');
