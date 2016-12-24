<?php

namespace App;

use Image;

use Illuminate\Database\Eloquent\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    
	protected $table = 'flyers_photos';

	protected $fillable = ['name', 'path', 'thumbnail_path'];

    // protected $baseDir = 'images/photos';

    protected $file;

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    protected static function boot()
    {
        static::creating(function($photo){
            return $photo->upload();
        });
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function flyer()
    {
    	return $this->belongsTo('App\Flyer');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public static function fromFile(UploadedFile $file)
    {
        $photo = new static;

        $photo->file = $file;

        return $photo->fill([
            'name' => $photo->fileName(),
            'path' => $photo->filePath(),
            'thumbnail_path' => $photo->thumbnailPath(),
        ]);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function fileName()
    {
        $name = sha1(
            time() . $this->file->getClientOriginalName()
            );

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function filePath()
    {
        return $this->baseDir(). '/' . $this->fileName();
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function thumbnailPath()
    {
        return $this->baseDir(). '/tn-' . $this->fileName();   
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function baseDir()
    {
        return 'images/photos';
    }

    // *
    //  * undocumented function
    //  *
    //  * @param string $name
    //  * @return self 
    //  * @author 
    //  *
    // public static function named($name)
    // {

    //     return (new static)->saveAs($name);
    // }

    // /**
    //  * undocumented function
    //  *
    //  * @return void
    //  * @author 
    //  **/
    // protected function saveAs($name)
    // {
    //     $this->name = sprintf("%s-%s", time(), $name);
    //     $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
    //     $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);

    //     return $this;
    // }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function upload()
    {
        $this->file->move($this->baseDir(), $this->fileName());

        $this->makeThumbnail();

        return $this;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    protected function makeThumbnail()
    {
        Image::make($this->filePath())
            ->fit(200)
            ->save($this->thumbnailPath());
    }
}
