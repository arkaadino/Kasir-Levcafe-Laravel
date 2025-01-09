@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-header">
                <h2>Halaman Detail Data Transaksi</h2>
            </div>
            <div class="card-body">
                <form action="/penjualan/{{ $penjualan->nobon }}/addDetail" method="post">
                    @csrf

                    <label for="products" class="form-label">Produk</label>
                    <table class="table table-bordered" id="productTable">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="productRows">
                            <tr>
                                <td>
                                    <select class="form-control" name="products[0][id_produk]" id="id_produk" required onchange="updateHarga(this)">
                                        <option value="">Pilih Produk</option>
                                        @foreach ($produk as $item)
                                            <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control harga" name="products[0][harga]" id="harga" readonly></td>
                                <td><input type="number" class="form-control jumlah" name="products[0][jumlah]" min="1" id="jumlah" required oninput="updateSubtotal(this)"></td>
                                <td><input type="text" class="form-control subtotal" name="products[0][subtotal]" id="subtotal" readonly></td>
                                <td><button type="button" class="btn btn-primary" onclick="addProductRow()">Tambah</button></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Diskon Section -->
                    <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon (%)</label>
                        <input type="number" class="form-control" id="diskon" name="diskon" oninput="updateTotal()" placeholder="Masukkan Diskon (%)">
                    </div>

                    <!-- Total Section -->
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" class="form-control" id="total" name="total" readonly>
                    </div>

                    <!-- Bayar Section -->
                    <div class="mb-3">
                        <label for="b       ayar" class="form-label">Bayar</label>
                        <input type="text" class="form-control" id="bayar" name="bayar" oninput="updateKembalian()" required>
                    </div>

                    <!-- Kembalian Section -->
                    <div class="mb-3">
                        <label for="kembalian" class="form-label">Kembalian</label>
                        <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
                    </div>

                    <!-- Buttons -->
                    <a href="/penjualan" class="btn btn-secondary m-1">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function addProductRow() {
        var table = document.getElementById("productRows");
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        row.innerHTML = `
            <td>
                <select class="form-control" name="products[${rowCount}][id_produk]" required onchange="updateHarga(this)">
                    <option value="">Pilih Produk</option>
                    @foreach ($produk as $item)
                        <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nama_produk }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" class="form-control harga" name="products[${rowCount}][harga]" readonly></td>
            <td><input type="number" class="form-control jumlah" name="products[${rowCount}][jumlah]" min="1" required oninput="updateSubtotal(this)"></td>
            <td><input type="text" class="form-control subtotal" name="products[${rowCount}][subtotal]" readonly></td>
            <td><button type="button" class="btn btn-danger" onclick="removeProductRow(this)">Hapus</button></td>`;
    }

    function updateHarga(select) {
        var harga = select.options[select.selectedIndex].getAttribute('data-harga');
        var row = select.closest('tr');
        row.querySelector('.harga').value = harga;
        updateSubtotal(row.querySelector('.jumlah'));
    }

    function updateSubtotal(input) {
        var row = input.closest('tr');
        var harga = row.querySelector('.harga').value;
        var jumlah = input.value;
        var subtotal = harga * jumlah;
        row.querySelector('.subtotal').value = subtotal;
        updateTotal();
    }

    function updateTotal() {
        var total = 0;
        document.querySelectorAll('.subtotal').forEach(function(subtotalInput) {
            total += parseFloat(subtotalInput.value) || 0;
        });

        // Apply discount
        var diskon = parseFloat(document.getElementById('diskon').value) || 0;
        var totalWithDiscount = total - (total * diskon / 100);

        document.getElementById('total').value = totalWithDiscount.toFixed(2);
        updateKembalian();
    }

    function updateKembalian() {
        let total = parseFloat(document.getElementById('total').value) || 0;
        let bayar = parseFloat(document.getElementById('bayar').value) || 0;
        let kembalian = bayar - total;

        document.getElementById('kembalian').value = kembalian.toFixed(2);
    }

    function removeProductRow(button) {
        var row = button.closest('tr');
        row.remove();
        updateTotal();
    }

</script>

@endsection
