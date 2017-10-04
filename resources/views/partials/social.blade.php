<div class="o-share o-share--h">
  @php($socials = share_button())
  @foreach ($socials as $key=>$value)
    <a href="{{$value}}" rel="nofollow" target="_blank" class="fa fa-{{$key}}"></a>
  @endforeach
</div>