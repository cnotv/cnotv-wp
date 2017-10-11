<article @php(post_class('c-col'))>
  <header>
    <h2 class="h4"><a href="{{the_permalink()}}">{{the_title()}}</a></h2>
  </header>
  
  <div class="">{{the_excerpt()}}</div>

  <footer>
    <div>{!! get_the_tag_list('<i class="fa fa-tag"></i> ','&nbsp','') !!}</div>
    <div>
      <i class="fa fa-clock-o"></i>
      Reading time: <b>{!! estimated_reading_time() !!} mins</b>
    </div>
  </footer>
</article>
