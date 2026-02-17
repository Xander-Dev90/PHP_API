<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Resources\TicketResource;

use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {  
        $tickets = Ticket::with(['category', 'tags', 'user'])->get();
        return TicketResource::collection($tickets);
        
    }

    public function store() {}

    public function show(Ticket $ticket)
    {
        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
       $ticket = $ticket->load(['category', 'tags', 'user']);
       return new TicketResource($ticket);
    }

     public function update() {}

     public function delete() {}
}
