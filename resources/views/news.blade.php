<x-header />
<error-x />
<div class="container mt-5">
  <div class="row">
    <div class="col-md-8">
      <h2>{{$new->title}}</h2>
      <p class="text-muted">Дата публикации: {{$new->publish_date}}</p>
      <p>{{$new->content}}</p>
      <p>Категория: <span class="text-danger"> {{$new->categorieNews->name}}</span></p>
      @guest
      <div id="likes" class="mt-3">
        <a href="/auth" class="btn btn-outline-success" onclick="like()">Лайк</a>
        <span id="like-count">{{$new->likesCount()}}</span> лайков
      </div>
      @endguest
      
      @auth
      @if (Auth::user()->role == 2)
      <div id="likes" class="mt-3">
        <a href="" class="btn btn-outline-success" onclick="like()">Лайк</a>
        <span id="like-count">{{$new->likesCount()}}</span> лайков
      </div>
      @endif
      @endauth

      @auth
      @if (Auth::user()->role == 1 && Auth::user()->is_blocked == 0)
      <div id="likes" class="mt-3">
        <a href="/{{$new->id}}/like_add" class="btn btn-outline-success" onclick="like()">Лайк</a>
        <span id="like-count">{{$new->likesCount()}}</span> лайков
      </div>
      @else
      <div id="likes" class="mt-3">
        <span id="like-count" class="text-danger" style="font-weight: 900;">Вы были заблокированы!</span>
        <span id="like-count">{{$new->likesCount()}}</span> лайк
      </div>
      @endif

      @endauth
      <hr class="text-danger" style="border:2px solid; width:1300px;">
      @guest
      <div id="comments-container">
        <p class="text-danger"><a href="/auth" class="text-decoration-none text-danger" style="font-weight: 700">Авторизуйтесь</a> чтобы оставить комментарий</p>
      </div>
      @endguest
      @auth
      @if (Auth::user()->role == 1 && Auth::user()->is_blocked == 0)
      <div id="comment-form" class="mt-3">
        <h4 class="text-danger">Добавить комментарий</h5>
          <form method="POST" action="/{{$new->id}}/commentAdd">
            @csrf
            <div class="form-group">
              <label for="comment-text">Текст комментария:</label>
              <input class="form-control" id="comment-text" name="comment_text" style="width: 1300px">
            </div>
            <button style="margin-top:10px;" class="btn btn-danger" onclick="addComment()">Отправить комментарий</button>
          </form>
      </div>
      @else
      <span id="like-count" class="text-danger" style="font-weight: 900;">Вы были заблокированы! Вы не можете оставить комментарии!</span>
      @endif

      @endauth
      <h4>Комментарии</h4>
      <div id="comments-container ">
        @foreach ($comment as $comments)
        <div class="comment_container d-flex flex-column">
          <p class="text-danger">{{$comments->usersComment->username}}</p>
          <div>
            <p>{{$comments->comment_text}}</p>
            <p style="font-size:14px;">{{$comments->comment_date}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
