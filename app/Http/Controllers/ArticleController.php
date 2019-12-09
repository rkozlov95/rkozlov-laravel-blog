<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\Http\Requests\CreateUpdateArticle;


class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $field = $request->input('field');
        $articles = Article::where('name', 'like', "%{$field}%")
            ->orWhere('body','like',"%{$field}%")->orderBy('created_at', 'desc')->paginate(6);
        return view('article.index', compact('articles', 'field'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }
    // Вывод формы
    public function create()
    {
        // Передаем в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $article = new Article();
        return view('article.create', compact('article'));
    }
    // Здесь нам понадобится объект запроса, для извлечения данных
    public function store(CreateUpdateArticle $request)
    {
        // Проверка введенных данных
        // Если будут ошибки, то возникнет исключение
        $user = $request->user();
        $this->authorize('create', Article::class);
        $this->validate($request, ['name' => 'required|unique:articles']);
        
        $article = $user->articles()->make();
        // Заполнение статьи данными из формы
        $article->fill($request->all());
        // При ошибках сохранения возникнет исключение
        $article->save();

        // Редирект на указанный маршрут с добавлением флеш сообщения
        return redirect()
            ->route('articles.index')->withSuccess('Article successfully added');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(CreateUpdateArticle $request, $id)
    {
        $this->authorize('update', Article::class);
        $article = Article::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|unique:articles,name,' . $article->id,
        ]);

        $article->fill($request->all());

        $article->save();
        return redirect()->route('articles.index')
            ->with('update', 'Article updated successfully');
    }

    public function destroy($id)
    {
    // DELETE — идемпотентный метод, поэтому результат операции всегда один и тот же
        $this->authorize('delete', Article::class);
        
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }

        return redirect()->route('articles.index')
            ->with('delete', 'Article delete successfully');
    }

}
