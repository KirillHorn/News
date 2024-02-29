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
            
                <!-- Добавьте другие новости по аналогии -->

                <!-- Пагинация -->
                <nav aria-label="Навигация по страницам" style="margin-top: 20px;">
                {{ $news->withQueryString()->links('pagination::bootstrap-5') }}
                </nav>
            </div>

            <div class="col-md-4">
                <h2>Популярные новости</h2>
                <!-- Список популярных новостей -->
                <div class="list-group">
                   
                    <!-- Добавьте другие популярные новости по аналогии -->
                </div>

                <h2 class="mt-4">Категории новостей</h2>
                <!-- Фильтр по категориям -->
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">Политика</a>
                    <a href="#" class="list-group-item list-group-item-action">Экономика</a>
                    <!-- Добавьте другие категории по аналогии -->
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>