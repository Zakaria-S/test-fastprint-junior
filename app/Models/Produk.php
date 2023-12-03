<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    protected $table = 'produk';
    protected $fillable = ['nama_produk', 'harga', 'kategori_id', 'status_id'];
}
