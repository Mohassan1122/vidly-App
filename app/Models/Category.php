<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id')->select('id', 'name');
    }
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id')->select('id', 'category_name');
    }
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }
    public static function categoryDetails($url)
    {
        $categoryDetails = Category::select('id', 'parent_id', 'category_name', 'url', 'description')->with(['subCategories' => function ($query) {
            $query->select('id', 'parent_id', 'category_name', 'url', 'description');
        }])->where('url', $url)->first()->toArray();
        //dd($categoryDetails);
        $catIds = array();
        $catIds[] = $categoryDetails['id'];
        if ($categoryDetails['parent_id'] == 0) {

            $breadcrumbs = '<li class="is-marked">  <a href="' . url($categoryDetails['url']) . '">' . $categoryDetails['category_name'] . '</a> </li>';
        } else {
            $parentCategory = Category::select('category_name', 'url')->where('id', $categoryDetails['parent_id'])->first()->toArray();

            $breadcrumbs = '<li class="has-separator">  <a href="' . url($parentCategory['url']) . '">' . $parentCategory['category_name'] . '</a> </li><li class="is-marked">  <a href="' . url($categoryDetails['url']) . '">' . $categoryDetails['category_name'] . '</a> </li>';
        }

        foreach ($categoryDetails['sub_categories'] as $key => $subcat) {
            $catIds[] = $subcat['id'];
        }
        $resp = array('catIds' => $catIds, 'categoryDetails' => $categoryDetails, 'breadcrumbs' => $breadcrumbs);
        return $resp;
    }
}
