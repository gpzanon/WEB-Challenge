<?php

namespace App\Http\Controllers;

use App\Http\Repositories\BrandsRepository;
use App\Http\Repositories\VehiclesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{

    /**
     * Vehicles
     *
     * @var VehiclesRepository
     */
    protected $vehiclesRepository;

    /**
     * Brands
     *
     * @var BrandsRepository
     */
    protected $brandsRepository;

    /**
     * @param VehiclesRepository $vehicleRepository
     * @param BrandsRepository $brandsRepository
     */
    public function __construct(VehiclesRepository $vehicleRepository, BrandsRepository $brandsRepository)
    {
        $this->vehiclesRepository = $vehicleRepository;
        $this->brandsRepository = $brandsRepository;
    }

    /**
     * GET/veiculos
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $term = $request->get('term') ?? '';
        $vehicles = $this->vehiclesRepository->listAll($term);
        $brands = $this->brandsRepository->listAll();
        return response()->json([
            'vehicles' => $vehicles,
            'brands' => $brands
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function edit(int $id): JsonResponse
    {
        $brand = $this->vehiclesRepository->getVehicleById($id);
        return response()->json($brand);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $vehicle = $this->vehiclesRepository->save($request->all());
        return response()->json($vehicle);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $vehicle = $this->vehiclesRepository->update($id, $request->all());
        return response()->json($vehicle);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->vehiclesRepository->delete($id);
        return response()->json(true);
    }

    /**
     * @param int $id
     */
    public function sale(int $id)
    {
        $this->vehiclesRepository->changeStatusSold($id);
    }
}
