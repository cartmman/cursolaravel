<?php
namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    public function category(){
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function images(){
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags(){
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    // getNomeDoMetodoAttribute()
    // invocado com tag_list ou tagList
    public function getTagListAttribute(){
        $tags = $this->tags->lists('name');

        return implode($tags,',');
    }

    // scopeNomedoMetodo
    // invocado no controller Model::featured()->get();
    public function scopeFeatured($query){
        return $query->where('featured','=',1);
    }
}