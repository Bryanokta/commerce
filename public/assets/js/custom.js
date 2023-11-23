/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
// function modal masukan keranjang
$(function () {
    $('.tombolModal').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080//frontend/byid',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                document.getElementById("TextInput").innerHTML = data.nama_produk
                $('#jumlah').val(data.jumlah);
                $('#nama_produk').val(data.nama_produk);
                $('#id').val(data.id);
                $('#gambar_produk').val(data.gambar_produk);
                document.getElementById("gambar").src = "img/" + data.gambar_produk;
            }
        });
    });
    $('.modalEdit').on('click', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080/keranjang/edit',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#jumlah_pesanan').val(data.jumlah_pesanan);
                $('.id_hidden').val(data.id_pesanan)
            }
        });
    });
});

window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 1500);

