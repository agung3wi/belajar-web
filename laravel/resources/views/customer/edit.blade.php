<h1>Ubah Pelanggan</h1>

<form action="/customer/update/{{$customer->id}}" method="POST">
@csrf
Nama: <input type="text" name="name" value="{{$customer->name}}" /><br/>
No Telepon: <input type="text" value="{{$customer->phone}}" name="phone" /><br/>
Alamat<textarea name="address">{{$customer->address}}</textarea><br/>
<button type="submit">Submit</button>
</form>