<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Movie;
use App\Http\Requests\V1\StoreMovieRequest;
use App\Http\Requests\V1\UpdateMovieRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MovieCollection;
use App\Http\Resources\V1\MovieResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = QueryBuilder::for(Movie::class)->allowedFilters([
            AllowedFilter::exact('id'),
            'name',
            'genre',
            'runtime',
            'studio',
            'lead_actor',
            'director',
        ])
        ->allowedSorts('id', 'name', 'genre','runtime','lead_actor','director')
        ->allowedIncludes(['screenings'])
        ->paginate(50)->appends(request()->query());
    return new MovieCollection($movies);
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
    public function store(StoreMovieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $query = QueryBuilder::for(Movie::class)->where('id',$movie->id)->allowedIncludes(['screenings'])->first();
        return new MovieResource($query);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
