<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['category_id', 'name', 'desc', 'content', 'thumbnail'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function uploadThumbnail(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store($folder);
        }
        return null;
    }

    public function getThumbnail()
    {
        if ($this->thumbnail != null) {
            return asset("uploads/{$this->thumbnail}");
        }
        return asset("assets/admin/img/no-image.png");
    }

    public function getDateAgo()
    {
        /*return Carbon::parse($this->created_at)->diffForHumans();*/

        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)
            ->format('d F, Y');

        /*$formatter = new \IntlDateFormatter('az_AZ',
            \IntlDateFormatter::FULL, \IntlDateFormatter::FULL);
        $formatter->setPattern('d MM, y');
        return $formatter->format(new \DateTime($this->created_at));*/
    }

    public function scopeLike($query, $q)
    {
        return $query->where('name', 'like', "%{$q}%");
    }
}
