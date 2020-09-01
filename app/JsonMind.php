<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JsonMind extends Model
{
    //

    static function getTheSolution($json){
        // convert json to array
        $array = json_decode($json, true);

        //  create a new collection instance from the array
        $collection = collect($array);

        // initialize an empty array [] inside to start empty collection
        $new_collection = collect([]);

        $collection->each(function ($item, $key) use ($new_collection) {
            $array_key = array_keys($item)[0];
            $array_value = array_values($item)[0];
            if (isset($new_collection[$array_value])) {
                $temp_array = $new_collection[$array_value];
                array_push($temp_array, $array_key);
                $new_collection[$array_value] = $temp_array;
            } else {
                $new_collection[$array_value] = [$array_key];
            }
        });

        // sorted by the number of files (to get the same output order)
        $sorted = $new_collection->sortByDesc(function ($value, $key) {
            return count($value);
        });

        $new_array = [];
        foreach ($sorted as $key => $value) {
            $new_array[] = [
                $key => $value,
            ];
        }

        return $new_array;
    }

}
