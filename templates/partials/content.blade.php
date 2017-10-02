<article @php(post_class('c-col fadeIn'))>
  <header>
    <h2 class="h4"><a href="{{the_permalink()}}" class=" js-modal" data-toggle="modal" data-target="#cnotvModal">{{the_title()}}</a></h2>
  </header>
  
  <div class="">{{the_excerpt()}}</div>

  <footer>{!!get_the_tag_list('<p>Tags: ','&nbsp','</p>')!!}</footer>
</article>
