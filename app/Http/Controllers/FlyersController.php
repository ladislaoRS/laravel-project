<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddFlyerRequest;

class FlyersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
    * Show the form for creating a new resource
    * @return Response
    */  
    public function index()
    {   
        $flyers = Flyer::all();
        return view('flyers.index', compact('flyers'));
    }

   /**
    * Show the form for creating a new resource
    * @return Response
    */ 	
    public function create()
    {   
        //flash()->overlay('Welcome Aboard!', 'Thank you for signing up.');
        return view('flyers.create');
    }

    /**
     * store a newly created resource in storage
     * @param FlyerRequest $request
     * @return Response
     * @author 
     **/    
    public function store(FlyerRequest $request)
    {
        //Flyer::create($request->all());

        $flyer = Auth::user()->publish(
            new Flyer($request->all())
        );

        flash()->success('Success!', 'Flyer successfully created!');

        return redirect(flyer_path($flyer));        
        //return redirect()->back();
    }

    /**
     * Display the specified resource
     * @param string $zip 
     * @param string $street
     * @return Response
     * @author 
     **/
    public function show($zip, $street)
    {

        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));

    }

    /**
     * Apply a photo to the referenced flyer.
     * @param string  $zip
     * @param string  $street
     * @param AddFlyerRequest $request
     * @author 
     **/
    public function addPhoto($zip, $street, AddFlyerRequest $request)
    {
        
        $photo = Photo::fromFile($request->file('photo'));
        // $photo = $this->makePhoto($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhoto($photo);
    }

    // /**
    //  * undocumented function
    //  *
    //  * @return void
    //  * @author 
    //  **/
    // public function makePhoto(UploadedFile $file) 
    // {

    //     return Photo::named($file->getClientOriginalName())
    //         ->move($file);
    // }
}
