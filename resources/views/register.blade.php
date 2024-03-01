
    <x-header/>
    <x-error/>
    <h1 class="text-center text-danger"  >Регистрация</h1>
    <form method="POST" action="/registration_valid" class="form_vhod w-50 block-center" width='50px'>
      @csrf

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-danger-emphasis">Имя</label>
        <input type="text" name="username" class="form-control text-danger" id="exampleInputPassword1">
        @error('username')
        <p class="p_error "  id="message"> {{$message}}  </p>
        @enderror
      </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label text-danger-emphasis">Электронная почта</label>
          <input type="email" name="email" class="form-control text-danger" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('email')
          <p class="p_error "  id="message"> {{$message}} </p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label text-danger-emphasis">Пароль</label>
          <input type="password" name="password" class="form-control text-danger" id="exampleInputPassword1">
          @error('password')
          <p class="p_error "  id="message"> {{$message}} </p>
          @enderror
        </div>
         <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label text-danger-emphasis">Повторите пароль</label>
          <input type="password" name="password_reset" class="form-control text-danger" id="exampleInputPassword1">
          @error('password_reset')
          <p class="p_error "  id="message"> {{$message}} </p>
          @enderror
        </div>
        <button type="submit" class="btn btn-danger button_auth block-center w-50">Зарегистрироваться</button>
      </form>
    </div>
    <script>
window.onload = function() {
    var messages = document.getElementsByClassName('message');
    for (var i = 0; i < messages.length; i++) {
        setTimeout(function(index) {
            messages[index].style.display = 'none';
        }, 3000, i);
    }
}
</script>
</body>
</html>
