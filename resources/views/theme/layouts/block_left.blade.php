<!--Module left -->

@isset ($blocksContent['left'])
    @foreach ( $blocksContent['left'] as $layout)
        @php
        $arrPage = explode(',', $layout->page)
        @endphp
        @if ($layout->page == '*' || (isset($layout_page) && in_array($layout_page, $arrPage)))
            @includeIf($templatePath .'.block.'.$layout->text, ['description' => $layout->description])
        @endif
    @endforeach
@endisset
<!--//Module left -->