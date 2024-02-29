 <x-header />

 @if (session('error'))
     <div id="message" class="message">
         {{ session('error') }}

         @endif

     </div>
     <div class="container">
         <h1 class="text-center text-danger" style="color:#263248;">Войти</h1>
         <form method="POST" action="/auth_valid" class="form_vhod w-50 block-center">
             @csrf
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Электронная почта </label>
                 <input type="email" name="email" class="form-control text-danger" id="exampleInputEmail1"
                     aria-describedby="emailHelp">
                 <p>
                 @error('email')
          <p class="p_error "  id="message"> {{$message}} </p>
          @enderror
                 </p>
             </div>
             <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">Пароль</label>
                 <input type="password" name="password" class="form-control text-danger" id="exampleInputPassword1">
                 <p>
                 @error('password')
          <p class="p_error "  id="message"> {{$message}} </p>
          @enderror
                 </p>
             </div>
             <button type="submit" class="btn btn-danger block-center w-50">Войти</button>
         </form>
     </div>

     </div>
