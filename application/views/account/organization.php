<style>
    .contact .contact_form .form-inline input {
        border: 1px solid #c2c2c2;
        border-radius: 10px;
        float: left;
        height: 60px;
        margin-bottom: 30px;
        padding: 20px 25px;
        width: 355px;
    }
    .contact .contact_form .form-inline select {
        border: 1px solid #c2c2c2;
        border-radius: 10px;
        float: left;
        height: 60px;
        margin-bottom: 30px;
        padding: 20px 25px;
        width: 355px;
    }
    .contact .contact_form .form-inline button {
    background: #e74c3c none repeat scroll 0 0;
    border-radius: 50px;
    color: #fff;
    display: inline-block;
    font: 14px/1 "Montserrat",sans-serif;
    padding: 20px 40px;
    text-transform: capitalize;
}
</style>
<?php // print_r($orgData);exit; ?>

<section class="row contact">
    <div class="row contact_form" style="margin-top:-14%">
        <!--<h3>Leave us a message</h3>-->
        <form class="form-inline" method="post" action="<?php echo site_url() ?>/content/orgSave" id="orgForm" enctype="multipart/form-data">
            <input type="hidden" class="vikhari" id="int_organization_id" name="int_organization_id" value="<?php echo isset($orgData)&&$orgData['int_organization_id']?$orgData['int_organization_id']:'' ?>">
            <input type="text" class="vikhari" id="txt_name" name="txt_name" placeholder="Name" value="<?php echo isset($orgData)&&$orgData['txt_name']!=''?$orgData['txt_name']:'' ?>">
            <select  class="vikhari" id="txt_field" name="txt_field" placeholder="Oprating Field">
                <option>Select Field</option>
                <option value="Computer Hardware" <?php echo isset($orgData)&&$orgData['txt_field']=='Computer Hardware'?'selected':'' ?>>Computer Hardware</option>
                <option value="Computer Software" <?php echo isset($orgData)&&$orgData['txt_field']=='Computer Software'?'selected':'' ?>>Computer Software</option>
                <option value="FMCG" <?php echo isset($orgData)&&$orgData['txt_field']=='FMCG'?'selected':'' ?>>FMCG</option>
                <option value="E-Markating" <?php echo isset($orgData)&&$orgData['txt_field']=='E-Markating'?'selected':'' ?>>E-Markating</option>
                <option value="Markating" <?php echo isset($orgData)&&$orgData['txt_field']=='Markating'?'selected':'' ?>>Markating</option>
                <option value="Bulk Markating" <?php echo isset($orgData)&&$orgData['txt_field']=='Bulk Markating'?'selected':'' ?>>Bulk Markating</option>
                <option value="Food" <?php echo isset($orgData)&&$orgData['txt_field']=='Food'?'selected':'' ?>>Food</option>
                <option value="Apparel" <?php echo isset($orgData)&&$orgData['txt_field']=='Apparel'?'selected':'' ?>>Apparel</option>
                <option value="Other" <?php echo isset($orgData)&&$orgData['txt_field']=='Other'?'selected':'' ?>>Other</option>
            </select>
            <input type="text" class="vikhari" id="txt_address" name="txt_address" placeholder="Address" value="<?php echo isset($orgData)&&$orgData['txt_address']!=''?$orgData['txt_address']:'' ?>">
            <input type="text" class="vikhari" id="txt_contact_no" name="txt_contact_no" placeholder="Phone No." value="<?php echo isset($orgData)&&$orgData['txt_contact_no']!=''?$orgData['txt_contact_no']:'' ?>">
            <input type="hidden" class="vikhari" id="int_user_of" name="int_user_of" value="<?php echo $user['int_user_id'] ?>">
<!--                <input type="file" class="vikhari" id="exampleInputphone" name="txt_logo" placeholder="Your Phone No.">
            <input type="file" class="vikhari" id="exampleInputphone" name="txt_cover_image" placeholder="Your Phone No.">-->
            <!--<textarea rows="7" placeholder="Your Message.."></textarea>-->
            <button id="save_org">Save Details</button>
        </form>
    </div>
</section>

<script>
    $('#save_org').click(function() {
        alert();
        if($('#txt_name').val()==''){alert('please enter name'); return false;}
        else if($('#txt_field').val()==''){alert('please select Field'); return false;}
        else if($('#txt_address').val()==''){alert('please enter name'); return false;}
        else if($('#txt_contact_no').val()==''){alert('please enter name'); return false;}
        else{
            $('#orgForm').submit();
            
        }
        
    });
</script>



