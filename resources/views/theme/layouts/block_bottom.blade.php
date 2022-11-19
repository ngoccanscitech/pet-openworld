<!--Module bottom -->

@isset ($blocksContent['bottom'])
    @foreach ( $blocksContent['bottom'] as $layout)
        @php
        $arrPage = explode(',', $layout->page)
        @endphp
        @if ($layout->page == '*' || (isset($layout_page) && in_array($layout_page, $arrPage)))
            @includeIf($templatePath .'.block.'.$layout->text, ['description' => $layout->description])
        @endif
    @endforeach
@endisset
<!--//Module bottom -->