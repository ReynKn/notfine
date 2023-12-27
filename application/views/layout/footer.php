<!-- contend end -->
</div>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/') ?>assets/demo/demo.js"></script>
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/') ?>assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url('assets/') ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/') ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?= base_url('assets/') ?>assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/') ?>assets/js/plugins/bootstrap-notify.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  <script>
    $('.custom-file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })
  </script>
</body>

</html>