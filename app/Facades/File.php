<?php

namespace App\Facades;

use App\Enums\UploadFileType;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Facade;
use Modules\Storage\FileManager;

/**
 * @method static bool        checkFile(UploadFileType $type, UploadedFile $file)
 * @method static bool        deleteFile(UploadFileType $type, UploadedFile $file)
 * @method static string|null getFilePath(UploadFileType $type, string $file)
 * @method static int|null    getFileSize(UploadFileType $type, string $file)
 * @method static string|null getFileType(UploadFileType $type, string $file)
 * @method static string|null saveSingleFile(UploadFileType $type, UploadedFile $file)
 * @method static string|null updateSingleFile(UploadFileType $type, UploadedFile $file, string $oldFile)
 *
 * @see FileManager
 *
 * @mixins \Modules\Storage\FileManager
 */
class File extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return FileManager::class;
    }
}
