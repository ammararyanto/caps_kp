<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Candra Apple Solution <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url() ?>auth/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/dist_admin/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/dist_admin/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/dist_admin/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/js_admin/sb-admin-2.min.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url(); ?>assets/dist_admin/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/dist_admin/sweetalert2/mysweetalert.js"></script>

<!-- Data Table -->
<script src="<?= base_url() ?>assets/dist_admin/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/dist_admin/datatables/dataTables.bootstrap4.min.js"></script>

<!-- ck editor -->
<script src="<?= base_url() ?>assets/dist_admin/ckeditor/ckeditor.js" type="text/javascript"></script>
<!-- Tag suggestion -->
<script type="text/javascript" src="<?= base_url() ?>assets/js_admin/jquery.amsify.suggestags.js"></script>

<!-- js untuk keperluan chart -->
<script src="<?= base_url() ?>assets/dist_admin/chart_js/Chart.min.js"></script>

<!-- <script src="<?= base_url() ?>assets/chart_js/chart-area-demo.js"></script> -->

<!-- Pengolahan data untuk ditampilkan ke Chart -->
<?php
if (empty($timeStart) || empty($timeEnd) || empty($selisih)) {
    $timeStart = 0;
    $timeEnd = 0;
    $selisih = 0;
} else {

    // dataset variabel transaksi servis_teknisi per tanggal
    $warnaChartMain1 = 'rgba(78, 115, 223, 1)';
    $warnaChartBg1 = 'rgba(78, 115, 223, 0.1)';
    $dataset1 = "";
    for ($x = 0; $x <= $selisih; $x++) {
        $dataset1 = $dataset1 . $dataChart1[$x] . ',';
    }
    $finalDataset1 = substr($dataset1, 0, -1);

    // dataset variabel transaksi selesai per tanggal
    $warnaChartMain2 = 'rgba(0, 205, 76, 1)';
    $warnaChartBg2 = 'rgba(0, 205, 76, 0.1)';
    $dateset2 = "";
    for ($x = 0; $x <= $selisih; $x++) {
        $dateset2 = $dateset2 . $dataChart2[$x] . ',';
    }
    $finalDataset2 = substr($dateset2, 0, -1);
    // $finalDataset2 = '';

    // dataset variabel transaksi batal per tanggal
    $warnaChartMain3 = 'rgba(255 ,0 ,0 , 1)';
    $warnaChartBg3 = 'rgba(255 ,0 ,0 , 0.1)';
    $dataset3 = "";
    if (empty($dataChart3)) {
        $finalDataset3 = '';
    } else {
        for ($x = 0; $x <= $selisih; $x++) {
            $dataset3 = $dataset3 . $dataChart3[$x] . ',';
        }
    }
    $finalDataset3 = substr($dataset3, 0, -1);
    //$finalDataset3 = '3,3,3,3,3,3,3,3,3,3';

    // dataset untuk mencetak tanggal sesuai panjang interval data
    $tgl = "";
    for ($x = 0; $x <= $selisih; $x++) {
        $tgl = $tgl . '"' . $tanggal[$x] . '"' . ',';
    }
    $datasetTanggal = substr($tgl, 0, -1);
}

?>

<!-- js view area chart -->
<script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?= $datasetTanggal ?>],
            datasets: [{

                label: "Teknisi Selesai",
                lineTension: 0.3,
                backgroundColor: "<?= $warnaChartBg1 ?>",
                borderColor: "<?= $warnaChartMain1 ?>",
                pointRadius: 3,
                pointBackgroundColor: "<?= $warnaChartMain1 ?>",
                pointBorderColor: "<?= $warnaChartMain1 ?>",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "<?= $warnaChartMain1 ?>",
                pointHoverBorderColor: "<?= $warnaChartMain1 ?>",
                pointHitRadius: 12,
                pointBorderWidth: 2,
                data: [<?= $finalDataset1 ?>],
            }, {
                label: "Total Selesai",
                lineTension: 0.3,
                backgroundColor: "<?= $warnaChartBg2 ?>",
                borderColor: "<?= $warnaChartMain2 ?>",
                pointRadius: 3,
                pointBackgroundColor: "<?= $warnaChartMain2 ?>",
                pointBorderColor: "<?= $warnaChartMain2 ?>",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "<?= $warnaChartMain2 ?>",
                pointHoverBorderColor: "<?= $warnaChartMain2 ?>)",
                pointHitRadius: 12,
                pointBorderWidth: 2,
                data: [<?= $finalDataset2 ?>],
            }, {

                label: "Total Batal",
                lineTension: 0.3,
                backgroundColor: "<?= $warnaChartBg3 ?>",
                borderColor: "<?= $warnaChartMain3 ?>",
                pointRadius: 3,
                pointBackgroundColor: "<?= $warnaChartMain3 ?>",
                pointBorderColor: "<?= $warnaChartMain3 ?>",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "<?= $warnaChartMain3 ?>",
                pointHoverBorderColor: "<?= $warnaChartMain3 ?>",
                pointHitRadius: 12,
                pointBorderWidth: 2,
                data: [<?= $finalDataset3 ?>],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return ' ' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ' : ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#btnDone').click(function(e) {
            e.preventDefault();
            if ($("#cb165").is(':checked')) {
                $('form#actionDetail').submit();
            } else {
                alert("belum di pencet");
            }
        });
    });
