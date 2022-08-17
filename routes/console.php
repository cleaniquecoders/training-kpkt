<?php

use App\Mail\SendWelcomeMail;
use App\Models\User;
use App\Notifications\Welcome;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('send:mail {email}', function () {
    $email = $this->argument('email');

    Mail::to($email)
        ->send(new SendWelcomeMail());

    $this->info("Email successfully sent to $email");
})->purpose('Send welcome email to given email');

Artisan::command('send:notification', function () {
    $user = User::inRandomOrder()->first();

    $user->notify(new Welcome($user));

    $this->info("Notification successfully sent to $user->email");
})->purpose('Send welcome email to given email');
