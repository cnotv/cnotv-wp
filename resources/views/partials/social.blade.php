<div class="o-nav-alt o-share">
  @php($socials = share_button())
  @foreach ($socials as $key=>$value)
    <a href="{{$value}}" rel="nofollow" target="_blank" class="fa fa-{{$key}}"></a>
  @endforeach
</div>