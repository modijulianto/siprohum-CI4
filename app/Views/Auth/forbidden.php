<?= $this->extend('Layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="x_panel">
    <div class="x_content">
        <div class="row">
            <div class="col-12 text-center">
                <img src="/images/forbidden.jpg" alt="" width="500px">
            </div>
            <div class="col-12 text-center">
                <a onclick="go_back()" class="btn btn-primary text-light shadow">Go Back</a>
            </div>
        </div>
        <a href='https://www.freepik.com/vectors/website'>Website vector created by stories - www.freepik.com</a>
    </div>
</div>
<script>
    function go_back() {
        window.history.back();
    }
</script>
<?= $this->endSection('content'); ?>