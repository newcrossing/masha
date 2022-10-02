@extends('frontend_old.layouts.app')
@section('title',$doc->getShotName())
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
            {{--<h1> {{ $doc->name }}</h1>--}}
        </div>


        @if(!empty($doc->annotation))
            <blockquote>
                <span class="text-pink"> {{ $doc->annotation }}</span>
            </blockquote>
        @endempty

        @isset($messageTop)
            <h3 class="recipe-headlines footnotes">{{$messageTop}}</h3>
        @endisset


        <div class="rw-row">
            <div class="blog-single clearfix">
                <div class="entry post">
                    <div class="entry-details">
                        <div class="document">
                            {!! $doc->text   !!}
                        </div>
                    </div>
                    <div class="clear"></div>
                </div> <!-- .entry -->
            </div>
            <div class="clear"></div>
        </div> <!-- .rw-row -->
    </div>
@endsection


@section('sidebar')
    @parent

    <div class="rw-column rw-sidebar">
        <div class="the-sidebar">

            <!-- Widget -->
            <aside class="widget widget-search">
                <div class="widget-title"><h3>Поиск</h3></div>
                <form method="get" class="search-form" action="">
                    <input type="text" class="search-field fullwidth" name="s"
                           placeholder="" value="">
                </form>
            </aside> <!-- .widget -->
            <!-- / Widget -->

            <aside class="widget widget-categories">

                <div class="widget-title"><h3>Информация о документе</h3></div>
                <ul>
                    @isset($doc->date_pod)
                        <li><a>Дата подписания
                                <span class="mark light-gray">{{  $doc->date_pod->translatedFormat('j F Y').' г.' }}</span>
                            </a>
                        </li>
                    @endisset
                    @isset($doc->date_pub)
                        <li><a>Дата публикации
                                <span class="mark light-gray">{{  $doc->date_pub->translatedFormat('j F Y').' г.' }}</span>
                            </a>
                        </li>
                    @endisset
                    @isset($doc->date_vst)
                        <li><a>Дата вступления в силу
                                <span class="mark light-gray">{{  $doc->date_vst->translatedFormat('j F Y').' г.' }}</span>
                            </a>
                        </li>
                    @endisset
                </ul>
            </aside> <!-- .widget -->
            @if(!empty($doc->description))
                <aside class="widget widget-text">
                    <div class="widget-title"><h3>Описание документа</h3></div>
                    <div class="widget-content">
                        <p>{{ $doc->description }}</p>
                    </div> <!-- .entry -->
                </aside>
            @endif
            {{--@if ($listTags->count())
                <!-- Widget -->
                    <aside class="widget widget-categories">
                        <div class="widget-title"><h3>Теги</h3></div>
                        <ul>
                            @foreach ($listTags as $tag)
                                <li><a href="/tag/{{ $tag->id }}">{{ $tag->name }}
                                        <span class="mark light-gray">{{ $tag->hits }}</span>
                                    </a></li>
                            @endforeach
                        </ul>
                    </aside> <!-- .widget -->
                    <!-- / Widget -->
            @endif

                --}}
        </div> <!-- .the-sidebar -->
    </div> <!-- .rw-sidebar -->
@endsection