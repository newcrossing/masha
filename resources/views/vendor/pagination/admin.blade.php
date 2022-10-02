{{--
<nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center mt-2">
                <li class="page-item previous disabled">
                	<a class="page-link" href="#">
                    	<i class="bx bx-chevron-left"></i>
                  </a>
                </li>
                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item next">
                <a class="page-link" href="#">
                    <i class="bx bx-chevron-right"></i>
                  </a>
                  </li>
              </ul>
            </nav>

            --}}

@if ($paginator->hasPages())
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center mt-2">
			{{-- Previous Page Link --}}
			@if ($paginator->onFirstPage())
				<li class="page-item previous disabled"><a class="page-link" href="#">
						<i class="bx bx-chevron-left"></i></a>
				</li>
			@else
				<li class="page-item next">
					<a class="page-link" href="{{ $paginator->previousPageUrl() }}">
						<i class="bx bx-chevron-left"></i>
					</a>
				</li>
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
							<li class="page-item active" aria-current="page"><a class="page-link" href="#">{{ $page }}</a></li>
						@else
							<li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
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
		</ul>
	</nav>

@endif
