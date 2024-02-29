<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;


class NewsController extends Controller
{
    public function index() {
        $news=News::all();
        return view('admin.index', ['news' => $news]);
    }
    public function addNews() {
        $categoria=Categorie::all();
        return view('admin.addNews', ['categoria' => $categoria]);
    }
    public function addNews_validate(Request $request) {
        $request->validate([
            "title" => "required",
            "content" => "required",
            "category_id" => "required",
        ],[
            "title.required" => "Поле обязательно для заполнения",
            "content.required" => "Поле обязательно для заполнения",
            "category_id.required" => "Поле обязательно для заполнения",
        ]);
        $infoNews= $request->all();
        $date_Carbon=Carbon::now()->setTimezone('Asia/Yekaterinburg');
        $addNew=News::create([
            'title' => $infoNews['title'],
            'content' => $infoNews['content'],
            'category_id' =>$infoNews['category_id'],
            'publish_date' =>$date_Carbon,
            'is_blocked' =>false,
        ]);
        if ($addNew) {
            return redirect("/admin/index")->with('success', 'Регистрация прошла удачно, авторизируйтесь!');
        } else {
            return redirect()->back()->with('error', 'Произошла ошибка! Проверьте логин или пароль!');
        }
    }
    public function editingNews($id) {
        $oneNews=News::find($id);
        $categoria=Categorie::all();
        return view('admin.editingNews', ['categoria' => $categoria, 'oneNews' => $oneNews ]);
    }
    public function editingNews_validate(Request $request,News $id) {
        $request->validate([
            "title" => "required",
            "content" => "required",
            "category_id" => "required",
        ],[
            "title.required" => "Поле обязательно для заполнения",
            "content.required" => "Поле обязательно для заполнения",
            "category_id.required" => "Поле обязательно для заполнения",
        ]);
        $infoNews= $request->all();
        $id->fill(
            [
                'title' => $infoNews['title'],
                'content' => $infoNews['content'],
                'category_id' =>$infoNews['category_id'],
            ]
            );
            $id->save();
            return redirect()->back()->with('success', ' Редактирование прошло успешно!');
    }
    public function locUnNew ($id) {
    $news = News::findOrFail($id);
    if ($news->is_blocked == false)
    {
        $news->is_blocked = true;
        $news->save();
       
    } else {
        $news->is_blocked = false;
        $news->save();
    }
    return redirect()->back()->with('success', ' Вы изменили блокировку!');
    }
    public function deleteNew(News $id) {
        $id->delete();
        return redirect()->back()->with('error', 'Вы удалили место!');
    }

    public function usersAll() {
        $user=User::all()->where('role', 1);
        return view('admin.usersAll', ['user' => $user]);
    }
    public function locUnUser ($id) {
        $user = User::findOrFail($id);
        if ($user->is_blocked == false)
        {
            $user->is_blocked = true;
            $user->save();
           
        } else {
            $user->is_blocked = false;
            $user->save();
        }
        return redirect()->back()->with('success', ' Вы изменили блокировку!');
        }
}
