<h1>Tambah Pelanggan</h1>

<form action="/customer" method="POST">
@csrf
Nama: <input type="text" name="name" /><br/>
No Telepon: <input type="text" name="phone" /><br/>
Alamat<textarea name="address"></textarea><br/>
<button type="submit">Submit</button>
</form>