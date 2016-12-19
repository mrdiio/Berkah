<!-- start pagination -->
<div class="mu-pagination">
  <nav>
    <ul class="pagination">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="disabled">
              <a rel="Prev">
                <span class="fa fa-angle-left"></span> Prev
              </a>
            </li>
        @else
            <li>
              <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <span class="fa fa-angle-left"></span> Prev
              </a>
            </li>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a>{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li>
              <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                Next <span class="fa fa-angle-right"></span>
              </a>
            </li>
        @else
            <li class="disabled">
              <a rel="next">
                Next <span class="fa fa-angle-right"></span>
              </a>
            </li>
        @endif
    </ul>
  </nav>
</div>
<!-- end course pagination -->
