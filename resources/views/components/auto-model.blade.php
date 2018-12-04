<div class="box">
    <div class="content text-center">
        <div id="imgContainer">
            @foreach($product->images as $image)
                @if($loop->first)
                    <img src="{{$image->path}}" alt="" class="img-responsive" style="width: 100%;">
                @endif
            @endforeach
        </div>

        <h4 class="text-center" style="height: 35px;">
            {!! $product->titleTranslated() !!}
            {!! $product->titleTranslated() !!}
        </h4>
        <a href="{!! route('product.show', [$product->id, SpaceToHyphen($product->titleTranslated())]) !!}" class="btn btn-default btn-block" style="background: #4D4D4C; box-shadow: none; text-shadow: none; color: #FFFFFF;">
            bekijk product
        </a>
    </div>
</div>

@push('css')
    <style>
        .box .btn-default{
            border-radius: 0px !important;
        }
        .box {
            padding: 5px;
            height: 260px;
            /*padding-bottom: 15px;*/
            /*width: 50%;*/
            z-index:1000;
            position: relative;
        }
        .box #imgContainer{
            height: 160px;
        }
        .box #imgContainer img{
            object-fit: contain;
        }
        .content a{
            /*width: 80%;*/
        }

        .content {
            /*position: absolute;*/
            /*background-color: black;*/
            /*height: 165px;*/
            /*-webkit-transition-property: height; !* Safari *!*/
            /*-webkit-transition-duration: .4s; !* Safari *!*/
            /*transition-property: height;*/
            /*transition-duration: .4s;*/
            /*overflow: hidden;*/
        }

        /*.content:hover {*/
            /*height: 230px;*/
        /*}*/
    </style>
@endpush