<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $fillable = ['title','status','shared_id','user_id','isDelete'];

    public function user(){
       return $this->belongsTo(User::class,'user_id');
   }
   public function shared(){
      return $this->belongsTo(User::class,'shared_id');
  }
}
