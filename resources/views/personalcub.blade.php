<x-header />
<section>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <h2>Персональные данные</h2>
      <form method="POST" action="/addUsers">
        @csrf
        <div class="form-group">
          <label for="username">Имя пользователя:</label>
          <input name="name" type="text" class="form-control text-danger"  value="{{Auth::user()->username}}">
        </div>
        @error('name')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
      @enderror
        <div class="form-group" style="margin-top: 10px;">
          <label for="email">Email:</label>
          <input name="email" type="email" class="form-control text-danger"  value="{{Auth::user()->email}}">
        </div>
        @error('email')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
      @enderror
        <div class="form-group" style="margin-top: 10px;">
          <label for="email">Введите свой пароль для проверки:</label>
          <input name="password_old" type="password" class="form-control text-danger"  value="">
        </div>
        @error('password_old')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
      @enderror
        <div class="form-group" style="margin-top: 10px;">
          <label for="email">Введите новый пароль</label>
          <input name="password" type="password" class="form-control text-danger"  >
        </div>
        @error('password')
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
      @enderror
        <button type="submit" class="btn btn-danger" style="margin-top: 20px;">Сохранить изменения</button>
      </form>
    </div>
    <div class="col-md-6">
      <h2 class="text-warning" style="margin-top: 20px;">Комментарии </h2>
      <ul class="list-group">
        @foreach ($comment as  $comments)
        <li class="list-group-item">{{$comments->comment_text}}</li>
        @endforeach


      </ul>
      <h2 class="text-danger" style="margin-top: 20px;">Лайки</h2>
      <ul class="list-group">
        @foreach ($like as  $likes)
        <a href="{{$likes->news_id}}/news" class="text-decoration-none"><li class="list-group-item">{{$likes->newsPost->title}}</li></a>
        @endforeach
      </ul>
    </div>
  </div>
</div>
</section>
</body>

</html>
