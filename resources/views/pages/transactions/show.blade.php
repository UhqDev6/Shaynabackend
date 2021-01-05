<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $item->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $item->email }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $item->number }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $item->address }}</td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>{{ $item->transaction_total }}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>{{ $item->transaction_status }}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <td>Nama</td>
                    <td>Tipe</td>
                    <td>Harga</td>
                </tr>
                @foreach ($item->details as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->type }}</td>
                        <td>{{ $detail->product->price }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS"
            class="btn btn-success btn-block">
         <i class="fa fa-check"></i>Sukses
         </a>
    </div>

    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=FAILED"
            class="btn btn-danger btn-block">
         <i class="fa fa-times"></i>Gagal
         </a>
    </div>
    
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}? status=PENDING"
            class="btn btn-warning btn-block">
         <i class="fa fa-spinner"></i>Pending
         </a>
    </div>
    
</div>