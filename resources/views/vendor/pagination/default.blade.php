@if ($paginator->hasPages())
    <nav class="pagination is-centered is-rounded m-t-10">
        {{--If pagination is on the first page the left paginator is disabled otherwise it is enabled where 
            it points out to the previousPageUrl() function--}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous" disabled>&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-previous">&laquo;</a>
        @endif
{{--If there are more pages the right paginator is activated and points to nextPageUrl() otherwise
    if there are no more pages the right paginator is disabled--}}
        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <a class="pagination-next" disabled>Next page</a>
        @endif

        <ul class="pagination-list">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current ">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif