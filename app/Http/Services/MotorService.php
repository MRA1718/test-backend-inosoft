<?php

namespace App\Services;

use App\Repositories\KendaraanRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use phpDocumentor\Reflection\Types\Parent_;

class MotorService extends KendaraanService
{
    public function validator($data) {
        $data = parent::validator($data->all());

        $validator = Validator::make($data, [
            'mesin' => ['required', 'string'],
            'tipe_transmisi' => ['required', 'string'],
            'tipe_suspensi' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $data;
    }
}