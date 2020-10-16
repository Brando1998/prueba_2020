<form action="{{ route('update', $product->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    @include('products.form', ['Mode'=>'edit'])

</form>