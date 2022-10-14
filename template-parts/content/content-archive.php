<section class="container">

  @if ($items)
  <div x-data="items">

    <div class="h-12 lg:h-15 flex items-center justify-end">
      <x-toggle class="text-navy-light" x-data="{toggle: true}" x-init="$watch('toggle', toggle => gridView = toggle)" x-cloak>
        <x-slot name="label_left">
          <x-icon.toggle-list class="w-2.5"></x-icon.toggle-list>
        </x-slot>
        <x-slot name="label_right">
          <x-icon.toggle-grid class="w-2.5"></x-icon.toggle-grid>
        </x-slot>
      </x-toggle>
    </div>

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

  @else
    <p>{!! __('Sorry, no results were found.', 'elfaro') !!}</p>
  @endif

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
