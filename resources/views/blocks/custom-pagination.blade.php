@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled pagination__item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="pagination__link pagination__link_active" aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
            </li>
        @else
            <li class="pagination__item">
                <a class="pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled pagination__item" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active pagination__item" aria-current="page"><span class="pagination__link pagination__link_active">{{ $page }}</span></li>
                    @else
                        <li class="pagination__item"><a class="pagination__link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination__item">
                <a class="pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </li>
        @else
            <li class="disabled pagination__item" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="pagination__link pagination__link_active" aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
            </li>
        @endif
    </ul>
@endif
