<?php

namespace App\Http\Repositories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;

class BrandsRepository
{
    /**
     * Model Vehicle
     *
     * @var Brand
     */
    private $brand;

    /**
     * Create a new instance
     *
     * @param Brand $brand
     */
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Get all brands
     *
     * @return \Illuminate\Support\Collection
     */
    public function listAll(): \Illuminate\Support\Collection
    {
        return $this->brand->all();
    }
}
