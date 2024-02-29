<x-header/>

<div class="container mt-5 d-flex gap-5">
<x-admin/>
<div>
<h2 class="text-center text-danger">Список новостей</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Заголовок</th>
        <th scope="col">Категория</th>
        <th scope="col">Дата публикации</th>
        <th scope="col">Статус блокировки</th>
        <th scope="col" class="text-center">Действия</th>
      </tr>
    </thead>
    <tbody>
         @foreach ($news as $new)
      <tr>
        <td style="padding-top: 14px;">{{$new->title}}</td>
        <td style="padding-top: 14px;">{{$new->categorieNews->name}}</td>
        <td style="padding-top: 14px;">{{$new->publish_date}}</td>
        @if ($new->is_blocked == 0)
        <td style="padding-top: 14px;" class="text-info-emphasis">Разблокирована</td>
        @else 
        <td style="padding-top: 14px;" class="text-danger">Заблокирована</td>
        @endif
        <td class="d-flex gap-2 button_admin">
          <a href="/admin/{{$new->id}}/editingNews" class="btn btn-primary" style="padding-top: 18px;">Редактировать</a>
          <a href="/admin/{{$new->id}}/deleteNew" class="btn btn-danger" style="padding-top: 18px;" >Удалить</a>
          <a href="/admin/{{$new->id}}/locUnNew" class="btn btn-warning">Блокировать/Разблокировать</a>
        </td>
      </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>