<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\DeliveryTime;
use App\deliverycity;
use App\City;
use App\exclude;
use App\Http\Resources\cities;

class UserController extends Controller
{
    public function showdates($city_id,$number_of_days)
    {
        $deliveries = [];

        $names = [];
        $final_array = [];
        $delivery_times = DeliveryTime::join("delivery_city","delivery_times.id","=","delivery_city.delivery_id")
                                        ->where('delivery_city.city_id',$city_id)->get();
        foreach($delivery_times as $d)
        {
            $deliveries[] = $d->delivery_id;
            $delivery_names[] = $d->delivery_at;
        }
        $i = 0;
        for($i;$i<$number_of_days;$i++)
        {
            $date_number_of_days = Carbon::now()->addDays($i); 
            $date = explode(' ',$date_number_of_days);
            $day = $date[0];
            
            $query = exclude::where("city_id",$city_id)->whereDate("start_day",'<=',$day)
                            ->whereDate("end_day",'>=',$day)->get();
            if(!$query->isEmpty())
            {
                $arr = $deliveries;
                foreach($query as $q)
                {
                    if(!empty($q->delivery_id))
                    {                        
                        $delivery_excluded = explode(",",$q->delivery_id);
                        $arr = array_diff($arr,$delivery_excluded);
                    }
                }
                
                if(!empty($arr))
                {
                    foreach($arr as $a)
                    {
                        $delivery_infos = DeliveryTime::where('id',$a)->first();
                        $names[] = $delivery_infos->delivery_at;
                    }
                    $final_array[] = [
                        'day' => $day,
                        'delivery_at' => $names
                    ];
                    
                }
                foreach ($names as $j => $value) {
                                        unset($names[$j]);
                                    }
            }
            else
            {
                $final_array[] = [
                    'day'=> $day,
                    'delivery_at' => $delivery_names
                ];
            }
            // dd($query->toArray());
            
        }
        return new cities($final_array);
        

    }
}
