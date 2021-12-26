<?php
include_once('_layouts/_header.php');
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="text-align:center;">View File</h1>
            <hr>
        </div>
    </div>
    <?php
    if (isset($file_data)) {
        foreach ($file_data->result() as $row) {
    ?>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputTitle">File Title</label>
                    <input type="text" name="imagecaption" id="imagecaption" value="<?php echo $row->file_title; ?>" class="form-control">
                    <span class="text-danger"><?php echo form_error('inputTitle'); ?></span>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="inputUpload">File</label><br/>
                        <!-- <input type="file" class="form-control-file" name="inputUpload" id="inputUpload"> -->
                        <span class="text-danger"><?php echo form_error('inputUpload'); ?></span>
                        <?php if ($this->session->flashdata('error')) {
                            echo $this->session->flashdata('error');
                        } ?>
                        <?php
                        if (file_exists('files/' . $row->file_name)) {   ?>
                            <a href="<?php echo base_url(); ?>files/<?php echo $row->file_name; ?>" target="_blank">
                                <?php
                                if ($row->file_type == '.pdf' || $row->file_type == '.doc' || $row->file_type == '.docx' || $row->file_type == '.txt') {
                                ?>
                                    <img src="<?php echo base_url(); ?>files/icon.png" style="width: 10%;"/>
                                                    <?php
                                                } else {
                                                    ?>
                                            <img src='<?php echo base_url(); ?>files/<?php echo $row->file_name; ?>' id=" photo" style="display: block;width: 166px;"></a>
                        <?php }
                                            } else { ?>
                        <img src="<?php echo base_url(); ?>files/icon.png" />
                    <?php } ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <a href="<?php echo base_url(); ?>filesimport" class="btn btn-default">Back</a>
                    </div>
                </div>
            </form>
    <?php
        }
    }
    ?>
</div>

<?php
include_once('_layouts/_footer.php');
?>