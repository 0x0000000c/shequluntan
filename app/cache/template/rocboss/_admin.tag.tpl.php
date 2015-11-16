
<section>
    <ol class="bz-breadcrumb">
        <li><a href="<?php echo $root ?>admin">管理中心</a></li>
        <li class="bz-active">标签管理</li>
    </ol>

    <div class="bz-panel bz-panel-default">
        <div class="bz-panel-hd">
            <h3 class="bz-panel-title">标签管理</h3>
        </div>
        <div class="bz-panel-bd">
            <?php if(is_array($tagArray)) foreach($tagArray as $tag) { ?>
                <div style="border: 1px solid #cecece;padding:10px;width:13%;float:left;margin:5px;">
                    <div style="color:#017e66; font-weight:bold; text-align:center;">
                        <?php echo $tag['tagname'] ?>
                        <span style="background: #017e66; padding: 1px 3px; color:#fff; border-radius:8px; font-size:12px;">
                            <?php echo $tag['used'] ?>
                        </span>
                    </div>
                    <div style="text-align: center;">
                        <a href="<?php echo $root ?>manage/del_tag/<?php echo $tag['tagid'] ?>/"  onclick="if(!(confirm('确定要删除吗？'))) return false;" class="bz-button bz-button-sm">
                            <i class="iconfont icon-shanchu"></i> 删除
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div class="clear"></div>
            <div class="pagination">
                <?php if (empty($tagArray)) { ?> 
                    暂无数据 
                <?php }else{ ?> 
                    <?php echo $page ?> 
                <?php } ?>
            </div>
        </div>
    </div>
</section>