@extends("layouts._admin")

@section("title", "اضافة تصنيف مقال جديد")

@section("content")
<form class="w-50" method="POST" action="{{ route('category.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="name">التصنيف</label>
    <input autofocus value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="تصنيف المقال">
    
</div>
  <button type="submit" class="btn btn-primary">انشاء</button>
  <a class="btn btn-dark" href="{{ route('category.index') }}">الغاء الأمر</a>
</form>
@endsection
