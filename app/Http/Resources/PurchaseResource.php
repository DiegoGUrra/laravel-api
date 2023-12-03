<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $data = ['id' =>$this->id,
        'eventId' =>$this->event_id,
        'quantity' =>$this->quantity,
        'puchaseDate'=>$this->purchase_date,

        ];
        if ($request->getPathInfo()=='/api/purchase') {
            $data['customerId'] = $this->customer_id;
        }
        return $data;
    }
}
