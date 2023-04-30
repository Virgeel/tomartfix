@if ($paginator->hasPages())
    <nav>
        <div class="pagination" style="display: flex; justify-content: center;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <div class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" style="background-color:#B3C279;width:30px;height:25px;padding:5px;text-align:center;border-radius:5px;border:solid 2px white">
                    <span aria-hidden="true">&lsaquo;</span>
                </div>
            @else
                <div style="background-color:#B3C279;width:30px;height:25px;padding:5px;text-align:center;border-radius:5px;border:solid 2px white">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </div>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <div class="disabled" aria-disabled="true" style="background-color:#B3C279;width:30px;height:25px;padding:5px;text-align:center;border-radius:5px;border:solid 2px white"><span>{{ $element }}</span></div>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div class="active" aria-current="page" style="background-color:#B3C279;width:30px;height:25px;padding:5px;text-align:center;border-radius:5px;border:solid 2px white"><span>{{ $page }}</span></div>
                        @else
                            <div style="background-color:#B3C279;width:30px;height:25px;padding:5px;text-align:center;border-radius:5px;border:solid 2px white"><a href="{{ $url }}">{{ $page }}</a></div>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <div style="background-color:#B3C279;width:30px;height:25px;padding:5px;text-align:center;border-radius:5px;border:solid 2px white">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </div>
            @else
                <div class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')" style="background-color:#B3C279;width:30px;height:25px;padding:5px;text-align:center;border-radius:5px;border:solid 2px white">
                    <span aria-hidden="true">&rsaquo;</span>
                </div>
            @endif
        </div>
    </nav>
@endif
