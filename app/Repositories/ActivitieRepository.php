<?php

namespace App\Repositories;

use App\Models\Activities;

class ActivitieRepository
{
    public function all(){
        $activities = Activities::all();

        return $activities;
    }

    public function store($data){
        $activitie = new Activities;
        $activitie->activitie=$data["activitie"];
        
        $activitie->save();
        
        return $activitie;
    }

    public function update($data,$id){
        $activitie = Activities::find($id);
        $activitie->activitie=$data["activitie"];
        
        $activitie->save();
        
        return $activitie;
    }

}