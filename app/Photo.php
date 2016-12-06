<?php

namespace App;

use Image;

use Illuminate\Database\Eloquent\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    
	protected $table = 'flyers_photos';

	protected $fillable = ['name', 'path', 'thumbnail_path'];

    protected $baseDir = 'images/photos';

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
     * @param string $name
     * @return self 
     * @author 
     **/
    public static function named($name)
    {

        return (new static)->saveAs($name);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    protected function saveAs($name)
    {
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);

        return $this;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);

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
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }
}
