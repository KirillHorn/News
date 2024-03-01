<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\News;
use App\Models\Like;
use App\Models\Categorie;
use Carbon\Carbon;
class MainController extends Controller
{
    public function index(Request $request) {
        $sortOrder = $request->get('sort_order');
        if ($sortOrder == 0) {
        $news=News::where('is_blocked', false)->paginate(6);
        } else {
            $news=News::where('is_blocked', false)->where('category_id',$sortOrder)->paginate(6);
        }
        $categoria=Categorie::all();
        $newsLike= News::where('is_blocked', false)
        ->withCount('likePost')
        ->orderByDesc('like_post_count')
        ->take(3)->get();
        return view('index',compact('news'),['newsLike' => $newsLike, 'categoria' => $categoria]);
    }
    public function news($id) {
        $news=News::find($id);
        $comment=Comment::where('news_id',$id)->get();
        return view('news',['new' => $news,'comment'=> $comment]);
    }
    public function like_add($id)
    {

        $author = Auth::user()->id;
        $existingLike = Like::where('user_id', $author)
        ->where('news_id', $id)
        ->first();
        if ($existingLike) {
        $existingLike->delete();
        return redirect()->back()->with('error', 'Вы не можете поставить лайк!');
    } else {
        Like::create([
            'user_id' => $author,
            'news_id' => $id,
        ]);
        return redirect()->back()->with('likes', 'Вы проставили лайк!');
    }
      }

      public function commentAdd(Request $request, $id)
      {
          $comment = $request->all();
          $author = Auth::user()->id;
          $date_Carbon=Carbon::now()->setTimezone('Asia/Yekaterinburg');
          $addComment = Comment::create([
              "comment_text" => $comment["comment_text"],
              "comment_date" => $date_Carbon,
              "news_id" => $id,
              "user_id" => $author,
          ]);

          if ($addComment) {
              return redirect()->back()->with("addComment", "Вы добавили комментарии к видео");
          } else {
              return redirect()->back()->with("ErrorComment", "Ошибка добавление");
          }
      }
      public function personalcub () {
        $author=Auth::user()->id;

        $comment= Comment::where('user_id', $author )->get();

        $news=Like::where('user_id',$author)->with('newsPost')->get();

        return view('personalcub',['comment' => $comment, 'like' => $news]);
      }
      public function addUsers(Request $request) {
        $request->validate(
            [
                "name" => "alpha_dash|required|regex:/[А-Яа-яЁё]/u" ,
                "email" => "required|email|unique:users,email," . Auth::user()->id,
                "password_old" => "required|min:6|max:30",
                "password" => "required|min:6|max:30",
            ],
            [
                "name.required" => "Это поле не должно быть пустым!",
                "name.alpha_dash" => "Имя должно состоять только из букв!",
                "name.regex" => "Только кириллица",
                "email.required" => "Это поле не должно быть пустым !",
                "email.email" => "Неправильный формат email!",
                "email.unique" => "Пользователь с таким адресом электронной почты уже существует!",
                "password_old.required" => "Поле 'password_old' обязательно для заполнения.",
                "password_old.min" => "Поле 'password_old' должно содержать не менее :min символов.",
                "password_old.max" => "Поле 'password_old' должно содержать не более :max символов.",
                "password.required" => "Поле 'password' обязательно для заполнения.",
                "password.min" => "Поле 'password' должно содержать не менее :min символов.",
                "password.max" => "Поле 'password' должно содержать не более :max символов.",
            ]
        );
        $infoUser=$request->all();

        $author = Auth::user();
        if($infoUser['password_old'] == $author->password) {


        $author->fill([
            'username' => $infoUser['name'],
            'email' => $infoUser['email'],
            'password' => Hash::make($infoUser['password']),
        ]);
        $author->save();
    }
        return redirect()->back()->with('success','Редактирование прошло успешно!');
      }
    }

