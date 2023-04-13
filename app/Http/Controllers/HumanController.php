<?php

namespace App\Http\Controllers;

use App\Models\Human;
use App\Models\HumanType;
use App\Repositories\HumanRepository;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    protected $repository;
    
    public function __construct(HumanRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$humans = $this->repository->paginate($limit = config('app.paginate_number'), $columns = ['*']);
        $humans = Human::all();
        
        $response = [
            'success' => true,
            'data' => $humans,
            'message' => 'Human data success',
        ];
        
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = HumanType::all();
        
        $response = [
            'success' => true,
            'data' => [
                'types' => $types,
                'human' => [],
            ],
            'message' => '',
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
        $human = $this->repository->findWithoutFail($id);
        $humanTypes = HumanType::all();
        
        $response = [
            'success' => true,
            'data' => $human,
            'humanTypes' => $humanTypes,
            'message' => 'Human data success',
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
