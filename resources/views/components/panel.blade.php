<div class="card">
    @if(!empty($title))
        <div class="card-header">
            <i class="fa fa-table"></i>
            {!! $title !!}
        </div>
    @endif
    <div class="card-body">
        {!! $slot !!}
    </div>
</div>

<style>

</style>