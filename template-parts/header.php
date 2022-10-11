<?php
/**
 * Header template
 */
use Elfaro\Helpers;

?>
<header role="banner" class="bg-aqua text-white font-sans uppercase">

	<?php get_template_part( 'template-parts/banner' ); ?>

	<div class="h-16">

		<div class="h-full flex items-center justify-between px-6">

			<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home" class="flex h-8">
				<?php
				Helpers::icon(
					'site-logo',
					[
						'fill'   => 'currentColor',
						'stroke' => 'none',
						'class'  => 'w-[133px]',
					]
				);
				?>
			</a>

			<div class="flex-row items-center hidden lg:flex lg:w-1/3">
				<button @click.prevent="search = false" class="uppercase flex items-center mr-4">
					<?php Helpers::icon( 'close', [ 'class' => 'h-3 mr-2 mb-0.5' ] ); ?>
					<?php esc_html_e( 'Close', 'elfaro' ); ?>
				</button>
				<?php get_template_part( 'template-parts/forms/search' ); ?>
			</div>

      <nav role="navigation">
        <ul class="flex items-center space-x-4 lg:space-x-6 tracking-widest">
          <li class="hidden lg:block text-sm xl:text-lg">
            <button @click.prevent="search = true" class="uppercase tracking-widest" x-show="!search">{{ __('Search', 'elfaro') }}</button>
          </li>

          <li class="block lg:hidden">
            <button @click.prevent="menu = !menu" x-show="!menu" class="uppercase tracking-widest">{{ __('Menu', 'elfaro') }}</button>
            <button @click.prevent="menu = !menu" x-show="menu" class="uppercase flex items-center tracking-widest">
              <x-icon.close class="h-3 mr-2 mb-0.5"/>
              {{ __('Close', 'elfaro') }}
            </button>
          </li>

          @if ($menu_items)
          <div x-show="!search" class="ml-6 space-x-4 lg:space-x-6 hidden lg:flex text-sm xl:text-lg">
            @foreach($menu_items as $menu_item)
            <li>
              <a href="{{ $menu_item->url }}" itemprop="url">{{ $menu_item->title }}</a>
            </li>
            @endforeach
          </div>
          @endif

          @if ($givePage)
          <li>
            <a class="btn bg-navy hover:bg-navy-dark rounded-lg" href="{{ $givePage->post_permalink }}" itemprop="url">{{ $givePage->post_title }}</a>
          </li>
          @endif
        </ul>
      </nav>

    </div>

    <nav role="navigation" x-show="menu" x-cloak class="bg-aqua relative flex flex-col items-center py-16 space-y-5 z-20 min-h-screen md:min-h-full">
      @include('forms.search')

      @if ($menu_items)
      <ul class="text-center pt-8 space-y-5 tracking-widest">
        @foreach($menu_items as $menu_item)
        <li>
          <a href="{{ $menu_item->url }}" itemprop="url">{{ $menu_item->title }}</a>
        </li>
        @endforeach
      </ul>
      @endif
    </nav>

  </div>
</header>
@once @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/doc-cookies@1.1.0/cookies_min.min.js"></script>
  <script>
    function hideHandler() {
      docCookies.setItem("hideBandwidthBanner", 1)
      document.getElementById('bandwidth-bar').style.display = 'none'
    }

    function speedToggleHandler() {
      let speed = docCookies.getItem('bandwidthSpeed')
      speed = speed || 'high'
      const newValue = 'high' === speed ? 'low' : 'high'

      docCookies.setItem("bandwidthSpeed", newValue)
      window.location.reload()
    }

    document.querySelector('.js-hide-speed').addEventListener('click', hideHandler)
    document.querySelector('.js-toggle-speed').addEventListener( 'click', speedToggleHandler)
  </script>
@endpush @endonce
