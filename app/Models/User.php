<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
public $timestamps=false;

protected $primaryKey = 'AccNum';
protected $table = 'clients';
// column sa table
protected $fillable = [
'Fullname','TransNum','AccNum','Amount','Date','Mode of Transaction','TransFees'
];
}