</script>

<script>
    // if ($("#actionDetail input:checkbox:checked").length > 0) {
    //     // any one is checked
    //     alert('ADA');
    // } else {
    //     alert('nooooo');
    //     // none is checked
    // }
</script>

<script>
    function cekBatal(e) {
        if ($("#actionDetail input:checkbox:checked").length > 0) {
            // any one is checked
        } else {
            alert('Anda belum memilihh');
            event.preventDefault();
            // none is checked
        }
        // alert('BATAL TERPENCET');
    }

    function cekSelesai(e) {
        if ($("#actionDetail input:checkbox:checked").length > 0) {
            // any one is checked
        } else {
            alert('Anda belum memilihh');
            event.preventDefault();
            // none is checked
        }
        // alert('BATAL TERPENCET');
    }
</script>

<!-- multiple add form -->
<script type="text/javascript">
    $(document).ready(function() {
        //group add limit
        var maxGroup = 50;

        //add more fields group
        $(".addMore").click(function() {
            if ($('body').find('.fieldGroup').length < maxGroup) {
                var fieldHTML = '<div class="form-group fieldGroup">' + $(".fieldGroupCopy").html() + '</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            } else {
                alert('Maximum ' + maxGroup + ' groups are allowed.');
            }
        });

        //remove fields group
        $("body").on("click", ".remove", function() {
            $(this).parents(".fieldGroup").remove();
        });
    });
</script>

<!-- auto refreh page -->
<script>
    (function(seconds) {
        var refresh,
            intvrefresh = function() {
                clearInterval(refresh);
                refresh = setTimeout(function() {
                    location.href = location.href;
                }, seconds * 1000);
            };

        $(document).on('keypress click scroll', function() {
            intvrefresh()
        });
        intvrefresh();

    }(90));
</script>

<!-- search js kasir -->
<script>
    $(this).ready(function() {
        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?= base_url() ?>admin/kasir/fetch",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            })
        }

        $('.search').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        })
    })
</script>

<!-- search js teknisi -->
<script>
    $(this).ready(function() {
        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?= base_url() ?>admin/teknisi/fetch",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#resultTeknisi').html(data);
                }
            })
        }

        $('.searchTeknisi').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        })
    })
</script>

<!-- cart js -->
<script>
    function tambahKeranjang(nmbr) {
        var product_id = $('.btn_add' + nmbr).data("productid");
        var product_name = $('.btn_add' + nmbr).data("productname");
        var product_price = $('.btn_add' + nmbr).data("price");
        var qty = $('#' + product_id).val();
        if (qty != '' && qty >= 0) {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/kasir/tambahKeranjang",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_price: product_price,
                    qty: qty
                },
                success: function(data) {
                    alert("Produk ditambahkan");
                    $('#cart_details').html(data);
                }
            });
        } else {
            alert("Please enter qty");
        }
    }

    $(document).ready(function() {

        $('#cart_details').load("<?php echo base_url() ?>admin/kasir/muatKeranjang");

        $(document).on('click', '.hapus_item', function() {
            var row_id = $(this).attr("id");
            if (confirm("Yakin akan menghapus barang?")) {
                $.ajax({
                    url: "<?php echo base_url() ?>admin/kasir/hapusItem",
                    method: "POST",
                    data: {
                        row_id: row_id
                    },
                    success: function(data) {
                        alert("Produk dihapus dari keranjang");
                        $('#cart_details').html(data);
                    }
                });
            } else {
                return false;
            }
        });
    });


    // diskon

    $(document).ready(function() {
        $('.diskon').keyup(function() {
                var diskon = $(this).val();
                $('.diskonnom').val(diskon);
            })
            .keyup();
    })
    $(document).ready(function() {
        $('#nominal').on('click', function() {
            var total = $('.total_trs').val();
            var potongan = $('.diskonnom').val();
            var totalpdiskon = total - potongan;
            $('.grand_total').text(totalpdiskon);
            $('.totalpdiskon').val(totalpdiskon);
        })

        $('#prosentase').on('click', function() {
            var total = $('.total_trs').val();
            var diskon = $('.diskonnom').val();
            var potongan = diskon * 1 / 100;
            var jumlahpotongan = total * potongan;
            var totalpdiskon = total - jumlahpotongan;
            $('.grand_total').text(totalpdiskon);
            $('.totalpdiskon').val(totalpdiskon);
        })
    })

    // kembalian

    $(document).ready(function() {
        $('.uang_cash').keyup(function() {
                var totalpdiskon = $('.totalpdiskon').val();
                var cash = $(this).val();
                var kembalian = cash - totalpdiskon;
                $('.kembalian').text(kembalian);
                $('.kembalian').val(kembalian);
            })
            .keyup();
    });
