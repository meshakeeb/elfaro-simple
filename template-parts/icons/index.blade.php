<svg {{ $attributes->merge([
  'xmlns'   => 'http://www.w3.org/2000/svg',
  'viewBox' => '0 0 24 24',
  'stroke'  => 'currentColor'
]) }}>{!! $slot !!}</svg>