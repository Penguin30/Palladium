<nav class="sub-nav">
	<ul>
		<?php $i = 0; ?>
		@foreach($items as $menu_item)
			<li @if($i <= 2 ) class="mobile-moved" @endif><a @if( url( $menu_item->url ) == url()->current() ) class="current" @endif  href="{{ $menu_item->url }}">{{ $menu_item->title }}</a></li>
			<?php $i++; ?>
		@endforeach
	</ul>
</nav>