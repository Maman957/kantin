 <!-- BEGIN: JS Assets-->
 <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
 <script src="<?= site_url('asset') ?>/admin/dist/js/app.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
 <script>
     function navigateToPage(select) {
         const selectedValue = select.value;
         if (selectedValue) {
             window.location.href = selectedValue;
         }
     }
 </script>
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
             type: "GET",
             url: "<?= base_url('get_keranjang') ?>",
             dataType: "JSON",
             success: function(data) {
                 if (data != null) {
                     let barang = '';
                     let subTotal = 0;
                     data.forEach(function(produk) {
                         let itemPrice = parseFloat(produk.harga_jual.replace(/,/g, ''));
                         let itemSubtotal = produk.jumlah * itemPrice;
                         subTotal += itemSubtotal;

                         barang += `
                    <tr id="item_${produk.id_keranjang}" class="cart-item">
                        <td class="!py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Product Image" class="rounded-lg border-2 border-white shadow-md tooltip" src="<?= base_url() ?>assets/img/produk/${produk.gambar}" title="Product Image">
                                </div>
                                <a href="" class="font-medium whitespace-nowrap ml-4">${produk.nama_produk} - ${produk.deskripsi}</a>
                            </div>
                        </td>
                        <td class="text-right" id="harga_${produk.id_keranjang}">Rp${parseFloat(produk.harga_jual.replace(/,/g, '')).toLocaleString('id-ID')}</td>
                        <td class="text-right">
                            <input id="jumlah_${produk.id_keranjang}" name="jumlah_${produk.id_keranjang}" type="number" class="form-control validate col-xl-5 col-lg-5 col-md-5 col-sm-5 ml-2 mr-10 mb-5 mt-1" value="${produk.jumlah}" onblur="updateQuantity(${produk.id_keranjang})">
                        </td>
                        <td class="text-right" id="subtotal_${produk.id_keranjang}">Rp${itemSubtotal.toLocaleString('id-ID')}</td>
                        <td>
                            <button class="btn btn-danger" onclick="hapusProduk(${produk.id_keranjang})">Hapus</button>
                        </td>
                    </tr>`;
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

         if (!isNaN(quantity) && quantity > 0) {
             let itemPrice = parseFloat($(`#harga_${itemId}`).text().replace('Rp', '').replace(/\./g, '').replace(',', '.'));
             let itemSubtotal = quantity * itemPrice;

             $(`#subtotal_${itemId}`).text('Rp ' + itemSubtotal.toLocaleString('id-ID'));
             let subTotal = calculateSubTotal();
             updateTotal(subTotal);
         } else {
             quantityInput.val(1);
             updateQuantity(itemId);
         }

         $.ajax({
             method: "POST",
             url: "<?= base_url('update_keranjang') ?>",
             data: {
                 id_keranjang: itemId,
                 jumlah: quantity
             },
             dataType: "JSON",
             success: function(data) {
                 if (data.Success) {
                     console.log("Data berhasil diperbarui");
                 } else {
                     console.log("Gagal memperbarui data");
                 }
             }
         });
     }

     function calculateSubTotal() {
         let subTotal = 0;
         $('.cart-item').each(function() {
             let quantity = parseInt($(this).find('input[type="number"]').val());
             let itemPrice = parseFloat($(this).find('td[id^="harga_"]').text().replace('Rp', '').replace(/\./g, '').replace(',', '.'));
             let itemSubtotal = quantity * itemPrice;
             subTotal += itemSubtotal;
         });
         return subTotal;
     }

     function updateTotal(subTotal) {
         $('#total').text('Rp ' + subTotal.toLocaleString('id-ID'));
     }

     function hapusProduk(itemId) {
         if (confirm('Apakah Anda ingin menghapus data produk ini?\nData produk tidak dapat dipulihkan setelah dihapus!')) {
             window.location.href = "<?= base_url('hapus_produk_keranjang') ?>/" + itemId;
         }
     }
 </script>


 </body>

 </html>