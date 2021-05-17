$gap = $start_time->diffInMinutes($finish_time);
        $gaps->push($gap);
        $suburb->push($finish_suburb);

        $gaps->toArray();
        $suburb->toArray();

        for ($i = 0; $i<count($gaps); $i++){
            if ($suburb[$i] == $suburb[$i+1] && $suburb[$i] == $user_suburb){
                $travel_time = 15+15;
            }elseif ($suburb[$i] == $suburb[$i+1] && $suburb[$i] != $user_suburb){
                $travel_time = 30+30;
            }elseif ($suburb[$i] != $suburb[$i+1] && $suburb[$i+1] == $user_suburb){
                $travel_time = 30+15;
            }elseif ($suburb[$i] != $suburb[$i+1] && $suburb[$i] == $user_suburb){
                $travel_time = 15+30;
            }else{
                $travel_time = 10000;
            }

            if (($gaps[$i]-60-$travel_time)>=75){

            }
        }


















        
        $filtered = $collection->filter(function () {
    return $this->first();
});
            $lesson1 = $sorted->first()->lesson_time;
            return($lesson1);
    foreach($sorted as $record) {
               $lesson1 = $sorted->pop()->lesson_time;
            return($lesson1->diffInMinutes($start_time));
            $lesson0 = $sorted->lesson_time->getNth($i+1);
            $gap = $lesson0->diffInMinutes($lesson1);
            return($gap);

            if ($sorted[$i]['suburb_code'] == $sorted[$i+1]['suburb_code'] && $sorted[$i]['suburb_code'] == $user_suburb){
                $diff = $gap->subMinutes(15+60);
                #print("1",$diff)
                $lesson_gap = 60+15;
                #print('SSS')

            }elseif( $sorted[$i]['suburb_code'] == $sorted[$i+1]['suburb_code'] && $sorted[$i]['suburb_code']!= $user_suburb){
                $diff = $gap->subMinutes(45+60);
                #print("2",$diff)
                $lesson_gap = 60+30;
                #print('NSN')
            }elseif( $sorted[$i]['suburb_code'] == $user_suburb && $sorted[$i+1]['suburb_code'] != $user_suburb){
                $diff = $gap->subMinutes(30+60);
                #print("3",$diff)
                $lesson_gap = 60+15;
                #print('SSN')
            }elseif( $sorted[$i+1]['suburb_code'] == $user_suburb && $sorted[$i]['suburb_code'] != $user_suburb){
                $diff = $gap->subMinutes(30+60);
                #print("4",$diff)
                $lesson_gap = 60+30;
                #print('NSS')
            }else{
                $diff = 0;
            }
        }

/*

        $gaps = collect([]);
        $suburb = collect([$start_suburb]);
        foreach($records as $record){
            $booked_time = Carbon::parse($record->lesson_time);
            $gap = $booked_time->$diffInMinutes($start_time);
            $gaps->push($gap);


            $start_time = $booked_time; 
        }*/
        return($sorted); 
    }
    }

