<article @php(post_class('c-col isLoading'))>
  <header>
    <h2 class="h4"><a href="{{the_permalink()}}">{{the_title()}}</a></h2>
  </header>
  
  <div class="">{{the_excerpt()}}</div>

  <footer>
    {!!get_the_tag_list('<p><i class="fa fa-tag"></i> ','&nbsp','</p>')!!}
  </footer>
</article>
