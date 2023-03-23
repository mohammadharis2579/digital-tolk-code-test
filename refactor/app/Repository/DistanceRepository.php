<?php

namespace DTApi\Repository;


class DistanceRepository extends BaseRepository
{
	public function update($data)
    {
        $distance = (isset($data['distance']) && $data['distance'] != "") ? $data['distance'] : '';
        $time = (isset($data['time']) && $data['time'] != "") ? $data['time'] : '';

        if($distance || $time){
            return Distance::where('job_id', '=', $data['jobid'])->update(array('distance' => $distance, 'time' => $time));
        }else{
            return [];
        }
    }
	
}