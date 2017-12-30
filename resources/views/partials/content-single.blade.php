<article>
  <header>
    <h1>{{the_title()}}</h1>
  </header>

  <section>
    {{the_content()}}
  </section>
  
  <footer>
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>
