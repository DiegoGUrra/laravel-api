<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id'=>$this->id,
            'name'=>$this->name,
            'date'=>$this->date,
            'venue'=>$this->venue,
            'ticketPrice'=>$this->ticket_price,
        ];
        if ($request->getPathInfo() != '/api/events') {
            Log::debug('pasó');
            $data['description'] = $this->description;
        }
        return $data;
    }
}
