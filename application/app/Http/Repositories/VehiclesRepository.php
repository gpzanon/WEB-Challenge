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
     * @return Vehicle[]|Collection
     */
    public function listAll()
    {
        return $this->vehicle->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getVehicleById(int $id)
    {
        return $this->vehicle->findOrFail($id);
    }

    /**
     * @param array $vehicle
     */
    public function save(Array $vehicle)
    {
        $this->vehicle->create($vehicle);
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function update(int $id, Array $data)
    {
        $vehicle = $this->vehicle->findOrFail($id);
        $vehicle->update($data);
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
