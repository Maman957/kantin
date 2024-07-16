 <!-- BEGIN: JS Assets-->
 <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
 <script src="<?= site_url('asset') ?>/admin/dist/js/app.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
 <script>
     function toggleMenu(event, menuId, element) {
         event.preventDefault();
         var menu = document.getElementById(menuId);
         menu.classList.toggle('open');

         var icon = element.querySelector('.menu__sub-icon');
         icon.classList.toggle('rotate');
     }
 </script>
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
                        $jumlah = '';
                        foreach ($statistik as $data) {
                            $jumlah .= '"' . $data->jumlah . '",';
                        }
                        $jumlah = rtrim($jumlah, ",");
                        echo $jumlah;
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
                         let quantity = parseInt(produk.quantity) || 1;
                         let itemPrice = parseFloat(produk.harga_jual.replace(',', ''));
                         let itemSubtotal = quantity * itemPrice;
                         subTotal += itemSubtotal;

                         barang += `
            <div class="item" id="item_${produk.id}">
              <img src="<?= base_url() ?>assets/img/produk/${produk.gambar}" class="h-50" alt="Product Image" />
              <div class="item-details">
                <h4 class="d-inline-block mb-1">${produk.nama_produk}</h4>
                <div class="input-group">
                  <label for="harga" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-form-label">
                    Harga:
                  </label>
                  <label id="harga_${produk.id}" class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-form-label ml-1">Rp${produk.harga_jual}</label>
                </div>
                <div class="input-group">
                  <label for="jumlah" class="col-sm-1 mt-3 col-form-label">
                    Jumlah:
                  </label>
                  <input id="jumlah_${produk.id}" name="jumlah_${produk.id}" type="number" class="form-control validate col-xl-5 col-lg-5 col-md-5 col-sm-5 ml-2 mr-10 mb-5 mt-1" value="${quantity}" onchange="updateQuantity(${produk.id})">
                </div>
                <div class="input-group">
                  <label for="subtotal_${produk.id}" class="col-sm-1 col-form-label">
                    Subtotal:
                  </label>
                  <span id="subtotal_${produk.id}" class="col-sm-1 col-form-label ml-1"><strong>Rp${itemSubtotal.toFixed(2)}</strong></span>
                </div>
              </div>
              <button class="remove-button" onclick="removeItem(${produk.id})">Hapus</button>
            </div>`;
                     });

                     $('.list-data').prepend(barang);
                     updateTotal(subTotal);
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

             $(`#subtotal_${itemId}`).text('Rp' + itemSubtotal.toFixed(2));
             let subTotal = calculateSubTotal();
             updateTotal(subTotal);
         } else {
             quantityInput.val(1);
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
         $('#total').text('Rp ' + subTotal.toFixed(2));
     }

     function removeItem(itemId) {
         $(`#item_${itemId}`).remove();
         let subTotal = calculateSubTotal();
         updateTotal(subTotal);
     }
 </script>
 <script>
     function simpanKeranjang() {
         $.ajax({
             method: "POST",
             url: "<?= base_url('simpan_keranjang'); ?>",
             data: $('#form-keranjang').serialize(),
             dataType: "JSON",
             success: function(data) {
                 if (data.Success) {
                     window.location.href = '<?= base_url('keranjang') ?>';

                     // Msg.success('Data Berhasil DiTambahkan !');
                 }
             }
         });
     }
 </script>
 </body>

 </html>