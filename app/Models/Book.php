<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;
use Str;

class Book extends Model
{
    use HasFactory;
    public function Author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id', 'id');
    }
 
    public function store( $request){

        $fileName = null;
        $fileName = $this->uploadPhoto($request);

        $this->title = $request->book_title;
        $this->isbn = $request->book_isbn;
        $this->pages = $request->book_pages;
        $this->about = $request->book_about;
        $this->author_id = $request->author_id;
        $this->photo = $fileName;
        $this->save();
    }

    public function updateBook($request){
        $this->title = $request->book_title;
        $this->isbn = $request->book_isbn;
        $this->pages = $request->book_pages;
        $this->about = $request->book_about;
        $this->author_id = $request->author_id;
        $this->save();
    }

    public function deleteBook(){
        $this->unlinkPhoto();
        $this->delete();
    }
 
    public function uploadPhoto( $request){
        if ($request->has('photo')) {
            $img = Image::make($request->file('photo'));
            $fileName = Str::random(5).'.jpg';
            $folderBig = public_path('/photos/big');
            $img->resize(1200,null,function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($folderBig."/".$fileName,80,'jpg');

            $folderSmall = public_path('/photos/small');
            $img->resize(75,null,function ($constraint) {
                 $constraint->aspectRatio();
            });
            $img->save($folderSmall."/".$fileName,80,'jpg');
            return $fileName;
        }

    }

    public function deletePhoto(){
       $this->unlinkPhoto();
        $this->photo = null;
        $this->save();
    }

    public function unlinkPhoto(){
        if($this->photo !=null){
            unlink(public_path('/photos/big/'.$this->photo));
            unlink(public_path('/photos/small/'.$this->photo));

        }
    }

    public function updatePhoto( $request){
        $this->deletePhoto();
        $fileName = null;
        $fileName = $this->uploadPhoto($request);
        $this->photo = $fileName;
        $this->save();
    }
}
