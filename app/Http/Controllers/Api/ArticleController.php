<?php

namespace App\Http\Controllers\Api;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function articles() : JsonResponse
    {
        $articles = Article::paginate();
        return ApiResponse::sendResponse(200, 'success', compact('articles'));
    }

    public function article(Request $request) : JsonResponse
    {
        if (! $request->has('id')) {
            return ApiResponse::sendResponse(400,['id'=> 'not found post id']);
        }
        $validator = Validator::make([$request->query('id')],
            ['id'=>'integer'],
            ['exists:posts,id']);
        if ($validator->fails()) {
            return ApiResponse::sendResponse(422,['id'=>$validator->errors()]);
        }

        $article = Article::with('category')->find($request->query('id'));
        return ApiResponse::sendResponse(200, 'success', compact('article'));
    }

    public function favoriteArticles() : JsonResponse
    {
        $client = auth()->guard('api')->user();
        if (!$client) {
            return ApiResponse::sendResponse(401, 'Unauthenticated');
        }

        $articles = $client->articles()->paginate();
        if ($articles->isEmpty()) {
            return ApiResponse::sendResponse(200, 'No favorite articles found', ['articles' => []]);
        }
        return ApiResponse::sendResponse(200, 'success',compact('articles'));
    }

    public function toggleFavoriteArticles(Request $request): JsonResponse
    {
        if (! $request->article_id) {
            return ApiResponse::sendResponse(400, 'article_id not found');
        }

        $client = Auth::guard('api')->user();

        $result = $client->articles()->toggle($request->article_id);

        if (empty($result['attached']) && empty($result['detached'])) {
            return ApiResponse::sendResponse(200, 'No change in favorites', ['articles' => []]);
        }

        $status = !empty($result['attached']) ? 'added to favorites' : 'removed from favorites';

        return ApiResponse::sendResponse(200, $status, ['result' => $result]);
    }

}
