@component('mail::message')
# Reservation <strong>{{ $details['reservation_id'] }}

Your reservation for the book <strong>{{ $details['book_title'] }}</strong> code <strong>{{ $details['book_item_code'] }}</strong> has been approved.<br>
You can come to our library on <strong>{{ $details['issue_date'] }}</strong> to pick it up.

@component('mail::button', ['url' => 'http://mydigitallibrary.test'])
Visit our Digital Library.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
