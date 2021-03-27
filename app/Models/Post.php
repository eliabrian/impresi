<?php

namespace App\Models;

use DataTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'description',
        'published'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published', '=', 1);
    }

    public function getPublished()
    {
        return $this->published()->latest()->get();
    }

    public function getUpdatedAtAttribute($value)
	{
		return Carbon::createFromTimestamp(strtotime($value))
            ->timezone('Asia/Jakarta')
            ->toDateTimeString();
    }

    public function getCreatedAtAttribute($value)
	{
		return Carbon::createFromTimestamp(strtotime($value))
        ->timezone('Asia/Jakarta')
        ->toDateTimeString();
    }

    public function datatable()
    {
        $posts = $this->where('user_id', Auth::id())->latest();

        return DataTables::of($posts)
            ->editColumn('published', function(Post $post){
                return $post->published ? 'Published' : 'Draft';
            })
            ->editColumn('updated_at', function(Post $post){
                return date('d F Y', strtotime($post->updated_at));
            })
            ->addColumn('action', function(Post $post){
                return view('admin.layouts._action', ['id' => $post->id])->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
