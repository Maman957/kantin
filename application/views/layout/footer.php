<footer class="row tm-mt-small">
  <div class="col-12 font-weight-light">
    <p class="d-inline-block tm-bg-transparant text-white py-2 px-4 bg-merah">
      Copyright &copy; 2024 . Created by
      <a rel="nofollow" href="https://www.instagram.com/achmad_957/" class="text-white tm-footer-link">Maman957</a>
    </p>
  </div>
</footer>
</div>
</div>

<!-- https://jquery.com/download/ -->
<script src="<?= base_url('assets/js/moment.min.js') ?>"></script>
<!-- https://momentjs.com/ -->
<script src="<?= base_url('assets/js/utils.js') ?>"></script>
<script src="<?= base_url('assets/js/Chart.min.js') ?>"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="<?= base_url('assets/js/fullcalendar.min.js') ?>"></script>
<!-- https://fullcalendar.io/ -->
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- https://getbootstrap.com/ -->
<script src="<?= base_url('assets/js/tooplate-scripts.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/tiny-slider.js') ?>"></script>
<script src="<?= base_url('assets/js/custom.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('lineChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        <?php
        $bulan = '';
        foreach ($statistik as $data) {
          $bulan .= '"' . $data->bulan . '",';
        }
        $bulan = rtrim($bulan, ",");
        echo $bulan;
        ?>
      ],
      datasets: [{
        label: 'Pendapatan per Bulan',
        data: [
          <?php
          $pendapatan = '';
          foreach ($statistik as $data) {
            $pendapatan .= '"' . $data->pendapatan . '",';
          }
          $pendapatan = rtrim($pendapatan, ",");
          echo $pendapatan;
          ?>
        ],
        borderColor: '#26156f',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        tension: 0.4,
        borderWidth: 2.5
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script>
  $(document).ready(function() {
    $.ajax({
      type: "get",
      url: "<?= base_url('get_keranjang') ?>",
      dataType: "JSON",
      success: function(data) {
        if (data != null) {
          let barang = '';
          let subTotal = 0;

          data.forEach(function(produk) {
            let quantity = parseInt(produk.quantity);
            let itemPrice = parseFloat(produk.harga_jual.replace(',', ''));
            let itemSubtotal = quantity * itemPrice;
            subTotal += itemSubtotal;

            barang += `
            <div class="item" id="item_${produk.id}">
              <img src="<?= base_url() ?>assets/img/produk/${produk.gambar}" class="h-50" alt="Product Image" />
              <div class="item-details">
                <h4 class="d-inline-block"><strong>${produk.nama_produk}</strong></h4>
                <div class="input-group">
                  <label for="harga" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-form-label">
                    Harga
                  </label>
                  <label id="harga_${produk.id}" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-form-label">Rp${produk.harga_jual}</label>
                </div>
                <div class="input-group">
                  <label for="jumlah" class="col-sm-1 col-form-label">
                    Jumlah
                  </label>
                  <input id="jumlah_${produk.id}" name="jumlah_${produk.id}" type="number" class="form-control validate col-xl-5 col-lg-5 col-md-5 col-sm-5" value="${quantity}" onchange="updateQuantity(${produk.id})">
                </div>
                <div class="input-group">
                  <label for="subtotal_${produk.id}" class="col-sm-1 col-form-label">
                    Subtotal
                  </label>
                  <span id="subtotal_${produk.id}" class="col-sm-1 col-form-label">Rp${itemSubtotal.toFixed(2)}</span>
                </div>
              </div>
              <button class="remove-button" onclick="removeItem(${produk.id})">Hapus</button>
            </div>`;
          });

          $('.list-data').prepend(barang);
          updateTotal(subTotal); // Update total initially
        }
      }
    });
  });

  function updateQuantity(itemId) {
    let quantityInput = $(`#jumlah_${itemId}`);
    let quantity = parseInt(quantityInput.val());

    if (!isNaN(quantity)) {
      let itemPrice = parseFloat($(`#harga_${itemId}`).text().replace('Rp', '').replace(',', ''));
      let itemSubtotal = quantity * itemPrice;

      $(`#subtotal_${itemId}`).text('Rp' + itemSubtotal.toFixed(2)); // Update item subtotal

      // Recalculate subTotal using a dedicated function for clarity
      let subTotal = calculateSubTotal();
      updateTotal(subTotal);
    } else {
      // Handle invalid quantity input (optional: display error message)
      quantityInput.val(1); // Reset to default quantity (optional)
    }
  }

  function calculateSubTotal() {
    let subTotal = 0;
    $('.item').each(function() {
      let quantity = parseInt($(this).find('input[type="number"]').val());
      let itemPrice = parseFloat($(this).find('label[id^="harga_"]').text().replace('Rp', '').replace(',', ''));
      subTotal += quantity * itemPrice;
    });
    return subTotal;
  }

  function updateTotal(subTotal) {
    $('#total').text('Rp ' + subTotal.toFixed(2)); // Update total amount
  }

  function removeItem(itemId) {
    $(`#item_${itemId}`).remove(); // Remove item from DOM
    let subTotal = calculateSubTotal();
    updateTotal(subTotal); // Update total after removing item
  }


  function submit() {
    $.ajax({
      method: "POST",
      url: "<?= base_url('simpanData'); ?>",
      data: $('#form-barang').serialize(),
      dataType: "JSON",
      success: function(data) {
        if (data.Success) {
          window.location.href = '<?= base_url('Admin') ?>';

          // Msg.success('Data Berhasil DiTambahkan !');
        }
      }
    });
  }
</script>