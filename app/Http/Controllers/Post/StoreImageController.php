<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreImageRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class StoreImageController extends Controller
{

    public function __invoke(StoreImageRequest $request)
    {
        $data = $request->validated();
        $image = $data['image'];
        $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' .
            $image->getClientOriginalExtension();
        $filePath = Storage::disk('public')->putFileAs('/images/content', $image, $name);
        return response()->json(['url' => url('/storage' . $filePath)]);
    }
}
