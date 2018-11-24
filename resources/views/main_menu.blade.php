<nav class="navigation-visible">
	<ul>
		@foreach($items as $menu_item)
			<li>
				<a @if( url( $menu_item->url ) == url()->current() ) class="current" @endif href="{{ $menu_item->url }}">
					{{ $menu_item->title }}
				</a>
			</li>
		@endforeach
	</ul>
</nav>