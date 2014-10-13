<form method="get" action="<?=$link;?>">
    <div class="checkBox">
        <select name="parameter" class="parameter" onchange="this.form.submit();">
            <option value="0" <?=Sorting::$checkBoxActivity[0][0];?>><?=Sorting::$checkBoxText[0][0];?></option>
            <option value="1" <?=Sorting::$checkBoxActivity[0][1];?>><?=Sorting::$checkBoxText[0][1];?></option>
        </select>
        <select name="order" class="order" onchange="this.form.submit();">
            <option value="0" <?=Sorting::$checkBoxActivity[1][0];?>><?=Sorting::$checkBoxText[1][0];?></option>
            <option value="1" <?=Sorting::$checkBoxActivity[1][1];?>><?=Sorting::$checkBoxText[1][1];?></option>
        </select>
    </div>
</form>