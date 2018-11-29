<div class="box">
    <div class="content text-center">

        @foreach($product->images as $image)
            @if($loop->first)
                <img src="{{$image->path}}" alt="" class="img-responsive" style="width: 100%;">
            @endif
        @endforeach

        <h4 class="text-center">
            {!! $product->titleTranslated() !!}
        </h4>
        <a href="{!! route('product.show', [$product->id, SpaceToHyphen($product->titleTranslated())]) !!}" class="btn btn-default">
            lees meer
        </a>
    </div>
</div>

@push('css')
    <style>
        .box {
            height: 230px;
            /*padding-bottom: 15px;*/
            /*width: 50%;*/
            z-index:1000;
            position: relative;
        }
        .content a{
            /*width: 80%;*/
        }

        .content {
            /*position: absolute;*/
            /*background-color: black;*/
            height: 165px;
            -webkit-transition-property: height; /* Safari */
            -webkit-transition-duration: .4s; /* Safari */
            transition-property: height;
            transition-duration: .4s;
            overflow: hidden;
        }

        .content:hover {
            height: 230px;
        }
    </style>
@endpush