<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class BaseController extends Controller
{
    //
    public $model;
    public function __construct($model){
        $this->model = new User();
    }
    public function index(){
        $fillable = $this->model->getFillable();


    }
}
