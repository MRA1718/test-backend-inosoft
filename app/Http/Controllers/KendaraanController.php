<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Services\KendaraanService;
use App\Services\MobilService;
use App\Services\MotorService;
use Exception;

class KendaraanController extends Controller
{
    private $KendaraanService;
    private $MobilService;
    private $MotorService;

    public function __construct(KendaraanService $KendaraanService, MobilService $MobilService, MotorService $MotorService) {
        $this->KendaraanService = $KendaraanService;
        $this->MobilService = $MobilService;
        $this->MotorService = $MotorService;
    }

    public function index() {
        try{
            return $this->KendaraanService->getAllKendaraan();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Menyimpan data kendaraan
    public function store(Request $request) {
        try {
            if ($request->tipe_kendaraan == 'mobil') {
                $dataTervalidasi = $this->MobilService->validator($request);
                return $this->KendaraanService->store($dataTervalidasi);
            } else {
                $dataTervalidasi = $this->MotorService->validator($request);
                return $this->KendaraanService->store($dataTervalidasi);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Menampilkan data kendaraan
    public function show(Kendaraan $kendaraan) {
        try {
            return $this->KendaraanService->findById($kendaraan);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Memperbaharui data kendaraan
    public function update(Request $request, $id)
    {
        try {
            $dataTervalidasi = $this->MobilService->validator($request);
            return $this->KendaraanService->update($dataTervalidasi, $id);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Menghapus data kendaraan
    public function destroy(Kendaraan $kendaraan) {
        try {
            return $this->KendaraanService->deleteById($kendaraan);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mendapatkan semua data mobil
    public function getAllMobil() {
        try {
            return  $this->KendaraanService->getAllMobil();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mendapatkan data stok mobil
    public function getAllStockMotbil() {
        try {
            return  $this->KendaraanService->getAllStockMobil();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mmendapatkan data mobil terjual
    public function getAllSoldMobil() {
        try {
            return  $this->KendaraanService->getAllSoldMobil();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mendapatkan semua data motor
    public function getAllMotor() {
        try {
            return  $this->KendaraanService->getAllMotor();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mendapatkan data stok motor
    public function getAllStockMotor() {
        try {
            return  $this->KendaraanService->getAllStockMotor();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mendapatkan data motor terjual
    public function getAllSoldMotor() {
        try {
            return  $this->KendaraanService->getAllSoldMotor();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
