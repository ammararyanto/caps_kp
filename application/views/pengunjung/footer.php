<!-- modal booking -->
<div class="modal fade" id="bookingbiasa" tabindex="-1" role="dialog" aria-labelledby="bookingbiasa" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-abu">
            <form action="<?= base_url() ?>Landing/telebot" method="POST" id="bokingjajal" class="needs-validation">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingbiasa">Booking Servis</h5>
                    <button type="button" class="close light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="kupon">Kode Kupon</label>
                            <input type="text" class="form-control" name="kupon" id="kupon">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="first_name">First name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Mark" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name">Last name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Otto" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="phone_number">Phone Number / Whatsapp</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="081234567890" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="candra@gmail.com" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="kota">Kota</label>
                            <input type="text" class="form-control" name="kota" id="kota" placeholder="Jakarta" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="kerusakan">Kerusakan</label>
                            <input type="text" class="form-control" name="kerusakan" id="kerusakan" placeholder="Ganti LCD" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="tipe_device">Tipe Device</label>
                            <input type="text" class="form-control" name="tipe_device" id="tipe_device" placeholder="iPhone 11 Pro Max" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="date">Tangal Datang</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="date">Jam Datang</label>
                            <input type="time" class="form-control" name="time" id="time" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="kronologi">Kronologi</label>
                            <textarea class="form-control" rows="5" name="kronologi" id="kronologi" placeholder="Tuliskan Kronologi Kerusakan Device Disini" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cyan-line" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-cyan-line">Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal booking  -->

<div class="modal fade" id="bookingpromo" tabindex="-1" role="dialog" aria-labelledby="bookingpromo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-abu">
            <form action="<?= base_url() ?>Landing/telebot" method="POST" class="needs-validation">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingpromo">Booking Servis</h5>
                    <button type="button" class="close light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="kupon">Kode Kupon</label>
                            <input type="text" class="form-control" name="kupon" value="CAPS50K" id="kupon" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="first_name">First name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Mark" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name">Last name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Otto" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="phone_number">Phone Number / Whatsapp</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="081234567890" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="candra@gmail.com" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="kota">Kota</label>
                            <input type="text" class="form-control" name="kota" id="kota" placeholder="Jakarta" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="kerusakan">Kerusakan</label>
                            <input type="text" class="form-control" name="kerusakan" id="kerusakan" placeholder="Ganti LCD" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="tipe_device">Tipe Device</label>
                            <input type="text" class="form-control" name="tipe_device" id="tipe_device" placeholder="iPhone 11 Pro Max" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="date">Tangal Datang</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="date">Jam Datang</label>
                            <input type="time" class="form-control" name="time" id="time" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="kronologi">Kronologi</label>
                            <textarea class="form-control" rows="5" name="kronologi" id="kronologi" placeholder="Tuliskan Kronologi Kerusakan Device Disini" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cyan-line" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-cyan-line">Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>

