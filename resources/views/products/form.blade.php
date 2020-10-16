{{ $Mode=='create' ? 'Agregar producto':'Modificar producto' }}
<label for="Name">{{'Name'}}</label>
<input type="text" name="Name" id="Name" value="{{ isset($product->Name)?$product->Name:'' }}">

<label for="Description">{{'Description'}}</label>
<input type="text" name="Description" id="Description" value="{{ isset($product->Description)?$product->Description:'' }}">

<label for="Category">{{'Category'}}</label>
<input type="text" name="Category" id="Category" value="{{ isset($product->Category)?$product->Category:'' }}">

<label for="Amount">{{'Amount'}}</label>
<input type="text" name="Amount" id="Amount" value="{{ isset($product->Amount)?$product->Amount:'' }}">

<label for="Image_path">{{'Image_path'}}</label>
@if (isset($product->Image_path))
    <img src="{{ asset('storage').'/'.$product->Image_path}}" width="200" height="200" alt="{{$product->Name}}">
@endif
<input type="file" name="Image_path" id="Image_path" value="">

<input type="submit" value="{{ $Mode=='create' ? 'Agregar':'Modificar' }}">
<a href="{{ route('index') }}">Regresar</a>
