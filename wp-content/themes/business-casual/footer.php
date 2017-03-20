    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Company 2013</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.10.2.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.js"></script>
    <script>
    // Activates the Carousel
    $('.carousel').carousel({
        interval: 5000
    })
    </script>
<?php wp_footer(); ?>
</body>

</html>
