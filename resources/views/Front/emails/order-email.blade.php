<x-mail::message>
# {{ $data['title'] }}

# Thank you for your order!

Hi {{ $data['customer'] }},

{{ $data['msg'] }}

--------------------------------------------------------------------------------------------


# Order Details
Order Total : {{ $data['total'] }}
Shipment : {{ $data['shipment'] }}

Payment Method : {{ $data['delivery_method'] }}

--------------------------------------------------------------------------------------------

# Notes
For more information, visit our Help Center or check our Return Policy.
Please note that any transactions made off Daraz violate our Terms of Service.
If a seller asks you to pay off-site or through an alternative channel, please do not send
them money and report the matter to us.




Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
