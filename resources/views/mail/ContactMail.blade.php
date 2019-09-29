@component('mail::message')
# {{ trans('frontend.email') }}
# Göndərən: 
{ {{ $info['flName'] }} }

# Mesaj:

{{ $info['message'] }}

Təşəkkürlər,<br>
{{ config('app.name') }}
@endcomponent
