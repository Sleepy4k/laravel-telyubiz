<?php

namespace App\Enums;

enum UploadFileType: string
{
    case FILE = 'files';
    case IMAGE = 'photos';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
