 <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
 <section id="call-to-action">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="block">
                     <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">Hubungi Kami</h1>
                         <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Jangan ragu untuk servis ditempat kami karena kami memberikan yang terbaik untuk anda.</p>
                         <a href="contact.html" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Kontak Kami</a>
                 </div>
             </div>

         </div>
     </div>
 </section>

 <!--
            ==================================================
            Footer Section Start
            ================================================== -->
 <footer id="footer">
     <div class="container">
         <div class="col-md-8">
             <p class="copyright">Copyright: <span>
                     <script>
                         document.write(new Date().getFullYear())
                     </script>
                 </span> Candra Apple Solution. <br>
                 Theme by <a href="http://www.Themefisher.com" target="_blank">Themefisher</a>
             </p>
         </div>
         <div class="col-md-4">
             <!-- Social Media -->
             <ul class="social">
                 <li>
                     <a href="https://www.facebook.com/candraappleservice/" class="Facebook">
                         <i class="ion-social-facebook"></i>
                     </a>
                 </li>
                 <li>
                     <a href="https://www.instagram.com/candra_apple/" class="Instagram">
                         <i class="ion-social-instagram"></i>
                     </a>
                 </li>
                 <li>
                     <p align="right"> Develop By
                         <a href="https://www.instagram.com/slpatmdnt/" target="_blank">
                             slpatmdnt
                         </a>
                     </p>
                 </li>
             </ul>
         </div>
     </div>
 </footer> <!-- /#footer -->
 <a class="linkWA" href="https://api.whatsapp.com/send?phone=6285742990993&amp;text=Hallo%20gan,%20Saya%20mau%20tanya. . . .">
     <img src="<?= base_url() ?>image/assets/whatsapp.png" /></a>
 <!-- Template Javascript Files
	================================================== -->
 <script type="text/javascript">
     function add_chatinline() {
         var hccid = 43514205;
         var nt = document.createElement("script");
         nt.async = true;
         nt.src = "https://mylivechat.com/chatinline.aspx?hccid=" + hccid;
         var ct = document.getElementsByTagName("script")[0];
         ct.parentNode.insertBefore(nt, ct);
     }
     add_chatinline();
 </script>
 <!-- jquery -->
 <script src="<?= base_url() ?>assets/dist_main/jQurey/jquery.min.js"></script>
 <!-- Form Validation -->
 <script src="<?= base_url() ?>assets/dist_main/form-validation/jquery.form.js"></script>
 <script src="<?= base_url() ?>assets/dist_main/form-validation/jquery.validate.min.js"></script>
 <!-- owl carouserl js -->
 <script src="<?= base_url() ?>assets/dist_main/owl-carousel/owl.carousel.min.js"></script>
 <!-- bootstrap js -->
 <script src="<?= base_url() ?>assets/dist_main/bootstrap/bootstrap.min.js"></script>
 <!-- wow js -->
 <script src="<?= base_url() ?>assets/dist_main/wow-js/wow.min.js"></script>
 <!-- slider js -->
 <script src="<?= base_url() ?>assets/dist_main/slider/slider.js"></script>
 <!-- Fancybox -->
 <script src="<?= base_url() ?>assets/dist_main/facncybox/jquery.fancybox.js"></script>
 <!-- template main js -->
 <script src="<?= base_url() ?>assets/js_main/main.js"></script>
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
 <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a8bfdb59105bb42"></script>
 </body>

 </html>