<div class="pagination-container justify-content-center">
    @if ($paginator->hasPages())
    <ul class="pagination pagination-success">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="javascript:;" aria-label="Previous">
                    <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true">@lang('pagination.previous')</i></span>
                </a>
            </li>
        @else
        @if (method_exists($paginator,'getCursorName'))
            <li class="page-item">
                <a dusk="previousPage" class="page-link" href="javascript:;" aria-label="Previous" wire:click="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')"
                    wire:loading.attr="disabled" rel="prev">
                    <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true">@lang('pagination.previous')</i></span>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="javascript:;" aria-label="Previous" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                    wire:loading.attr="disabled" rel="prev">
                    <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true">@lang('pagination.previous')</i></span>
                </a>
            </li>
        @endif
        @endif

        <li class="page-item">
            <a class="page-link" href="javascript:;"></a>
        </li>

        @if ($paginator->hasMorePages())
            @if(method_exists($paginator,'getCursorName'))
                <li class="page-item">
                    <a dusk="nextPage" class="page-link" href="javascript:;" aria-label="Next" wire:click="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')"
                        wire:loading.attr="disabled" rel="next">
                        <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true">@lang('pagination.next')</i></span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="javascript:;" aria-label="Next">
                        <span aria-hidden="true" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"  wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled" rel="next"><i class="fa fa-angle-double-right" aria-hidden="true">@lang('pagination.next')</i></span>
                    </a>
                </li>
            @endif
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:;" aria-label="Next">
                        <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true">@lang('pagination.next')</i></span>
                    </a>
                </li>
            @endif
    </ul>
    @endif
</div>
