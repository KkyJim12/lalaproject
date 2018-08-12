<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">
  <div class="row">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
      <span>หมวดหมู่</span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" aria-expanded="true">
          <ul class="navbar-nav">
            @foreach($show_category as $show_categorys)
            <li class="nav-item ml-3 mr-3">
              <a class="nav-link" href="/category/{{$show_categorys->category_id}}">{{$show_categorys->category_name}}</a>
            </li>
            @endforeach
          </ul>
        </div>
  </div>
</div>
</nav>
