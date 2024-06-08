
@if ($paginationElements->lastPage() > 1)
    <div class="flex justify-center">
        <div class="join">
            @if (!$paginationElements->onFirstPage())
                <a href="{{ $paginationElements->previousPageUrl() }}">
                    <button class="join-item btn">«</button>
                </a>
            @endif
            <button class="join-item btn">{{ $paginationElements->currentPage() }}</button>
            @if (!$paginationElements->onLastPage())
                    <a href="{{ $paginationElements->nextPageUrl() }}">
                        <button class="join-item btn">»</button>
                    </a>
            @endif
        </div>
    </div>
@endif
