<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Ticket;
use App\Http\Requests\V1\StoreTicketRequest;
use App\Http\Requests\V1\UpdateTicketRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TicketCollection;
use App\Http\Resources\V1\TicketResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tickets = QueryBuilder::for(Ticket::class)->allowedFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::scope('from_cost'),
            'cost',
            'status',
        ])
        ->allowedSorts('id', 'cost','status')
        ->paginate(50)->appends(request()->query());

        return new TicketCollection($tickets);
    }


    public function create()
    {
        //
    }


    public function store(StoreTicketRequest $request)
    {
        return new TicketResource(Ticket::create($request->all()));
    }


    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }


    public function edit(Ticket $ticket)
    {
        //
    }


    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }


    public function destroy(Ticket $ticket)
    {
        //
    }
}
