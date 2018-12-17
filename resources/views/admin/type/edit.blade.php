@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.type.edit', $type->brand) !!}
@endsection

@section('content')

    {{--{!! $type->brand->id !!}--}}
    <div class="row">

        <div class="col">
            <div class="card">

                <div class="card-body">
                    {!! Form::model($type, ['route' => ['admin.type.update', $type->id], 'method' => 'PATCH']) !!}

                        <div class="form-group">
                            <label for="model" class="control-label required">model</label>
                            <input class="form-control" type="text" value="{!! $type->value !!}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="model_year" class="control-label required">model year</label>
                            <input class="form-control" type="text" value="{!! $type->model_year !!}" disabled>
                        </div>

                        <div class="form-group">

                            <label for="name" class="control-label required">model year</label>

                            @foreach($bodies as $body)
                                <br>
{{--                            {!! collect($bodyTypes->toArray()) !!}--}}
                                <label for="{!! $body->getTranslation(true) !!}">
                                    {!! Form::checkbox('bodies[]', $body->id, in_array($body->id, $bodyTypes)) !!}
                                    {{--{!!  !!}--}}
{{--                                        {{ Form::checkbox('bodies[]['.--}}
{{--                                        ['product_id' => '', 'body_id' => $body->id].--}}
{{--                                        ']', true, in_array($body->id, collect($type->bodyType()->pluck('body_id'))), ['id'=>$body->getTranslation(true)]) }}--}}
                                    {{--@else--}}
{{--                                        {!! Form::checkbox('bodies[]['.['product_id' => '', 'body_id' => $body->id].']',--}}
                                        {{--true,--}}
                                        {{--in_array($body->id, $bodyTypes)) !!}--}}
{{--                                        {{ Form::checkbox('bodies[]['.--}}
{{--{{--                                    ['product_id' => '', 'body_id' => $body->id].--}}
{{--                                        ']', true, in_array($body->id, collect($type->bodyType()->pluck('body_id'))), ['id'=>$body->getTranslation(true)]) }}--}}
                                    {{--@endif--}}
                                    {!! $body->getTranslation(true)!!}
                                </label>
                            @endforeach
                        </div>

                       <div class="">
                            <button class="btn btn-success" type="submit">Save</button>
                            <a href="{!! route('admin.brand.edit', $type->brand->id) !!}" class="btn btn-default">Cancel</a>
                        </div>
                        <br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-3">
            {{--sdad--}}
        </div>

    </div>



@endsection

@push('css')
    <style>
        .list-group-item.active a{
            color: #ffffff !important;
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush