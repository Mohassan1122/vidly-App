<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'superadmin';

    public function adminPersonal()
    {
        return $this->belongsTo(Admin::class,'admin_id');
        
    }
    public function adminBusiness()
    {
        return $this->belongsTo(CompanyBusinessDetail::class,'admin_id');

    }
    public function adminBank()
    {
        return $this->belongsTo(CompanyBankDetail::class,'admin_id');

    }
}
