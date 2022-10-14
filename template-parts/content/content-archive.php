<?php
/**
 * Content: Archive
 *
 * @package Elfaro
 */

use Elfaro\Helpers;

?>
<section class="container">

	<div class="h-12 lg:h-15 flex items-center justify-end">

		<div class="text-navy-light js-tabs">

			<nav class="border border-navy-lighten cursor-pointer rounded grid grid-cols-2 gap-1.25 p-1.25 relative">

				<span class="p-1.25 text-center z-10 transition text-white js-toggle" data-targets=".list-item">
					<?php Helpers::icon( 'toggle-list', [ 'class' => 'w-2.5' ] ); ?>
				</span>

				<span class="p-1.25 text-center z-10 transition js-toggle" data-targets=".grid-item">
					<?php Helpers::icon( 'toggle-grid', [ 'class' => 'w-2.5' ] ); ?>
				</span>

				<div class="absolute w-full h-full flex gap-1.25 p-1.25 pr-2.5">
					<span class="bg-navy-light rounded w-1/2 p-1.25 transition"></span>
				</div>
			</nav>

		</div>

	</div>

	<?php
	if ( have_posts() ) {
		// Load posts loop.
		$counter = 0;
		while ( have_posts() ) {
			the_post();

			$args = [
				'type'          => ! $counter ? 'primary' : 'flat',
				'extra_classes' => '',
			];
			get_template_part( 'template-parts/cards/card', null, $args );
			$counter++;
		}
	} else {
		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content/content-none' );
	}
	?>
	<div x-data="items">

		<div class="sm:grid gap-5 md:gap-10 mb-10 md:mb-15 relative" :class="{'md:grid-cols-2 lg:grid-cols-3': gridView}">

			<template x-if="gridView">
				<template x-for="(item, index) in items" :key="index">
				<x-card-grid item="item" x-init="
				type = !index && 'primary' || type
				"/>
				</template>
			</template>

			<template x-if="!gridView">
				<template x-for="(item, index) in items" :key="index">
				<x-card-list item="item" x-init="
				type = !index && 'primary' || type
				"/>
				</template>
			</template>

		</div>

		<div class="h-12 lg:h-15 mb-10 md:mb-15 lg:mb-20 flex items-center justify-center">
		<x-button
		class="bg-navy hover:bg-navy-dark text-base text-white gap-4 md:h-14"
		x-show="pagination.pages > pagination.page"
		@click.prevent="loadMore"
		>
		<x-icon.plus class="w-4" />
		{{ __('Load more results', 'elfaro') }}
		</x-button>
		</div>

	</div>

</section>

@once @push('scripts')
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('items', () => ({
        items: @js($items),
        query: @js($query),
        pagination: @js($pagination),
        gridView: true,
        get cardView() { return this.gridView ? 'card-grid' : 'card-list' },

        async loadMore () {
          this.query.paged = ++this.pagination.page

          let data = new FormData()
          for(let arg in this.query) {
            this.query[arg] && data.append('query[' + arg + ']', this.query[arg])
          }
          data.append('action', 'get_posts')

          await axios.post(ajaxurl, data).then((response) => response.data)
            .then((response) => {
              if (response.length) {
                this.items = [...this.items, ...response]
              }
            });
        },
      }))
    })
  </script>
@endpush @endonce
