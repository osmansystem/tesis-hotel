<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    //
    protected $fillable = 
    [
        'codigo_budget', 'fecha_emision',
        'subtotal', 'iva', 'total_general',
        'confirmado', 'fecha_confirmacion',
        'saldo', 'customer_id'
    ];

    public function detailBudgets()
    {
        return $this->hasMany('App\DetailBudget', 'detail_budget_id');
    }

    public function detailEventos()
    {
        return $this->hasMany('App\DetailEvento', 'detail_evento_id');
    }

    public function abonos()
    {
        return $this->hasMany('App\Abono');
    }

    public function ordenServicio()
    {
        return $this->hasMany('App\OrdenServicio', 'orden_servicio_id');
    }

    public function invoice()
    {
        return $this->hasOne('App\Invoice');
    }

}
