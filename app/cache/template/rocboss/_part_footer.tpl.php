
<div class="footer" id="footer">
	<div class="main-outlet">
		<div class="col">
			<p>由 <a href="https://www.rocboss.com" target="_blank">ROCBOSS v2.1.0</a> 强力驱动</p>
			<p>联系我们 : admin@rocboss.com</p>
		</div>
		<?php if (isset($hotTags)) { ?>
		<div class="col">
			<p class="link">
			热门标签：
				<?php if(is_array($hotTags)) foreach($hotTags as $tag) { ?>
					<a href="<?php echo $root ?>tag/<?php echo $tag['tagname'] ?>"><?php echo $tag['tagname'] ?></a>
				<?php } ?>
			</p>
		</div>
		<?php } ?>
		<?php if (isset($LinksList)) { ?>
		<div class="col">
			<p class="link">
			邻居：
				<?php if(is_array($LinksList)) foreach($LinksList as $v) { ?> 
					<a href="<?php echo $v['url'] ?>" title="<?php echo $v['text'] ?>" target="_blank"><?php echo $v['text'] ?></a>
				<?php } ?>
			</p>
		</div>
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>