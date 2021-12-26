<?php
include_once('_layouts/_header.php');
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 style="text-align:center;">File List</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a href="<?php echo base_url(); ?>filesimport" class="list-group-item active">File List</a>
                <a href="<?php echo base_url(); ?>filesimport/trash" class="list-group-item">Trash</a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="form-group">
                    <div style="margin-left: 85%;">
                        <a class="btn btn-md btn-primary" href="<?php echo base_url(); ?>filesimport/add_new_file">Add New File</a>
                    </div>
                </div>
            <table class="table table-bordered" id="file_list">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">File Title</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Upload</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    if ($fetch_data->num_rows() > 0) {
                        foreach ($fetch_data->result() as $row) {
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->file_title; ?></td>
                                <td><?php echo $row->file_name; ?></td>
                                <td><?php echo $row->file_type; ?></td>
                                <?php
                                $date = date_create($row->file_createtime);
                                $newdate = date_format($date, "F d,Y  h:i a");
                                ?>
                                <td><?php echo $newdate; ?></td>
                                <td>
                                    <a href="<?php echo site_url("filesimport/view_file/" . $row->id); ?>" class="btn btn-info">View</a>
                                    <a href="<?php echo site_url("filesimport/delete_file/" . $row->id); ?>" class="btn btn-info" onclick="return confirm('Delete File?');">Delete</a>
                                </td>
                            <?php
                            $i++;
                        }
                    } else {
                            ?>
                            <tr>
                                <td colspan="5">No Data Found</td>
                            </tr>
                        <?php
                    }
                        ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <?php
    include_once('_layouts/_footer.php');
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#file_list').DataTable();
        });
    </script>