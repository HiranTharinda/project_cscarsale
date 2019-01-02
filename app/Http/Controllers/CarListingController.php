<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars\CarListing;
use App\Cars\SoldCar;

class CarListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarListing::paginate(15);
    }

    /**
     * store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'id_car_model' => 'required|exists:car_model',
            'id_seller' => 'required|exists:users,id',
            'condition' => 'required',
            'mileage' => 'required',
            'color' => 'required',
            'year' => 'required',
            'images' => 'required',
            'city' => 'required'
        ]);

        return $validatedData;
        $validFields = [
            'id_car_listing',
            'condition',
            'mileage',
            'color',
            'seller_description',
            'year',
            'images',
            'city',
            'id_car_model',
            'id_seller'
        ];

        $data = array_intersect_key($validatedData, array_flip($validFields));
        
        return $data;
        $newListing = createCarListing($data);

        return response()->json($newListing);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cars\CarListing  $carListing
     * @return \Illuminate\Http\Response
     */
    public function show(CarListing $carListing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cars\CarListing  $carListing
     * @return \Illuminate\Http\Response
     */
    public function edit(CarListing $carListing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cars\CarListing  $carListing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $request->all();
    }

    /* Utility functions below */

    /**
     * create a new car listing and returns the object created
     * @param AssociativeArray $data
     * @return App\Cars\CarListing
     */
    public function createCarListing($data) {
        $newListing = new CarListing($data);
        $newListing->save();
        return $newListing;
    }


    /**
     * update the specified carListing
     * @param \App\Cars\CarListing $carListing
     * @param AssociativeArray $data
     */
    public function updateCarListing($carListing, $data) {
        foreach ($data as $key => $value) {
            $carListing[$key] = $value;
        }

        $carListing->save();
    }


    /**
     * returns the specified car listings on given parameters
     * as an associative array
     * @param AssociativeArray $data
     * @return array of App\Cars\CarListing
     */
    public function viewCarListing($data) {
        $query = CarListing::query();
        foreach ($data as $key => $value) {
            $query = $query->where($key, $value);
        }

        return $query->get();
    }


    /**
     * Mark the specified car as sold to a specified buyer
     * @param App\Cars\CarListing $carListing
     * @param App\Customers\Buyer
     * @return App\Cars\SoldCar
     */
    public function sellCarListing($carListing, $buyer) {
        $soldCar = new SoldCar();
        foreach ($$carListing as $key => $value) {
            $soldCar[$key] = $value;
        }

        $carListing->delete();
        $soldCar->buyer()->associate($buyer);
        $soldCar->save();

        return $soldCar;
    }
}