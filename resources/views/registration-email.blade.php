@component('mail::message')
# Welcome

Hello  {{$name}}
Your account registration with email {{$email}} is Registered successfully

@component('mail::button', ['url' => $url,'color' => 'success'])
Click To Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
