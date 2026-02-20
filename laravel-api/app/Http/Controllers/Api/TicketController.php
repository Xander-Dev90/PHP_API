<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Resources\TicketResource;
use App\Http\Requests\StoreTicketRequest;

use Symfony\Component\HttpFoundation\Response;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {  
        $tickets = Ticket::with(['category', 'tags', 'user'])->get();
        return TicketResource::collection($tickets);
        
    }

    public function store(StoreTicketRequest $request) 
    {
    
        $ticket = Ticket::create($request->all());

        $ticket->tags()->sync($request->input('tags'));

        return response()->json(new TicketResource($ticket), Response::HTTP_CREATED);// 201 status code for created resource
    }

    public function show(Ticket $ticket)
    {
        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
       $ticket = $ticket->load(['category', 'tags', 'user']);
       return new TicketResource($ticket);
    }

     public function update(UpdateTicketRequest $request, Ticket $ticket) 
     {
        $ticket->update($request->all());

        if ($tags = json_decode($request->input('tags'), true)) {
            $ticket->tags()->sync($tags);

        }
        return response()->json(new TicketResource($ticket), Response::HTTP_OK);// 201 status code for created resource
     }

     public function destroy(Ticket $ticket)
     {
        $ticket->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
     }
}
