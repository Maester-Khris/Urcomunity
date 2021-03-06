
@if ($paginator->hasPages())
<ul class="pagination">
   
    @if ($paginator->onFirstPage())
        {{-- <li class="disabled"><span>← Previous</span></li> --}}
        <li class="page-item disabled"><a class="page-link pvr" href="#">Precedent</a></li>
    @else
        {{-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li> --}}
        <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Precedent</a></li>
    @endif


  
    @foreach ($elements as $element)
       
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif


       
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    {{-- <li class="active my-active"><span>{{ $page }}</span></li> --}}
                    <li class="page-item"><a class="page-link active" href="#">{{ $page }}</a></li>
                @else
                    {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach


    
    @if ($paginator->hasMorePages())
        {{-- <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li> --}}
        <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Suivant</a></li>
    @else
        {{-- <li class="disabled"><span>Next →</span></li> --}}
        <li class="page-item disabled"><a class="page-link pvr" href="#">Suivant</a></li>
    @endif
</ul>
@endif 