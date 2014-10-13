<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link rel="stylesheet" type="text/css" href="<?=Url::getUrl();?>css/styles.css"/>
    <title></title>
</head>

<body>

    <div class="container" id="page">

        <div id="header">

        </div>

        <div id="left">
            <div class="leftTop">
                <?php CallTo::file($this->categoryFile);?>
            </div>
            <div class="leftCenter">
                <?php CallTo::file($this->basketFile);?>
            </div>
        </div>

        <div id="center">

            <div class="header">
                <?php CallTo::file($this->sortingFile);?>
                <?php CallTo::file('basketButtons');?>
            </div>

            <div class="content">
                <?php  CallTo::file($actionView);?>
            </div>

            <div class="footer">
                <?php CallTo::file($this->pagesFile);?>
            </div>
        </div>

        <div id="right">
            Информация об элементе:<p>
            <?php CallTo::file($this->columnFile);?>
        </div>

        <div id="footer">

        </div>

    </div><!--page-->

</body>
</html>