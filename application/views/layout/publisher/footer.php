 <!-- BEGIN: JS Assets-->
 <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
 <script src="<?= site_url('asset') ?>/admin/dist/js/app.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
 <script type="text/javascript">
     $(document).ready(function() {
         // Get data provinsi
         $.ajax({
             type: "POST",
             url: "<?= base_url('rajaongkir/provinsi') ?>",
             success: function(hasil_provinsi) {
                 // console.log(hasil_provinsi);
                 $("select[name=provinsi]").html(hasil_provinsi);
             }
         });

         // Get data kota
         $("select[name=provinsi]").on("change", function() {
             var provinsi_set = $("option:selected", this).attr("id_provinsi");

             $.ajax({
                 type: "POST",
                 url: "<?= base_url('rajaongkir/kota') ?>",
                 data: 'id_provinsi=' + provinsi_set,
                 success: function(hasil_kota) {
                     $("select[name=kota]").html(hasil_kota);
                 }
             });

         });

         $("select[name=kota]").on("change", function() {
             $.ajax({
                 type: "POST",
                 url: "<?= base_url('rajaongkir/ekspedisi') ?>",
                 success: function(hasil_ekspedisi) {
                     $("select[name=ekspedisi]").html(hasil_ekspedisi);
                 }
             });
         });

         $('#pay-button').click(function(event) {
             event.preventDefault();
             $(this).attr("disabled", "disabled");

             var nama = $("#nama").val();
             var email = $("#email").val();
             var no_hp = $("#no_hp").val();
             var provinsi = $("#provinsi").val();
             var kota = $("#kota").val();
             var id_user = $("#id_user").val();
             var alamat = $("#alamat").val();
             var ekspedisi = $("#ekspedisi").val();
             var kode_pos = $("#kode_pos").val();
             var total = $("#total").val();

             $.ajax({
                 type: 'POST',
                 url: '<?= site_url() ?>/snap/token',
                 data: {
                     nama: nama,
                     email: email,
                     no_hp: no_hp,
                     provinsi: provinsi,
                     kota: kota,
                     alamat: alamat,
                     ekspedisi: ekspedisi,
                     kode_pos: kode_pos,
                     id_user: id_user,
                     total: total
                 },

                 cache: false,

                 success: function(data) {
                     //location = data;

                     console.log('token = ' + data);

                     var resultType = document.getElementById('result-type');
                     var resultData = document.getElementById('result-data');

                     function changeResult(type, data) {
                         $("#result-type").val(type);
                         $("#result-data").val(JSON.stringify(data));
                         //resultType.innerHTML = type;
                         //resultData.innerHTML = JSON.stringify(data);
                     }

                     snap.pay(data, {

                         onSuccess: function(result) {
                             changeResult('success', result);
                             console.log(result.status_message);
                             console.log(result);
                             $("#payment-form").submit();
                         },
                         onPending: function(result) {
                             changeResult('pending', result);
                             console.log(result.status_message);
                             $("#payment-form").submit();
                         },
                         onError: function(result) {
                             changeResult('error', result);
                             console.log(result.status_message);
                             $("#payment-form").submit();
                         }
                     });
                 }
             });
         });


     });
 </script>
 </body>

 </html>