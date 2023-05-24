<?php

namespace App\Services;

use App\Repositories\KendaraanRepository;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class KendaraanService
{
    protected $KendaraanRepository;

    public function __construct(KendaraanRepository $KendaraanRepository) {
        $this->KendaraanRepository = $KendaraanRepository;
    }

    public function Validator($request) {
        $validator = Validator::make($request, [
            'tahun_keluaran' => ['required', 'min:1900|max:2100|size:4'],
            'warna' => ['required', 'string'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'terjual' => ['required', 'numeric'],
            'tipe_kendaraan' => ['required', Rule::in(['mobil', 'motor'])],
        ]);
        
        if($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        return $request;
    }

    public function getAllKendaraan() {
        return $this->KendaraanRepository->getAllKendaraan();
    }

    public function store($data) {
        return $this->KendaraanRepository->store($data);
    }

    public function update($data, $id) {
        return $this->KendaraanRepository->update($data, $id);
    }

    public function findById($data) {
        return $this->KendaraanRepository->findByid($data);
    }

    public function deleteById($data) {
        return $this->KendaraanRepository->deleteById($data);
    }

    public function getAllMobil() {
        return $this->KendaraanRepository->getAllMobil();
    }

    public function getAllMotor() {
        return $this->KendaraanRepository->getAllMotor();
    }

    public function getAllStockMobil() {
        return $this->KendaraanRepository->getAllStockMobil();
    }

    public function getAllStockMotor() {
        return $this->KendaraanRepository->getAllStockMotor();
    }

    public function getAllSoldMobil() {
        return $this->KendaraanRepository->getAllSoldMobil();
    }

    public function getAllSoldMotor() {
        return $this->KendaraanRepository->getAllSoldMotor();
    }
}
