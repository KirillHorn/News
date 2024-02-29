<x-header />
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-danger">Последние новости</h2>
                @foreach ($news as $new)
                <a href="/{{$new->id}}/news" class="text-decoration-none" >
                <div class="card" style="margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">{{$new->title}}</h5>
                        <p class="card-text">{{$new->content}}</p>
                    </div>
                </div>
                </a>
                @endforeach
                <nav aria-label="Навигация по страницам" style="margin-top: 20px;">
                {{ $news->withQueryString()->links('pagination::bootstrap-5') }}
                </nav>
            </div>
            <div class="col-md-4">
                <h2 class="text-warning">Популярные новости</h2>
                <div class="list-group">
                   @foreach ($newsLike as $newL)
                   <a href="/{{$newL->id}}/news" class="list-group-item list-group-item-action">{{$newL->title}}</a>
                   @endforeach
                </div>
                <h2 class="mt-4">Категории новостей</h2>
                <div class="list-group">
                <a href="{{ route('index', ['sort_order' => '0']) }}" class="list-group-item list-group-item-action">Все категории</a>
                    @foreach ($categoria as $categorias)
                    <a href="{{ route('index', ['sort_order' => $categorias->id ]) }}" class="list-group-item list-group-item-action">{{$categorias->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>