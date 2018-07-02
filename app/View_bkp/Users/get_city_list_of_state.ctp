<select name="city_id" id="city_id" class="form-control" size="1">
    <option value=""> Select City </option>
    <?php foreach ($cityList as $cntk => $cntv) { ?>
        <option  value="<?php echo $cntk ?>" > <?php echo $cntv ?> </option>
    <?php } ?>
</select>