<div id="file-manager" class="row-fluid filterring">
    <form action="" method="posr">
        <div class="filterring-item">
            <label>Select File Type</label>
            <select class="span2">
                <option value="1">Administrator</option>
                <option value="2">Monitor</option>
                <option value="3">Member</option>
            </select>
        </div>
        <div class="filterring-item">
            <label>Select File Group</label>
            <select class="span2">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="filterring-item">
            <label>Filter 1</label>
            <input type="text" placeholder="Type something…">
        </div>
        <div class="filterring">
            <label>&nbsp;</label>
            <button type="submit" class="btn">Submit</button>
            <button type="submit" class="btn">Reload</button>
        </div>
    </form>
</div>

<div class="row-fluid pagination pagination-right pagination-small">
    <?php echo isset($file_paging) ? $file_paging : "" ;?>
</div>

<div class="row-fluid ">
    <form action="<?php echo $app_base_url;?>administrator/user/execute" method="post" >
        <div class="row-fluid">
        <a href="#upload-modal" role="button" class="btn" data-toggle="modal">Upload</a>
            <!--  Modal upload File   -->
            <div id="upload-modal" class="modal hide fade">
                <form action="" method="post">
                <div class="modal-body">
                    <div id="uploader"></div>

                    <!--<div class="file-title">Select Files to Upload</div>
                    <div class="file-contents">
                        <table class="table table-hover">
                            <thead>
                                <th width="60%">File Name</th>
                                <th width="10%">Size</th>
                                <th width="30%">Action/Message</th>
                            </thead>
                        </table>
                        <button class="btn btn-primary">Upload</button>
                    </div>
                    -->
                </div>
                </form>
            </div>
            
            <!--***********************-->
        <a class="btn" onclick="user.submit_form(this, 'delete')">Delete</a>
    </div>
        <table class="table table-striped table-bordered table-hover ">
            <caption>List file</caption>
            <thead>
                <th><input type="checkbox" name="checkall" id="checkall" onclick="qho.check_all()" ></th>
                <th>File Name</th>
                <th>File Size</th>
                <th>Type</th>
                <th>File Ext.</th>
                <th>File Status</th>
                <th>Download</th>
                <th>Creator</th>
                <th>Updater</th>
                <th>Expired Date</th>
                <th>Insert Date</th>
                <th>Update Date</th>
            </thead>
            <tbody>
                <?php
                if(!empty($files)){
                    foreach($files as $item){
                        echo "<tr>
                                <td><input type='checkbox' name='checkedid[]' class='checked' value='$item->FileId' onclick='qho.check_this(this)' ></td>
                                <td>$item->FileName
                                    <div class='action'>
                                        <a href='".  base_url()."administrator/file/view/$item->FileId'     class='view'>View</a>
                                        <a href='".  base_url()."administrator/file/update/$item->FileId'   class='update'>Update</a>
                                        <a href='".  base_url()."administrator/file/delete/$item->FileId'   class='delete'>Delete</a>
                                    </div>    
                                </td>
                                <td>$item->FileSize</td>
                                <td>$item->FileType</td>
                                <td>$item->FileExtension</td>
                                <td>$item->FileStatus</td>
                                <td>0</td>
                                <td>$item->FileCreateName</td>
                                <td>$item->FileUpdateName</td>
                                <td>$item->FileDuration</td>
                                <td>$item->FileCreateDate</td>
                                <td>$item->FileUpdateDate</td>
                            </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <input type="hidden" name="action" id="action" value="" />
    </form>
</div>
<script type="text/javascript">
    window.onload = file.upload('<?php echo $app_base_url; ?>', '<?php echo json_encode($tables); ?>');
</script>