<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Theater;
use App\Http\Requests\V1\StoreTheaterRequest;
use App\Http\Requests\V1\UpdateTheaterRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TheaterCollection;
use App\Http\Resources\V1\TheaterResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class TheaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = QueryBuilder::for(Theater::class)->allowedFilters([
            AllowedFilter::exact('id'),
            'name',
            'location',
        ])
        ->allowedSorts('id', 'name','location')
        ->allowedIncludes(['halls'])
        ->paginate(50)->appends(request()->query());

        return new TheaterCollection($tickets);
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
    public function store(StoreTheaterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Theater $theater)
    {
        $query = QueryBuilder::for(Theater::class)->where('id',$theater->id)->allowedIncludes(['halls'])->first();
        return new TheaterResource($query);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theater $theater)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTheaterRequest $request, Theater $theater)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theater $theater)
    {
        //
    }
}
