<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $new_post = [
            "title" => "Titulo legal do meu post",
            "content" => "Conteudo qualquer",
            "description" => "Everson"
        ];

        $post = new Post($new_post);
        $post->save();

        dd($post);
        return $post;
    }

    public function read(Request $request)
    {
        $post = new Post();
        // $posts = $post->all();
        $post = $post->find(1);

        return $post;
    }

    public function read_all(Request $request)
    {
        $posts = Post::all();
        return $posts;
    }

    public function update(Request $request)
    {
        // $post = Post::find(1);
        // $post->title = "Titulo do post atualizado";
        // $post->save();

        // ou

        // atualizar todos que tiverem o ID maior que zero.
        $post = Post::where("id", ">", 0)->update([
            "author" => "Desconhecido",
            "title" => "Title atualizado impressionante"
        ]);

        return $post;
    }

    public function delete(Request $request)
    {
        // delete all
        // Post::where("id", ">", 0)->delete();

        // Post::all()    o "all()" retorna uma "collection" com o retorno desses models
        // Post::where()    o "where()" de fato retorna uma instância desses models, por isso não dá pra deletar tudo com o Post::all()

        $post = Post::find(1);
        return $post->delete();
    }
}
