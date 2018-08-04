@extends('layouts.admin')

@section('content')

    <!-- DataTables Example -->

    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Brands Table
                    {{--<a href="{{route('admin.brand.create')}}" class="float-right">--}}
                    {{--<i class="fas fa-plus"></i>--}}
                    {{--</a>--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>detail</th>
                                <th>Opties</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>detail</th>
                                <th>Opties</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>
                                        <a href="{{route('admin.brand.edit', $brand->id)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin.brand.edit', $brand->id)}}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    {!! form($form) !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush