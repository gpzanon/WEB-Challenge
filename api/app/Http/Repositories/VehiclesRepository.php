<?php

namespace App\Http\Repositories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;

class VehiclesRepository
{

    /**
     * Model Vehicle
     *
     * @var Vehicle
     */
    private $vehicle;

    /**
     * Create a new instance
     *
     * @param Vehicle $vehicle
     */
    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }


    /**
     * @param string $term
     * @return mixed
     */
    public function listAll(string $term = '')
    {
        return $this
            ->vehicle
            ->select([
                'vehicles.*',
                'brands.name as brand_name'
            ])
            ->join('brands', 'brands.id', '=', 'brand_id')
            ->where('vehicles.name', 'like', "%$term%")
            ->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getVehicleById(int $id)
    {
        return $this
            ->vehicle
            ->select([
                'vehicles.*',
                'brands.name as brand_name'
            ])
            ->where('vehicles.id', $id)
            ->join('brands', 'brands.id', '=', 'brand_id')
            ->first();
    }

    /**
     * @param array $vehicle
     * @return mixed
     */
    public function save(Array $vehicle)
    {
        return $this->vehicle->create($vehicle);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, Array $data)
    {
        $vehicle = $this->vehicle->findOrFail($id);
        return $vehicle->update($data);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $vehicle = $this->vehicle->findOrFail($id);
        $vehicle->delete($id);
    }

    /**
     * @param int $id
     */
    public function changeStatusSold(int $id)
    {
        $vehicle = $this->vehicle->findOrFail($id);
        $vehicle->update([ 'is_sold' => !$vehicle->is_sold ]);
    }
}
