@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Detail Table
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
                            @foreach($details as $detail)
                                <tr>
                                    <td>{{$detail->id}}</td>
                                    <td>{{$detail->value}}</td>
                                    <td>
                                        <a href="{{route('admin.detail.edit', $detail->id)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin.detail.edit', $detail->id)}}">
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