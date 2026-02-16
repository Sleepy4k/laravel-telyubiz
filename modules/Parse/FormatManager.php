<?php

namespace Modules\Parse;

use Illuminate\Support\Carbon;

class FormatManager
{
    /** The size units. */
    protected static array $sizeUnits = ['B', 'KB', 'MB', 'GB', 'TB'];

    /** The image file extensions. */
    protected static array $imageExtensions = [
        'jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'tiff', 'ico',
    ];

    /** The file extensions. */
    protected static array $fileExtensions = [
        'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'odt', 'ods', 'odp', 'rtf', 'txt', 'csv',
        'zip', 'rar', '7z', 'tar', 'gz',
    ];

    /**
     * Format the file size.
     */
    public function formatFileSize(float|int $bytes, int $precision = 2): string
    {
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count(static::$sizeUnits) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . static::$sizeUnits[$pow];
    }

    /**
     * Format the number.
     */
    public function formatNumber(float|int $number, int $precision = 2): string
    {
        return number_format($number, $precision);
    }

    /**
     * Format the currency.
     */
    public function formatCurrency(float|int $amount, string $currencySymbol = 'Rp', int $precision = 0): string
    {
        return $currencySymbol . ' ' . number_format($amount, $precision, ',', '.');
    }

    /**
     * Format the date.
     */
    public function formatDate(string $date, string $format = 'd-m-Y'): string
    {
        return Carbon::parse($date)->format($format);
    }

    /**
     * Format the time.
     */
    public function fromFormatDate(string $date, string $format = 'd-m-Y'): Carbon
    {
        return Carbon::createFromFormat($format, $date);
    }

    /**
     * Get the file upload types.
     */
    public function getFileUploadTypes(): array
    {
        return [
            'image' => 'Image',
            'file'  => 'File',
        ];
    }

    /**
     * Get the file extensions.
     */
    public function getFileExtensions(): array
    {
        $fileTypes = array_merge(
            static::$imageExtensions,
            static::$fileExtensions,
        );
        $content = array_map('strtoupper', $fileTypes);

        return array_combine($fileTypes, $content);
    }

    /**
     * Get the image file extensions.
     */
    public function getImageExtensions(): array
    {
        return array_combine(
            static::$imageExtensions,
            array_map('strtoupper', static::$imageExtensions),
        );
    }

    /**
     * Get the server's maximum upload size in bytes.
     */
    public function getServerMaxUploadSize(): int
    {
        $serverMaxUploadSize = ini_get('upload_max_filesize');
        $serverMaxPostSize = ini_get('post_max_size');
        $serverThreshold = max(
            $serverMaxUploadSize,
            $serverMaxPostSize,
        );

        return (int) preg_replace('/[^0-9]/', '', $serverThreshold) * 1024;
    }

    /**
     * Get the maximum upload size options.
     */
    public function uploadSizeOptions(int $serverThreshold, int $step = 1024): array
    {
        $maxSizeOptions = [];
        foreach (range(1024, $serverThreshold, $step) as $size) {
            $maxSizeOptions[$size] = $size . ' KB';
        }

        return $maxSizeOptions;
    }
}
