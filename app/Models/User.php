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

class User extends Authenticatable
{
    public const IMAGE_UPLOAD_PATH = 'uploads/users/';

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
        'address',
        'bio',
        'phone',
        'status',
        'avatar'
    ];

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

    public function storeUserData(Request $request)
    {
        $data = $this->prepareData($request);
        return self::create($data);
    }

    public function updateUserData(Request $request, Model $model)
    {
        return $user->update($this->prepareData($request, $model));
    }

    final public function prepareData(Request $request, Model|NULL $model = null)
    {
        $data = [
            'role_id' => $request->input('role_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'confirm_password' => Hash::make($request->input('confirm_password')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            'bio' => $request->input('bio'),
        ];
        // Handle image upload
        $data['avatar'] = $this->handleFileUpload($request, 'avatar', $model?->avatar ?? null, self::IMAGE_UPLOAD_PATH);
        return $data;
    }


    private function handleFileUpload(Request $request, string $fileName, ?string $existingFile, string $uploadPath): ?string
    {
        if(!$request->hasFile($fileName)){
            return $existingFile; // Return existing file if new one isn't upload
        }
        $file = $request->file($fileName);
        // Delete old file/image if it exists
        if(!empty($existingFile)){
            $oldFilePath = public_path($uploadPath . $existingFile);
            if(File::exists($oldFilePath)){
                File::delete($oldFilePath);
            }
        }
        // Generate new image/file name
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$extension;
        $file->move($uploadPath, $fileName); // Move file to destination
        return $fileName;
    }

    /**
     * @param Model $model
     * @return void
     */
    final public function deleteUser(Model $model): void
    {
        Helpers::deleteFile($model->image, self::IMAGE_UPLOAD_PATH);
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
        return $this->role->permissions()->where('slug', $permission)->first() ? true : false;
    }
}
