<?php
include_once('_layouts/_header.php');
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="text-align:center;">Add New File</h1>
            <hr>
        </div>
    </div>

    <form method="post" action="<?php echo base_url(); ?>Filesimport/save_file" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputTitle">File Title</label>
            <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="File Title">
            <span class="text-danger"><?php echo form_error('inputTitle'); ?></span>
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="inputUpload">File Upload</label>
                <input type="file" class="form-control-file" name="inputUpload" id="inputUpload">
                <span class="text-danger"><?php echo form_error('inputUpload'); ?></span>
                <?php if($this->session->flashdata('error')){echo $this->session->flashdata('error');}?>
            </div>
        </div>
        <div class="form-group row">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?php echo base_url(); ?>filesimport" class="btn btn-default">Back</a>
                        </div>
                    </div>
    </form>
</div>

<?php
include_once('_layouts/_footer.php');
?>