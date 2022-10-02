@extends('frontend_old.layouts.app')

@section('title','Правовая поддержка военнослужащих')

@section('content')

    <div class="rw-column rw-content">
        <div class="rw-row page-breadcrumb">
            @isset($breadcrumbs)
                @foreach ($breadcrumbs as $breadcrumb)
                    @if(isset($breadcrumb['link']))
                        <a href="{{asset($breadcrumb['link'])}}">{{$breadcrumb['name']}}</a>&raquo;
                    @else
                        {{$breadcrumb['name']}}
                    @endif
                @endforeach
            @endisset
        </div>
        <div class="rw-row page-title">
            <h1>Документы</h1>
        </div>
        <div class="rw-row">
            <div class="blog-list">

                @foreach ($docs as $doc)
                    <div class="post clearfix">
                        <div class="entry-details" style="min-height: 70px">
                            <div class="entry-title" style="padding-left: 0px; ">
                                <h2 style="font-size: 20px;text-align: justify;">
                                    <a href="/doc/{{ $doc->id }}"> {{   $doc->getShotName() }}</a>
                                </h2>
                                {{--<div class="entry-controls minimal">
                                    <a href="#" class="control   " title="Добавить в избранное<br>-=Необходимо авторизоваться=-"> <i class="fa fa-heart-o"></i> </a><span class="control-tip">0</span>
                                    <a href="#" class="control  " title="Нравится!<br>-=Необходимо авторизоваться=-"> <i class="fa fa-thumbs-o-up"></i> </a> <span class="control-tip">0</span>
                                    <a href="#" class="control entry-comments" title="Комментарии"> <i class="fa fa-comments"></i> </a> <span class="control-tip">нет комментариев</span>
                                    <div class="control"> <i class="fa fa-bar-chart"></i> </div> <span class="control-tip">233 просмотра </span>
                                </div>--}}
                                @if(!empty($doc->short_name))
                                    <p>{!!   ' &laquo;'.$doc->short_name.'&raquo;'  !!} </p>
                                @endif

                            </div>
                        </div>
                        {{--@if (($doc->tags()->count()) )
                            <div class="keywords-index-list" style="margin-bottom: 0px">
                                <ul class="keywords">
                                    @foreach ($doc->tags as $tag)
                                        <li><a href="/tag/{{ $tag->id }}">{{ $tag->name }} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif--}}
                    </div>
                @endforeach
                <div class="clear"></div>

            </div> <!-- .blog-list -->

            <!-- пейджинация -->
            {{ $docs->links('vendor.pagination.default') }}


        </div> <!-- .rw-row -->

    </div>
@endsection


@section('sidebar')
    @parent

    <div class="rw-column rw-sidebar">
        <div class="the-sidebar">
        {{--<!-- Widget -->
        <aside class="widget widget-search">

            <div class="widget-title"><h3>Поиск</h3></div>

            <form method="get" class="search-form" action="">
                <input type="text" class="search-field fullwidth" name="s"
                       placeholder="Type keyword and press enter" value="">
            </form>

        </aside> <!-- .widget -->
        <!-- / Widget -->
--}}
        <!-- Widget -->
            <aside class="widget widget-search">

                <div class="widget-title"><h3>Поиск</h3></div>

                <form method="get" class="search-form" action="">
                    <input type="text" class="search-field fullwidth" name="s"
                           placeholder="Type keyword and press enter" value="">
                </form>

            </aside> <!-- .widget -->
            <!-- / Widget -->

        <!-- Widget -->
        {{--
    @if ($tags->count())
        <!-- Widget -->
            <aside class="widget widget-categories">
                <div class="widget-title"><h3>Теги</h3></div>
                <ul>
                    @foreach ($tags as $tag)
                        <li><a href="/tag/{{ $tag->id }}">{{ $tag->name }}
                                <span class="mark light-gray">{{ $tag->hits }}</span>
                            </a></li>
                    @endforeach
                </ul>
            </aside> <!-- .widget -->
            <!-- / Widget -->
    @endif
    --}}
        <!-- / Widget -->


        </div> <!-- .the-sidebar -->
    </div> <!-- .rw-sidebar -->
@endsection


