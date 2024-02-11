<!DOCTYPE html>
<html>
<head>
  <title>BIOSKOP JAYEN</title>
  <style>
    body {
      font-family: "Courier New", monospace;
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f4f4f4;
    }
    .header {
      text-align: left;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
      text-transform: uppercase;
    }
    .sub-header {
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
      text-transform: uppercase;
    }
    .transaction-info {
      font-size: 16px;
      margin-bottom: 20px;
      background-color: #fff;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      text-align: right; /* Align content to the right within transaction boxes */
    }
    .transaction-info p {
      margin: 5px 0;
      text-align: left; /* Align text to the left within transaction boxes */
    }
    .thank-you {
      text-align: center;
      font-size: 20px;
      margin-top: 20px;
      color: #333;
    }

  .p{
    margin-right: 20px;
  }
  </style>
</head>
<body>
  <div class="header"><center>
    BIG CINEMA
  
  </center></div>
  <div class="sub-header">
    Struk Transaksi
  </div>
  <p>Tanggal: <?php echo date("Y-m-d"); ?></p>
  <p>Oleh: {{ Auth::user()->name }}</p>

  
  @foreach ($transactionsM as $tm)
  <div class="transaction-info">
    <p>No Unik: <span class="p">{{ $tm->nomor_unik }}</span></p>
    <p>Nama Pelanggan: {{ $tm->nama_pelanggan }}</p>
    <p>Nama Produk: {{ $tm->nama_produk }}</p>
    <p>Harga Produk: {{ $tm->harga_produk }}</p>
    <p>Tanggal Beli: {{ date("Y-m-d", strtotime($tm->tg)) }}</p>
  </div>
@endforeach

<div class="transaction-info">
  <p>Uang Bayar: {{ $tm->uang_bayar }} Rp</p>
  <p>Uang Kembali: {{ $tm->uang_kembali }} Rp</p>
</div>
<p class="thank-you">Terima Kasih</p>
<p class="thank-you">Selamat Menonton</p>
</body>
</html>