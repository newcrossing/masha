{{--<div class="blog-pagination button-block center">--}}
{{--    <a class="button small nobg primary" href="#">&larr; Prev</a>--}}
{{--    <a class="button small nobg primary" href="#">...</a>--}}
{{--    <span class="button small nobg primary current">4</span>--}}
{{--    <a class="button small nobg primary" href="#">5</a>--}}
{{--    <a class="button small nobg primary" href="#">6</a>--}}
{{--    <a class="button small nobg primary" href="#">...</a>--}}
{{--    <a class="button small nobg primary" href="#">192</a>--}}
{{--    <a class="button small nobg primary" href="#">Next &rarr;</a>--}}
{{--</div>--}}

@if ($paginator->hasPages())
    <div class="blog-pagination button-block center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="button small nobg primary current">Назад</span>
        @else
            <a class="button small nobg primary" href="{{ $paginator->previousPageUrl() }}">Назад</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="button small nobg primary ">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="button small nobg primary current">{{ $page }}</span>
                    @else
                        <a class="button small nobg primary" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="button small nobg primary" href="{{ $paginator->nextPageUrl() }}">Вперед</a>
        @else
            <span class="button small nobg primary current">Вперед</span>
        @endif
    </div>

@endif
