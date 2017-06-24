<?php

namespace App\Helpers;

use App\Exceptions\FileException;
use File;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;
use Exception;

class FileHelper
{
    public static function deleteFileIfExists($filePath)
    {
        if(File::exists($filePath))
        {
            File::delete($filePath);
        }
    }

    public static function createFolderIfNotExist($folderPath)
    {
        if(!File::exists($folderPath))
        {
            File::makeDirectory($folderPath);
        }
    }

    public static function addExtension($fileName, $file)
    {
        if(!is_null($file->guessExtension()))
        {
            return $fileName . '.' . $file->guessExtension();
        }
        else
        {
            return $fileName;
        }
    }

    public static function getMimeType($fileName){
        try{
            $guesser = MimeTypeGuesser::getInstance();
            $mimeType = $guesser->guess($fileName);
            return $mimeType;
        }
        catch(Exception $ex){
            throw new FileException($ex->getMessage());
        }
    }

    public static function getFileSize($fileName){
        $size = filesize($fileName);
        if($size === FALSE){
            throw new FileException('Couldn\'t get file size');
        }

        return $size;
    }

    public static function writeToFile($fileHandle, $data) {
        for ($written = 0; $written < strlen($data); $written += $fwrite) {
            $fwrite = fwrite($fileHandle, substr($data, $written));
            if ($fwrite === false) {
                throw new FileException('Couldn\'t write data to file handle');
            }
        }

        return $written;
    }

    public static function openFile($fileName, $fileMode){
        $fileHandle = fopen($fileName, $fileMode);
        if($fileHandle === FALSE){
            throw new FileException('Couldn\'t open file');
        }

        return $fileHandle;
    }


    public static function convertToPng($imagePath, $saveImagePath){
        try{
            $data = File::get($imagePath);

            $image = imagecreatefromstring($data);
            if($image === FALSE){
                throw new FileException('Image is not valid for conversion.');
            }

            if(!imagealphablending($image, false) || !imagesavealpha($image, true)){
                throw new FileException('Image is not valid for conversion.');
            }

            $result = imagepng($image, $saveImagePath);
            if($result === FALSE){
                throw new FileException('Image is not valid for conversion.');
            }
        }
        catch(Exception $ex){
            throw new FileException($ex->getMessage());
        }
    }
}