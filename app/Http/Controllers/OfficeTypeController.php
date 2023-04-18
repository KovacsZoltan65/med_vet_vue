<?php

namespace App\Http\Controllers;

use App\Models\OfficeType;
use App\Repositories\OfficeTypeRepository;
use Illuminate\Http\Request;

class OfficeTypeController extends Controller
{
    private $repository;
    public function __construct(OfficeTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = OfficeType::all();

        $response = [
            'success' => true,
            'data' => $types,
            'message' => 'Office type data success',
        ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
    
    public function getTypes(){
        $types = OfficeType::all();
        dd($types);
        return response()->json($types, 200);
    }
}
