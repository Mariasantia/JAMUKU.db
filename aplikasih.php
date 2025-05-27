<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Pemesanan Jamu</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    input[type='number'] { width: 50px; }
  </style>
  <script>
    let bahanList = {};
    let keranjang = {};

    async function fetchBahan() {
      const res = await fetch('bahan.json');
      const data = await res.json();
      bahanList = {};
      data.forEach(item => {
        bahanList[item.id] = item;
      });
      tampilkanBahan(data);
    }

    function tampilkanBahan(data) {
      const tbody = document.getElementById('bahan-body');
      tbody.innerHTML = '';
      data.forEach(b => {
        tbody.innerHTML += `<tr>
          <td><input type="checkbox" onchange="toggleBahan(${b.id}, this.checked)"></td>
          <td>${b.nama}</td>
          <td>${b.jenis}</td>
          <td>${b.deskripsi}</td>
          <td>${b.harga}</td>
        </tr>`;
      });
    }

    function toggleBahan(id, status) {
      if (status) {
        keranjang[id] = bahanList[id];
      } else {
        delete keranjang[id];
      }
      updateTotal();
    }

    function updateTotal() {
      const porsi = parseInt(document.getElementById('porsi').value || '1');
      let total = 0;
      for (let id in keranjang) {
        total += keranjang[id].harga;
      }
      total *= porsi;
      document.getElementById('total').innerText = `Total Belanja: Rp ${total}`;
    }

    function resetKeranjang() {
      keranjang = {};
      document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
      updateTotal();
    }

    window.onload = fetchBahan;
  </script>
</head>
<body>
  <h1>Aplikasi Pemesanan Jamu</h1>
  <label for="porsi">Jumlah Porsi: </label>
  <input type="number" id="porsi" value="1" min="1" onchange="updateTotal()">
  <table>
    <thead>
      <tr>
        <th>Pilih</th>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Deskripsi</th>
        <th>Harga (Rp)</th>
      </tr>
    </thead>
    <tbody id="bahan-body"></tbody>
  </table>
  <div id="total">Total Belanja: Rp 0</div>
  <button onclick="resetKeranjang()">Reset Keranjang</button>
</body>
</html>
