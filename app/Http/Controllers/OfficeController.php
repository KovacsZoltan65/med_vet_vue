<?php

namespace App\Http\Controllers;
//use App\Http\Resources\OfficeResource;


use App\Models\OfficeType;
use App\Repositories\OfficeRepository;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    protected $repository;

    public function __construct(OfficeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* JÓ
        $offices = \App\Models\Office::all();
        
        echo '<pre>';
        foreach( $offices as $office ){
            print_r($office->name);
            print_r($office->officeType->name);
        }
        echo '</pre>';
        */

        if( $request->has('view_deleted') ){
            $offices = $this->repository->onlyTrashed()
                ->paginate($limit = config('app.paginate_number'), $columns = ['*']);
        }else{
            $offices = $this->repository
                ->paginate($limit = config('app.paginate_number'), $columns = ['*']);
        }
        
        foreach($offices as $office){
            $office->type_name = $office->officeType->name;
        }

        $response = [
            'success' => true,
            'data' => $offices,
            'message' => 'Office data success',
        ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $types = OfficeType::all();
        $response = [
            'success' => true,
            'data' => [],
            'types' => $types,
            'message' => 'Create success',
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $office = $this->repository->findWithoutFail($id);
        $types = OfficeType::all();
        //dd($office, $officeTypes);
        $response = [
            'success' => true,
            'data' => $office,
            'types' => $types,
            'message' => 'Office data success',
        ];
        
        return response()->json($response,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
