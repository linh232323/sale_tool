<div class="row-fluid filterring">
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
    <?php echo isset($user_paging) ? $user_paging : "" ;?>
</div>

<div class="row-fluid ">
    <form action="<?php echo $app_base_url;?>administrator/user/execute" method="post" >
        <div class="row-fluid">
        <a class="btn" href="<?php echo $app_base_url."administrator/user/add";?>">Add user</a>
        <a class="btn" onclick="user.submit_form(this, 'delete')">Delete user</a>
    </div>
        <table class="table table-striped table-bordered table-hover ">
            <caption>List user</caption>
            <thead>
                <th><input type="checkbox" name="checkall" id="checkall" onclick="qho.check_all()" ></th>
                <th>UserName<?php //echo $this->my_pagination->orderLink("User ID","userid",$_GET['orderby'],$_GET['order'],"&anc=sda&ad=asd");?></th>
                <th>Full Name</th>
                <th>Email       </th>
                <th>Insertdate  </th>
                <th>Updatedate  </th>
            </thead>
            <tbody>
                <?php                
                if(!empty($users)){
                    foreach($users as $item){
                        echo "<tr>
                                <td><input type='checkbox' name='checkedid[]' class='checked' value='$item->UserId' onclick='qho.check_this(this)' ></td>
                                <td>$item->UserName
                                    <div class='action'>
                                        <a href='".  base_url()."administrator/user/view/$item->UserId'     class='view'>View</a>
                                        <a href='".  base_url()."administrator/user/update/$item->UserId'   class='update'>Update</a>
                                        <a href='".  base_url()."administrator/user/delete/$item->UserId'   class='delete'>Delete</a>
                                    </div>    
                                </td>
                                <td>$item->UserFullName</td>
                                <td>$item->UserEmail</td>
                                <td>$item->UserCreateDate</td>
                                <td>$item->UserUpdateDate</td>
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
var user = {
    submit_form : function (elm,action){
        var $this = $(elm);
        $("#action").val(action);
        $this.parents("form").submit();
    }
}
</script>