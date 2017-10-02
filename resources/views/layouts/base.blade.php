<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    @php(do_action('get_header'))
    @include('partials.header')
    <main>
      @yield('content')
    </main>
    @if (App\display_sidebar())
      <aside">
        @include('partials.sidebar')
      </aside>
    @endif
    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>
