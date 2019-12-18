<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignCompanyTags extends Model
{
    //use Uuids;
    /**
     * Set auto-increment to false.
     *
     * //@var bool
     */
    //public $incrementing = false;

    public function company()
    {
        return $this->belongsTo('\App\Company');
    }

    public function tags()
    {
        return $this->belongsTo('\App\CompanyTag', 'company_tag_id');
    }

    public function scopeOfTag($query, array $tag)
    {
        return $query->whereIn('company_tag_id', $tag)
        ->join('companies', 'assign_company_tags.company_id', '=', 'companies.id');
    }

    public function scopeOfTagAndState($query, array $tag, array $state)
    {
        return $query->whereIn('company_tag_id', $tag)
        ->join('companies', 'assign_company_tags.company_id', '=', 'companies.id')->whereIn('state', $state);
    }

    public function scopeShowCompany($query, $company)
    {
        return $query->where('id', $company)
        ->with('tags');
    }
}
