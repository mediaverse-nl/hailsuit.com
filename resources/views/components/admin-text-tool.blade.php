
<a href="{!! route('admin.text-editor.edit', $trans->first()->translation()->first()->id) !!}"
   data-toggle="tooltip" data-placement="top" title="Edit; {!! $trans->first()->key_name !!}"
   style="
        position: absolute !important;
        margin-top: -15px !important;
        color: #cbb956 !important;
        margin-left: -5px !important;
        height: 20px !important;
        width: 20px !important;
        font-size: 11px !important;
        text-align: left !important;
    "
    class="">
    <i class="fas fa-edit"></i>
</a>

{!! $text !!}



