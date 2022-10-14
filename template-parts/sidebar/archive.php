<div class="md:flex lg:block">
  <div class="md:w-1/2 lg:w-full">
    <h1 class="text-navy text-2xl font-serif md:text-3xl lg:text-4xl">{{ $title }}</h1>
    <div class="text-gray-black font-serif lg:text-xl mt-3 prose"><?php the_field( 'blog_description', 'options' ); ?></div>
  </div>
  <div class="md:w-1/2 lg:w-full md:pl-5 lg:pl-0">
    @if ($taxonomies)
    <div class="mt-4 md:mt-0 lg:mt-7 text-sm text-navy tracking-widest uppercase">
      <h3 class="text-xs">Filter Episodes</h3>

      <div class="mt-3">
        <x-toggle class="text-navy-light">
          @foreach($taxonomies as $tax)

            @if ($loop->first)
              <x-slot name="label_left">
            @else
              <x-slot name="label_right">
            @endif
                {{ $tax->label }}
              </x-slot>

            @if ($loop->first)
              <x-slot name="content_left">
            @else
              <x-slot name="content_right">
            @endif
                <ul class="flex flex-col space-y-2.5 my-5 font-serif text-base capitalize tracking-normal">
                  @foreach($tax->terms as $term)
                    <li><a href="{{ get_term_link($term) }}">{{ $term->name }}</a></li>
                  @endforeach
                </ul>
              </x-slot>

          @endforeach
        </x-toggle>
      </div>

    </div>
    @endif
  </div>
</div>
