<?

use Illuminate\Http\UploadedFile;

class Upload
{

    public static function upload(UploadedFile $file, string $folder)
    {
        $filename = $file->getClientOriginalName();
        if (!file_exists(public_path('images/' . $folder . '/' . $filename)))
            $file->move(public_path('images/' . $folder), $filename);
        return 'images/' . $folder . '/' . $filename;
    }
}
