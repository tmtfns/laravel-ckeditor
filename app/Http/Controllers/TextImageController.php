<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Models\Image;


class TextImageController extends Controller
{
    private $folder;
    const UPLOAD_FOLDER = 'upload/text/';
    
    public function __construct(Request $request)
    {
        //parent::__construct();
        
        $this->folder = $request->route('folder');
        if (! in_array($this->folder, ['companies', 'couponsDesc', 'couponsCond', 'couponsSpec'])) {
            abort(403);
        }
    }
    
    
    public function index(Request $request, $folder)
    {
        $link = '/'. self::UPLOAD_FOLDER. $this->folder. '/';       
        $numFunction = $request->input('CKEditorFuncNum');
        $items = Image::select(DB::raw("`id`, CONCAT('" . $link. "', `name`) as `name`"))
                ->where('folder', $this->folder)->get();                
        return view('ckeditor.index', ['items' => $items, 'CKEditorFuncNum' => $numFunction]);       
          
    }
    
    
    public function store(Request $request, $folder)            
    {        
        $reply = [
            'uploaded' => 0, 
            'cknum' => $request->input('CKEditorFuncNum')
        ];
        if ($request->hasFile('upload')) {
            $img = $request->upload;
            if ((! $img->isValid()) || (! in_array($img->getMimeType(), 
                    ['image/jpeg', 'image/png', 'image/gif']))) {
                $reply['error'] = ['download error'];
                return response()->json($reply); 
            }
            $path = $img->path();
            $extension = $img->extension();           
            $folder = public_path(self::UPLOAD_FOLDER. $this->folder);
            do {
                $newName = uniqid() . '.' . $extension;
                $realname = $folder . $newName;
            } while ( file_exists($realname) );                   
            $img->move($folder, $newName);
           
            $item = new Image();            
            $item->ext = $extension;
            $item->name = $newName;
            $item->folder = $this->folder;
            $item->save();
            $reply['uploaded'] = 1;
            $reply['fileName'] = $newName;
            $reply['url'] = '/'. self::UPLOAD_FOLDER. $this->folder. '/'. $newName;
        }      
         
        return view('ckeditor.reply', $reply); 
    } 
       
    
    
    
    
}
