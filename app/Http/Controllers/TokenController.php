<?php

namespace App\Http\Controllers;

use App\Actions\CreateShortLinkAction;
use App\Http\Requests\Token\StoreRequest;
use App\Models\Token;
use Vinkla\Hashids\Facades\Hashids;

class TokenController extends Controller
{
    public function create(StoreRequest $request, CreateShortLinkAction $action)
    {
        $url = $request->validated()['url'];

        $token = Token::query()->where('original_link', $url)->first();

        if ($token) {
            return $action->handle($token->short_link);
        }

        $shortUrl = Hashids::encode(rand());

        Token::query()->create([
            'original_link' => $url,
            'short_link' => $shortUrl
        ]);

        return $action->handle($shortUrl);
    }

    public function show(string $shortUrl)
    {
        $url = Token::query()->where('short_link', $shortUrl)->first();

        if (!$url) {
            abort(404);
        }

        $url->increment('view_count');
        return redirect($url->original_link);
    }
}
