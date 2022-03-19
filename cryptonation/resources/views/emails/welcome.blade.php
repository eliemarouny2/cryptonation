@component('mail::message')
# Welcome to Cryptonations!

The body of your message.

@component('mail::button', ['url' => 'https://www.cryptonations.com'])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
