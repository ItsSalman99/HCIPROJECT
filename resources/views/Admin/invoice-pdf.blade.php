<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ env('APP_NAME') }}</title>
</head>

<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2">
                <img src="{{ public_path('assets/admin/images/logo-dark.png') }}" width="150" />
                <div style="float: right;">
                    <a style="font-size: 14px; text-align: right;" href="{{ env('APP_URL') }}">
                        {{ env('APP_URL') }}
                    </a>
                    <p style="font-size: 14px; text-align: right;">+92333-3677911</p>
                    <p style="font-size: 14px; text-align: right;">

                        +92333-3677911
                    </p>
                    {{-- <img src="{{ public_path('assets/images/gmail.png') }}" style="width: 10%" /> --}}
                    <p style="font-size: 14px; text-align: right;">info@militarystore.pk</p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td width="49%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td
                                        style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:15px;">
                                        Order Reciept
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;">
                                        Order Number: #{{ $order->order_no }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;">
                                        Order Status: {{ $order->order_status }}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;">
                                        Customer Name: {{ $order->customer->name }}</td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;">
                                        Customer Email: {{ $order->customer->email }}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;"
                            width="10%" height="32" align="center">#</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-right:1px solid #333;"
                            width="26%" align="center">Roamer Name</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-right:1px solid #333;"
                            width="26%" align="center">Product Name</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-right:1px solid #333;"
                            width="25%" align="center">Price</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-right:1px solid #333;"
                            width="25%" align="center">
                            Quantity
                        </td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-right:1px solid #333;"
                            width="25%" align="center">Total</td>
                    </tr>
                    @foreach ($order->orderitem as $item)
                        <tr>
                            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;"
                                height="32" align="center">{{ $item->id }}</td>
                            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #333; border-right:1px solid #333;"
                                align="center">{{ $item->roamer->getName() }}</td>
                            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #333; border-right:1px solid #333;"
                                align="center">{{ $item->product->name }}</td>
                            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #333; border-right:1px solid #333;"
                                align="center">Rs. {{ $item->price }} Pkr</td>
                            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #333; border-right:1px solid #333;"
                                align="center">({{ $item->quantity }})</td>
                            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #333; border-right:1px solid #333;"
                                align="center">(Rs. {{ $item->quantity * $item->price }} Pkr)</td>
                        </tr>
                        {{-- {{ (getVariatPrice($item->product->id) != null) ? getVariatPrice($item->product->id)->price : $item->price }} --}}
                    @endforeach
                </table>
                <table width="258px" style="float: right;" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;"
                            width="13%" height="32" align="center">Shipping</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-right:1px solid #333;"
                            width="13%" align="center">Rs. {{ $order->shipping_price }}</td>
                    </tr>
                    <tr>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;"
                            width="13%" height="32" align="center">Payment Method</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-right:1px solid #333;"
                            width="13%" align="center">Rs. {{ $order->payment_method }}</td>
                    </tr>
                    <tr>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-left:1px solid #333; border-right:1px solid #333;"
                            width="13%" height="32" align="center">Total</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-right:1px solid #333;"
                            width="13%" align="center">Rs. {{ $order->subTotal }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <br>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" colspan="2">Total
                Amount: Rs. {{ $order->amount }} + {{ $order->shipping_price }} = {{ $order->subTotal }}</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" colspan="2">Total
                Amount In Words:
                <br>
                <span>{{ AmountInWords($order->subTotal) }}</span>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        {{-- <tr>
            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" colspan="2">
                DECLARATION:</td>
        </tr>
        <tr>
            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" colspan="2">This is
                not an invoice but only a confirmation of the receipt of the amount paid against for the service as
                described above. Subject to terms and conditions mentioned at paytm.com</td>
        </tr> --}}
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <br><br><br><br><br>
        <tr>
            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" colspan="2"
                align="center">(This is computer generated receipt and does not require physical signature.)
                <br />Bazar
                Online,<br />
                <a href="{{ env('APP_URL') }}">
                    {{ env('APP_URL') }}
                </a>
                <br />
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
    </table>
</body>

</html>
