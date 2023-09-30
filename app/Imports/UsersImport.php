<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Store;

class UsersImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // Получение данных из каждой строки файла
            $chapt = $row[0];
            $nameOfPosition = $row[1];
            $priseForCommon = $row[2];
            $priseForDealer = $row[3];
            $availability = $row[4];
            $description = $row[5];

            // Создание экземпляра модели User и сохранение в базе данных
            $store = new Store();
            $store->section = $chapt;
            $store->name = $nameOfPosition;
            $store->retail_price = $priseForCommon;
            $store->dealer = $priseForDealer;
            $store->availability = $availability;
            $store->description = $description;





            $store->save();
        }
    }
}

