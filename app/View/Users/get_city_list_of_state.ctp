<label class="field select">
<select name="data[User][city_id]" id="city_id" style="width:280px">
    <option value=""> Select City </option>
    <?php foreach ($cityList as $cntk => $cntv) { ?>
        <option  value="<?php echo $cntk ?>" > <?php echo $cntv ?> </option>
    <?php } ?>
</select>
<i class="arrow double"></i>
</label>