<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return Car::paginate(20);
    }

    public function show($id)
    {
        return Car::findOrFail($id);
    }

    public function store(Request $request)
    {
        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return response()->json($car);
    }

    public function destroy($id)
    {
        Car::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
