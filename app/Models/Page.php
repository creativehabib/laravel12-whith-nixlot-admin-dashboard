<?php

namespace App\Models;

use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    public const IMAGE_UPLOAD_PATH = 'uploads/pages/';
    protected $guarded = ['id'];

    final public function deletePage(Model $model): void
    {
        Helpers::deleteFile($model->image, self::IMAGE_UPLOAD_PATH);
        $model->delete();
    }

    public function storeData(Request $request): Model
    {
        $data = $this->prepareData($request);
        return self::create($data);
    }
    /**
     * @param Request $request
     * @param Model $model
     * @return bool
     */
    public function updateData(Request $request, Model $model): bool
    {
        return $model->update($this->prepareData($request, $model));
    }

    /**
     * @param Request $request
     * @param Model|NULL $model
     * @return array
     */
    public function prepareData(Request $request, Model|NULL $model = null): array
    {
        $data = [
            'title'             => $request->title,
            'slug'              => Str::slug($request->title),
            'excerpt'           => $request->excerpt,
            'body'              => $request->body,
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
            'status'            => $request->filled('status'),
        ];
        $data['image'] = Helpers::handleFileUpload($request, 'image', $model?->image ?? null, self::IMAGE_UPLOAD_PATH);
        return $data;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public static function findBySlug($slug): mixed
    {
        return self::where('slug',$slug)->where('status', true)->firstOrFail();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query): mixed
    {
        return $query->where('status', true);
    }
}
