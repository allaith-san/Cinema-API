<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Screening;
use App\Http\Requests\V1\StoreScreeningRequest;
use App\Http\Requests\V1\UpdateScreeningRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ScreeningCollection;
use App\Http\Resources\V1\ScreeningResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class ScreeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $screenings = QueryBuilder::for(Screening::class)->allowedFilters([
            AllowedFilter::exact('id','movie_id','hall_id'),
            AllowedFilter::scope('from_id'),
        ])
        ->allowedSorts('id','movie_id','hall_id','reserved_seats', 'remaining_seats')
        ->allowedIncludes(['tickets'])
        ->paginate(50)->appends(request()->query());

        return new ScreeningCollection($screenings);
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
    public function store(StoreScreeningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Screening $screening)
    {
        $query = QueryBuilder::for(Screening::class)->where('id',$screening->id)->allowedIncludes(['tickets'])->first();
        return new ScreeningResource($query);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Screening $screening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScreeningRequest $request, Screening $screening)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Screening $screening)
    {
        //
    }
}
