<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = ['name', 'email', 'token'];

    public function generateToken() 
    {
        $this->token = str_random(60);
        $this->save();

        return $this->token;
    }
}
