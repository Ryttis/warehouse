<?php

namespace App\Services;

use App\Models\Quantity;

class AdvisorService
{
    /**
     * Fetches products from DB according to weather forecast
     *
     */
    public function getProduct()
    {
        $quant = Quantity::all()->first();
        $quant->quantity++;
        $quant->save();
    }

}
