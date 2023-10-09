<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ad\AdRequest;
use App\Models\Ad;
use App\Models\City;
use App\Models\Conversation;
use App\Models\Governorate;
use App\Models\Message;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class PostController extends Controller
{
    //
    public function get_ad(Ad $ad)
    {
        return view("posts.post", [
            "ad" => $ad          
        ]);
    }

    public function edit(Ad $ad)
    {
        return view("posts.edit_post", [
            "ad" => $ad,
            "governorates" => Governorate::all(),
            "cities" => City::all(),
        ]);
    }

    public function update(AdRequest $request, Ad $ad)
    {
        $validated = $request->validated();
        $validated["user_id"] = auth()->user()->id;

        if($request->thumbnail){
            Storage::disk('public_upload')->delete('/ads/' . $ad->thumbnail);

            $file_extension = request('thumbnail')->getClientOriginalExtension();
            $file_name = rand(0, 999999999999999) . '.' . $file_extension;
            Image::make(request("thumbnail"))->resize(350, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('upload_files/ads/' . $file_name));
            $validated["thumbnail"] = $file_name;
        }

        if($request->thumbnails){
            foreach($ad->pictures as $picture)
            {
                $picture->delete();
                Storage::disk('public_upload')->delete('/ads/' . $picture->thumbnail);
            }
            $thumbnails = $validated["thumbnails"];

            foreach($thumbnails as $thumbnail)
            {
                $file_extension = $thumbnail->getClientOriginalExtension();
                $file_name = rand(0, 99999999999) . '.' . $file_extension;
                Image::make($thumbnail)->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('upload_files/ads/'. $file_name));

                Picture::create([
                    "ad_id" => $ad->id,
                    "thumbnail" => $file_name
                ]);
            }
        }
        $ad->update(collect($validated)->except(['thumbnails'])->toArray());
        return redirect()->route("ad.post.offers", $ad->slug);
    }

    public function destroy(Ad $ad)
    {
        Storage::disk('public_upload')->delete('/ads/' . $ad->thumbnail);
        foreach($ad->pictures as $picture)
        {
            $picture->delete();
            Storage::disk('public_upload')->delete('/ads/' . $picture->thumbnail);
        }
        $ad->delete();
        return redirect()->route("users.my-ads");
    }
}