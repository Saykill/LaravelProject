<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-control">
        <option value="">Select Category</option>
        @foreach($categories as $item)
            <option value="{{$item->id}}"
                {{old('parent_id', $category->parent_id ?? 0)== $item->id ? 'selected' : '' }}>
                {{$item->full_path}}
            </option>
        @endforeach
    </select>
    @error('parent_id')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>

 <div class="mb-3">
     <label class="form-label">User ID</label>
     <input type="number" name="user_id" class="form-control"
     value="{{old('user_id' , $product->user_id ?? '' ) }}">
 </div>

<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control"
           value="{{old('title' , $product->title ?? '' ) }}">
</div>

<div class="mb-3">
    <label class="form-label">Keywords</label>
    <input type="text" name="keywords" class="form-control"
           value="{{old('keywords' , $product->keywords ?? '' ) }}">
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <input type="text" name="description" class="form-control"
           value="{{old('description' , $product->description ?? '' ) }}">
</div>

<div class="mb-3">
    <label class="form-label">Detail</label>
    <textarea name="detail" id="detail" rows="5" class="form-control"> {{old('detail' , $product -> detail ?? '')}}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($category?->image))
        <div class="mt-2">
            <img src="{{asset('storage/' . $category->image)}}" width="80">
        </div>
    @endif
    @error('image')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
</div>

<div class="row">
    <div class="col-md-3 mb-3">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" class="form-control"
        value="{{old('price' , $product->price)}}">
    </div>
</div>

<div class="col-md-3 mb-3">
    <label class="form-label">Stock</label>
    <input type="number" name="stock" class="form-control"
           value="{{old('stock' , $product->stock ?? 0)}}">
</div>

<div class="col-md-3 mb-3">
    <label class="form-label">Minimum Stock</label>
    <input type="number" name="minstock" class="form-control"
           value="{{old('minstock' , $product->minstock ?? 0)}}">
</div>

<div class="col-md-3 mb-3">
    <label class="form-label">Discount</label>
    <input type="number" name="discount" class="form-control"
           value="{{old('discount' , $product->discount ?? 0)}}">
</div>

<div class="mb-3">
    <label class="form-label">Status</label>

    <select name="status" class="form-select">
        <option value="0" {{old('status' , $product->status ?? 0)== 0 ? 'selected' : '' }}>
            Passive
        </option>
        <option value="1" {{old('status' , $product->status ?? 0)== 1 ? 'selected' : '' }}>
            Active
        </option>
    </select>
</div>
