
<div class='notifications top-right'></div>

@push('js')
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
    <script>
        @if(Session::has('success'))
            $('.top-right').notify({
                message: { text: "{{ Session::get('success') }}" }
            }).show();
        @endif

        @if(Session::has('info'))
            $('.top-right').notify({
                message: { text: "{{ Session::get('info') }}" },
                type:'info'
            }).show();
        @endif

        @if(Session::has('warning'))
            $('.top-right').notify({
                message: { text: "{{ Session::get('warning') }}" },
                type:'warning'
            }).show();
        @endif

        @if(Session::has('error'))
            $('.top-right').notify({
                message: { text: "{{ Session::get('error') }}" },
                type:'danger'
            }).show();
        @endif
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
@endpush
