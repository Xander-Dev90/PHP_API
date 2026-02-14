<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = \App\Models\Ticket::with(['category', 'tags'])->get();
        return response()->json($tickets);
    }

    public function store() {}

    public function show($id)
    {
        $ticket = \App\Models\Ticket::with(['category', 'tags'])->find($id);
        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
        return response()->json($ticket);
    }

     public function update() {}

     public function delete() {}
}
