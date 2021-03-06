<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Trigger extends Model
{
    protected $table = 'triggers';
    
    protected $fillable = 
    [
        'name', 
        'description'
    ];
    
    protected $hidden = [];
    
    protected $guarded = [];
    public function scopeLikeName($query, $user_id, $name)
    {
        $name = '%'.$name.'%';
        return $query->where('user_id', $user_id)->where('name', 'like', $name);
    }
    public function journals()
    {
        return $this->belongsToMany('App\Journal');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function occurrences()
    {
        return DB::table('journal_trigger')->where('trigger_id', '=', $this->id)->count();
    }
}
