@if($paginator->hasPages())
    <div class="table-bottom mt-3">
        <div class="pagination">
            {{-- Nút Quay lại --}}
            @if($paginator->onFirstPage())
                <a class="prev" style="opacity: 0.5">&laquo; Quay lại</a>
            @else
                <a href="{{ request()->fullUrlWithQuery(['page' => $paginator->currentPage() - 1]) }}" class="prev">&laquo; Quay lại</a>
            @endif

            {{-- Các trang phân trang --}}
            @foreach($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if(is_string($element))
                    <a class="page">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if(is_array($element))
                    @foreach($element as $page => $url)
                        @if($page == $paginator->currentPage())
                            <a class="page active">{{ $page }}</a>
                        @else
                            <a href="{{ request()->fullUrlWithQuery(['page' => $page]) }}" class="page">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Nút Tiếp theo --}}
            @if($paginator->hasMorePages())
                <a href="{{ request()->fullUrlWithQuery(['page' => $paginator->currentPage() + 1]) }}" class="next">Tiếp theo &raquo;</a>
            @else
                <a class="next" style="opacity: 0.5">Tiếp theo &raquo;</a>
            @endif
        </div>
    </div>
@endif
