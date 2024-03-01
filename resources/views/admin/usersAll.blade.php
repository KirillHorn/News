<x-header/>
<x-error/>
<div class="container mt-5 d-flex gap-5">
<x-admin/>
<div>
<h2 class="text-center text-danger">Список новостей</h2>
  <table class="table" style="width: 1000px;">
    <thead>
      <tr>
        <th scope="col">Имя пользователя</th>
        <th scope="col">email</th>
        <th scope="col">Статус блокировки</th>
        <th scope="col" class="text-center">Действия</th>
      </tr>
    </thead>
    <tbody>
         @foreach ($user as $users)
      <tr>  
        <td style="padding-top: 14px;">{{$users->username}}</td>
        <td style="padding-top: 14px;">{{$users->email}}</td>
        @if ($users->is_blocked == 0)
        <td style="padding-top: 14px;" class="text-info-emphasis">Разблокирована</td>
        @else 
        <td style="padding-top: 14px;" class="text-danger">Заблокирована</td>
        @endif
        <td class="d-flex gap-2 button_admin text-center">
          <a href="/admin/{{$users->id}}/locUnUser" class="btn btn-warning block-center">Блокировать/Разблокировать</a>
        </td>
      </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>