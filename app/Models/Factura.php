<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    
       //use HasFactory;
       protected $table = 'facturas';
       //Aqui se deven de agregar todas las filas de la tabla para hacer la insercion
       protected $fillable = ['nombre', 'detalles', 'valor','archivo', 'idcliente', 'idforma', 'idestado'];
       public $timestamps = false;
       //Funcion que obtiene el nombre cliente, formapago, estado.
       public function cliente()
       {
           return $this->belongsTo(Cliente::class, 'idcliente');
       }
       public function formapago()
       {
           return $this->belongsTo(FormaPago::class, 'idforma');
       }
       public function estadofactura()
       {
           return $this->belongsTo(EstadoFactura::class,'idestado');
       }
}