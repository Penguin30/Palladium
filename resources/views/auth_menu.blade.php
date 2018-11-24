<nav class="authorized-menu">
	<ul>
		@foreach($items as $menu_item)
			<li @if( $menu_item->url == '/account/logout' )class="exit" @endif><a href="{{ $menu_item->url }}">{{ $menu_item->title }}</a></li>
		@endforeach
	</ul>
</nav>