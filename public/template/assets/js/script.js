 // icon mata password
 $(document).ready(function () {
     function togglePasswordVisibility(passwordId, iconId) {
         var passwordInput = $("#" + passwordId);
         var icon = $("." + iconId + " i");

         // Toggle password visibility
         passwordInput.attr("type", passwordInput.attr("type") === "password" ? "text" : "password");
         icon.toggleClass("ti-eye ti-eye-off");
     }

     $("#toggleCurrentPassword").click(function () {
         togglePasswordVisibility("current_password", "input-group-text3");
     });

     $("#togglePassword").click(function () {
         togglePasswordVisibility("password", "input-group-text");
     });

     $("#toggleNewPassword").click(function () {
         togglePasswordVisibility("password_confirmation", "input-group-text2");
     });
 });

 // select2 prodi
 $(document).ready(function () {
     $('#select2IconsProdi').select2({
         templateResult: formatOption,
         templateSelection: formatOption,
     });

     // Fungsi untuk mengatur tampilan opsi dengan ikon
     function formatOption(option) {
         if (!option.id) {
             return option.text;
         }

         var iconClass = $(option.element).data('icon');
         if (iconClass) {
             // Jika opsi memiliki data-icon, tambahkan ikon ke dalam teks opsi
             return $('<span><i class="' + iconClass + '"></i> ' + option.text + '</span>');
         }

         return option.text;
     }
 });

 // select2 lingkup internal & eksternal
 $(document).ready(function () {
     $('#select2IconsLingkup').select2({
         templateResult: formatOption,
         templateSelection: formatOption,
     });

     // Fungsi untuk mengatur tampilan opsi dengan ikon
     function formatOption(option) {
         if (!option.id) {
             return option.text;
         }

         var iconClass = $(option.element).data('icon');
         if (iconClass) {
             // Jika opsi memiliki data-icon, tambahkan ikon ke dalam teks opsi
             return $('<span><i class="' + iconClass + '"></i> ' + option.text + '</span>');
         }

         return option.text;
     }
 });

 // select2 dospem
 $(document).ready(function () {
     $('#select2IconsDospem').select2({
         templateResult: formatOption,
         templateSelection: formatOption,
     });

     // Fungsi untuk mengatur tampilan opsi dengan ikon
     function formatOption(option) {
         if (!option.id) {
             return option.text;
         }

         var iconClass = $(option.element).data('icon');
         if (iconClass) {
             // Jika opsi memiliki data-icon, tambahkan ikon ke dalam teks opsi
             return $('<span><i class="' + iconClass + '"></i> ' + option.text + '</span>');
         }

         return option.text;
     }
 });

 // select2 semester (romawi)
 $(document).ready(function () {
     $('#select2IconsSemester').select2({
         templateResult: formatOption,
         templateSelection: formatOption,
     });

     // Fungsi untuk mengatur tampilan opsi dengan ikon
     function formatOption(option) {
         if (!option.id) {
             return option.text;
         }

         var iconClass = $(option.element).data('icon');
         if (iconClass) {
             // Jika opsi memiliki data-icon, tambahkan ikon ke dalam teks opsi
             return $('<span><i class="' + iconClass + '"></i> ' + option.text + '</span>');
         }

         return option.text;
     }
 });

 // inputan
 document.addEventListener("DOMContentLoaded", function () {
     let inputNumeric = document.querySelectorAll('.numeric-input');
     let inputNPM = document.querySelectorAll('.npm');
     let inputAlphabet = document.querySelectorAll('.alphabet-input');

     inputNumeric.forEach(function (input) {
         input.addEventListener("input", function () {
             // Hapus karakter selain angka
             this.value = this.value.replace(/\D/g, '');
         });
     });

     inputAlphabet.forEach(function (input) {
         input.addEventListener("input", function () {
             this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
         });
     });

     inputNPM.forEach(function (input) {
         input.addEventListener("input", function () {
             let inputValue = input.value;

             // Hapus karakter yang tidak valid
             let validValue = inputValue.replace(/[^0-9]/g, '');

             // Batasi panjang string menjadi 13 karakter
             if (validValue.length > 13) {
                 validValue = validValue.slice(0, 13);
             }

             // Setel nilai input dengan string yang sudah valid
             input.value = validValue;

         });
     });
 });

 // reload halaman otomatis 2 menit
 function refreshPage() {
     location.reload(true);
 }
 setInterval(refreshPage, 120000);

 // reset button img
 function resetFileInput() {
     // Reset nilai input file dengan mengganti nilai dengan dirinya sendiri
     document.getElementById('upload').value = '';
 }