<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white text-center">
                <h3>Jadi, tunggu apa lagi?<span class="txt-cyan"> Booking Sekarang!</span></h3>
            </div>
            <div class="col-md-12 text-center">
                <a href="<?= base_url() ?>#pesan-aksesoris" class="btn btn-cyan-line font-size-20 txt-600 m-1"><i class="fa fa-shopping-cart"></i> Beli Sekarang</a>
                <button class="btn btn-cyan-line font-size-20 txt-600 m-1" data-toggle="modal" data-target="#bookingbiasa">Booking Sekarang</button>
            </div>
            <div class="col-md-12 mt-3 text-center text-white">
                <a class="txt-link-white" href="https://g.page/serviceapplepurwokerto?share" target="_blank">
                    <h4>
                        <i class="fa fa-fw fa-map-marker-alt"></i><br>
                        Jl. Prof. Dr. Suharso Ruko Wello No.1, Arcawinangun,
                        Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53113
                    </h4>
                </a>
            </div>
            <div class="col-md-12 mt-3 text-center text-white">
                <h4>Our Social Media</h4>
            </div>
            <div class="col-md-3 col-6 mt-3">
                <a href="https://www.youtube.com/channel/UCqTgdG8EYOZH9fSlzMTzZAA" target="_blank" class="card-link">
                    <div class="card text-center m-auto" style="max-width: 200px; height:150px;">
                        <div class="card-body">
                            <h1 class="card-title">
                                <i class="fab fa-youtube-square"></i>
                            </h1>
                            <h5 class="card-text">Youtube Channel</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6 mt-3">
                <a href="https://www.facebook.com/serviceapplepurwokerto" target="_blank" class="card-link">
                    <div class="card text-center m-auto" style="max-width: 200px; height:150px;">
                        <div class="card-body">
                            <h1 class="card-title">
                                <i class="fab fa-facebook-square"></i>
                            </h1>
                            <h5 class="card-text">Facbook Fanpage</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6  mt-3">
                <a href="https://www.instagram.com/candra_apple/" target="_blank" class="card-link">
                    <div class="card text-center m-auto" style="max-width: 200px; height:150px;">
                        <div class="card-body">
                            <h1 class="card-title">
                                <i class="fab fa-instagram-square"></i>
                            </h1>
                            <h5 class="card-text">Instagram</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6  mt-3">
                <a href="https://www.instagram.com/candra_apple_testimoni" target="_blank" class="card-link">
                    <div class="card text-center m-auto" style="max-width: 200px; height:150px;">
                        <div class="card-body">
                            <h1 class="card-title">
                                <i class="fab fa-instagram-square"></i>
                            </h1>
                            <h5 class="card-text">Instagram Testi</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6  mt-3">
                <a href="http://line.me/ti/p/~@candraapple" target="_blank" class="card-link">
                    <div class="card text-center m-auto" style="max-width: 200px; height:150px;">
                        <div class="card-body">
                            <h1 class="card-title">
                                <i class="fab fa-line"></i>
                            </h1>
                            <h5 class="card-text">Line</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6  mt-3">
                <a href="https://twitter.com/candra_apple" target="_blank" class="card-link">
                    <div class="card text-center m-auto" style="max-width: 200px; height:150px;">
                        <div class="card-body">
                            <h1 class="card-title">
                                <i class="fab fa-twitter-square"></i>
                            </h1>
                            <h5 class="card-text">Twitter</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6  mt-3">
                <a href="https://t.me/capsforum" target="_blank" class="card-link">
                    <div class="card text-center m-auto" style="max-width: 200px; height:150px;">
                        <div class="card-body">
                            <h1 class="card-title">
                                <i class="fab fa-telegram-plane"></i>
                            </h1>
                            <h5 class="card-text">Telegram</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-6  mt-3">
                <a href="https://wa.me/6281575403733?text=Saya%20mau%20tanya%20kak%20..." target="_blank" class="card-link">
                    <div class="card m-auto" style="max-width: 200px; height:150px;">
                        <div class="card-body txt-center">
                            <h1 class="card-title">
                                <i class="fab fa-whatsapp-square"></i>
                            </h1>
                            <h5 class="card-text">Whats App</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="copyright">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 m-auto">
                <?php $year = date('Y', time()) ?>
                <h6 class="text-center">
                    Copyright &copy <?= $year ?> CAPS - Candra Apple Solution

                </h6>
                <h6 class="text-center">
                    Developed By : <a href="https://www.instagram.com/slpatmdnt/" target="_blank" class="txt-cyan"> Masadi Kurniawan </a> <br>
                    <a href="https://www.instagram.com/ammararyanto/" target="_blank" class="txt-cyan"> Ammar Aryanto </a>
                </h6>
            </div>
        </div>
    </div>
</section>

<!-- jquery js -->
<script script type="text/javascript" src="<?= base_url() ?>assets/dist_main/dist/jquery/jquery.min.js"></script>
<!-- bootstrap js -->
<script type="text/javascript" src="<?= base_url() ?>assets/dist_main/dist/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/dist_main/dist/bootstrap/dist/collapse.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/dist_main/js/wow.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/dist_main/js/caps.js"></script>

<script>
    new WOW().init();
</script>

<!-- count down -->
<script>
    var countDownDate = new Date("July 30, 2020 23:59:00").getTime();
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("day").innerHTML = days;
        document.getElementById("hour").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("second").innerHTML = seconds;

        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("day").innerHTML = 0;
            document.getElementById("dayp").innerHTML = 0;
            document.getElementById("hour").innerHTML = 0;
            document.getElementById("hourp").innerHTML = 0;
            document.getElementById("minutes").innerHTML = 0;
            document.getElementById("minutesp").innerHTML = 0;
            document.getElementById("second").innerHTML = 0;
            document.getElementById("secondp").innerHTML = 0;
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

<!-- count up -->
<script>
    $('.count').each(function() {
        var $this = $(this);
        jQuery({
            Counter: 0
        }).animate({
            Counter: $this.attr('data-stop')
        }, {
            duration: 7000,
            easing: 'swing',
            step: function(now) {
                $this.text(Math.ceil(now));
            }
        });
    });
</script>

</body>

</html>