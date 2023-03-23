<?php

namespace DTApi\Repository;


class ThrottleRepository extends BaseRepository
{
	public function ignoreThrottle($id)
    {
        $throttle = Throttles::find($id);
        $throttle->ignore = 1;
        $throttle->save();
        return ['success', 'Changes saved'];
    }
	
}