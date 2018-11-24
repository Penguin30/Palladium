<div class="pagination-vip text-center">
    <ul>
        @if ($paginator->onFirstPage())
            <li class="nav-left disabled"><a href="javascript:void(0)" class="actions-link"><span><img class="footer-arrow" src="{{ asset('img/arrow-sprite-retina-backward.png') }}" alt=""></span></a></li>
        @else
            <li class="nav-left"><a style="cursor: pointer;" href="{{ $paginator->previousPageUrl() }}" class="actions-link"><span><img style="opacity: 1;" class="footer-arrow" src="{{ asset('img/arrow-sprite-retina-backward.png') }}" alt=""></span></a></li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="nav-dots"><a href="javascript:void(0)">{{ $element }}</a></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="current"><a href="javascript:void(0)">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="nav-right"><a href="{{ $paginator->nextPageUrl() }}" class="actions-link"><span><img class="footer-arrow" src="{{ asset('img/arrow-sprite-retina.png') }}" alt=""></span></a></li>
        @else
            <li class="nav-right disabled" aria-disabled="true"><a style="cursor: initial;" href="javascript:void(0)" class="actions-link"><span><img style="opacity: 0.5;" class="footer-arrow" src="{{ asset('img/arrow-sprite-retina.png') }}" alt=""></span></a></li>
        @endif
    </ul>
</div>