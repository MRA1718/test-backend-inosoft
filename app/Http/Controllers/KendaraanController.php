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
            $data = $this->KendaraanService->getAllKendaraan();
            return response()->json([
                'status' => 200,
                'message' => 'Mendapatkan seluruh data kendaraan',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Menyimpan data kendaraan
    public function store(Request $request) {
        try {
            if ($request->tipe_kendaraan == 'mobil') {
                $dataTervalidasi = $this->MobilService->validator($request);
                $data = $this->KendaraanService->store($dataTervalidasi);
                return response()->json([
                    'status' => 201,
                    'message' => 'Menyimpan data kendaraan mobil',
                    'data' => $data
                ], 201);
            } else {
                $dataTervalidasi = $this->MotorService->validator($request);
                $data = $this->KendaraanService->store($dataTervalidasi);
                return response()->json([
                    'status' => 201,
                    'message' => 'Menyimpan data kendaraan motor',
                    'data' => $data
                ], 201);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Menampilkan data kendaraan
    public function show(Kendaraan $kendaraan) {
        try {
            $data = $this->KendaraanService->findById($kendaraan);
            return response()->json([
                'status' => 200,
                'message' => 'Menampilkan data kendaraan',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Memperbarui data kendaraan
    public function update(Request $request, $id)
    {
        try {
            if ($request->tipe_kendaraan == 'mobil') {
                $dataTervalidasi = $this->MobilService->validator($request);
                $data = $this->KendaraanService->update($dataTervalidasi, $id);
                return response()->json([
                    'status' => 200,
                    'message' => 'Memperbarui data kendaraan',
                    'data' => $data
                ], 200);
            } else {
                $dataTervalidasi = $this->MotorService->validator($request);
                $data = $this->KendaraanService->update($dataTervalidasi, $id);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Menghapus data kendaraan
    public function destroy(Kendaraan $kendaraan) {
        try {
            $data = $this->KendaraanService->deleteById($kendaraan);
            return response()->json([
                'status' => 200,
                'message' => 'Menghapus data kendaraan',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mendapatkan semua data mobil
    public function getAllMobil() {
        try {
            $data = $this->KendaraanService->getAllMobil();
            return response()->json([
                'status' => 200,
                'message' => 'Mendapatkan data mobil',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mendapatkan data stok mobil
    public function getAllStockMotbil() {
        try {
            $data = $this->KendaraanService->getAllStockMobil();
            return response()->json([
                'status' => 200,
                'message' => 'Mendapatkan data stok mobil',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mmendapatkan data mobil terjual
    public function getAllSoldMobil() {
        try {
            $data = $this->KendaraanService->getAllSoldMobil();
            return response()->json([
                'status' => 200,
                'message' => 'Mendapatkan data mobil terjual',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mendapatkan semua data motor
    public function getAllMotor() {
        try {
            $data = $this->KendaraanService->getAllMotor();
            return response()->json([
                'status' => 200,
                'message' => 'Mendapatkan data motor',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mendapatkan data stok motor
    public function getAllStockMotor() {
        try {
            $data = $this->KendaraanService->getAllStockMotor();
            return response()->json([
                'status' => 200,
                'message' => 'Mendapatkan data stok motor',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    //Mendapatkan data motor terjual
    public function getAllSoldMotor() {
        try {
            $data = $this->KendaraanService->getAllSoldMotor();
            return response()->json([
                'status' => 200,
                'message' => 'Mendapatkan data motor terjual',
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