</script>

<script>
    $(document).ready(function() {

        $('#cart_detailsubh').load("<?php echo base_url() ?>admin/kasir/ubahBayar/<?= $transaksi['id_transaksi'] ?>");

    });
</script>

<!-- cart js teknisi -->
<script>
    function tambahKerusakan(nmbr) {
        var product_id = $('.btn_add' + nmbr).data("productid");
        var product_name = $('.btn_add' + nmbr).data("productname");
        var product_price = $('.btn_add' + nmbr).data("price");
        var qty = $('#' + product_id).val();
        if (qty != '' && qty >= 0) {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/teknisi/tambahKerusakan/<?= $transaksi['id_transaksi'] ?>",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_price: product_price,
                    qty: qty
                },
                success: function(data) {
                    alert("Produk ditambahkan");
                    $('#cart_detailstek').html(data);
                }
            });
        } else {
            alert("Please enter qty");
        }
    }

    $(document).ready(function() {

        $('#cart_detailstek').load("<?php echo base_url() ?>admin/teknisi/muatKeranjang/<?= $transaksi['id_transaksi'] ?>");

        $(document).on('click', '.hapus_itemtek', function() {
            var row_id = $(this).attr("id");
            if (confirm("Yakin akan menghapus barang?")) {
                $.ajax({
                    url: "<?php echo base_url() ?>admin/teknisi/hapusItem/<?= $transaksi['id_transaksi'] ?>",
                    method: "POST",
                    data: {
                        row_id: row_id
                    },
                    success: function(data) {
                        alert("Produk dihapus dari keranjang");
                        $('#cart_detailstek').html(data);
                    }
                });
            } else {
                return false;
            }
        });
    });

    // diskon

    $(document).ready(function() {
        $('.diskontek').keyup(function() {
                var diskon = $(this).val();
                $('.diskonnomtek').val(diskon);
            })
            .keyup();
    })
    $(document).ready(function() {
        $('#nominaltek').on('click', function() {
            var total = $('.total_trstek').val();
            var potongan = $('.diskonnomtek').val();
            var totalpdiskon = total - potongan;
            $('.grand_totaltek').text(totalpdiskon);
            $('.totalpdiskontek').val(totalpdiskon);
        })

        $('#prosentasetek').on('click', function() {
            var total = $('.total_trstek').val();
            var diskon = $('.diskonnomtek').val();
            var potongan = diskon * 1 / 100;
            var jumlahpotongan = total * potongan;
            var totalpdiskon = total - jumlahpotongan;
            $('.grand_totaltek').text(totalpdiskon);
            $('.totalpdiskontek').val(totalpdiskon);
        })
    })

    // kembalian

    $(document).ready(function() {
        $('.uang_cash').keyup(function() {
                var totalpdiskon = $('.totalpdiskon').val();
                var cash = $(this).val();
                var kembalian = cash - totalpdiskon;
                $('.kembalian').text(kembalian);
                $('.kembalian').val(kembalian);
            })
            .keyup();
    });
</script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {

        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/admin/changeAccess') ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/admin/roleaccess/') ?>" + roleId;
            }
        });
    });
</script>

<!-- datatable -->
<script>
    $(document).ready(function() {
        $('#dataTableProduct').DataTable();
    });
    $('input[name="tag"]').amsifySuggestags();
</script>

<script>
    $(document).ready(function() {

        $("#product_id").change(function() { // Ketika user mengganti atau memilih data
            $("#platform_id").hide(); // Sembunyikan dulu tipe devicenya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url(); ?>admin/kasir/platformSelect", // Isi dengan url/path file php yang dituju
                data: {
                    product_id: $("#product_id").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    // Sembunyikan loadingnya $("#loading").hide();
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#platform_id").html(response.platform_id).show();

                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {

        $("#product_id").change(function() { // Ketika user mengganti atau memilih data
            $('#checklist').hide();

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url(); ?>admin/kasir/cheklistSelect", // Isi dengan url/path file php yang dituju
                data: {
                    product_id: $("#product_id").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    // Sembunyikan loadingnya $("#loading").hide();
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya

                    $("#checklist").html(response.checklist).show();

                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>

</body>

</html>