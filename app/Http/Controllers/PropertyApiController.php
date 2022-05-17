<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tag;
use Illuminate\Http\Request;

class PropertyApiController extends Controller
{
    public function index()
    {

        return Property::all();
    }

    public function show($id)
    {
        $property = Property::with('tags')->find($id);
        if (is_null($property)) {
            return $this->sendError('Property not found.');
        }
        return $property;
    }

    public function store()
    {

        request()->validate([
            'monthly_rental' => 'required',
            'deposit_amount' => 'required',
            'max_tenants' => 'required',
            'minimum_duration_months' => 'required',
            'available_from' => 'required',
            'council_tax_band' => 'required',
            'epc_rating' => 'required',
            'description' => 'required'
        ]);

        $property = Property::create([
            'monthly_rental' => request('monthly_rental'),
            'deposit_amount' => request('deposit_amount'),
            'max_tenants' => request('max_tenants'),
            'minimum_duration_months' => request('minimum_duration_months'),
            'available_from' => request('available_from'),
            'council_tax_band' => request('council_tax_band'),
            'epc_rating' => request('epc_rating'),
            'description' => request('description')
        ]);

        $tag = Tag::find([1, 2]);
        $property->tags()->attach($tag);

        return 'Success';
    }
}
