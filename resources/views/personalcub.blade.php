<x-header />
<section>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <h2>Персональные данные</h2>
      <form>
        <div class="form-group">
          <label for="username">Имя пользователя:</label>
          <input name="name" type="text" class="form-control"  value="{{Auth::user()->username}}">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input name="email" type="email" class="form-control"  value="{{Auth::user()->email}}">
        </div>
        <div class="form-group">
          <label for="email">Пароль:</label>
          <input name="password" type="text" class="form-control"  value="{{Auth::user()->password}}">
        </div>
        <div class="form-group">
          <label for="email">Повторите пароль:</label>
          <input name="password" type="password" class="form-control"  placeholder="Введите ваш email">
        </div>
        <button type="submit" class="btn btn-danger" style="margin-top: 20px;">Сохранить изменения</button>
      </form>
    </div>
    <div class="col-md-6">
      <h2>Комментарии и лайки</h2>
      <ul class="list-group">
        <li class="list-group-item">Комментарий 1 <span class="badge badge-primary">Лайков: 10</span></li>
        <li class="list-group-item">Комментарий 2 <span class="badge badge-primary">Лайков: 5</span></li>
        <li class="list-group-item">Комментарий 3 <span class="badge badge-primary">Лайков: 8</span></li>
      </ul>
    </div>
  </div>
</div>
</section>
</body>

</html>