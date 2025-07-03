<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url()?>/tema/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url()?>/tema/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url()?>/tema/node_modules/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url()?>/tema/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="<?= base_url()?>/tema/node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="<?= base_url()?>/tema/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- JS DATATABLE -->

<script src="<?= base_url()?>/tema/assets/modules/datatables.min.js"></script>

<!-- Template JS File -->
<script src="<?= base_url()?>/tema/assets/js/scripts.js"></script>
<script src="<?= base_url()?>/tema/assets/js/custom.js"></script>
<script src="<?= base_url()?>/tema/pages/iziToast.min.js"></script>
<script src="<?= base_url()?>/tema/assets/modules/sweetalert.min.js"></script>
<script src="<?= base_url()?>/tema/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="<?= base_url()?>/tema/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url()?>/tema/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type='text/javascript'>
    tinymce.init({
        selector: '.konten',
        menubar: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor | link image | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat code',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>
<?= $this->renderSection('jquery') ?>


</body>

</html>