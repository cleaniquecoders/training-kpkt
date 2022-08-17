@component('mail::message')
Hi {{ $user->name }},

Welcome to {{ config('app.name') }}.

@component('mail::button', ['url' => url('/')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
