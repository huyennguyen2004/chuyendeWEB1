@if (count($list_menu) == 0)
    <li class="nav-item">
        <a class="nav-link" href="{{ url($menuitem->link) }}">{{ $menuitem->name }}</a>
    </li>
@else
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-expanded="false">
            {{ $menuitem->name }}
        </a>
        <ul class="dropdown-menu">
            @foreach ($list_menu as $item)
                @if ($item->type == 'brand')
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('category.brand', ['categorySlug' => $menuitem->slug, 'brandId' => $item->id]) }}">{{ $item->name }}</a>
                    </li>
                @else
                    <li><a class="dropdown-item" href="{{ url($item->link) }}">{{ $item->name }}</a></li>
                @endif
            @endforeach
        </ul>
    </li>
@endif
