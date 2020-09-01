<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JsonMind extends Model
{
    //

    static function getTheSolution($json)
    {
        // convert json to array
        $array = json_decode($json, true);

        //  create a new collection instance from the array
        $collection = collect($array);

        // initialize an empty array [] inside to start empty collection
        $new_collection = collect([]);

        // walk through each item in the collection
        // and inverse the employee with file position
        // to make the employee the key, and the file name as array value of it
        $collection->each(function ($item, $key) use ($new_collection) {
            // file name
            $array_key = array_keys($item)[0];
            // employee name
            $array_value = array_values($item)[0];

            // if there is no array created for files inside an employee collection
            // then just create it and put the first value of it!
            // otherwise push the new file name to the array that already there!
            if (!isset($new_collection[$array_value])) {
                $new_collection[$array_value] = [$array_key];
            } else {
                // get the array from the previews iteration
                $temp_array = $new_collection[$array_value];
                // put the new value to the files array
                array_push($temp_array, $array_key);
                // set the new array to the current employee
                $new_collection[$array_value] = $temp_array;
            }
        });

        // sorted by the number of files that the employee has (to result as given output order)
        $sorted = $new_collection->sortByDesc(function ($value, $key) {
            return count($value);
        });

        // new array to manipulate the collection to be as the same as the given format
        $new_array = [];
        // reformatting the sorted collection to be same as required
        foreach ($sorted as $key => $value) {
            $new_array[] = [
                $key => $value,
            ];
        }

        return $new_array;
    }

}
