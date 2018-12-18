{{--@component('mail::message')--}}
{{--# Introduction--}}



<table id="templateContainer" width="500px;" style="width: 550px !important; padding: 15px; margin: auto auto; border: 1px solid #dddddd;">
    @component('mail::header', ['url' => 'https://www.hailsuit.com'])
        <a href="https://www.hailsuit.com" target="_blank" rel="noreferrer">
            <img src="https://www.hailsuit.com/img/assets/hailsuit-logo.png" style="max-height: 100px; padding: 20px" id="headerImage" alt="Hailsuit">
        </a>
    @endcomponent

    <tbody>

        <tr>
            <td align="center" valign="top" cellpadding="25">
                <table border="0" cellspacing="0" width="100%" id="templateBody">
                    <tbody>
                        <tr>
                            <td valign="top" class="bodyContent">
                                <p>Dear Deveron Reniers (mediaverse),</p>
                                <p>We have received your order and it will be processed shortly. The order details are as follows:</p>
                                <p>Order bumber: <strong>1849593968</strong></p>
                                <p>Total Due Today: €5,45</p>
                                <p>You will receive an email from us shortly once your account has been setup. Please quote your order reference number if you wish to contact us about this order.</p>
                                <p>---<br>
                                    Hailsuit</p>
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
                                Copyright © Hailsuit, All rights reserved.
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
{{--@endcomponent--}}
