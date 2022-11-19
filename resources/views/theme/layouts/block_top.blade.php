<!--Module bottom -->
@isset ($blocksContent['top'])
    @foreach ( $blocksContent['top'] as $layout)
        @php
        $arrPage = explode(',', $layout->page)
        @endphp
        @if ($layout->page == '*' || (isset($layout_page) && in_array($layout_page, $arrPage)))
            @includeIf($templatePath .'.block.'.$layout->text, ['layout_title' => $layout->name, 'description' => $layout->description])
        @endif
    @endforeach
@endisset
<!--//Module bottom -->