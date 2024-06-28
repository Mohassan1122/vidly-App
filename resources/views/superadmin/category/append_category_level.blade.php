<div class="form-group">
    <label for="parent_id">Select Category Level</label>
    <select name="parent_id" id="parent_id" class="form-control" style="color: #000">
        <option value="0" @if (isset($category['parent_id']) && $category['parent_id']==0) selected @endif>Main Category
        </option>
        @if (!empty($getCategory))
        @foreach ($getCategory as $pcategory)
        <option value="{{ $pcategory['id'] }}" @if (isset($category['parent_id']) && $category['parent_id']==$pcategory['id']) selected @endif>{{ $pcategory['category_name'] }}</option>

        @if (!empty($pcategory['sub_categories']))
        @foreach ($pcategory['sub_categories'] as $subcat)
        <option value="{{ $subcat['id'] }}" @if (isset($subcat['parent_id']) && $subcat['parent_id']==$subcat['id']) selected  @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;&nbsp;{{ $subcat['category_name'] }}</option>
        @endforeach
        @endif
        @endforeach
        @endif
    </select>

</div>