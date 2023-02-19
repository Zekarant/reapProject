<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
 
class HomeController extends Controller
{
    public function create(): View
    {
        return view('formDiscord/discord');
    }
 
    public function store(Request $request): String
    {
        $this->notification($request->input('nom'));
        return 'Le nom est ' . $request->input('nom');
    }

    public function notification(String $name)
    {
        return Http::post('https://discord.com/api/webhooks/1076904889378144287/JqnD-2tI8WPrN7bAzfE54kyydFea6cUZIu906iad7sv2WdoRHw8sx8o_nQBUb5auowR7', [
            'content' => "Une nouvelle image a été ajoutée à la galerie",
            'embeds' => [
                [
                    'title' => $name,
                    'description' => "Description test pour tester",
                    'color' => '7506394',
                ]
            ],
        ]);

    }
}