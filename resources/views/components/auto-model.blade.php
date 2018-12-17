<div class="box" style="background-color: #FAFAFA; margin-bottom: 25px;">
    <div class="content text-center content-image content">

        <a href="{!! route('product.show', [$product->id, SpaceToHyphen($product->titleTranslated())]) !!}">
            <div id="imgContainer">
                @foreach($product->images as $image)
                    @if($loop->first)
                        <img src="{{$image->path}}" alt="" class="img-responsive" style="width: 100%;">
                    @endif
                @endforeach
            </div>
            <div class="content-overlay"></div>

            <div class="content-details fadeIn-bottom">
                {{--<h3 class="content-title">This is a title</h3>--}}
                {{--<p class="content-text">This is a short description</p>--}}
            </div>
            <h4 class="text-center" style="height: 35px;  color: #636b6f">
                {!! $product->titleTranslated() !!}
            </h4>
            <div style="padding: 10px">
                <a href="{!! route('product.show', [$product->id, SpaceToHyphen($product->titleTranslated())]) !!}" class="btn btn-default btn-block" style="background: #4D4D4C; box-shadow: none; text-shadow: none; color: #FFFFFF; margin-top: -10px;">
                    bekijk product
                </a>
            </div>
        </a>
    </div>
</div>

{{--<div class="content">--}}
    {{--<a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank">--}}
        {{--<div class="content-overlay"></div>--}}
        {{--<img class="content-image" src="https://images.unsplash.com/photo-1433360405326-e50f909805b3?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&w=1080&fit=max&s=359e8e12304ffa04a38627a157fc3362">--}}
        {{--<div class="content-details fadeIn-bottom">--}}
            {{--<h3 class="content-title">This is a title</h3>--}}
            {{--<p class="content-text">This is a short description</p>--}}
        {{--</div>--}}
    {{--</a>--}}
{{--</div>--}}
{{--</div>--}}

@push('css')
    <style>
        .content {
            position: relative;
            width: 90%;
            max-width: 400px;
            margin: auto;
            overflow: hidden;
        }

        .content .content-overlay {
            background: rgba(0,0,0,0.1);
            position: absolute;
            height: 99%;
            width: 100%;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            opacity: 0;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
        }

        .content:hover .content-overlay{
            opacity: 1;
        }

        .content-image{
            width: 100%;
        }

        .content-details {
            position: absolute;
            text-align: center;
            padding-left: 1em;
            padding-right: 1em;
            width: 100%;
            top: 50%;
            left: 50%;
            opacity: 0;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
        }

        .content:hover .content-details{
            top: 50%;
            left: 50%;
            opacity: 1;
        }
        {{--a--}}
        .box .btn-default{
            border-radius: 0px !important;
        }
        .box {
            /*padding: 15px;*/
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