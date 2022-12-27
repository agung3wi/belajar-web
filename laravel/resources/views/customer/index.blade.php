<h1> Daftar Pelanggan </h1>
<a href="/customer/add">Tambah Pelanggan</a>
<br/>
<br/>

<table style="border: solid 1px">
    <tr>
        <th>Action</th>
        <th>Nama</th>
        <th>No Telepon</th>
        <th>Alamat</th>
    </tr>
@foreach($customers as $customer)
    <tr>
        <td><a href="/customer/edit/{{$customer->id}}">Ubah</a>
        &nbsp;<a href="/customer/delete/{{$customer->id}}">Hapus</a></td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->phone }}</td>
        <td>{{ $customer->address }}</td>
    </tr>
@endforeach
</table>