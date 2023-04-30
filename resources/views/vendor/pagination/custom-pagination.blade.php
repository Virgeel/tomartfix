<div class="pagination">
    <span class="page-link">{{ $paginator->currentPage() }}</span>
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="page-link">{{ $paginator->currentPage() + 1 }}</a>
    @endif
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="page-link">{{ $paginator->currentPage() + 2 }}</a>
    @endif
</div>