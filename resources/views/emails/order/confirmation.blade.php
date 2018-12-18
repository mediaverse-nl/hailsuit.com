@component('mail::message')
{{--# Introduction--}}

{{--@component('mail::header', ['url' => 'https://www.hailsuit.com'])--}}
    {{----}}
{{--@endcomponent--}}

<table id="templateContainer" width="500px;" style="width: 550px !important; padding: 15px; margin: auto auto; border: 1px solid #dddddd;">

    <tbody>
        <tr>
            <td align="center" valign="top">
                <table border="0" cellspacing="0" width="100%" id="templateBody">
                    <tbody>
                        <tr>
                            <td valign="center" class="bodyContent">
                                <a href="https://www.hailsuit.com" target="_blank" rel="noreferrer" style="text-align: center;">
                                    <img src="https://www.hailsuit.com/img/assets/hailsuit-logo.png" style="max-height: 100px; padding: 20px" id="headerImage" alt="Hailsuit">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>

        <tr>
            <td align="center" valign="top" cellpadding="25">
                <table border="0" cellspacing="0" width="100%" id="templateBody">
                    <tbody>
                        <tr>
                            <td valign="top" class="bodyContent">
                                {!! Translator('mail_order_confirmation', 'richtext', false, 'Dear @name,

                                    We have received your order and it will be processed shortly. The order details are as follows:

                                    Order number: #@order_number

                                    Total Due Today: €@total_paid

                                    You will receive an email from us shortly once your order has been sent.
                                    Please quote your order reference number if you wish to contact us about this order.

                                    paid at: @paid_at

                                    ---
                                    Hailsuit', ['mentions'=>[
                                    'order_number' => $order->id,
                                    'name' => $order->name,
                                    'total_paid' => $order->total_paid,
                                    'paid_at' => $order->updated_at,
                                ]]) !!}

                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter">
                    <tbody>
                        <tr>
                            <td valign="top" class="footerContent">
                                <a href="https://www.hailsuit.com/contact" target="_blank" rel="noreferrer">contact</a>
                                <span class="hide-mobile"> | </span>
                                Copyright © hailsuit.com, All rights reserved.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>



{{--The body of your message.--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}
@endcomponent
