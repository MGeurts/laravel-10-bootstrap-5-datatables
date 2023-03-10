<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_last_name',
        'customer_first_name',
        'company_name',
        'company_vat',

        'address_street',
        'address_number',
        'address_country',
        'address_postal_code',
        'address_place',

        'phone',
        'email',

        'delivery_address_street',
        'delivery_address_number',
        'delivery_address_country',
        'delivery_address_postal_code',
        'delivery_address_place',

        'send_newsletter',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'customer',
        'address',
        'place',
    ];

    /* -------------------------------------------------------------------------------------------- */
    // Mutators (SET) Attribute
    /* -------------------------------------------------------------------------------------------- */
    public function setCustomerLastNameAttribute($value)
    {
        $this->attributes['customer_last_name'] = $value ? strtoupper($value) : null;
    }
    public function setCustomerFirstNameAttribute($value)
    {
        $this->attributes['customer_first_name'] = $value ? ucwords($value) : null;
    }
    public function setAddressPlaceAttribute($value)
    {
        $this->attributes['address_place'] = $value ? strtoupper($value) : null;
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = $value ? strtolower($value) : null;
    }

    /* -------------------------------------------------------------------------------------------- */
    // Accessors (GET) Attribute (APPENDED)
    /* -------------------------------------------------------------------------------------------- */
    public function getCustomerAttribute()
    {
        return implode(' ', array_filter([$this->attributes['customer_last_name'], $this->attributes['customer_first_name']]));
    }
    public function getAddressAttribute()
    {
        return implode(' ', array_filter([
            $this->attributes['address_street'],
            $this->attributes['address_number'],
        ]));
    }
    public function getPlaceAttribute()
    {
        return implode(' ', array_filter([$this->attributes['address_postal_code'], $this->attributes['address_place']]));
    }

    /* -------------------------------------------------------------------------------------------- */
    // Accessors (GET) Attribute
    /* -------------------------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------------------------- */
    // Overrides
    /* -------------------------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------------------------- */
    // Relationships
    /* -------------------------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------------------------- */
    // Actions
    /* -------------------------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------------------------- */
    // Construction
    /* -------------------------------------------------------------------------------------------- */
}
