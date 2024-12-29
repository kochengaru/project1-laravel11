<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    public function showDistributors()
    {
        $distributors = Distributor::all();
        return view('welcome', compact('distributors'));
    }
}


