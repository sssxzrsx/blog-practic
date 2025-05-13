<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;



class Post extends Model
{
    use Sluggable;
    protected $fillable = ['title', 'slug', 'description', 'content','category_id', 'views', 'yhumbnail'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source' => 'title'
            ]
            ];
    }

    public static function uploadImage(Request $request, $image = null){
        if($request->hasFile('yhumbnail')){
            if($image){
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request -> file('yhumbnail') -> store("public/images/{$folder}");
        }
        return null;
    }
    public function getImage(){
        if (!$this->yhumnail){
            return asset('images/default.jpg');
        }
        return asset("uploads/{$this->yhumbnail}");
    }
}
