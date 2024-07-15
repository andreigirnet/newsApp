<div class="pagination">
    <ul>
        @if ($paginator->onFirstPage())
            <li class="disabled">Previous</li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled">{{ $element }}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">{{ $page }}</li>
                    @else
                        <a href="{{ $url }}"><li>{{ $page }}</li></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @else
            <li class="disabled">Next</li>
        @endif
    </ul>
</div>
