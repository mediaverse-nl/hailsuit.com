<!-- Button trigger modal -->
<a class="{!! $btnClass !!}" data-toggle="modal" data-target="#{!! $id !!}">
    @if(!empty($btnIcon))
        <i class="{!! $btnIcon !!}"></i>
    @endif
</a>

<!-- Modal -->
<div class="modal fade" id="{!! $id !!}" tabindex="-1" role="dialog" aria-labelledby="{!! $id !!}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{!! $id !!}Label">{!! $title !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $description !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @if($title == 'Delete')
                    {!! Form::open(['url' => $actionRoute, 'method' => 'delete']) !!}
                        {!! Form::submit('Proceed', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                @else
                    <a class="btn btn-primary" href="{{$actionRoute}}">Proceed</a>
                @endif
            </div>
        </div>
    </div>
</div>