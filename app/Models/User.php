<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Helpers\Helpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{


    /** @use HasFactory<\Database\Factories\UserFactory> */

    use HasFactory, Notifiable, InteractsWithMedia;

    public const IMAGE_UPLOAD_PATH = 'uploads/users/';
    protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile();
    }

    public function storeUserData(Request $request)
    {
        $data = $this->prepareData($request);
        return self::create($data);
    }

    public function updateUserData(Request $request, Model $model)
    {
        return $model->update($this->prepareData($request, $model));
    }

    final public function prepareData(Request $request, Model|NULL $model = null)
    {
        $data = [
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => $request->input('password') !== null ? Hash::make($request->input('password')) : $model?->password,
            'role_id'   => $request->input('role_id'),
            'address'   => $request->input('address'),
            'phone'     => $request->input('phone'),
            'status'    => $request->filled('status'),
            'bio'       => $request->input('bio'),
        ];
        // Handle image upload
        $data['avatar'] = Helpers::handleFileUpload($request, 'avatar', $model?->avatar ?? null, self::IMAGE_UPLOAD_PATH);
        return $data;
    }

    /**
     * @param Model $model
     * @return void
     */
    final public function deleteUser(Model $model): void
    {
        Helpers::deleteFile($model->avatar, self::IMAGE_UPLOAD_PATH);
        $model->delete();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission): bool
    {
        return (bool)$this->role->permissions()->where('slug', $permission)->first();
    }
}
