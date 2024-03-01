<x-header />
<x-error />
<div class="container mt-5 d-flex gap-5">
    <x-admin />
    <form class="d-flex flex-column gap-3 mt-4 mb-2 form" method="POST" action="/addNews_validate" style="margin:0 auto; width:50%;">
        <h1 class="text-center text-danger" style="color:#263248;">Добавить новость</h1>
        @csrf
        <div class="form-group">
            <label for="floatingInput">Название</label>
            <input type="text" class="form-control mb-1 text-danger " id="floatingInput" name="title">
            @error('title')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="floatingInput">Содержание</label>
            <textarea class="form-control text-danger" name="content" id="floatingTextarea2" style="height: 100px"></textarea>
            @error('content')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group text-white">
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected>Выбрать категорию</option>
                @foreach ($categoria as $categorias)
                <option value="{{$categorias->id}}">{{$categorias->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-danger">Добавить новую новость</button>
    </form>
</div>