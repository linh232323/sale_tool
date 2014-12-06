<div id="file-manager" class="row-fluid filterring">
    <form action="" method="posr">
        <div class="filterring-item">
            <label>Select User Type</label>
            <select class="span2">
                <option value="1">Administrator</option>
                <option value="2">Monitor</option>
                <option value="3">Member</option>
            </select>
        </div>
        <div class="filterring-item">
            <label>Select User Group</label>
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
    <?php //echo isset($course_paging) ? $course_paging : "" ;?>
</div>

<div class="row-fluid ">
    <form action="" method="post" >
        <div class="row-fluid">
          <a class="btn" href="<?php echo $app_admin_url."course/add";?>">Add Course</a>
          <a class="btn" onclick="">Delete Course</a>
    </div>
        <table class="table table-striped table-bordered table-hover ">
            <caption>List Course</caption>
            <thead>
                <th><input type="checkbox" name="checkall" id="checkall" onclick="qho.check_all()" ></th>
                <th>Course Title</th>
                <th>Course Point</th>
                <th>Course Professor</th>
                <th>Total User</th>
                <th>Total View</th>
                <th>Duration</th>
                <th>Type</th>
                <th>Create Name</th>
                <th>Update Name</th>
                <th>Create Date</th>
                <th>Update Date</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php                
//                if(!empty($files)){
//                    foreach($files as $item){
//                        echo "<tr>
//                                <td><input type='checkbox' name='checkedid[]' class='checked' value='$item->UserId' onclick='qho.check_this(this)' ></td>
//                                <td>$item->UserName
//                                    <div class='action'>
//                                        <a href='".  base_url()."administrator/file/view/$item->FileId'     class='view'>View</a>
//                                        <a href='".  base_url()."administrator/file/update/$item->FileId'   class='update'>Update</a>
//                                        <a href='".  base_url()."administrator/file/delete/$item->FileId'   class='delete'>Delete</a>
//                                    </div>    
//                                </td>
//                                <td>$item->UserFullName</td>
//                                <td>$item->UserEmail</td>
//                                <td>$item->UserCreateDate</td>
//                                <td>$item->UserUpdateDate</td>
//                            </tr>";
//                    }
//                }
                ?>
            </tbody>
        </table>
        <input type="hidden" name="action" id="action" value="" />
    </form>
</div>