@component('mail::message')

Hi,

Welcome to {{ config('app.name') }}

@component('mail::button', ['url' => url('/login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
