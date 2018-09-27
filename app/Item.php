<?php
/**
 * Created by PhpStorm.
 * User: bjesua
 * Date: 9/27/18
 * Time: 12:54 p.m.
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
class Item extends Model
{
    public $fillable = ['title','description'];
}