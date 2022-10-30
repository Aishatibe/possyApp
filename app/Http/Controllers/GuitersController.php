<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guiter;
use App\Http\Requests\GuiterFormRequest;

class GuitersController extends Controller
{
    private static function getData(){
        return [
            ['id' => 1, 'name' => 'American standard strat', 'brand' => 'Fender' ],
            ['id' => 2, 'name' => 'Starler S3', 'brand' => 'PRS' ],
            ['id' => 3, 'name' => 'Explorer', 'brand' => 'Gibson' ],
            ['id' => 4, 'name' => 'Talman', 'brand' => 'Ibanex' ], 
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET
        return view('guiters.index', [
            'guiters' => Guiter::all(),
            'userInput' => '<script>alert("pull")</script>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET
        return view('guiters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuiterFormRequest $request)
    {
        $data = $request -> validated();
        /* $request->validate([
            'guiter-name' => 'required',
            'brand' => 'required',
            'year' => ['required', 'integer'],
        ]); */
        //POST
        $guiter = new Guiter();

        $guiter->name = $data['guiter-name'];
        $guiter->brand = $data['brand'];
        $guiter->year_made = $data['year'];
        
        /* $guiter->name = strip_tags($request->input('guiter-name'));
        $guiter->brand = strip_tags($request->input('brand'));
        $guiter->year_made = strip_tags($request->input('year')); */

        $guiter->save();
        return redirect()->route('guiters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /*  public function show($id) */
   public function show(Guiter $guiter)
    {
        //GET
       /*  $guiters = self::getData();
        $index = array_search($guiter, array_column($guiters, 'id'));
        if($index === false){
            abort(404);
        } */
       /*  return view('guiters.show', [
            'guiters' => $guiters[$index]
        ]); */
        return view('guiters.show', [
            'guiter' => $guiter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guiter $guiter)
    {
        //GET
        return view('guiters.edit', [
            'guiter' => $guiter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guiter $guiter)
    {
        //POST, PUT, PATCH
        $data = $request -> validated();
        //POST
        $guiter = $guiter;
        
        $guiter->name = $data['guiter-name'];
        $guiter->brand = $data['brand'];
        $guiter->year_made = $data['year'];

        $guiter->save();
        return redirect()->route('guiters.show', $guiter->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DELETE
    }
}