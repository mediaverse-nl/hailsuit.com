@component('mail::message')
     new message alert
    {!! Translator('MailMessageFormat', 'text', false, 'there is a new message from' )!!} {!! $request->email !!}
    <br>
     {!! Translator('MailMessageFormat2', 'text', false, 'his message was:' )!!}  {!! $request->name !!}
    <br>
     {!! Translator('MailMessageFormat3', 'text', false, 'his mail adress is' )!!}: {!! $request->email !!}
@endcomponent
