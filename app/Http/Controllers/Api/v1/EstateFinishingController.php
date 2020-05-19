<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\EstateFinishing;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class EstateFinishingController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estateFurnishings = EstateFinishing::all();
        
        return $this->successResponse($estateFurnishings);
      
    }

    /**
     * Create one new Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

          
            'estate_finishing'=>'required|string',
         
           
        ]);
       
        $estateFinishing = EstateFinishing::create($request->all());          
        return $this->successResponse($estateFinishing,Response::HTTP_CREATED);
       
    }

    /**
     * get one Clinic
     *
     * @return Illuminate\Http\Response
     */
    public function show($estateFinishing)
    {
        //
        $estateFinishing = EstateFinishing::findOrFail($estateFinishing);
        return $this->successResponse($estateFinishing);
        
    }

    /**
     * update an existing one Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$estateFinishing)
    {

        $this->validate($request,[
           
            
            'estate_furnishing'=>'string',
            
            
        ]);
        $estateFinishing = EstateFinishing::findOrFail($estateFinishing);
        $estateFinishing->fill($request->all());

        
        if($estateFinishing->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $estateFinishing->save();
        return $this->successResponse($estateFinishing);
    }

     /**
     * remove an existing one clinic
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($estateFinishing)
    {
        $estateFinishing = EstateFinishing::findOrFail($estateFinishing);
        $estateFinishing->delete();
        return $this->successResponse($estateFinishing);
      
    }

}
