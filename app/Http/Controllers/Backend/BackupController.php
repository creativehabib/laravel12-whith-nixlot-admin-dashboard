<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('app.backups.index');
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);

        $files = $disk->files(config('backup.backup.name'));

        $backups = [];
        // make an array of backup files, with their filesize and creation date
        foreach ($files as $key => $file) {
            // only take the zip files into account
            if (substr($file, -4) == '.zip' && $disk->exists($file)) {
                $file_name = str_replace(config('backup.backup.name'). '/', '', $file);
                $backups[] = [
                    'file_path' => $file,
                    'file_name' => $file_name,
                    'file_size' => $this->bytesToHuman($disk->size($file)),
                    'created_at' => Carbon::parse($disk->lastModified($file))->diffForHumans(),
                    'download_link' => action([BackupController::class, 'download'], [$file_name]),
                ];
            }
        }

        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);
        return view('backend.backups.index',compact('backups'));
    }

    private function bytesToHuman($bytes)
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];
        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }
        return round($bytes, 2) . ' ' . $units[$i];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('app.backups.create');
        // start the backup process
        Artisan::call('backup:run');

        notify()->success('Backup Created Successfully.', 'Added');
        return back();
    }

    public function download($file_name)
    {
        Gate::authorize('app.backups.download');

        if (Storage::disk(config('backup.backup.destination.disks')[0])->exists(config('backup.backup.name') . '/' . $file_name)) {
            return Storage::disk(config('backup.backup.destination.disks')[0])->download(config('backup.backup.name') . '/' . $file_name);
        }

        notify()->error('File not found.', 'Error');
        return back();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($file_name)
    {
        Gate::authorize('app.backups.destroy');
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);

        if ($disk->exists(config('backup.backup.name') . '/' . $file_name)) {
            $disk->delete(config('backup.backup.name') . '/' . $file_name);
        }
        notify()->success('Backup Successfully Deleted.', 'Deleted');
        return back();
    }

    public function clean()
    {
        Gate::authorize('app.backups.destroy');
        // start the backup process
        Artisan::call('backup:clean');

        notify()->success('All Old Backups Successfully Deleted!');
        return back();
    }

    public function cache()
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('optimize:clear');
        notify()->success('Cache cleared successfully!');
        return back();
    }
}
