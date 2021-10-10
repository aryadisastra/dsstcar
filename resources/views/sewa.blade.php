<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
  Dsstcar Rent
</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
input[type=number] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
input[type=file] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2>Silahkan Isi Data Dibawah Untuk Melakukan Penyewaan</h2>
<p>Setelah Anda Submit Form Dibawah Tunggu Beberapa Saat Sampai Admin Kami Menyetujui Pengajuan Anda</p>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form enctype="multipart/form-data" action="/store" method="post">
      @csrf
        <div class="row">
          <div class="col-50">
            <h3>Pengisian Form</h3>
            <label for="fname"><i class="fa fa-user"></i> Nama Lengkap</label>
            <input type="text" id="fname" name="nama">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email">
            <label for="adr"><i class="fa fa-address-card-o"></i> Alamat</label>
            <input type="text" id="adr" name="alamat">
            <label for="sewa"><i class="fa fa-payment"></i> Lama Sewa</label>
            <input type="number" id="sewa" name="sewa" onkeyup="myFunction()">
            <input type="hidden" id="harga_mobil" name="harga_mobil" value = "{{$data->nominal}}">
            <input type="hidden" name="id_mobil" value = "{{$data->id_mobil}}">
          </div>

          <div class="col-50">
            <h3>Pembayaran</h3>
            <label for="fname">Silahkan Transfer Ke Nomor Rekening berikut</label>
            <p>A/N : Arya Disastra
              <br>
              No.Rek : 1300019998460
              <br>
              Mandiri
            </p>
            <label for="cname">Nama Rekening</label>
            <input type="text" id="cname" name="nama_rek">
            <label for="ccnum">Nomor Rekening</label>
            <input type="text" id="ccnum" name="no_rek">
            <label for="files">Bukti Transfer</label>
            <input type="file" id="files" name="attachments[]" multiple>
          </div>
          <input type="submit" value="Mulai Ajukan Penyewaan" class="btn">
        </div>
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Detail <span class="price" style="color:black"></span></h4>
      <p><a href="/detail/{{$data->id_mobil}}">{{$data->nama_mobil}}</a> <span class="price">Rp.{{$data->nominal}}</span></p>
      <p>Lama Sewa<span class="price"><a id="lama"></a> Hari</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b id="total"></b></span></p>
    </div>
  </div>
</div>

</body>

<script >
function myFunction() {
  var x = document.getElementById("sewa").value;
  document.getElementById("lama").innerHTML = x;
  var harga = parseInt(document.getElementById("harga_mobil").value);
  var total = harga*parseInt(x);
  document.getElementById("total").innerHTML = total;

}
</script>
</html>
