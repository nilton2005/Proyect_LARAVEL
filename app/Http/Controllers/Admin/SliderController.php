<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\http\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('user.status');        
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getHome(){
        $sliders = Slider::orderBy('sorder','Asc')->get();
        $data = ['sliders'=>$sliders];
        return view('admin.slider.home',$data) ;
    }

    public function postSliderAdd(Request $request){
        
        $rules = [
            'name'=> 'required',
            'img' => 'required',
            'content' => 'required',
            'sorder' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del  es necesario',
            'img.required' => 'La imagen del slider es necesario',
            'content.required' => 'La descripción es necesario',
            'sorder.required' => 'El necesario el orden  de los sliders',
        ];
        $validator = Validator::make($request->all(),$rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Error inesperado')->with('typealert','danger');
        else:
            // Ubicación de guardado de icono
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName()));
            $filename = time().'-'.$name.'.'.$fileExt;
            $slider = new Slider;
            $slider->user_id = Auth::id();
            $slider->status = $request->input('activado');
            $slider->name = e($request->input('name'));
            $slider->file_path = date('Y-m-d');
            $slider->file_name = $filename;
            $slider->content = e($request->input('content'));
            $slider->sorder = e($request->input('sorder'));
            if($slider->save()):
                if($request->hasFile('img')):
                    $fl = $request->img->storeAs($path,$filename,'uploads');
                endif;
                return back()->with('message','Se guardo la nueva categoria con exito')->with('typealert','success');
            endif;
        endif;
        

    }
    public function getSliderEdit($id){
        $slider = Slider::findOrFail($id);
        $data = ['slider'=>$slider];
        return view('admin.slider.edit', $data);
    }
    public function postSliderEdit(Request $request, $id){
        $rules = [
            'name'=> 'required',
            'content' => 'required',
            'sorder' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del  es necesario',
            'content.required' => 'La descripción es necesario',
            'sorder.required' => 'El necesario el orden  de los sliders',
        ];
        $validator = Validator::make($request->all(),$rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Error inesperado')->with('typealert','danger');
        else:
            $slider = Slider::find($id);
            $slider->status = $request->input('activado');
            $slider->name = e($request->input('name'));   
            $slider->content = e($request->input('content'));
            $slider->sorder = e($request->input('sorder'));
            if($slider->save()):
                return back()->with('message','Se guardo la nueva categoria con exito')->with('typealert','success');
            endif;
        endif;

    }
    public function getSliderDelete($id){
        $slider = Slider::findOrFail($id);
        if($slider->delete()):
            return back()->with('message','Slide eliminado correctamente')->with('typealert','success');
        endif;
    }
}
