@component('mail::message')
# Welcome to my Auth & mailing

The body of your message.

@component('mail::button', ['url' => 'https:://www.google.com'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
